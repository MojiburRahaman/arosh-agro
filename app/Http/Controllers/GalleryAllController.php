<?php

namespace App\Http\Controllers;

use App\Models\GalleryAll;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GalleryAllController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = GalleryAll::latest()->paginate(10);

        return view('backend.gallery.index', [
            'galleries' => $galleries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([


            'image' => ['mimes:png,jpeg,jpg',],



            // 'regular_price[]' => ['required'],
        ], [
            'image.*.mimes' => '  Image must be png,jpg,jpeg formate',


        ]);

        $gallery = new GalleryAll;

        $gallery->image_title = $request->image_title;
        $gallery->video_title = $request->video_title;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = Str::slug($request->image_title) . '-' . Str::random(1) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('image/' . $extension), 90);
            $gallery->image = $extension;
        }


        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $extension = Str::slug($request->video_title) . '-' . Str::random(1) . '.' . $video->getClientOriginalExtension();
            $request->video->move('videos', $extension);
            /* Image::make($video)->save(public_path('video/' . $extension), 90);*/
            $gallery->video = $extension;
        }

        $gallery->save();
        return redirect()->route('gallery.index')->with('success', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GalleryAll  $galleryAll
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GalleryAll  $galleryAll
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['gallery'] = GalleryAll::find($id);
        return view('backend.gallery.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GalleryAll  $galleryAll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([


            'image' => ['mimes:png,jpeg,jpg',],
        ], [
            'image.*.mimes' => '  Image must be png,jpg,jpeg formate',


        ]);


        $gallery = GalleryAll::findorfail($id);
        $gallery->image_title = $request->image_title;
        $gallery->video_title = $request->video_title;

        if ($request->hasFile('image')) {
            $old_thumbnail = public_path('image/' . $gallery->image);
            if (file_exists($old_thumbnail)) {
                unlink($old_thumbnail);
            }
            $md_thumbnail = $request->file('image');
            $extension = Str::slug($request->image_title) . '-' . Str::random(1) . '.' . $md_thumbnail->getClientOriginalExtension();
            Image::make($md_thumbnail)->save(public_path('image/' . $extension), 90);

            $gallery->image = $extension;
        }

        if ($request->hasFile('video')) {
            $old_video = public_path('videos/' . $gallery->video);
            if (file_exists($old_video)) {
                unlink($old_video);
            }
            $service_thumbnail = $request->file('video');
            $extension = Str::slug($request->video_title) . '-' . Str::random(1) . '.' . $service_thumbnail->getClientOriginalExtension();
            $request->video->move('videos', $extension);
        }
        $gallery->video = $extension;

        $gallery->save();

        return redirect()->route('gallery.index')->with('warning', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GalleryAll  $galleryAll
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = GalleryAll::findorfail($id);
        $old_img = public_path('image/' . $gallery->image);

        @unlink($old_img);


        $old_video = public_path('videos/' . $gallery->video);

        @unlink($old_video);

        $gallery->delete();
        return back()->with('delete', 'Message Deleted Successfully');
    }
}

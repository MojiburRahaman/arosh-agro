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
        if (auth()->user()->can('Gallery View')) {
            $galleries = GalleryAll::latest()->paginate(10);

            return view('backend.gallery.index', [
                'galleries' => $galleries,
            ]);
        }
        abort('404');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->can('Gallery Create')) {
            return view('backend.gallery.create');
        }
        abort('404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('Gallery Create')) {
            $request->validate([


                'image' => ['mimes:png,jpeg,jpg',],

            ], [
                'image.*.mimes' => '  Image must be png,jpg,jpeg formate',

            ]);

            $gallery = new GalleryAll();

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
        abort('404');
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
        if (auth()->user()->can('Gallery Edit')) {
            $data['gallery'] = GalleryAll::find($id);
            return view('backend.gallery.edit', $data);
        }
        abort('404');
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
        if (auth()->user()->can('Gallery Edit')) {
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
        abort('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GalleryAll  $galleryAll
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->can('Gallery Delete')) {
            $gallery = GalleryAll::findorfail($id);
            $old_img = public_path('image/' . $gallery->image);

            @unlink($old_img);


            $old_video = public_path('videos/' . $gallery->video);

            @unlink($old_video);

            $gallery->delete();
            return back()->with('delete', 'Message Deleted Successfully');
        }
        abort('404');
    }
}

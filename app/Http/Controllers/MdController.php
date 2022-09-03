<?php

namespace App\Http\Controllers;

use App\Models\Md;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class MdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mds = Md::all();

        return view('backend.md.index', [
            'mds' => $mds,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.md.create');
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

            'name' => ['required'],
            'description' => ['required'],




            // 'regular_price[]' => ['required'],
        ], [
            'thumbnail_img.*.mimes' => '  Image must be png,jpg,jpeg formate',


        ]);
// return $request;
        $md = new Md;

        $md->name = $request->name;
        $md->description = $request->description;
        if ($request->hasFile('thumbnail_img')) {

            $product_thumbnail = $request->file('thumbnail_img');
            $extension = Str::slug($request->name) . '-' . Str::random(1) . '.' . $product_thumbnail->getClientOriginalExtension();
            Image::make($product_thumbnail)->save(public_path('thumbnail_img/' . $extension), 90);
            $md->thumbnail_img = $extension;
        }
        $md->save();
        return redirect()->route('mds.index')->with('success', 'Message Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Md  $md
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Md  $md
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['md'] = Md::find($id);
        return view('backend.md.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Md  $md
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => ['required'],
            'description' => ['required'],




            // 'regular_price[]' => ['required'],
        ], [
            'thumbnail_img.*.mimes' => '  Image must be png,jpg,jpeg formate',


        ]);
        $md = Md::findorfail($id);
        $md->name = $request->name;
        $md->description = $request->description;
        if ($request->hasFile('thumbnail_img')) {
            $old_thumbnail = public_path('thumbnail_img/' . $md->thumbnail_img);
            if (file_exists($old_thumbnail)) {
                unlink($old_thumbnail);
            }
            $md_thumbnail = $request->file('thumbnail_img');
            $extension = Str::slug($request->name) . '-' . Str::random(1) . '.' . $md_thumbnail->getClientOriginalExtension();
            Image::make($md_thumbnail)->save(public_path('thumbnail_img/' . $extension), 90);

            $md->thumbnail_img = $extension;
        }
        $md->save();

        return redirect()->route('mds.index')->with('warning', 'Message Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Md  $md
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $md = Md::findorfail($id);
        // product thumbnail delete 
        $old_img = public_path('thumbnail_img/' . $md->thumbnail_img);
        if (file_exists($old_img)) {
            unlink($old_img);
        }

        $md->delete();
        return back()->with('delete', 'Message Deleted Successfully');
    }
}

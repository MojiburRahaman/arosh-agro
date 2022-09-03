<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->can('Pages View')) {
            return view('backend.Pages.index', [
                'pages' => Pages::latest('id')->get(),
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
        if (auth()->user()->can('Pages Create')) {
            return view('backend.Pages.create');
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
        if (auth()->user()->can('Pages Create')) {
            $request->validate([
                'title' => ['required'],
                'heading' => ['required'],
                'description' => ['required'],
            ]);
            $page = new Pages();
            $page->title = $request->title;
            $page->slug = Str::slug($request->title);
            $page->heading = $request->heading;
            $page->description = $request->description;

            if ($request->hasFile('thumbnail_img')) {
                $product_thumbnail = $request->file('thumbnail_img');
                $extension = Str::slug($request->name) . '-' . Str::random(1) . '.' . $product_thumbnail->getClientOriginalExtension();
                Image::make($product_thumbnail)->save(public_path('thumbnail_img/' . $extension), 90);
                $page->thumbnail_img = $extension;
            }
            $page->save();
            return redirect()->route('pages.index')->with('success', 'Page Added Successfully');
        }
        abort('404');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page =  Pages::find($id);
        if ($page->status != 1) {
            $page->status = 1;
            $page->save();
            return back()->with('success', 'Active Successfully');
        } else {
            $page->status = 2;
            $page->save();
            return back()->with('warning', 'Inactive Successfully');
            # code...
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->can('Pages Edit')) {
            $pages = Pages::find($id);
            return view(
                'backend.Pages.edit',
                [
                    'pages' => $pages,
                ]
            );
        }
        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->can('Pages Edit')) {
            $request->validate([
                'title' => ['required'],
                'heading' => ['required'],
                'description' => ['required'],
            ]);
            $page =  Pages::find($id);
            $page->title = $request->title;
            $page->slug = Str::slug($request->title);
            $page->heading = $request->heading;
            $page->description = $request->description;

            if ($request->hasFile('thumbnail_img')) {
                $old_thumbnail = public_path('thumbnail_img/' . $page->thumbnail_img);
                if (file_exists($old_thumbnail)) {
                    @unlink($old_thumbnail);
                }
                $md_thumbnail = $request->file('thumbnail_img');
                $extension = Str::slug($request->name) . '-' . Str::random(1) . '.' . $md_thumbnail->getClientOriginalExtension();
                Image::make($md_thumbnail)->save(public_path('thumbnail_img/' . $extension), 90);

                $page->thumbnail_img = $extension;
            }
            $page->save();
            return redirect()->route('pages.index')->with('success', 'Page Eidted Successfully');
        }
        abort('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pages $pages, $id)
    {
        if (auth()->user()->can('Pages Delete')) {
            Pages::find($id)->delete();
            return redirect()->route('pages.index')->with('delete', 'Page Deleted');
        }
        abort('404');
    }
}

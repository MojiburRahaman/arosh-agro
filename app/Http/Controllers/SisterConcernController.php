<?php

namespace App\Http\Controllers;

use App\Models\SisterConcern;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SisterConcernController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->can('Sister-Concern View')) {
            $concerns = SisterConcern::latest()->simplePaginate(15);
            return view('backend.concern.index', compact('concerns'));
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
        if (auth()->user()->can('Sister-Concern Create')) {
            return view('backend.concern.create');
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
        if (auth()->user()->can('Sister-Concern Create')) {
            $request->validate([
                'cocern_name' => ['required'],

            ]);

            $concern = new SisterConcern();

            $concern->cocern_name = $request->cocern_name;
            $concern->about_concern = $request->about_concern;
            $concern->weblink = $request->weblink;
            $concern->address = $request->address;
            $concern->save();
            return redirect()->route('sister-concern.index')->with('success', 'Sister Concern Added Successfully');
        }
        abort('404');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SisterConcern  $sisterConcern
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SisterConcern  $sisterConcern
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->can('Sister-Concern Edit')) {
            $concern = SisterConcern::findorfail($id);
            return view('backend.concern.edit', [
                'concern' => $concern,
            ]);
        }
        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SisterConcern  $sisterConcern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->can('Sister-Concern Edit')) {
            $request->validate([
                'cocern_name' => ['required'],


            ]);

            $concern = SisterConcern::findorfail($id);
            $concern->cocern_name = $request->cocern_name;
            $concern->about_concern = $request->about_concern;
            $concern->weblink = $request->weblink;
            $concern->address = $request->address;
            $concern->save();

            return redirect()->route('sister-concern.index')->with('success', 'Sister Concern Updated Successfully');
        }
        abort('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SisterConcern  $sisterConcern
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->can('Sister-Concern Delete')) {
            $concern = SisterConcern::findorfail($id);
            $concern->delete();
            return back()->with('delete', 'Sister Concern Deleted Successfully');
        }
        abort('404');
    }
}

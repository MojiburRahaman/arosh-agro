<?php

namespace App\Http\Controllers;

use App\Models\Sellingpoint;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SellingpointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->can('Selling-Points View')) {
            $points = Sellingpoint::latest()->paginate(10);

            return view('backend.spoint.index', [
                'points' => $points,
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
        if (auth()->user()->can('Selling-Points Create')) {
            return view('backend.spoint.create');
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
        if (auth()->user()->can('Selling-Points Create')) {
            $request->validate([

                'p_name' => ['required'],
                'mobile' => ['required'],
                'address' => ['required'],


            ]);


            $point = new Sellingpoint();

            $point->p_name = $request->p_name;
            $point->mobile = $request->mobile;
            $point->address = $request->address;
            $point->location = $request->location;


            $point->save();
            return redirect()->route('spoints.index')->with('success', 'Selling Point Added Successfully');
        }
        abort('404');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sellingpoint  $sellingpoint
     * @return \Illuminate\Http\Response
     */
      public function show($id)
      {
          return redirect()->back();
      }

    /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Models\Sellingpoint  $sellingpoint
       * @return \Illuminate\Http\Response
       */
   public function edit($id)
   {
       if (auth()->user()->can('Selling-Points Edit')) {
           $data['point'] = Sellingpoint::find($id);
           return view('backend.spoint.edit', $data);
       }
       abort('404');
   }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Sellingpoint  $sellingpoint
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        if (auth()->user()->can('Selling-Points Edit')) {
            $request->validate([

                'p_name' => ['required'],
                'mobile' => ['required'],
                'address' => ['required'],


            ]);

            $point = Sellingpoint::findorfail($id);

            $point->p_name = $request->p_name;
            $point->mobile = $request->mobile;
            $point->address = $request->address;
            $point->location = $request->location;

            $point->save();

            return redirect()->route('spoints.index')->with('warning', 'Selling Point Updated Successfully');
        }
        abort('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sellingpoint  $sellingpoint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->can('Selling-Points Delete')) {
            $point = Sellingpoint::findorfail($id);
            $point->delete();
            return back()->with('delete', 'Selling Point Deleted Successfully');
        }
        abort('404');
    }
}

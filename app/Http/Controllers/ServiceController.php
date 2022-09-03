<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->paginate(10);
    
        return view('backend.service.index', [
            'services' => $services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.service.create');
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
       
            'heading' => ['required'],
            'description' => ['required'],
            'service_image' => ['required', 'mimes:png,jpeg,jpg',],
           
            
          
            // 'regular_price[]' => ['required'],
        ], [
            'service_image.*.mimes' => '  Image must be png,jpg,jpeg formate',
            'service_image.*.required' => '  Image required',
 
        ]);

            $service = new Service;

        $service->heading = $request->heading;
        $service->description = $request->description;
        if ($request->hasFile('service_image')) {
            $product_thumbnail = $request->file('service_image');
            $extension = Str::slug($request->heading) . '-' . Str::random(1) . '.' . $product_thumbnail->getClientOriginalExtension();
            Image::make($product_thumbnail)->save(public_path('service_image/' . $extension), 90);
            $service->service_image = $extension;
        }
        
        $service->save();
          return redirect()->route('services.index')->with('success', 'Service Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['service'] = Service::find($id);
        return view('backend.service.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                    $request->validate([
       
            'heading' => ['required'],
            'description' => ['required'],
            'service_image' => [  'mimes:png,jpeg,jpg',],
           
            
          
            // 'regular_price[]' => ['required'],
        ], [
            'service_image.*.mimes' => '  Image must be png,jpg,jpeg formate',
            'service_image.*.required' => '  Image required',
 
        ]);

             
        $service = Service::findorfail($id);
       
        $service->heading = $request->heading;
        $service->description = $request->description;
                if ($request->hasFile('service_image')) {
            $old_thumbnail = public_path('service_image/' . $service->service_image);
            if (file_exists($old_thumbnail)) {
                unlink($old_thumbnail);
            }
            $service_thumbnail = $request->file('service_image');
            $extension = Str::slug($request->heading) . '-' . Str::random(1) . '.' . $service_thumbnail->getClientOriginalExtension();
            Image::make($service_thumbnail)->save(public_path('service_image/' . $extension), 90);

            $service->service_image = $extension;
        }
             $service->save();

            return redirect()->route('services.index')->with('warning', 'Service Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                        $service = Service::findorfail($id);
        // product thumbnail delete 
        $old_img = public_path('service_image/' . $service->service_image);
        if (file_exists($old_img)) {
            unlink($old_img);
        }

        $service->delete();
        return back()->with('delete', 'Service Deleted Successfully');
    }
}

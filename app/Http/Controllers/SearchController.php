<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Subcatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function CategorySearch($slug, Request $request)
    {
        $search = '';
        // $min_price = strip_tags($request->min_price);
        // $max_price = strip_tags($request->max_price);
        $category = Catagory::where('slug', $slug)->select('id', 'catagory_name')->firstorfail();
        $categories = Catagory::select('id', 'slug', 'catagory_name')->withCount('Product')->get();

        if ($request->ajax()) {
            $Products = Product::with('Attribute', 'Catagory:id,catagory_name,slug')
                ->where('catagory_id', $category->id)
                ->where('status', 1)
                ->select('id', 'comming_soon', 'catagory_id', 'slug', 'title', 'thumbnail_img', )
                ->latest('id')
                ->simplepaginate(12);
            $view = view('frontend.search.pagination-data', compact('Products'))->render();
            return response()->json(['html' => $view,]);
        }


        $Products = Product::with('Attribute', )
            ->where('catagory_id', $category->id)
            ->where('status', 1)
            ->select('id', 'comming_soon', 'catagory_id', 'slug', 'title', 'thumbnail_img', )
            ->latest('id')
            ->simplepaginate(12);
        $category = $category->catagory_name;
        
        return view('frontend.search.search-data', [
            'Products' => $Products,
            'Categories' => $categories,
            'category' => $category,
            'search' => $search,
        ]);
    }
    public function SubCategorySearch(Request $request, $slug)
    {
        $search = '';
        $subcatagory = Subcatagory::where('slug', $slug)->first();
        if ($request->ajax()) {
            $Products = Product::with('Attribute', 'Catagory:id,catagory_name,slug')
                ->where('subcatagory_id', $subcatagory->id)
                ->where('status', 1)
                ->latest('id')->simplepaginate(18);
            $view = view('frontend.search.pagination-data', compact('Products'))->render();
            return response()->json(['html' => $view,]);
        }
        $categories = Catagory::with('Subcatagory')->select('id', 'slug', 'catagory_name')->get();
        $Products = Product::with('Attribute', 'Catagory:id,catagory_name,slug')
            ->where('subcatagory_id', $subcatagory->id)
            ->where('status', 1)
            ->latest('id')->simplepaginate(18);
        $category = $subcatagory->subcatagory_name;

        return view('frontend.search.search-data', [
            'Products' => $Products,
            'Categories' => $categories,
            'category' => $category,
            'search' => $search,
        ]);
    }
    public function BrandSearch($slug, Request $request)
    {
        $search = '';
        $brand = Brand::where('slug', $slug)->first();
        $category = $brand->brand_name;
        $categories = Catagory::select('slug', 'catagory_name')->get();
        if ($request->ajax()) {
            $Products = Product::with('Attribute', 'Catagory:id,catagory_name,slug')
                ->where('brand_id', $brand->id)
                ->where('status', 1)
                ->latest()->simplepaginate(15);
            $view = view('frontend.search.pagination-data', compact('Products'))->render();
            return response()->json(['html' => $view,]);
        }
        $Products = Product::with('Attribute', 'Catagory:id,catagory_name,slug')
            ->where('brand_id', $brand->id)
            ->where('status', 1)
            ->latest('id')->simplepaginate(15);
        return view('frontend.search.search-data', [
            'Products' => $Products,
            'Categories' => $categories,
            'category' => $category,
            'search' => $search,
        ]);
    }
}

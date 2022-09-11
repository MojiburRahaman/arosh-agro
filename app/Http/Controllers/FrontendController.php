<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\AboutSite;
use App\Models\Attribute;
use App\Models\Banner;
use App\Models\BestDeal;
use App\Models\BestDealProduct;
use App\Models\Blog;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\BlogComment;
use App\Models\BlogReply;
use App\Models\Md;
use App\Models\Brand;
use App\Models\Newsletter;
use App\Models\SisterConcern;
use App\Models\Service;
use App\Models\GalleryAll;
use App\Models\Pages;
use App\Models\SiteSetting;
use App\Models\Sellingpoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{
    public function Frontendhome(Request $request)
    {
        if ($request->ajax()) {
            $Products = Product::with('Attribute')
                ->where('status', 1)
                ->select('id', 'comming_soon', 'slug', 'title', 'thumbnail_img', )
                ->latest('id')
                ->simplePaginate(4);

            $view = view('frontend.pages.product-pagination', compact('Products'))->render();
            return response()->json(['html' => $view,]);
        }

        $deal = BestDeal::where('status', 1)->with(
            [
                'Product' =>  function ($q) {
                    $q->limit(4);
                },
                'Product.Attribute:id,product_id,regular_price,sell_price,discount'
            ]
        )->first();

        $catGallery = Catagory::latest('id')->with('gallery')->get();
        $gallery = Gallery::latest('id')->limit(20)->get();



        $banners = Banner::latest('id')
            ->where('status', 1)->get();


        $product = Product::with('Attribute')
            ->where('status', 1)
            ->select('id', 'slug', 'title', 'thumbnail_img', 'comming_soon')
            ->latest('id')
            ->simplePaginate(4);

        $about = AboutSite::first();

        return view('frontend.main', [
            'latest_products' => $product,
            'banners' => $banners,
            'deal' => $deal,
            'about' => $about,
            'catGallery' => $catGallery,
            'gallery' => $gallery,
        ]);
    }

    public function Allproducts(Request $request)
    {
        if ($request->ajax()) {
            $Products = Product::with('Attribute')
                ->where('status', 1)
                ->select('id', 'slug', 'title', 'thumbnail_img', 'comming_soon')
                ->latest('id')->simplePaginate(8);

            $view = view('frontend.pages.allproduct-pagination', compact('Products'))->render();
            return response()->json(['html' => $view,]);
        }

        $product = Product::with('Attribute')
            ->where('status', 1)
            ->select('id', 'slug', 'title', 'thumbnail_img', 'comming_soon')
            ->latest('id')
            ->simplePaginate(8);

        return view('frontend.pages.all-product', [
            'latest_products' => $product,

        ]);
    }

    // public function Frontendsearching(Request $request)
    // {
    //     $category = '';
    //     $search = strip_tags($request->search);

    //     if ($request->ajax()) {
    //         $Products = Product::with('Catagory', 'Attribute')
    //             ->where('title', 'LIKE', "%$search%")
    //             ->where('status', 1)
    //             ->select('id', 'slug', 'catagory_id', 'thumbnail_img', 'product_summary', 'title')
    //             ->withCount('ProductReview')
    //             ->latest()->simplePaginate(15);
    //         $view = view('frontend.search.pagination-data', compact('Products'))->render();
    //         return response()->json(['html' => $view,]);
    //     }

    //     $Products = Product::with('Catagory', 'Attribute')
    //         ->where('title', 'LIKE', "%$search%")
    //         ->where('status', 1)
    //         ->select('id', 'slug', 'catagory_id', 'thumbnail_img', 'product_summary', 'title')
    //         ->withCount('ProductReview')
    //         ->latest()->simplePaginate(15);
    //     $categories = Catagory::with('Subcatagory')->select('id', 'slug', 'catagory_name')->get();

    //     return view('frontend.search.search-data', [
    //         'Products' => $Products,
    //         'Categories' => $categories,
    //         'category' => $category,
    //         'search' => $search,
    //     ]);
    // }

    public function FrontndContact()
    {
        $points = Sellingpoint::latest('id')->get();

        return view('frontend.pages.contact', [
            'points' => $points,

        ]);
    }
    public function FrontendContactPost(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'string',],
            'message' => ['required', 'string',],
        ]);
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        $settinng = SiteSetting::first();
        Mail::to($settinng->email)->send(new Contact($name, $email, $subject, $message));

        return back()->with('done', 'Send Successfully');
    }

    // public function Frontendblog()
    // {
    //     $blogs = Blog::latest('id')->select('id', 'title', 'slug', 'blog_thumbnail', 'blog_description', 'created_at')
    //         ->paginate(12);
    //     return view('frontend.pages.blogs', [
    //         'blogs' => $blogs,
    //     ]);
    // }
    public function Sisterconcern()
    {
        $concerns = SisterConcern::latest('id')->get();
        return view('frontend.pages.concern', [
            'concerns' => $concerns,
        ]);
    }
    public function ImageGallery()
    {
        $images = GalleryAll::latest('id')->get();
        return view('frontend.pages.image-gallery', [
            'images' => $images,
        ]);
    }

    public function VideoGallery()
    {
        $videos = GalleryAll::latest('id')->get();
        return view('frontend.pages.video-gallery', [
            'videos' => $videos,
        ]);
    }

    public function service()
    {
        $services = Service::latest('id')->get();
        return view('frontend.pages.service', [
            'services' => $services,
        ]);
    }

    public function SellingPoint()
    {
        $points = Sellingpoint::latest('id')->get();
        return view('frontend.pages.selling-point', [
            'points' => $points,
        ]);
    }



    // public function FrontenblogView($slug)
    // {
    //     $blogs = Blog::latest('id')->select('id', 'title', 'slug', 'blog_thumbnail', 'created_at')->take(5)->get();
    //     $blog = Blog::where('slug', $slug)->with('BlogComment')->withCount('BlogComment')->first();
    //     $next = Blog::where('id', '>', $blog->id)->select('slug')->first();
    //     return view('frontend.pages.blog-view', [
    //         'blog' => $blog,
    //         'blogs' => $blogs,
    //         'next' => $next,
    //     ]);
    // }

    public function ServiceView($slug)
    {
        $service = Service::where('heading', $slug)->first();
        return view('frontend.pages.service-view', [
            'service' => $service,

        ]);
    }

    public function FrontendNewsLetter(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:newsletters,email']
        ]);

        $email = strip_tags($request->email);
        $newsletter = new Newsletter();
        $newsletter->email = $email;
        $newsletter->save();
        return response()->json([
            'subscribe' => 'Subscribe Successfully'
        ]);
    }
    public function FrontendAbout()
    {
        $about = AboutSite::first();
        return view('frontend.pages.about', compact('about', ));
    }
    public function FrontendDeals()
    {
        $Best_deal = BestDeal::where('status', 1)->with([
            'Product.Attribute', 'Product:id,thumbnail_img,slug,title,comming_soon',
            'Product' => function ($q) {
                $q->where('status', 1);
                $q->where('comming_soon', null);
            }
        ])
            ->firstorfail();

        return view('frontend.pages.deal', [
            'Best_deal' => $Best_deal,
        ]);
    }
    public function DynamicPage($slug)
    {
        $page = Pages::where('slug', $slug)
            ->where('status', 1)
            ->firstorfail();
        return view('frontend.pages.pages', [
            'page' => $page,
        ]);
    }
    public function FrontendDealsStaus()
    {
        
        $BestDeal =  BestDeal::first();
        if ($BestDeal->status == 1) {
            $best_deal_product = BestDealProduct::where('best_deal_id', $BestDeal->id)->get();
            foreach ($best_deal_product as $key => $deal_product) {
                $attributes = Attribute::where('product_id', $deal_product->product_id)->get();
                foreach ($attributes as $key => $attribute) {
                    $attribute->discount = '';
                    $attribute->sell_price = '';
                    $attribute->save();
                }
            }
            $BestDeal->status = 2;
            $BestDeal->save();
            return redirect()->route('Frontendhome');
        }
        return redirect()->route('Frontendhome');
    }
}

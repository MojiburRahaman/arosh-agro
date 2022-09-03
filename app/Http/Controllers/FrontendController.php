<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\AboutSite;
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
            $Products = Product::with('Attribute')->where('status', 1)
                ->select('id', 'slug', 'title', 'thumbnail_img', 'product_summary', 'catagory_id')
                ->latest('id')->simplePaginate(4);

            $view = view('frontend.pages.product-pagination', compact('Products'))->render();
            return response()->json(['html' => $view,]);
        }

        $deal = BestDeal::where('status', 1)->with(
            [
            'Product'=>  function ($q) {
                $q->limit(4);
            },
            'Product.Attribute:id,product_id,regular_price,sell_price,discount'
        ]
        )->first();

        $catGallery = Catagory::latest('id')->with('gallery')->get();
        $gallery = Gallery::latest('id')->limit(20)->get();



        $banners = Banner::latest('id')
            ->where('status', 1)->get();


        $product = Product::with('Attribute')->where('status', 1)
            ->select('id', 'slug', 'title', 'thumbnail_img')
            ->latest('id')
            ->withCount('ProductReview')
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
            $Products = Product::with('Catagory', 'Attribute')->where('status', 1)
                ->select('id', 'slug', 'title', 'thumbnail_img', 'product_summary', 'catagory_id')
                ->latest('id')->simplePaginate(4);

            $view = view('frontend.pages.allproduct-pagination', compact('Products'))->render();
            return response()->json(['html' => $view,]);
        }


        $product = Product::with('Catagory', 'Attribute')->where('status', 1)
            ->select('id', 'slug', 'title', 'thumbnail_img', 'catagory_id')
            ->latest('id')
            ->withCount('ProductReview')
            ->simplePaginate(4);



        return view('frontend.pages.all-product', [
            'latest_products' => $product,

        ]);
    }

    public function Frontendsearching(Request $request)
    {
        $category = '';
        $search = strip_tags($request->search);

        if ($request->ajax()) {
            $Products = Product::with('Catagory', 'Attribute')
                ->where('title', 'LIKE', "%$search%")
                ->where('status', 1)
                ->select('id', 'slug', 'catagory_id', 'thumbnail_img', 'product_summary', 'title')
                ->withCount('ProductReview')
                ->latest()->simplePaginate(15);
            $view = view('frontend.search.pagination-data', compact('Products'))->render();
            return response()->json(['html' => $view,]);
        }

        $Products = Product::with('Catagory', 'Attribute')
            ->where('title', 'LIKE', "%$search%")
            ->where('status', 1)
            ->select('id', 'slug', 'catagory_id', 'thumbnail_img', 'product_summary', 'title')
            ->withCount('ProductReview')
            ->latest()->simplePaginate(15);
        $categories = Catagory::with('Subcatagory')->select('id', 'slug', 'catagory_name')->get();

        return view('frontend.search.search-data', [
            'Products' => $Products,
            'Categories' => $categories,
            'category' => $category,
            'search' => $search,
        ]);
    }

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
    // function Frontendshop(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $Products = Product::with('Catagory', 'Attribute')->where('status', 1)
    //             ->select('id', 'slug', 'title', 'thumbnail_img', 'product_summary', 'catagory_id')
    //             ->latest('id')->simplePaginate(16);

    //         $view = view('frontend.pages.shop-pagination-data', compact('Products'))->render();
    //         return response()->json(['html' => $view,]);
    //     }

    //     $catagories = Catagory::with('Product.Attribute', 'Product.Catagory')->select('slug', 'id', 'catagory_name',)->latest('id')->get();
    //     $product = Product::with('Catagory', 'Attribute')->where('status', 1)
    //         ->select('id', 'slug', 'title', 'thumbnail_img', 'product_summary', 'catagory_id')
    //         ->latest('id')
    //         ->withCount('ProductReview')
    //         ->simplePaginate(16);
    //     return view('frontend.pages.shop', [
    //         'catagories' => $catagories,
    //         'latest_product' => $product,
    //     ]);
    // }
    public function Frontendblog()
    {
        $blogs = Blog::latest('id')->select('id', 'title', 'slug', 'blog_thumbnail', 'blog_description', 'created_at')
            ->paginate(12);
        return view('frontend.pages.blogs', [
            'blogs' => $blogs,
        ]);
    }
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


    public function Mdmessage()
    {
        $mds = Md::first();
        return view('frontend.pages.mds', [
            'mds' => $mds,
        ]);
    }
    public function FrontenblogView($slug)
    {
        $blogs = Blog::latest('id')->select('id', 'title', 'slug', 'blog_thumbnail', 'created_at')->take(5)->get();
        $blog = Blog::where('slug', $slug)->with('BlogComment')->withCount('BlogComment')->first();
        $next = Blog::where('id', '>', $blog->id)->select('slug')->first();
        return view('frontend.pages.blog-view', [
            'blog' => $blog,
            'blogs' => $blogs,
            'next' => $next,
        ]);
    }

    public function ServiceView($slug)
    {
        $service = Service::where('heading', $slug)->first();
        return view('frontend.pages.service-view', [
            'service' => $service,

        ]);
    }
    public function BlogComment(Request $request)
    {
        $request->validate([
            'user_name' => ['required', 'max:250'],
            'email' => ['required', 'email'],
            'subject' => ['nullable', 'string'],
            'comment' => ['required'],
            'blog_id' => ['required', 'numeric'],
        ]);

        $user_name =  strip_tags($request->user_name);
        $email =  strip_tags($request->email);
        $subject =  strip_tags($request->subject);
        $comment =  strip_tags($request->comment);
        $blog_id =  strip_tags($request->blog_id);

        $blog_comment = new BlogComment();
        $blog_comment->email = $email;
        $blog_comment->user_name = $user_name;
        $blog_comment->subject = $subject;
        $blog_comment->comment = $comment;
        $blog_comment->blog_id = $blog_id;
        $blog_comment->save();
        return back();
    }
    public function BlogReply(Request $request)
    {
        $request->validate([
            'blogcomment_id' => ['required',],
            'reply' => ['required'],
            'blog_id' => ['required'],

        ]);
        $user_id =  auth()->id();
        $reply =  strip_tags($request->reply);
        $blogcomment_id =  strip_tags($request->blogcomment_id);
        $blog_id =  strip_tags($request->blog_id);

        $blog_comment = new BlogReply();
        $blog_comment->user_id = $user_id;
        $blog_comment->blogcomment_id = $blogcomment_id;
        $blog_comment->reply = $reply;
        $blog_comment->blog_id = $blog_id;
        $blog_comment->save();
        return back();
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
        return back()->with('subscribe', 'Subscribe Successfully');
    }
    public function FrontendCertified()
    {
        $products = Product::where('certified', 1)->where('status', 1)
            ->with(['Catagory:id,slug,catagory_name', 'Attribute:product_id,discount,regular_price,sell_price'])
            ->latest('id')
            ->withCount('ProductReview')
            ->select('id', 'slug', 'catagory_id', 'thumbnail_img', 'product_summary', 'title')
            ->paginate(16);
        return view('frontend.pages.certifed', compact('products'));
    }
    public function FrontendAbout()
    {
        $best_seller = Product::with('Catagory:id,slug,catagory_name', 'Attribute:product_id,discount,regular_price,sell_price')->where('most_view', '!=', 0)
            ->where('status', 1)->orderBy('most_view', 'DESC')
            ->select('id', 'most_view', 'slug', 'catagory_id', 'thumbnail_img', 'product_summary', 'title')
            ->withCount('ProductReview')
            ->take(8)
            ->get();
        $about = AboutSite::first();
        return view('frontend.pages.about', compact('about', 'best_seller'));
    }
    public function FrontendDeals()
    {
        $Best_deal = BestDeal::where('status', 1)->with(['Product.Attribute','Product:id,thumbnail_img,slug,title'])->firstorfail();
     
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
}

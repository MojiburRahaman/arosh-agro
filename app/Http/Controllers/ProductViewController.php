<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Flavour;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductViewController extends Controller
{
    public function SingleProductView($slug)
    {
        $Product = Product::with('Catagory:id,catagory_name,slug', 'Gallery:product_id,product_img', 'Attribute.Color:color_name,id', 'Attribute.Size:id,size_name', )
            ->where('slug', $slug)
            ->where('status', 1)
            ->select('id', 'comming_soon','most_view', 'meta_description', 'thumbnail_img', 'meta_keyword', 'title', 'product_summary', 'product_description', 'slug', 'catagory_id')
            ->firstorfail();

        $color = $Product->Attribute->where('color_id', '!=', 1)->count();
        $size = $Product->Attribute->where('size_id', '!=', 1)->count();

        $related_product = Product::with('Attribute:regular_price,sell_price,discount,product_id')
        ->where('catagory_id', $Product->catagory_id)
        ->where('id', '!=', $Product->id)
        ->where('status', 1)
        ->latest('id')
        ->select('id', 'title', 'slug', 'thumbnail_img')
        ->take(12)
        ->get();

        return view('frontend.pages.product-view', [
        'product' => $Product,
        'color' => $color,
        'related_product' => $related_product,
        'size' => $size,
        ]);
    }
    public function GetSizeByColor(Request $request)
    {
        $request->validate([
            'product_id'=> ['required','numeric'],
            'color_id'=> ['required','numeric'],
        ]);
        $Attr = '';
        $Attribute = Attribute::with('Size')
            ->where('product_id', $request->product_id)
            ->where('color_id', $request->color_id)
            ->select('id', 'size_id', 'quantity', 'sell_price', 'regular_price')->get();
        foreach ($Attribute as  $value) {
            if ($value->size_id != 1) {
                $Attr = $Attr . ' <input class="size_name" type="radio" data-regular_price="' . $value->regular_price . '" data-sell_price="' . $value->sell_price . '" 
                name="size_id" id="size_id ' . $value->size_id . '" data-quantity="' . $value->quantity . '"
                value="' . $value->size_id . '" data-product="' . $value->product_id . '">
                <label for="size_id ' . $value->size_id . '">' . $value->Size->size_name . '</label> &nbsp;';
            }
            if ($value->size_id == 1) {
                // if size attribute not available in this color
                $Attr = $Attr . '<span class="quantityadd" data-sellprice="' . $value->sell_price . '" data-regularprice="' . $value->regular_price . '" >' . $value->quantity . '</span>';
            }
        }
        return response()->json($Attr);
    }
    public function GetPriceBySize(Request $request)
    {
        $request->validate([
            'product_id'=> ['required','numeric'],
            'size_id'=> ['required','numeric'],
        ]);
        $Attr = '';
        $Attribute = Attribute::where('product_id', $request->product_id)
            ->where('size_id', $request->size_id)
            ->where('color_id', 1)
            ->select('id', 'quantity', 'sell_price', 'regular_price')
            ->get();
        foreach ($Attribute as  $value) {
            $Attr = $Attr . '<span class="quantityadd" data-sellprice="' . $value->sell_price . '" data-regularprice="' . $value->regular_price . '" >' . $value->quantity . '</span>';
        }
        return response()->json($Attr);
    }
    // function GetFlavourBySize(Request $request)
    // {
    //     $request->validate([
    //         'product_id'=> ['required','numeric'],
    //         'size_id'=> ['required','numeric'],
    //     ]);
    //     $flavours = Flavour::where('product_id', $request->product_id)->where('size_id', $request->size_id)->get();

    //     return response()->json($flavours);
    // }
    // function ProductReview(Request $request)
    // {
    //     return $request;
    //     $request->validate([
    //         'rate' => ['required', 'numeric', 'max:5'],
    //         'name' => ['required', 'string', 'max:250'],
    //         'email' => ['required', 'email',],
    //         'massage' => ['required', 'string',],
    //         'product_id' => ['required', 'numeric',],
    //     ]);
    //     $rate = strip_tags($request->rate);
    //     $name = strip_tags($request->name);
    //     $email = strip_tags($request->email);
    //     $massage = strip_tags($request->massage);
    //     $product_id = strip_tags($request->product_id);

    //     $review = new ProductReview;
    //     $review->rating = $rate;
    //     $review->name = $name;
    //     $review->email = $email;
    //     $review->message = $massage;
    //     $review->product_id = $product_id;
    //     $review->save();
    //     return back();
    // }
}

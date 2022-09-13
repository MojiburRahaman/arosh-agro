<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlace;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Attribute;
use App\Models\Order_Details;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use App\Models\billing_details;
use App\Models\Order_Summaries;
use Illuminate\Support\Carbon;
use App\Models\Coupon;
use App\Models\CreditControl;
use App\Models\DeliverCharge;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class CheckoutController extends Controller
{
    function CheckoutView()
    {
        if (!session()->get('cart_total')) {
            return back();
        }

        return view('frontend.pages.checkout', [
            'divisions' => Division::select('id', 'name')->get(),
        ]);
    }
    function CheckoutajaxDivid(Request $request)
    {
        $district = District::where('division_id', $request->division_id)
            ->select('id', 'name')->get();
        return response()->json($district);
    }
    function CheckoutajaxDistrictid(Request $request)
    {
        $free = '';
        $charge = DeliverCharge::findorfail(1);
        if ($request->district_id == 15) {
            if ($charge->inside != '') {
                session()->put('shipping', $charge->inside);
                $free = $charge->inside;
                $shipping = $charge->inside;
            }
            $free = $charge->inside;
            session()->put('shipping', $charge->inside);
            $shipping = $charge->inside;
        } else {
            if ($charge->outside != '') {
                session()->put('shipping', $charge->outside);
                $free = $charge->outside;
                $shipping = $charge->outside;
            }
            $free = $charge->outside;
            session()->put('shipping', $charge->outside);
            $shipping = $charge->outside;
        }

        $district = Upazila::where('district_id', $request->district_id)
            ->select('id', 'name')->get();
        return response()->json([
            'district' =>   $district,
            'shipping' =>   $shipping,
            'free' =>   $free,
        ]);
    }
    function CheckoutPost(Request $request)
    {
        if (!session()->get('cart_total')) {
            return redirect('/');
        }

        $request->validate([
            'billing_user_name' => ['required', 'string', 'max:255'],
            'billing_number' => ['required', 'numeric', 'min:11'],
            'division_name' => ['required', 'numeric'],
            'district_name' => ['required', 'numeric'],
            'upozila_name' => ['required', 'numeric'],
            'billing_address' => ['required', 'string'],
            'payment_option' => ['required', Rule::in(['cash_on_delivery', 'second-zone'])],
        ]);
        // for only cash_on delivery
        abort_if($request->payment_option != 'cash_on_delivery', 404);

        if (empty(session()->get('shipping'))) {
            $subtotal = session()->get('cart_subtotal');
            $shipping = 0;
        } else {
            $shipping = session()->get('shipping');
            $subtotal = session()->get('cart_subtotal') + session()->get('shipping');
        }

        $check = CreditControl::findorfail(1);
        $new_point = round($subtotal  / $check->purchase_amount) * $check->credit_amount;

        $credit = auth()->user()->credit;
        $point = $credit->wallet - session('wallet.point');

        $credit->wallet = $point + $new_point;
        $credit->last_deposit = $new_point;
        $credit->last_usages = session('wallet.point');
        $credit->save();

        $order_number = now()->format('dm') . Auth::id() . mt_rand(1, 1000);
        $billing_details = billing_details::insertGetId($request->except('_token') + [
            'created_at' => Carbon::now(),
            'user_email' => auth()->user()->email,
            'user_id' => Auth::id(),
        ]);

        $Order_Summaries_id = Order_Summaries::insertGetId([
            'billing_details_id' => $billing_details,
            'user_id' => Auth::id(),
            'order_number' => $order_number,
            'coupon_name' => session()->get('coupon_name'),
            'total' => session()->get('cart_total'),
            'subtotal' => $subtotal,
            'discount' => session()->get('cart_discount'),
            'shipping' => $shipping,
            'created_at' => now(),
        ]);
        $carts = Cart::Where('cookie_id', Cookie::get('cookie_id'))->with('Product:id')->get();
        foreach ($carts as  $cart) {

            $product = $cart->Product->Attribute
                ->where('color_id', $cart->color_id)
                ->where('size_id', $cart->size_id)->first();


            if ($product->sell_price != '') {
                $price = $product->sell_price;
            } else {
                $price = $product->regular_price;
            }
            Order_Details::insert([
                'Order_Summaries_id' => $Order_Summaries_id,
                'product_id' => $cart->product_id,
                'color_id' => $cart->color_id,
                'size_id' => $cart->size_id,
                'quantity' => $cart->quantity,
                'price' => $price,
                'created_at' => Carbon::now(),
            ]);
            attribute::where([
                'product_id' => $cart->product_id,
                'color_id' => $cart->color_id,
                'size_id' => $cart->size_id,
            ])->decrement('quantity', $cart->quantity);
            $cart->delete();
        }
        if (session()->get('coupon_name')) {
            Coupon::where('coupon_name', session()->get('coupon_name'))->decrement('coupon_limit', 1);
        }
        Mail::to(auth()->user()->email)->send(new OrderPlace($order_number, auth()->user()->name));
        session()->forget('cart_total');
        session()->forget('wallet');
        session()->forget('coupon_name');
        session()->forget('cart_discount');
        session()->forget('cart_subtotal');
        session()->forget('shipping');

        return redirect()->route('Frontendhome')->with([
            'orderPlace' => $order_number,
            'new_point' => $new_point,
        ]);
    }
}

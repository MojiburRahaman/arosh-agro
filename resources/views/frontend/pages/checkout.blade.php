@extends('frontend.master')
@section('title',config('app.name') .'- Checkout')
@section('content')
<style>
    .ptb-100 {
        padding: 100px 0;
    }
.select2-selection__clear{
    background: none !important;
    display: none !important;
}
</style>
<!-- header-area end -->
<!-- checkout-area start -->
<div class="checkout-area ">
    <div class="container">
        <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">Check Out</h3>
        <div class="h-divider">
            <div class="shadows"></div>
            <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
        </div>
        <form action="{{route('CheckoutPost')}}" method="POST">
            @csrf

            <div class="row ptb-100">
                <div class="col-lg-8 col-sm-6 ">
                    <div class="checkout-form form-style">
                        <div class="row ">
                            @if ($errors->any())
                            <div class="col-lg-12">
                                <div class="alert alert-danger">
                                    <h5 class="mb-2 mt-2 text-dark">Something is wrong with this field!</h5>
                                    @foreach ($errors->all() as $err_msg)
                                    <li> {{$err_msg}}</li>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <h3 class="pl-2">Billing Details</h3>

                            <div class="col-sm-12 col-12">

                                <label class="form-label" for="billing_user_name"><span class="text-danger">*</span>Name
                                </label>
                                <input spellcheck="true"
                                    class="@error('billing_user_name') is-invalid @enderror form-control" type="text"
                                    name="billing_user_name" @error('billing_user_name') required @enderror
                                    placeholder="Enter Name" autocomplete="none" value="{{old('billing_user_name')}}">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-6 mt-4">
                                <label class="form-label" for="billing_number"><span class="text-danger">* </span>Phone
                                    No. </label>
                                <input class="@error('billing_number') is-invalid @enderror form-control" type="number"
                                    type="number" name="billing_number" placeholder="Enter Your Number"
                                    autocomplete="none" value="{{old('billing_number')}}">
                            </div>

                            <div class="col-12 col-sm-6 col-lg-6 mt-4 mb-4">

                                <label class="form-label" for="division_name"><span class="text-danger">* </span>Your
                                    Address</label>
                                <input spellcheck="true"
                                    class="@error('billing_number') is-invalid @enderror form-control"
                                    name="billing_address" type="text">
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="billing-select mb-4">
                                    <label><span class="text-danger">*</span>Division</label>
                                    <select class="division form-control @error('division_name') is-invalid
                                @enderror" id="divisions_name" name="division_name">
                                        <option>Select One</option>
                                        @foreach ($divisions as $division)

                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="billing-select mb-4">
                                    <label><span class="text-danger">*</span>District</label>
                                    <select class="district form-control @error('disctrict_name') is-invalid
                                @enderror" id="disctrict_name" name="district_name">

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="billing-select mb-4">
                                    <label><span class="text-danger">*</span>Upazila</label>
                                    <select class="upozila  form-control @error('upozila_name') is-invalid
                                @enderror" id="upozila_name" name="upozila_name">

                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mb-4 ">
                                <label class="form-label" for="division_name">Order Notes (Optional)</label>

                                <textarea spellcheck="true" class="form-control" name="billing_order_note"
                                    placeholder="Notes about Your Order."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12  col-sm-6 " style="background:#f4f4f4">
                    <div class="order-area">
                        <h3 class="ml-3">Your Order</h3>
                        <ul class="total-cost">
                            {{-- @foreach (cart_product_view() as $cart_product)

                    <li> {{$cart_product->product->title}} <span class="pull-right">৳
                                @php
                                $product = App\Models\attribute::where('product_id', $cart_product->product_id)
                                ->where('color_id', $cart_product->color_id)
                                ->where('size_id', $cart_product->size_id)
                                ->first();

                                $sale_price = $product->selling_price;
                                $regular_price = $product->regular_price;

                                if ($sale_price) {
                                echo $sale_price * $cart_product->quantity;
                                }
                                if ($sale_price == '') {
                                echo $regular_price *$cart_product->quantity;
                                }
                                @endphp
                            </span></li>
                            @endforeach --}}
                            <li>Total <span class="pull-right"> <strong>৳{{session()->get('cart_total')}}</strong>
                                </span>
                            </li>
                            {{-- @if (session('cart_discount')) --}}

                            <li>Discount<span
                                    class="pull-right"><strong>৳{{session()->get('cart_discount')}}</strong></span></li>
                            {{-- @endif --}}
                            <li>Shipping <span class="pull-right">৳<strong id="shipping_id">0</spstrongan></span></li>
                            <li> Subtotal<span class="pull-right"
                                    id="sub_total"><strong>৳{{session()->get('cart_subtotal')}}
                                    </strong></span></li>
                        </ul>
                        <ul class="payment-method">
                            {{-- <li>
                                <input @error('payment_option') required  @enderror name="payment_option" style="background: orange" id="bank" value="pay_now" type="radio">
                                <label for="bank">Direct Bank Transfer</label>
                            </li> --}}
                            <li>
                                <input checked @error('payment_option') required @enderror name="payment_option"
                                    id="cash_on_delivery" value="cash_on_delivery" type="radio">
                                <label for="cash_on_delivery">Cash On Delivery</label>
                            </li>

                        </ul>
                        <button style="width: 100%" type="submit" class="mt-4">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- checkout-area end -->
@endsection
@section('cssScript')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script_js')
<script src="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function(){
// #### select 2 dependency dropdown start
$('#divisions_name').select2({
allowClear: true,

});
$('#disctrict_name').select2({
allowClear: true,
// {{-- theme: "classic" --}}
});
$('#upozila_name').select2({
allowClear: true,
// {{-- theme: "classic" --}}
});
// #### select 2 dependency dropdown end

// #### get district information by division start 

$('#divisions_name').change(function(){
var division_id = $(this).val();

if (division_id) {
   
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        }),
            $.ajax({
                type: 'POST',
                url: '/checkout/billing/division_id' ,
                data :{division_id: division_id},

                success: function(res) {
                    if (res) {
                        $("#upozila_name").empty();
                        $("#disctrict_name").empty();
                        $("#disctrict_name").append('<option value=>Select One</option>');
                        $.each(res, function(key, value) {
                            $("#disctrict_name").append('<option value="' + value.id + '" >' +
                                value.name + '</option>');
                        });

                    } else {
                        $("disctrict_name").empty();
                    }
                }
            });
        }
        else{
            $("#disctrict_name").empty();
            $("#upozila_name").empty();
            $('#shipping_id').html(0);

        }
    });

// #### get district information by division end


// #### get upozila information by district start 

        $('#disctrict_name').change(function(){
        var disctrict_id = $(this).val();
        var total_amount = {{session()->get('cart_subtotal')}};
        if (!disctrict_id == '') {
           if (disctrict_id == 15) {
               $('#shipping_id').html(60);
               @php
                   session()->put('shipping',60);
               @endphp
               $('#sub_total').html(60 + parseInt(total_amount));
            }
            else{
                @php
                   session()->put('shipping',120);
               @endphp
                $('#shipping_id').html(120)
                $('#sub_total').html(120 + parseInt(total_amount));
                
           }
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                     }),
            $.ajax({
                type: "POST",
                url: 'checkout/billing/disctrict_id',
                data:{district_id: disctrict_id},

                success: function(res) {
                    if (res) {
                        $("#upozila_name").empty();
                        $("#upozila_name").append('<option>Select One</option>');
                        $.each(res, function(key, value) {
                            $("#upozila_name").append('<option value="' + value.id + '" >' +
                                value.name + '</option>');
                        });

                    } else {
                        $("upozila_name").empty();
                    }
                }
            });
        } else{
            $('#sub_total').html(parseInt(total_amount));
            $("#upozila_name").empty();
            $('#shipping_id').html(0);


        }
    });
// #### get upozila information by district end 

});

</script>
@endsection
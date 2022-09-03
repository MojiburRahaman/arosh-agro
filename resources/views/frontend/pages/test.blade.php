@extends('frontend.master')
@section('title')
{{config('app.name')}} - Cart
@endsection

@section('content')
<!-- cart-area start -->
<style>
    /*.cart-wrap .quantity .qtybutton {
    top: 50% !important;
   left: 27px !important;
    transform: translateY(-51%) !important;
    -webkit-transform: translateY(-51%) !important;
    -moz-transform: translateY(-51%) !important;
}*/
    /*.cart-wrap .quantity {
    position: relative !important;
}*/
    /*.quantity input {
    width: 120px !important;
    padding: 17px 35px !important;
    text-align: center !important;
    height: 35px !important;
    position: relative !important;
    background: #ccc !important;
    border: none !important;
}
*/
    .title {
        font-size: 19px;
    }

    .product_details {
        font-size: 14px !important;
    }

    .table td,
    .table th {
        padding: 0.75rem;
        vertical-align: middle !important;

    }

    .cart-wrap .quantity .qtybutton.inc {

        left: auto !important;
    }

    .cart-wrap .quantity .qtybutton.inc {

        left: auto !important;
    }

    .quantity .qtybutton.inc {
        left: auto !important;
        right: 0 !important;
    }

    .quantity .qtybutton {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        height: 35px !important;
        width: 35px !important;
        text-align: center !important;
        line-height: 35px !important;
        font-size: 25px !important;
        cursor: pointer !important;
        color: #0C743F !important;
        background: #99CB55 !important;
    }

    .quantity .qtybutton:hover {
        background: #ef4836 !important;
        color: #fff !important;
    }

    .quantity .qtybutton.inc {
        left: auto !important;
        right: 0 !important;
    }

    /* https://bootsnipp.com/snippets/dGWP */
    /* .center {
        width: 150px !important;
        margin: 40px auto !important;

    }

    figure:hover figcaption,
    .wp-caption-overlay .wp-caption:hover .wp-caption-text,
    .wp-caption-overlay .wp-caption:hover .wp-caption-dd {
        margin-bottom: 0em !important;
    }

    caption,
    th {
        font-weight: bold !important;
        text-align: left !important;
    }

    .rotate {
        -moz-transition: all 1s linear;
        -webkit-transition: all 1s linear;
        transition: all 1s linear;
    }

    .rotate.down {
        -ms-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
    }

    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    body {
        background-color: #eeeeee !important;
        font-family: 'Open Sans', serif !important;
        font-size: 14px !important;
    }



    .card-body {
        -ms-flex: 1 1 auto !important;
        flex: 1 1 auto !important;
        padding: 1.40rem !important;
    }

    .img-sm {
        width: 80px !important;
        height: 80px !important;
    } */

    /*.itemside .info {
    padding-left: 15px !important;
    padding-right: 7px !important;
}*/

    /* .table-shopping-cart .price-wrap {
        line-height: 1.2 !important;
    }

    .table-shopping-cart .price {
        font-weight: bold !important;
        margin-right: 5px !important;
        display: block !important;
    }

    .text-muted {
        color: #969696 !important;
    }

    a {
        text-decoration: none !important;
    }

    .card {
        position: relative !important;
        display: -ms-flexbox !important;
        display: flex !important;
        -ms-flex-direction: column !important;
        flex-direction: column !important;
        min-width: 0 !important;
        word-wrap: break-word !important;
        background-color: #fff !important;
        background-clip: border-box !important;
        border: 1px solid rgba(0, 0, 0, .125) !important;
        border-radius: 0px !important;
    }

    .itemside {
        position: relative !important;
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        width: 100% !important;
    }

    .dlist-align {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
    }

    [class*="dlist-"] {
        margin-bottom: 5px !important;
    }

    .coupon {
        border-radius: 1px !important;
    }

    .price {
        font-weight: 600 !important;
        color: #212529 !important;
    }

    .btn.btn-out {
        outline: 1px solid #fff !important;
        outline-offset: -5px !important;
    }

    .btn-main {
        border-radius: 2px !important;
        text-transform: capitalize !important;
        font-size: 15px !important;
        padding: 10px 19px !important;
        cursor: pointer !important;
        color: #99CB55 !important;
        width: 100% !important;
    }

    .btn-light {
        color: #0C743F !important;
        background-color: #99CB55 !important;
        border-color: #0C743F !important;
        font-size: 12px !important;
    }

    .btn-light:hover {
        color: #99CB55 !important;
        background-color: #F44336 !important;
        border-color: #F44336 !important;
    }

    .btn-apply {
        font-size: 11px !important;
    } */

    /*.itemside .info {
  padding-left: 15px !important !important;
  padding-right: 7px !important !important;
  
}*/

    /* .img-sm {
        width: 80px !important;
        height: 80px !important;
    }

    .itemside {
        position: relative !important;

        display: flex !important;
        width: 100% !important;
    }

    figure {
        margin: 0 0 1rem !important;
    }


    td {
        color: #0C743F !important;
    }

    th {
        color: #0C743F !important;
    } */

</style>


{{--
<div class="page_content_wrap page_paddings_no">
    <div class="content_wrap">
        <div class="">
            <article
                class="post_item post_item_single post_featured_default post_format_standard page type-page hentry">
                <section class="post_content">

                    <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">View Cart</h3>
                    <div class="h-divider">
                        <div class="shadows"></div>
                        <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
</div>


<div class="vc_row-full-width"></div>

<div class="page_content_wrap page_paddings_yes md1" style="    padding: 0.65em 0 0.65em !important;">
    <div class="content_wrap">
        <div class="" style="width: 100%;">
            <article
                class="post_item post_item_single post_featured_default post_format_standard page type-page hentry">
                <section class="post_content">
                    @if (session('cart_empty'))
                    <div class="col-lg-7">
                        <div class="alert alert-danger"><i class="fa fa-warning">
                                {{session('cart_empty')}}</i></div>
                    </div>
                    @endif
                    <div class="container-fluid mt-0">

                        <div class="row">
                            <aside class="col-lg-9">
                                <div class="card">
                                    <div class="">
                                        <table role="table" class="cart-wrap table-responsive">
                                            <thead role="rowgroup">
                                                <tr>

                                                    <th class="images">Product
                                                        Image</th>
                                                    <th class="product">Product
                                                        Details</th>
                                                    <th class="ptice text-center">Price</th>
                                                    <th class="quantity text-center">
                                                        Quantity</th>
                                                    <th class="remove text-center">Action
                                                    </th>
                                                    <th class="ptice text-center">Total</th>


                                                </tr>
                                            </thead>
                                            <tbody role="rowgroup" class="load">
                                                @php
                                                $total_cart_amount = 0;
                                                @endphp
                                                @forelse ($Carts as $item)
                                                @php
                                                $product =$item->Product->Attribute
                                                ->where('color_id',$item->color_id)
                                                ->where('size_id',$item->size_id)->first();
                                                @endphp
                                                @if ($product != '')
                                                <tr role="row">
                                                    <td class="images" role="cell">
                                                        <img src="{{ asset('thumbnail_img/' . $item->Product->thumbnail_img) }}"
                                                            class="img-sm">
                                                    </td>
                                                    <td class="product" role="cell"> <a href="#" class="title "
                                                            data-abc="true">{{ $item->Product->title }}</a>
                                                        <p class=" product_details">
                                                            Size/Weight:
                                                            {{ $item->Size->size_name }}

                                                            @if ($item->flavour_count != '')
                                                            <br>
                                                            (Flavour:
                                                            {{$item->Flavour->flavour_name}})
                                                            @endif
                                                            @if ($item->Color->color_name !=
                                                            '')
                                                            <br>
                                                            {{ $item->Color->color_name }}
                                                            @endif
                                                        </p>
                                                    </td>
                                                    <td role="cell" style="border:none" class="ptice singlesub_price">
                                                        ৳@php
                                                        $sale_price = $product->sell_price;
                                                        $regular_price = $product->regular_price;
                                                        $quantity = $product->quantity;

                                                        if ($sale_price) {
                                                        echo $sale_price;
                                                        }
                                                        if ($sale_price == '') {
                                                        echo $regular_price;
                                                        }
                                                        @endphp
                                                    </td>
                                                    <td role="cell" style="border:none"
                                                        class="quantity  cart-plus-minus">
                                                        <input type="text" class="cart_quantity" name="cart_quantity"
                                                            value="{{ $item->quantity }}" />
                                                    </td>
                                                    <td role="cell" class="remove">
                                                        <a data-id="{{$item->id}}" class="rotate " title="Update Item">
                                                            <i class="fa fa-refresh"></i>
                                                        </a> &nbsp;
                                                        <a href="{{route('CartDelete',$item->id)}}" class="mt-2 "
                                                            data-abc="true">
                                                            X</a>
                                                    </td>
                                                    @if ($quantity < $item->quantity)
                                                        @section('script_js')
                                                        <script>
                                                            let timerInterval
                                 Swal.fire({
                                 icon : 'warning',
                                 text: '{{ $item->Product->title }} Quantity is out of stock ',
                                 timer: 2500,
                                 timerProgressBar: true,
                                 didOpen: () => {
                                     Swal.showLoading()
                                     const b = Swal.getHtmlContainer().querySelector('b')
                                     timerInterval = setInterval(() => {
                                     b.textContent = Swal.getTimerLeft()
                                     }, 100)
                                 },
                                 willClose: () => {
                                     clearInterval(timerInterval)
                                 }
                                 }).then((result) => {
                                 if (result.dismiss === Swal.DismissReason.timer) {
                                     window.location.href = '{{route('CartDelete',$item->id)}}'
                                 }
                                 })
                                                        </script>
                                                        @endsection
                                                        @endif

                                                        <td role="cell" style="border:none" class="total ">৳<span
                                                                class="sub_product_total">@php
                                                                if ($sale_price) {
                                                                $total_cart_amount += $sale_price *
                                                                $item->quantity;
                                                                echo $sale_price * $item->quantity;
                                                                }
                                                                if ($sale_price == '') {
                                                                $total_cart_amount += $regular_price
                                                                * $item->quantity;
                                                                echo $regular_price *
                                                                $item->quantity;
                                                                }
                                                                @endphp
                                                            </span>
                                                        </td>
                                                        @else
                                                        @section('script_js')
                                                        <script>
                                                            let timerInterval
                         Swal.fire({
                         icon : 'warning',
                         text: '{{ $item->Product->title }} Quantity is out of stock ',
                         timer: 2500,
                         timerProgressBar: true,
                         didOpen: () => {
                             Swal.showLoading()
                             const b = Swal.getHtmlContainer().querySelector('b')
                             timerInterval = setInterval(() => {
                             b.textContent = Swal.getTimerLeft()
                             }, 100)
                         },
                         willClose: () => {
                             clearInterval(timerInterval)
                         }
                         }).then((result) => {
                         /* Read more about handling dismissals below */
                         if (result.dismiss === Swal.DismissReason.timer) {
                             window.location.href = '{{route('CartDelete',$item->id)}}'
                         }
                         })
                                                        </script>
                                                        @endsection
                                                        @endif
                                                        @empty
                                                        <td colspan="10" class="text-center">No data
                                                            available</td>

                                                </tr>

                                                @endforelse


                                            </tbody>
                                        </table>




                                    </div>
                                </div>
                            </aside>
                            <aside class="col-lg-3">
                                <div class="card mb-3">
                                    <div class="card-body">

                                        <div class="form-group"> <label>Have coupon?</label>






                                            <div class="input-group"> <input type="text" id="coupon_name"
                                                    class="form-control coupon" value="{{$coupon_name}}"
                                                    placeholder="Coupon code"> <span class="input-group-append"> <button
                                                        id="coupon_submit_btn"
                                                        class="btn btn-primary btn-apply coupon">Apply</button>
                                                </span> @if(session('coupon_invalid'))
                                                <span class="text-danger">{{session('coupon_invalid')}}</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <dl class="dlist-align">
                                            <dt>Total:</dt>
                                            <dd class="text-right ml-3"><span class="subtotal"> ৳
                                                    {{ $total_cart_amount }}</span></dd>
                                        </dl>
                                        <dl class="dlist-align">
                                            <dt>Discount({{$discount}}%)</dt>
                                            <dd class="text-right text-danger ml-3"><span class="discount"> ৳
                                                    {{ ($total_cart_amount * $discount)/100 }}</span>
                                            </dd>
                                        </dl>
                                        <dl class="dlist-align">
                                            <dt>Sub Total:</dt>
                                            <dd class="text-right text-dark b ml-3"><strong> <span class="cart_total">
                                                        ৳{{round($total_cart_amount -
                                                        ($total_cart_amount * $discount)/100)}}
                                                    </span></strong></dd>
                                        </dl>
                                        @php
                                        session()->put('cart_total',$total_cart_amount);
                                        session()->put('coupon_name',$coupon_name);
                                        session()->put('cart_discount',($total_cart_amount *
                                        $discount)/100);
                                        session()->put('cart_subtotal',round($total_cart_amount -
                                        ($total_cart_amount *
                                        $discount)/100));
                                        @endphp
                                        <hr>

                                        <a href="{{route('CheckoutView')}}"
                                            class="btn btn-out   btn-square btn-main btn-light" data-abc="true"> Make
                                            Purchase </a>

                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>



                </section>
                <section class="related_wrap related_wrap_empty"></section>
            </article>
        </div>

    </div>
</div>
</article>
</div>
</div>
</div> --}}



<div class="pd-wrap">
    <div class="container">
        <div class="post_content">
            <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">Cart</h3>
            <div class="h-divider">
                <div class="shadows"></div>
                <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
            </div>
        </div>
        <section class="we-offer-area text-center bg-gray">
            <div class="row">
                <div class="col-lg-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="">Total</th>
                                <th class="remove">Action</th>
                            </tr>
                        </thead>
                        <tbody class="load">
                            @php
                            $total_cart_amount = 0;
                            @endphp
                            @forelse ($Carts as $item)
                            @php
                            $product =$item->Product->Attribute
                            ->where('color_id',$item->color_id)
                            ->where('size_id',$item->size_id)->first();
                            @endphp
                            @if ($product != '')
                            <tr style="border-bottom: 1px solid rgb(211, 211, 211)">
                                <td style="border:none" class="images">
                                    <img src="{{ asset('thumbnail_img/' . $item->Product->thumbnail_img) }}"
                                        class="img-sm">
                                </td>
                                <td style="border:none" class="product"> <a href="#" class="title "
                                        data-abc="true">{{ $item->Product->title }}</a>
                                    <p class=" product_details">
                                        Size/Weight:
                                        {{ $item->Size->size_name }}

                                        @if ($item->flavour_count != '')
                                        <br>
                                        (Flavour:
                                        {{$item->Flavour->flavour_name}})
                                        @endif
                                        @if ($item->Color->color_name !=
                                        '')
                                        <br>
                                        {{ $item->Color->color_name }}

                                        @endif
                                    </p>
                                </td>
                                <td style="border:none" class="ptice"> @php
                                    $sale_price = $product->sell_price;
                                    $regular_price = $product->regular_price;
                                    $quantity = $product->quantity;

                                    if ($sale_price) {
                                    echo $sale_price;
                                    }
                                    if ($sale_price == '') {
                                    echo $regular_price;
                                    }
                                    @endphp </td>
                                <td style="border:none" class="ptice"><input type="text" class="cart_quantity"
                                        name="cart_quantity" value="{{ $item->quantity }}" /> </td>
                                @if ($quantity < $item->quantity)
                                    @section('script_js')
                                    <script>
                                        let timerInterval
                                 Swal.fire({
                                 icon : 'warning',
                                 text: '{{ $item->Product->title }} Quantity is out of stock ',
                                 timer: 2500,
                                 timerProgressBar: true,
                                 didOpen: () => {
                                     Swal.showLoading()
                                     const b = Swal.getHtmlContainer().querySelector('b')
                                     timerInterval = setInterval(() => {
                                     b.textContent = Swal.getTimerLeft()
                                     }, 100)
                                 },
                                 willClose: () => {
                                     clearInterval(timerInterval)
                                 }
                                 }).then((result) => {
                                 if (result.dismiss === Swal.DismissReason.timer) {
                                     window.location.href = '{{route('CartDelete',$item->id)}}'
                                 }
                                 })
                                    </script>
                                    @endsection
                                    @endif
                                    <td style="border:none" class="ptice">
                                        ৳<span class="sub_product_total">
                                            @php
                                            if ($sale_price) {
                                            $total_cart_amount += $sale_price *
                                            $item->quantity;
                                            echo $sale_price * $item->quantity;
                                            }
                                            if ($sale_price == '') {
                                            $total_cart_amount += $regular_price
                                            * $item->quantity;
                                            echo $regular_price *
                                            $item->quantity;
                                            }
                                            @endphp
                                        </span>
                                    </td>
                                    <td style="border:none" class="quantity cart-plus-minus"> <input type="text"
                                            class="cart_quantity" name="cart_quantity" value="1">
                                        <div class="dec qtybutton">-</div>
                                        <div class="inc qtybutton">+</div>
                                    </td>
                                    @else
                                    @section('script_js')
                                    <script>
                                        let timerInterval
Swal.fire({
icon : 'warning',
text: '{{ $item->Product->title }} Quantity is out of stock ',
timer: 2500,
timerProgressBar: true,
didOpen: () => {
Swal.showLoading()
const b = Swal.getHtmlContainer().querySelector('b')
timerInterval = setInterval(() => {
b.textContent = Swal.getTimerLeft()
}, 100)
},
willClose: () => {
clearInterval(timerInterval)
}
}).then((result) => {
/* Read more about handling dismissals below */
if (result.dismiss === Swal.DismissReason.timer) {
window.location.href = '{{route('CartDelete',$item->id)}}'
}
})

                                    </script>
                                    @endsection
                                    @endif
                                    @empty
                                    <td colspan="10" class="text-center">No data
                                        available</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                {{-- <div class="col-lg-4">

                </div> --}}
            </div>
        </section>
    </div>
</div>

@endsection

@section('script_js')

<script>
    $(".rotate").click(function(){
    $(this).toggleClass("down"); 
        var ele = $(this);
        var sub_total = $('.subtotal').html();
        var cart_id = $(this).attr('data-id');
              $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                     }),
            $.ajax({
                type: "POST",
            url:"/cart/quantity-update",
           data:{
               cart_id:cart_id, 
               cart_quantity:ele.parents("tr").find(".cart_quantity").val(),
               },
           success: function(res) {
                    if (res == '') {


        Swal.fire({text:'The Product Quantity is out of stock'});
                    }
                else{
                    ele.parents("tr").find('.sub_product_total').html(res);
                $(".subtotal").load(location.href + " .subtotal");
                $(".discount").load(location.href + " .discount");
                $(".cart_total").load(location.href + " .cart_total");
                }
                }
            })
    });

/*        $('.rotate').click(function() {
            $(this).toggleClass("down"); 
             var ele = $(this);
        var sub_total = $('.subtotal').html();
        var cart_id = $(this).attr('data-id');
            if (cart_id) {
                              $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                     }),
                $.ajax({
                    type: "POST",
            url:"/cart/quantity-update",
            data:{
               cart_id:cart_id, 
               cart_quantity:ele.parents("tr").find(".cart_quantity").val(),
               },
                    success: function(res) {
                      
                    }
                });
            } 
            else {
                 alert("ok");
                        }
        });
*/

    $(document).ready(function(){
        $('#coupon_submit_btn').click(function(){
            var coupon_name_test = $('#coupon_name').val();
            // var coupon_redirect_url = "{{route('CartView')}}/" + coupon_name_test;
            var coupon_redirect_url = "{{route('CartView')}}/" + coupon_name_test;
        //   window.location.href = coupon_redirect_url;
        location.assign(coupon_redirect_url);
         });
    });

    $(".cart-plus-minus").append('<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>');
    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find("input").val(newVal);
    });

    /*Plus Minus*/
    $(document).ready(function() {
            var slider = $("#slider");
            var thumb = $("#thumb");
            var slidesPerPage = 4; //globaly define number of elements per page
            var syncedSecondary = true;
            slider.owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: false,
                autoplay: false, 
                dots: false,
                loop: true,
                responsiveRefreshRate: 200
            }).on('changed.owl.carousel', syncPosition);
            thumb
                .on('initialized.owl.carousel', function() {
                    thumb.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: true,
                    item: 4,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage, 
                    navText: ['<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
                    responsiveRefreshRate: 100
                }).on('changed.owl.carousel', syncPosition2);
            function syncPosition(el) {
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                thumb
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = thumb.find('.owl-item.active').length - 1;
                var start = thumb.find('.owl-item.active').first().index();
                var end = thumb.find('.owl-item.active').last().index();
                if (current > end) {
                    thumb.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    thumb.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    slider.data('owl.carousel').to(number, 100, true);
                }
            }
            thumb.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                slider.data('owl.carousel').to(number, 300, true);
            });


            $(".qtyminus").on("click",function(){
                var now = $(".qty").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1> 0)
                    { now--;}
                    $(".qty").val(now);
                }
            })            
            $(".qtyplus").on("click",function(){
                var now = $(".qty").val();
                if ($.isNumeric(now)){
                    $(".qty").val(parseInt(now)+1);
                }
            });
        });
    /*Plus Minus*/


 



</script>





@endsection
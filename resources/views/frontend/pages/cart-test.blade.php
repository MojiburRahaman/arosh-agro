@extends('frontend.master')
@section('title')
{{config('app.name')}} - Cart
@endsection

@section('content')
<!-- cart-area start -->
<style>
    .title {
        font-size: 17px;
    }

    .product_details {
        font-size: 13px !important;
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

    /*Cart*/
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');





    .img-sm {
        width: 80px !important;
        height: 80px !important;
    }

    /*.itemside .info {
    padding-left: 15px !important;
    padding-right: 7px !important;
}*/

    .table-shopping-cart .price-wrap {
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


    .btn-apply {
        font-size: 11px !important;
    }

    @media (max-width:575px) {
        .cart-wrap .quantity .qtybutton.inc {
            right: 8px !important;
            /* top: 87px !important; */

        }

        .cart-wrap .quantity .qtybutton.dec {
            left: 8px !important;
            /* top: 87px !important; */

        }

        .cart-wrap .quantity .qtybutton {
            top: 27px !important;
            /* top: 50% !important; */
            /* left: 27px !important;*/
            transform: translateY(-51%) !important;
            -webkit-transform: translateY(-51%) !important;
            -moz-transform: translateY(-51%) !important;
        }


    }

    @media (min-width:768px) and (max-width:991px) {
        .cart-wrap .quantity .qtybutton.dec {
            left: 7px !important;
        }

        .cart-wrap .quantity .qtybutton.inc {
            right: 9px !important;
        }

    }

    @media (min-width:576px) and (max-width:767px) {
        .cart-wrap .quantity .qtybutton.dec {
            left: 3px !important;
        }

        .cart-wrap .quantity .qtybutton.inc {
            right: 3px !important;
        }
    }



    .img-sm {
        max-width: 100% !important;
        height: auto;
        /* height: 80px !important; */
    }


    .cart-wrap thead {
        background: #99CB55;
        color: #fff;
    }
</style>

<div class="page_content_wrap page_paddings_no">
    <div class="container">
        <div class="">
            <section class="post_content">

                <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1"> Cart</h3>
                <div class="h-divider">
                    <div class="shadows"></div>
                    <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
                </div>


                <div class="vc_row-full-width"></div>
                <div class="row mb-4">
                    <div class="col-lg-9 col-12 mb-4 ">
                        <table class="table table-responsive cart-wrap mb-4">
                            <thead>
                                <tr>
                                    <th class="text-center images">Image</th>
                                    <th class="text-center product">Product</th>
                                    <th class="text-center ptice">Price</th>
                                    <th class="text-center quantity">Quantity</th>
                                    <th class="text-center ">Total</th>
                                    <th class="text-center remove">Action</th>
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
                                    <td class="images">
                                        <img src="{{ asset('thumbnail_img/' . $item->Product->thumbnail_img) }}"
                                            class="img-sm">
                                    </td>
                                    <td class="product">
                                        <a href="#" class="title " data-abc="true">{{
                                            $item->Product->title }}</a>
                                        <p class=" product_details">
                                            @if ($item->Size->size_name !=
                                            '' && $item->Size->size_name !=
                                            'None' )
                                            Weight:{{ $item->Size->size_name }}
                                            @endif
                                            @if ($item->Color->color_name !=
                                            '' && $item->Color->color_name !=
                                            'None' )
                                            <br>
                                            Varient:{{ $item->Color->color_name }}
                                            @endif
                                        </p>
                                    </td>
                                    <td class="ptice singlesub_price">
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
                                    <td class="quantity  cart-plus-minus">
                                        <input type="text" class="cart_quantity" name="cart_quantity"
                                            value="{{ $item->quantity }}" />
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

                                        <td class="total ">
                                            ৳<span class="sub_product_total">@php
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
                                        <td class="remove text-center">


                                            <a class="  pointer " title="Update Item">
                                                <i data-id="{{$item->id}}" class="rotate fa fa-refresh"></i>
                                            </a>
                                            &nbsp;
                                            <a href="{{route('CartDelete',$item->id)}}" class="mt-2 " data-abc="true">
                                                <i class="fa fa-times"></i></a>
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
                                        <td style="border-bottom: 1px solid rgb(211, 211, 211)" colspan="10"
                                            class="text-center">
                                            No item in your cart
                                        </td>

                                </tr>

                                @endforelse
                            </tbody>
                        </table>


                        <a href="{{route('allproducts')}}" style="color: white !important"
                            class="btn-sm btn-out  btn-square btn-main btn-light text-light mt-4">
                            Continue Shopping </a>

                    </div>
                    <div class="col-lg-3 p-lg-0">
                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="form-group"> <label>Have coupon?</label>
                                    <div class="input-group">
                                        <input type="text" id="coupon_name" class="form-control coupon" value=""
                                            placeholder="Coupon code">
                                        <span class="input-group-append"> <button id="coupon_submit_btn"
                                                class="btn btn-primary btn-apply coupon">Apply</button>
                                        </span>
                                        {{-- @if(session('coupon_invalid')) --}}
                                        <br>
                                        {{-- @endif --}}
                                    </div>
                                    <span style="font-size: 13.5px" id="invalid_coupon" class="text-danger"></span>
                                </div>

                            </div>
                        </div>
                        @auth

                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="form-group"> <label>Redeem Credit</label>
                                    <form action="" id="reedem_credit">

                                        <div class="input-group">
                                            <input type="number" name="reedem" class="form-control coupon"
                                                placeholder="Redeem credit" required>
                                            <span class="input-group-append">
                                                <button class="btn btn-primary btn-apply coupon">Apply</button>
                                            </span>
                                            @csrf
                                            {{-- @if(session('coupon_invalid')) --}}
                                            <br>
                                            {{-- @endif --}}
                                        </div>
                                    </form>
                                    <span id="wallet" class="mt-2" style="font-size: 13.5px">Your have <span
                                            id="auth_wallet">{{
                                            auth()->user()->credit->wallet }}</span> credit</span>
                                    <span style="font-size: 13.5px" id="invalid_credit" class="text-danger"></span>
                                </div>

                            </div>
                        </div>
                        @endauth
                        <div class="card">
                            <div class="card-body">
                                <dl class="dlist-align">
                                    <dt>Total:</dt>
                                    <dd class="text-right ml-3">৳<span class="subtotal">
                                            {{ $total_cart_amount }}</span></dd>
                                </dl>
                                <dl class="dlist-align" id="discount_coupon">
                                    <dt>Discount({{$discount}}%)</dt>
                                    <dd class="text-right text-danger ml-3">৳<span class="discount"
                                            id="discount_amount">
                                            {{ ($total_cart_amount * $discount)/100 }}</span>
                                    </dd>
                                </dl>
                                @auth

                                <dl class="dlist-align" id="reedem">
                                    <dt>Redeem <span id="reedem_point">(0)</span> </dt>
                                    <dd class="text-right text-danger ml-3">৳<span class="reedem" id="reedem_amount">
                                            0</span>
                                    </dd>
                                </dl>
                                @endauth
                                <dl class="dlist-align">
                                    <dt>Sub Total:</dt>
                                    <dd class="text-right text-dark b ml-3"><strong> ৳<span id="subtotal"
                                                class="cart_total">
                                                {{round($total_cart_amount -
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
                                @if (session()->get('cart_total'))
                                <a href="{{route('CheckoutView')}}" class="btn btn-out   btn-square btn-main btn-light"
                                    data-abc="true"> Make Purchase </a>

                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
            // var slider = $("#slider");
            // var thumb = $("#thumb");
            // var slidesPerPage = 4; //globaly define number of elements per page
            // var syncedSecondary = true;
            // slider.owlCarousel({
            //     items: 1,
            //     slideSpeed: 2000,
            //     nav: false,
            //     autoplay: false, 
            //     dots: false,
            //     loop: true,
            //     responsiveRefreshRate: 200
            // }).on('changed.owl.carousel', syncPosition);
            // thumb
            //     .on('initialized.owl.carousel', function() {
            //         thumb.find(".owl-item").eq(0).addClass("current");
            //     })
            //     .owlCarousel({
            //         items: slidesPerPage,
            //         dots: false,
            //         nav: true,
            //         item: 4,
            //         smartSpeed: 200,
            //         slideSpeed: 500,
            //         slideBy: slidesPerPage, 
            //         navText: ['<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
            //         responsiveRefreshRate: 100
            //     }).on('changed.owl.carousel', syncPosition2);
            // function syncPosition(el) {
            //     var count = el.item.count - 1;
            //     var current = Math.round(el.item.index - (el.item.count / 2) - .5);
            //     if (current < 0) {
            //         current = count;
            //     }
            //     if (current > count) {
            //         current = 0;
            //     }
            //     thumb
            //         .find(".owl-item")
            //         .removeClass("current")
            //         .eq(current)
            //         .addClass("current");
            //     var onscreen = thumb.find('.owl-item.active').length - 1;
            //     var start = thumb.find('.owl-item.active').first().index();
            //     var end = thumb.find('.owl-item.active').last().index();
            //     if (current > end) {
            //         thumb.data('owl.carousel').to(current, 100, true);
            //     }
            //     if (current < start) {
            //         thumb.data('owl.carousel').to(current - onscreen, 100, true);
            //     }
            // }
            // function syncPosition2(el) {
            //     if (syncedSecondary) {
            //         var number = el.item.index;
            //         slider.data('owl.carousel').to(number, 100, true);
            //     }
            // }
            // thumb.on("click", ".owl-item", function(e) {
            //     e.preventDefault();
            //     var number = $(this).index();
            //     slider.data('owl.carousel').to(number, 300, true);
            // });


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

    $(document).ready(function(){
        $('#coupon_name').val('');
        $('#coupon_submit_btn').click(function(){
            let coupon_name_test = $('#coupon_name').val();
            if (coupon_name_test == '') {
                $('#invalid_coupon').html('*Coupon Name Required');
                return ;
            }
            $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                     }),
                     $.ajax({
                type: "POST",   
            url:"{{route('CouponCheck')}}",
           data:{
             coupon:coupon_name_test,
               },
           success: function(res) {
                    if (res) {
                        if (res.errors) {
                        $('#invalid_coupon').html(res.errors);
                        var total =   $('#subtotal').html();
                         var discount =  '0';
                         var subtotal =  total-discount;
                            $('#discount_coupon').html('<dt>Discount (0%)</dt><dd class="text-right text-danger ml-3"><span class="discount">৳ '+discount+'</span></dd>');
                            $('#subtotal').html(subtotal);
                        }
                        if(res.yes){

                            const total= '{{ $total_cart_amount }}';
                            const discount= Math.round((total*res.yes)/100);
                            const reedem_amount=  $('#reedem_amount').html();
                            const subtotal = total - discount - reedem_amount;

                            $('#invalid_coupon').html('');
                            Command: toastr["success"](res.message);

                        //  var total =   $('#subtotal').html();
                        //  var discount =  ;
                        //  var subtotal =  total-discount;
                            $('#discount_coupon').html('<dt>Discount ('+res.yes+'%)</dt><dd class="text-right text-danger ml-3">৳<span class="discount" id="discount_amount"> '+discount+'</span></dd>');
                           
                            $('#subtotal').html(subtotal);
                        }
                    }
                }
            })
    });
    
    });
    // $(document).ready(function(){
    //     $('#coupon_name').val('');
    //     $('#coupon_submit_btn').click(function(){
    //         let coupon_name_test = $('#coupon_name').val();
    //         $.ajaxSetup({
    //     headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //                  }),
    //                  $.ajax({
    //             type: "POST",   
    //         url:"{{route('CouponCheck')}}",
    //        data:{
    //          coupon:coupon_name_test,
    //            },
    //        success: function(res) {
    //                 if (res) {
    //                     if (res.errors) {
    //                     $('#invalid_coupon').html(res.errors);
    //                     var total =   '{{$total_cart_amount}}';
    //                      var discount =  '0';
    //                      var subtotal =  total-discount;
    //                         $('#discount_coupon').html('<dt>Discount (0%)</dt><dd class="text-right text-danger ml-3"><span class="discount">৳ '+discount+'</span></dd>');
    //                         $('#subtotal').html(subtotal);
    //                     }
    //                     if(res.yes){
    //                         $('#invalid_coupon').html('');
    //                      var total =   '{{$total_cart_amount}}';
    //                      var discount =  Math.round((total*res.yes)/100);
    //                      var subtotal =  total-discount;
    //                         $('#discount_coupon').html('<dt>Discount ('+res.yes+'%)</dt><dd class="text-right text-danger ml-3"><span class="discount">৳ '+discount+'</span></dd>');
                           
    //                         $('#subtotal').html('৳'+subtotal);
    //                     }
    //                 }
    //             }
    //         })
    // });
    
    // });

// credit reedem start

jQuery(document).ready(function($) {
     $("#reedem_credit").submit(function(e) {
    $('#wallet').show();
    $('#invalid_credit').hide();

    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var actionUrl = form.attr('action');
    $.ajax({
        type: "POST",
        url: "{{route('ReedemCredit')}}",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
    {
        const total= '{{ $total_cart_amount }}';
        const discount_amount= $('#discount_amount').html();
        const reedem_amount= data.reedem_amount;
        const subtotal = total - discount_amount - reedem_amount;
        const point = $('#auth_wallet').html();

        $('#reedem_point').html('('+data.amount+')');
        $('#reedem_amount').html(data.reedem_amount);
        $('#subtotal').html(subtotal);
        $('#auth_wallet').html(point-data.amount);
        Command: toastr["success"](data.message);

    },
    error:function (response) {
          $('#wallet').hide();
         $('#invalid_credit').show();
          $('#invalid_credit').text(response.responseJSON.error);
        }
            });
        });
     });

// credit reedem end



</script>


@endsection
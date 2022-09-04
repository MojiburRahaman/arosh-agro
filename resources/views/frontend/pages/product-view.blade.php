@extends('frontend.master')
@section('title')
{{$product->title}} @endsection
@section('meta_description')
{{$product->meta_description}} @endsection
@section('meta_keyword')
{{$product->meta_keyword}} @endsection
@section('social_thumbnail')
<meta property="og:image" content="{{ asset('thumbnail_img/' . $product->thumbnail_img) }}" />
<meta property="og:image:url" content="{{ asset('thumbnail_img/' . $product->thumbnail_img) }}" />
<meta property="og:image:secure_url" content="{{ asset('thumbnail_img/' . $product->thumbnail_img) }}" />
<meta property="og:image:height" content="640" />
<meta property="og:image:height" content="640" />
@endsection
@section('content')
<style>
    ol,
    ul {
        padding-left: 0;
    }

    .cat_name {
        float: left;
        margin-right: 5px
    }
</style>
<div class="pd-wrap">
    <div class="container">
        <div class="post_content">
            <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">Product Details</h3>
            <div class="h-divider">
                <div class="shadows"></div>
                <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12 col-xl-6 col-lg-6">
                <div id="slider" class="owl-carousel product-slider">
                    @foreach ($product->Gallery as $Gallery)
                    <div class="item">
                        <img src="{{asset('product_image/'.$Gallery->product_img)}}" alt="{{$product->title}}" />
                    </div>
                    @endforeach

                </div>
                <div id="thumb" class="owl-carousel product-thumb">
                    @foreach ($product->Gallery as $Gallery)
                    <div class="item">
                        <img src="{{asset('product_image/'.$Gallery->product_img)}}" alt="{{$product->title}}" />
                    </div>

                    @endforeach


                </div>
            </div>
            <div class="col-md-6 col-12 col-xl-6 col-lg-6">
                <div class="product-dtl">
                    <div class="product-info">
                        <div class="product-name">
                            <h3 class="product_title entry-title">{{$product->title}}</h3>
                        </div>

                        <div class="rating-wrap fix">
                            <span class="price">
                                @if( $product->comming_soon != 1 )
                                @php
                                // regular price and selling price
                                $sale = collect($product->Attribute)->min('sell_price');
                                $regular = collect($product->Attribute)->min('regular_price');
                                @endphp
                                {{-- ####### regular price section start ######### --}}

                                {{-- if theres available selling price regular price add into this field by ajax --}}
                                @if ($regular != '')
                                {{-- if regular price available --}}
                                <span @if ($sale !='' ) style="text-decoration:line-through;padding-right:8px" @endif
                                    class="pull-left regular_Price"> ৳
                                    {{ $regular }}
                                </span>
                                @endif
                                {{-- if theres no selling price available regular price add into this field ajax --}}
                                <span class="pull-left regular_Price_if_selling_null"></span>

                                {{-- ####### regular price section end ######### --}}

                                {{-- ####### selling price section start ######### --}}

                                @if ($sale != '')
                                {{-- if selling price available --}}
                                <span class="pull-left sell_Price"> ৳
                                    {{ $sale }}
                                </span> &nbsp;&nbsp;
                                @endif
                                {{-- ####### selling price section end ######### --}}

                                {{-- quantity section --}}
                                @if ($product->Attribute->sum('quantity') != 0)

                                <span style="display:none">(<span class="available" id="span_Id">{{
                                        $product->Attribute->sum('quantity') }}</span>
                                    &nbsp;Product
                                    Available)</span>
                                @else
                                (<span>Out of Stock</span>)
                                @endif
                                <span id="stocknone" style="display: none" >(Out of Stock)</span>
                                @endif
                                @if($product->comming_soon == 1)
                                    
                                <span>(Coming Soon)</span>
                                @endif
                            </span>
                        </div>
                    </div>
                    <br>
                    <br>
                    {{-- <div class="row"> --}}
                        {{-- <div class="col-md-12 col-12 col-xl-12 col-lg 12"> --}}
                            <form action="{{ route('CartPost') }}" id="Form_submit" method="POST">
                                @csrf
                                <p style="color: black!important">{!! $product->product_summary !!}</p>
                                @if ($product->Attribute->sum('quantity') != 0)
                                @if( $product->comming_soon != 1 )
                                    
                                <input type="hidden" value="{{$product->id}}" name="product_id">
                                @if ($color != 0)
                                <ul class="cetagory">
                                    @php
                                    $attribute = collect($product->Attribute);
                                    $group = $attribute->unique('color_id')
                                    @endphp

                                    <li class="cat_name">Varient :</li>
                                    @foreach ($group as $color)
                                    @if ($color->color_id != 1)
                                    <input class=" {{($size == 0)? 'no_size_color' : 'color_name'}}" type="radio"
                                        name="color_id" id="color_id{{$color->Color->id}}" value="{{$color->Color->id}}"
                                        data-product="{{$product->id}}">
                                    <label
                                        for="color_id{{$color->Color->id}}">{{$color->Color->color_name}}</label>&nbsp;
                                    @endif
                                    @endforeach
                                </ul>
                                @if ($size != 0)

                                <ul class="cetagory " style="margin-bottom: 0">
                                    <li style="margin-bottom: 0" class="cat_name">Weight :</li>
                                    <li class="size_add"></li>
                                </ul>
                                @else
                                <input type="hidden" name="size_id" value="1">
                                @endif

                                @else

                                @if ($size != 0)
                                <ul class="cetagory">

                                    <li class="cat_name">Weight :</li>
                                    @foreach ($product->Attribute as $Attribute)
                                    <input class="form-group SizebyPrice" type="radio" name="size_id"
                                        data-product="{{$product->id}}" id="size_id{{$Attribute->Size->id}}"
                                        value="{{$Attribute->Size->id}}">
                                    <label class="form-group"
                                        for="size_id{{$Attribute->Size->id}}">{{$Attribute->Size->size_name}}</label>
                                    &nbsp;
                                    @endforeach
                                </ul>
                                <input type="hidden" name="color_id" value="1">
                                @endif

                                @endif
                                @if ($color === 0)

                                <input type="hidden" name="color_id" value="1">
                                @endif
                                @if ($size === 0)
                                <input type="hidden" name="size_id" value="1">
                                @endif

                                <br>
                                <ul class="input-style" id="cart-btn-hide">
                                    <div class="product-count">
                                        {{-- <label style="display: block" for="size">Quantity</label> --}}
                                        <li style="float: left" class="quantity display-flex">
                                            <div class="qtyminus">-</div>

                                            <input class="qty" name="cart_quantity" type="text" value="1" />
                                            <div class="qtyplus">+</div>
                                        </li>
                                        <button type="submit" id="Cart_add" class="round-black-btn Cart_add">
                                            Add to Cart
                                        </button>
                                    </div>

                                </ul>
                                @endif
                                @endif

                                <div style="display: block">

                                    <ul class="cetagory">
                                        <li style="float: left">Categories:</li>
                                        <li><a href="{{route('CategorySearch',$product->Catagory->slug)}}">&nbsp;
                                                {{$product->Catagory->catagory_name}}</a>
                                        </li>
                                    </ul>
                                </div>

                                <style>
                                    .socil-icon li a {
                                        text-align: center;
                                        display: block;
                                        background: #99CB55;
                                        color: #fff;
                                        border-radius: 50%;
                                        color: white !important;
                                        padding: 5px 10px;
                                        float: left;
                                    }
                                </style>
                                <ul class="socil-icon">
                                    <li style="float: left" class="pr-2 pt-2 pt-lg-0">Share :</li>
                                    <li style="float: left"> &nbsp; <a
                                            href="https://www.facebook.com/sharer/sharer.php?u={{route('SingleProductView',$product->slug)}}&display=popup"><i
                                                class="icon-facebook"></i></a>
                                    </li>
                                    <li style="float: left"> &nbsp; <a
                                            href="https://twitter.com/intent/tweet?url={{route('SingleProductView',$product->slug)}}"><i
                                                class="icon-twitter"></i></a>
                                    </li>
                                    <li style="float: left"> &nbsp; <a
                                            href="https://www.linkedin.com/shareArticle?mini=true&url={{route('SingleProductView',$product->slug)}}&title={{ $product->title }}"><i
                                                class="icon-linkedin"></i></a>
                                    </li>
                                    
                                </ul>
                            </form>
                        </div>

                    </div>
                </div>

                <style>
                    .single-product-menu ul li a {
                        padding: 10px 30px;
                        text-transform: uppercase;
                        display: block;
                        border: 1px solid #e5e5e5;
                        margin-right: -1px;
                        color: #333 !important;
                    }

                    .single-product-menu ul li {
                        margin-bottom: 0;
                    }

                    .single-product-menu ul li a.active,
                    .single-product-menu ul li a:hover {
                        background: #99CB55;
                        color: #fff !important;
                        border-color: #99CB55;
                    }

                    .tab-content {
                        border: 1px solid #d7d7d7;
                        padding: 50px;
                        margin-top: -1px;
                    }

                    .description-wrap p {
                        margin-bottom: 20px;
                        font-size: 14px !important;
                        color: #727272 !important;
                    }

                    .review-wrap p {
                        margin-bottom: 20px;
                        font-size: 14px !important;
                        color: #727272 !important;

                    }

                    .mt-60 {
                        margin-top: 60px;
                    }
                </style>
                <div class="row mt-60">

                    <div class="col-12">
                        <div class="single-product-menu">
                            <ul class="nav">
                                <li><a class="active show" data-toggle="tab" href="#description">Description</a> </li>
                                {{-- <li><a data-toggle="tab" href="#review" class="">Review</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="description">
                                <div class="description-wrap">
                                    {!!$product->product_description!!}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @if ($related_product->count() != 0)
                <section class="related products">

                    <h2>Related products</h2>
                    <ul class="products">
                        @foreach ($related_product as $latest_product)
                        <li class="product has-post-thumbnail column-1_4  instock purchasable">
                            <div class="post_item_wrap">
                                <div class="post_featured">
                                    <div class="post_thumb text-center">
                                        @if (collect($latest_product->Attribute)->max('discount') != '')
                                        <span>{{collect($latest_product->Attribute)->max('discount')}}%</span>
                                        @endif
                                        <a class="hover_icon hover_icon_link"
                                            href="{{route('SingleProductView',$latest_product->slug)}}">
                                            <img src="{{ asset('thumbnail_img/' . $latest_product->thumbnail_img) }}"
                                                class="attachment-shop_catalog size-shop_catalog"
                                                alt="{{ $latest_product->title }}" />
                                        </a>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <h2 class="woocommerce-loop-product__title"><a
                                            href="{{route('SingleProductView',$latest_product->slug)}}">{{
                                            $latest_product->title }}</a>
                                    </h2>
                                    @php
                                    $sale = collect($latest_product->Attribute)->min('sell_price');
                                    $regular = collect($latest_product->Attribute)->min('regular_price');
                                    @endphp
                                    <span class="price">
                                        @if ($sale == '')
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">&#2547;</span>
                                            {{$regular}}
                                        </span>
                                        @else
                                        <span class="woocommerce-Price-amount amount">
                                            <span style="text-decoration:line-through"
                                                class="woocommerce-Price-currencySymbol">&#2547;
                                                {{$regular}} </span>
                                        </span>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">&#2547;</span>
                                            {{$sale}}
                                        </span>

                                        @endif
                                    </span>
                                    <a rel="nofollow" href="{{route('SingleProductView',$latest_product->slug)}}"
                                        data-quantity="1" data-product_id="458" data-product_sku=""
                                        class="button add_to_cart_button">Select options</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </section>
                @endif

            </div>
        </div>

        @endsection

        @section('script_js')


        <script>

@if (session('cart_added'))
Command: toastr["success"]('{{ session('cart_added') }}');
@endif

            @error('color_id')
    Swal.fire({
        icon: 'warning',
        text: '{{$message}}',
    })
      @enderror
    @error('size_id')
        
    Swal.fire({
        icon: 'warning',
        text: '{{$message}}',
    })
      @enderror
    @error('flavour_id')
        
    Swal.fire({
        icon: 'warning',
        text: '{{$message}}',
    })
      @enderror
    // if therese color available start
    $('.color_name').change(function() {
            var color_id = $(this).val();
            var product_id = $(this).attr('data-product');
              $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                     }),
            $.ajax({
                type: "POST",
            url:"/product/get-size",
           data:{product_id:product_id, color_id:color_id},
           success: function(res) {
                    if (res) {
                        // get size by color
                        $('.size_add').html(res);
                        $('.size_name').change(function() {
                            // get price on change size
                            var regular_price = $(this).attr('data-regular_price');
                            var selling_price = $(this).attr('data-sell_price');
                            var quantity = $(this).attr('data-quantity');
                          
                            $('.available').html(quantity);
                            if (quantity == 0) {
                                $('#cart-btn-hide').hide();
                                $('#stocknone').show();
                            
                            }else{
                                $('#cart-btn-hide').show();
                                    $('#stocknone').hide();
                            }
                            if (selling_price == '') {
                            $('.sell_Price').html( selling_price);
                                // if theres no selling price
                                $('.regular_Price').empty();
                                $('.regular_Price_if_selling_null').html('৳' +
                                    regular_price);
                            } else {
                            $('.sell_Price').html('৳' + selling_price);
                                // if theres a selling price
                                $('.regular_Price_if_selling_null').empty();
                                $('.regular_Price').html('৳'+regular_price);
                            }
                        })

                    }
                }
            })
        });
    // if therese color available end

    // if therese color but no size available start
    $('.no_size_color').change(function() {
            var color_id = $(this).val();
            var product_id = $(this).attr('data-product');
              $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                     }),
            $.ajax({
                type: "POST",
            url:"/product/get-size",
           data:{product_id:product_id, color_id:color_id},
           success: function(res) {
            if (res) {
                // get price and quantity
                        $('.available').html(res);

                        var quantity =  document.getElementById("span_Id").innerText

                        if (quantity == 0) {
                                $('#cart-btn-hide').hide();
                                $('#stocknone').show();
                            
                            }else{
                                $('#cart-btn-hide').show();
                                    $('#stocknone').hide();
                            }

                        var regular_price = $('.quantityadd').attr('data-regularprice');
                        var selling_price = $('.quantityadd').attr('data-sellprice');
                        if (selling_price == '') {
                            // if theres no selling price
                        $('.sell_Price').html(selling_price);
                            $('.regular_Price').empty();
                            $('.regular_Price_if_selling_null').html('৳' +
                                regular_price);
                        } else {
                        $('.sell_Price').html('৳' +selling_price);
                            // if theres a selling price
                            $('.regular_Price_if_selling_null').empty();
                            $('.regular_Price').html('৳' +regular_price);
                        }
                    }
                }
            })
        });
    // if therese color but no size available end

    // if therese only size available start
    $('.SizebyPrice').change(function() {
            var size_id = $(this).val();
            var product_id = $(this).attr('data-product');
              $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                     }),
            $.ajax({
                type: "POST",
            url:"/product/get-pricebysize",
           data:{product_id:product_id, size_id:size_id},
           success: function(res) {
            if (res) {
                // get price and quantity
                        $('.available').html(res);


                        var quantity =  document.getElementById("span_Id").innerText

                        if (quantity == 0) {
                                $('#cart-btn-hide').hide();
                                $('#stocknone').show();
                            
                            }else{
                                $('#cart-btn-hide').show();
                                    $('#stocknone').hide();
                            }

                        var regular_price = $('.quantityadd').attr('data-regularprice');
                        var selling_price = $('.quantityadd').attr('data-sellprice');
                        // alert(selling_price);
                        if (selling_price == '') {
                            // if theres no selling price
                        $('.sell_Price').html(selling_price);
                            $('.regular_Price').empty();
                            $('.regular_Price_if_selling_null').html( '৳' +
                                regular_price);
                        } else {
                            // if theres a selling price
                        $('.sell_Price').html('৳' +selling_price);
                            $('.regular_Price_if_selling_null').empty();
                            $('.regular_Price').html('৳' +regular_price);
                        }
                    }
                }
            })
        });
      


      /*Slider Start*/

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
        </script>
        @endsection
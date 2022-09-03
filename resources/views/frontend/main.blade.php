@extends('frontend.master')
{{-- @section('social_thumbnail')
 
@endsection --}}
@section('content')
<style>

</style>
{{-- my slider start --}}
<section class="slider_wrap slider_fullwide slider_engine_revo slider_alias_slider-1">
    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" data-version="5.2.6">
            <ul>
                @forelse ($banners as $key => $banner)
                @if ($banner->banner_image != '')
                <li data-index="rs-{{$loop->index+1}}" data-transition="{{$key%2 == 0 ? 'cube' : 'cube-horizontal'}}"
                    data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                    data-easeout="default" data-masterspeed="default" data-thumb="images/home-1-slide-1-100x50.jpg"
                    data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                    data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                    data-param9="" data-param10="" data-description="">
                    <img src="{{asset('banner_image/'.$banner->banner_image)}}" alt="" title="home-1-slide-1"
                        width="1903" height="873" data-bgposition="center center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <div class="tp-caption BigWhiteText tp-resizeme" id=" slide-{{$loop->index+1}}-layer-1"
                        data-x="center" data-hoffset="" data-y="center" data-voffset="-60" data-width="['auto']"
                        data-height="['auto']" data-transform_idle="o:1;"
                        data-transform_in="x:{-250,250};y:{-150,150};rX:{-90,90};rY:{-90,90};rZ:{-360,360};sX:0;sY:0;opacity:0;s:1000;e:Back.easeOut;"
                        data-transform_out="opacity:0;s:300;" data-start="730" data-splitin="chars" data-splitout="none"
                        data-responsive_offset="on" data-elementdelay="0.1">Milk and More! </div>
                    <div class="tp-caption SmallWhiteText tp-resizeme" id="slide-{{$loop->index+1}}-layer-2"
                        data-x="center" data-hoffset="" data-y="center" data-voffset="35" data-width="['auto']"
                        data-height="['auto']" data-transform_idle="o:1;"
                        data-transform_in="y:50px;opacity:0;s:800;e:Power2.easeInOut;"
                        data-transform_out="opacity:0;s:300;" data-start="3030" data-splitin="none" data-splitout="none"
                        data-responsive_offset="on">Fresh. Local. Delivered </div>
                    <div class="tp-caption ButtonText rev-btn"
                        style="background-color: #99CB55; border-color: #0C743F ; color: #0C743F;"
                        id="slide-{{$loop->index+1}}-layer-3" data-x="center" data-hoffset="" data-y="center"
                        data-voffset="151" data-width="['auto']" data-height="['auto']" data-transform_idle="o:1;"
                        data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:0;e:Linear.easeNone;"
                        data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(255, 255, 255, 0);bc:rgba(255, 255, 255, 1.00);"
                        data-transform_in="y:bottom;rZ:90deg;sX:2;sY:2;s:800;e:Quad.easeIn;"
                        data-transform_out="opacity:0;s:300;" data-start="4090" data-splitin="none" data-splitout="none"
                        data-actions='[{"event":"click","action":"simplelink","target":"_blank","url":"\/all-products\/","delay":""}]'
                        data-responsive_offset="on" data-responsive="off">View our products </div>
                </li>


                @endif
                @if ($banner->product_id != '')
                <li data-index="rs-{{$loop->index+1}}" data-transition="{{$key%2 == 0 ? 'cube' : 'cube-horizontal'}}"
                    data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                    data-easeout="default" data-masterspeed="default" data-thumb="images/home-1-slide-1-100x50.jpg"
                    data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                    data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                    data-param9="" data-param10="" data-description="">
                    <img src="{{asset('thumbnail_img/'.$banner->Product->thumbnail_img)}}" alt="" title="home-1-slide-1"
                        width="1903" height="873" data-bgposition="center center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <div class="tp-caption BigWhiteText tp-resizeme" id=" slide-{{$loop->index+1}}-layer-1"
                        data-x="center" data-hoffset="" data-y="center" data-voffset="-60" data-width="['auto']"
                        data-height="['auto']" data-transform_idle="o:1;"
                        data-transform_in="x:{-250,250};y:{-150,150};rX:{-90,90};rY:{-90,90};rZ:{-360,360};sX:0;sY:0;opacity:0;s:1000;e:Back.easeOut;"
                        data-transform_out="opacity:0;s:300;" data-start="730" data-splitin="chars" data-splitout="none"
                        data-responsive_offset="on" data-elementdelay="0.1">{{$banner->Product->title}}</div>
                    <div class="tp-caption SmallWhiteText tp-resizeme" id="slide-{{$loop->index+1}}-layer-2"
                        data-x="center" data-hoffset="" data-y="center" data-voffset="35" data-width="['auto']"
                        data-height="['auto']" data-transform_idle="o:1;"
                        data-transform_in="y:50px;opacity:0;s:800;e:Power2.easeInOut;"
                        data-transform_out="opacity:0;s:300;" data-start="3030" data-splitin="none" data-splitout="none"
                        data-responsive_offset="on">Fresh. Local. Delivered </div>
                    <div class="tp-caption ButtonText rev-btn" id="slide-{{$loop->index+1}}-layer-3" data-x="center"
                        data-hoffset="" data-y="center" data-voffset="151" data-width="['auto']" data-height="['auto']"
                        data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:0;e:Linear.easeNone;"
                        data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(255, 255, 255, 0);bc:rgba(255, 255, 255, 1.00);"
                        data-transform_in="y:bottom;rZ:90deg;sX:2;sY:2;s:800;e:Quad.easeIn;"
                        data-transform_out="opacity:0;s:300;" data-start="4090" data-splitin="none" data-splitout="none"
                        data-actions='[{"event":"click","action":"simplelink","target":"_blank","url":"{{route('
                        SingleProductView',$banner->Product->slug)}}","delay":""}]' data-responsive_offset="on"
                        data-responsive="off">Buy Now This</div>
                </li>
                @endif
                @empty
                @endforelse


            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>
</section>

<div class="page_content_wrap page_paddings_no">
    <div class="content_wrap">
        <div class="content">
            <article
                class="post_item post_item_single post_featured_default post_format_standard page type-page hentry">
                <section class="post_content">
                    <div data-vc-full-width="true" data-vc-full-width-init="false"
                        class="vc_row wpb_row vc_row-fluid vc_custom_1475063547001">
                        <div class="wpb_column vc_column_container vc_col-sm-12">
                            <div class="vc_column-inner ">
                                <div class="wpb_wrapper">
                                    <div class="sc_section margin_bottom_small section_style_dark_text"
                                        data-animation="animated fadeInUp normal">
                                        <div class="sc_section_inner">
                                            <h2 class="sc_title sc_title_regular   text-center mt-4  mb-4">Welcome To
                                                {{config('app.name')}}
                                            </h2>

                                            <div class="h-divider">
                                                <div class="shadows"></div>
                                                <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" />
                                                </div>
                                            </div>
                                            <div class=" pt-3 sc_section_content_wrap">
                                                <div
                                                    class="sc_section sc_section_block margin_bottom_large aligncenter mw800">
                                                    <div class="sc_section_inner">
                                                        <div class="sc_section_content_wrap">
                                                            <span class="dropcap"></span>
                                                            <p class="text-justify">
                                                                {!!Str::limit($about->about??'',350)!!}
                                                                <a style="font-weight: 700;"
                                                                    href="{{route('FrontendAbout')}}">@lang('Read
                                                                    More')</a>
                                                                    </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vc_empty_space h_6r">
                                                    <span class="vc_empty_space_inner"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vc_row-full-width"></div>
                    {{-- <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="sc_section aligncenter" data-animation="animated fadeInUp normal">
                                                <div class="sc_section_inner">
                                                    <div class="sc_section_content_wrap">
                                                        <figure class="sc_image sc_image_shape_square margin_top_huge-">
                                                           <img src="{{asset('round_logo/ok.png')}}" />
                    </figure>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div> --}}

<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner vc_custom_1475066123130 cat4">

            <div class="wpb_wrapper">
                <div id="sc_services_918_wrap" class="sc_services_wrap">
                    <div id="sc_services_918"
                        class="sc_services sc_services_style_services-1 sc_services_type_images  margin_top_large margin_bottom_large fwidth cat3"
                        data-animation="animated fadeInUp normal">
                        <div class="sc_columns columns_wrap">
                            <h2 class="sc_title sc_title_regular   text-center mt-3  mb-4">Product Category</h2>

                            <div class="h-divider">
                                <div class="shadows"></div>
                                <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
                            </div>
                            @foreach ($catagory_menu as $cat)
                            <div class="column-1_4 column_padding_bottom">
                                <div id="sc_services_918_1" class="sc_services_item sc_services_item_1 odd first"
                                    onclick="window.location='{{route('CategorySearch',$cat->slug)}}';">
                                    <div class="sc_services_item_featured post_featured cat1">
                                        <div class="post_thumb" data-image="" data-title="Our Dairy Farm">
                                            <a class="hover_icon hover_icon_link"
                                                href="{{route('CategorySearch',$cat->slug)}}">
                                                <img alt="{{$cat->catagory_name}}"
                                                    src="{{asset('category_images/'.$cat->catagory_image)}}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="sc_services_item_content">
                                        <h4 class="sc_services_item_title cat2">
                                            <a href="{{route('CategorySearch',$cat->slug)}}">{{$cat->catagory_name}}</a>
                                        </h4>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="vc_row-full-width"></div>
@if($deal)
    
<section id="deals">
<div class="container">
    <h2>{{ $deal->title }}</h2>
    <div class="row p-0 pt-2 pb-2  pl-0 " >
        <div class="col-7 text-left " >
            <div>
                <span class="pr-2 pr-lg-4" style="color: #99CB55">On Sale Now</span>
                <span >
                    Ending in</span>
                <span  id="clock">
                </span>
            </div>
        </div>
        <div class="col-5 text-right">
            <a href="{{ route('FrontendDeals') }}" class="pt-2 pb-2 pl-3 pr-3" style="color: #99CB55 !important;border:1px solid #99CB55 !important">
                View More</a>
        </div>
        {{-- <div class="count-down-clock text-center"> --}}
            
        </div>
<hr style="background: #99CB55">
        <div class="sc_section_content_wrap">
            <div class="woocommerce columns-4">
                <ul class="products " >
                    @foreach ($deal->Product as $latest_product)
                    <li class="product has-post-thumbnail   instock purchasable">
                        <div class="post_item_wrap">
                            <div class="post_featured">
                                <div class="post_thumb">
                                    @if (collect($latest_product->Attribute)->max('discount') != '')
                                    <div class="text-center">
                                        <span 
                                            style=" z-index: 2">{{collect($latest_product->Attribute)->max('discount')}}%</span>
                                    </div>
                                    @endif
                                    <a class="hover_icon hover_icon_link"
                                        href="{{route('SingleProductView',$latest_product->slug)}}">
                                        <img src="{{ asset('thumbnail_img/' . $latest_product->thumbnail_img) }}"
                                            class="attachment-shop_catalog size-shop_catalog"
                                            alt="{{ $latest_product->title }}" />
                                    </a>
                                </div>
                            </div>
                            <div class="post_content text-center">
                                <h2 class="woocommerce-loop-product__title"><a
                                        href="{{route('SingleProductView',$latest_product->slug)}}">{{ $latest_product->title }}</a>
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
                                <a rel="nofollow"
                                    href="{{route('SingleProductView',$latest_product->slug)}}"
                                    data-quantity="1" data-product_id="471" data-product_sku=""
                                    class="button add_to_cart_button">Add To Cart</a>
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
</div>

</section>
@endif


<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div class="sc_section margin_top_huge cat4" data-animation="animated fadeInUp normal">
                    <div class="sc_section_inner">
                        <h2 class="sc_title sc_title_regular   text-center mt-3  mb-4">Our Shop</h2>

                        <div class="h-divider">
                            <div class="shadows"></div>
                            <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
                        </div>
                        <div class="sc_section_content_wrap">
                            <div class="woocommerce columns-4">
                                <ul class="products">
                                    @foreach ($latest_products as $latest_product)
                                    <li class="product has-post-thumbnail   instock purchasable">
                                        <div class="post_item_wrap">
                                            <div class="post_featured">
                                                <div class="post_thumb">
                                                    @if (collect($latest_product->Attribute)->max('discount') != '')
                                                    <span
                                                        style=" z-index: 2">{{collect($latest_product->Attribute)->max('discount')}}%</span>
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
                                                        href="{{route('SingleProductView',$latest_product->slug)}}">{{ $latest_product->title }}</a>
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
                                                <a rel="nofollow"
                                                    href="{{route('SingleProductView',$latest_product->slug)}}"
                                                    data-quantity="1" data-product_id="471" data-product_sku=""
                                                    class="button add_to_cart_button">Add To Cart</a>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>

                                <ul class="row products" id="ajax-data">

                                </ul>
                                <ul class="no_data" style="display: none">
                                    <li class="text-center mt-5"> No More Product</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
         @if ($latest_products->links() != '')
                        <div class="col-12 text-center ">
                            <div class="load_image " style="display:none">
                                    <img width="30%" src="{{asset('front/images/Reload-Image-Gif-1.gif')}}"
                                        alt="load">
                            </div>
                            <div class="text-center">
                                <a class="loadMore_btn mleft-60" href="javascript:void(0);">Load More</a>
                            </div>

                        </div>

         @endif
</div>
<div class="vc_row-full-width"></div>
{{-- Filter Start --}}
<style>
    .pb-100{
        padding-bottom: 100px ;
    }
</style>
<div class="vc_row wpb_row vc_row-fluid pb-100">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner vc_custom_1475066123130 cat4">

            <div class="wpb_wrapper">
                <div id="sc_services_918_wrap" class="sc_services_wrap">
                    <div id="sc_services_918"
                        class="sc_services sc_services_style_services-1 sc_services_type_images  margin_top_large margin_bottom_large fwidth cat3"
                        data-animation="animated fadeInUp normal">
                        <div class="sc_columns columns_wrap">
                            <div class="sc_section_inner">
                                <h2 class="sc_title sc_title_regular   text-center mt-3  mb-4">Image Gallery</h2>

                                <div class="h-divider">
                                    <div class="shadows"></div>
                                    <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
                                </div>
                                <div class="container">
                                    <section id="lightbox_gallery" class="container">

                                        <ul class="nav nav-pills mb-3 text-center" id="pills-tab" role="tablist">

                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                                    href="#1" role="tab" aria-controls="pills-home"
                                                    aria-selected="true">All</a>
                                            </li>
                                            @foreach ($catGallery as $catGallerys)

                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                                    href="#{{ $catGallerys->slug }}" role="tab"
                                                    aria-controls="pills-profile"
                                                    aria-selected="false">{{ $catGallerys->catagory_name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="1" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <div class="row">
                                                    @foreach ($gallery as $gallerys)

                                                    <div class=" col-sm-4 col-6 col-md-4 col-lg-3 col-xl=3 p-3">
                                                        <div class="lightbox-enabled"
                                                            style="background-image:url({{ asset('product_image/' . $gallerys->product_img) }})"
                                                            data-imgsrc="{{ asset('product_image/' . $gallerys->product_img) }}">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @foreach ($catGallery as $catGallerys)
                                            <div class="tab-pane fade" id="{{ $catGallerys->slug }}" role="tabpanel"
                                                aria-labelledby="pills-profile-tab">
                                                <div class="row">
                                                    @forelse ($catGallerys->gallery as $gallerys)


                                                    <div class=" col-sm-4 col-6 col-md-4 col-lg-3 col-xl-3 p-3">
                                                        <div class="lightbox-enabled"
                                                            style="background-image:url({{ asset('product_image/' . $gallerys->product_img) }})"
                                                            data-imgsrc="{{ asset('product_image/' . $gallerys->product_img) }}">
                                                        </div>
                                                    </div>
                                                    @empty
                                                    No Images
                                                    @endforelse

                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="lightbox-container">
                    <span class="material-icons-outlined lightbox-btn left" id="left">
                        <i class="fa fa-angle-left"></i>

                    </span>
                    <span class="material-icons-outlined lightbox-btn right" id="right">

                        <i class="fa fa-angle-right"></i>
                    </span>
                    <span class="close" id="close"><i class="fa fa-xmark"></i></span>
                    <div class="lightbox-image-wrapper">
                        <img alt="lightboximage" class="lightbox-image">
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
{{-- Filter End --}}



</div>
</div>
</div>





@endsection
@section('script_js')

<script>
    @if ($deal)
        @php
        // $date =    $deal->expire_date->format('M d,y')
        @endphp
    // Set the date we're counting down to
    var countDownDate = new Date("{{ $deal->expire_date }} {{ $deal->expire_time }}").getTime();
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get today's date and time
      var now = new Date().getTime();
    
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
    
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
      // Display the result in the element with id="demo"
      document.getElementById("clock").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";
    
      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
    @endif
    </script>

<script>
    $('#dealslide').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});
    /*gallerygallery*/
     
// Much of this code is not from me. I got a good chunk of the functionality from a tutorial I can't remember. I added the animations cause I'm tired of easy-to-implement galleries always looking dull. Thanks for looking! If you end up making any upgrades to the code, please let me know and I'll implement them here. Thanks!
// query selectors

const lightboxEnabled = document.querySelectorAll('.lightbox-enabled');
const lightboxArray = Array.from(lightboxEnabled);
const lastImage = lightboxArray.length-1;
const lightboxContainer = document.querySelector('.lightbox-container');
const lightboxImage = document.querySelector('.lightbox-image');
const lightboxBtns = document.querySelectorAll('.lightbox-btn');
const lightboxBtnRight = document.querySelector('#right');
const lightboxBtnLeft = document.querySelector('#left');
const close = document.querySelector('#close');
let activeImage;
// Functions
const showLightBox = () => {lightboxContainer.classList.add('active')}

const hideLightBox = () => {lightboxContainer.classList.remove('active')}

const setActiveImage = (image) => {
lightboxImage.src = image.dataset.imgsrc;
activeImage= lightboxArray.indexOf(image);
}

const transitionSlidesLeft = () => {
  lightboxBtnLeft.focus();
  $('.lightbox-image').addClass('slideright'); 
   setTimeout(function() {
  activeImage === 0 ? setActiveImage(lightboxArray[lastImage]) : setActiveImage(lightboxArray[activeImage-1]);
}, 250); 


  setTimeout(function() {
    $('.lightbox-image').removeClass('slideright');
}, 500);   
}

const transitionSlidesRight = () => {
 lightboxBtnRight.focus();
$('.lightbox-image').addClass('slideleft');  
  setTimeout(function() {
   activeImage === lastImage ? setActiveImage(lightboxArray[0]) : setActiveImage(lightboxArray[activeImage+1]);
}, 250); 
  setTimeout(function() {
    $('.lightbox-image').removeClass('slideleft');
}, 500);  
}

const transitionSlideHandler = (moveItem) => {
  moveItem.includes('left') ? transitionSlidesLeft() : transitionSlidesRight();
}

// Event Listeners
lightboxEnabled.forEach(image => {
   image.addEventListener('click', (e) => {
    showLightBox();
    setActiveImage(image);
    })                     
    })
lightboxContainer.addEventListener('click', () => {hideLightBox()})
close.addEventListener('click', () => {hideLightBox()})
lightboxBtns.forEach(btn => {
btn.addEventListener('click', (e) => {
e.stopPropagation();
  transitionSlideHandler(e.currentTarget.id);
})
})

lightboxImage.addEventListener('click', (e) => {
e.stopPropagation();

})



/*gallerygallery*/


   
  
    // @if ($deal != '') 
   if ($("#clock").length) {
        $('#clock').countdown('2022-06-20', function(event) {
            var $this = $(this).html(event.strftime('' +
                '<div class="box"><div>%m</div> <span>month</span> </div>' +
                '<div class="box"><div>%D</div> <span>Days</span> </div>' +
                '<div class="box"><div>%H</div> <span>Hours</span> </div>' +
                '<div class="box"><div>%M</div> <span>Mins</span> </div>' +
                '<div class="box"><div>%S</div> <span>Secs</span> </div>'));
        });
    }
//    @endif
// @auth

// @endauth
</script>
<script>

var page = 1;
    $(document).on('click', '.loadMore_btn', function(event){
    page++;
    loadMoreData(page)
 });

function loadMoreData(page){
     $('.loadMore_btn').hide();
    $('.load_image').show();
    $.ajax({
        url:'?page=' + page,
        type:'get',
    })
    .done(function(data){
        if(data.html == ""){
         $('.loadMore_btn').hide();
        $('.load_image').hide();
        $('.no_data').show();
           
            return;
        }
        $('#ajax-data').append(data.html);
        $('.load_image').hide();
        $('.loadMore_btn').show();
    })
}


@auth
@if (session('orderPlace'))
   Swal.fire(
     'Thanks',
    'Your order is placed order #{{session("orderPlace")}}',
     'success'
   )
   @endif
    
$.fn.cornerpopup({
variant: 5,
slide: 1,
displayOnce : 1,
position : 'left',
timeOut : '10',
text2 : '<h6><span style="color:#ef4836">Hey,</span> {{Auth()->user()->name}}</h6>Welcome to {{config('app.name')}}',
colors : '#ef4836',
});
@endauth
</script>
@endsection
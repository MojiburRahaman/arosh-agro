<!doctype html>
<html class="no-js" lang="en">

    <head>


     {{--    Start --}}

    <title>@yield('title',$setting->meta_title)</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="title" content="@yield('title',$setting->meta_title) ">
    <meta name="og:title" content="@yield('title',$setting->meta_title) ">
    <meta name="keyword" content="@yield('meta_keyword',$setting->meta_keyword)">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="description" content="@yield('meta_description',$setting->meta_description)">
    <meta property="og:description" content="@yield('meta_description',$setting->meta_description)" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{ $setting->meta_title }}" />
    @yield('social_thumbnail')

    <link rel="shortcut icon" type="image/png" href="{{ asset('logo/'.$setting->site_logo) }}">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Average|Droid+Serif:400,700|Libre+Baskerville:400,400i,700|Open+Sans:300,400,600,700,800|Oswald:300,400,700|Raleway:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext' type='text/css' media='all' />

    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    {{-- galler --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    
    <link rel='stylesheet' href="{{ asset('front/css/layout.css') }}" type='text/css' media='all' />
    <link rel="stylesheet" href="{{asset('front/css/corner-popup.min.css')}}">
    
    <link rel='stylesheet' href="{{ asset('front/jss/vendor/revslider/settings.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ asset('front/jss/vendor/woo/woocommerce-layout.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ asset('front/jss/vendor/woo/woocommerce-smallscreen.css') }}" type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' href="{{ asset('front/jss/vendor/woo/woocommerce.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ asset('front/css/fontello/css/fontello.css') }}" type='text/css' media='all' />
    <link rel="stylesheet" href="{{asset('front/css/corner-popup.min.css')}}">
    
    <link rel='stylesheet' href="{{ asset('front/css/core.animation.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ asset('front/css/shortcodes.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ asset('front/css/style.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ asset('front/css/theme.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ asset('front/jss/vendor/woo/plugin.woocommerce.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ asset('front/css/custom.css') }}" type='text/css' media='all' /> 
    <link rel='stylesheet' href="{{ asset('front/css/bootstrap.min.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ asset('front/jss/vendor/comp/comp.min.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ asset('front/jss/vendor/swiper/swiper.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{ asset('front/css/responsive.css') }}" type='text/css' media='all' />
    
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" rel="stylesheet">
    {{-- Filter --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- Filter --}}
    
   

       {{--  end --}}
       @yield('cssScript')
    </head>
@if(Route::is('Frontendhome'))

<body class="index home page body_style_wide body_filled article_style_stretch layout_single-standard template_single-standard scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide vc_responsive">
@else
<body class="archive shoppg post-type-archive post-type-archive-product woocommerce woocommerce-page body_style_wide body_filled article_style_stretch layout_excerpt template_excerpt scheme_original top_panel_show top_panel_above sidebar_show sidebar_left sidebar_outer_hide vc_responsive">
    @endif

    

    <a id="toc_home" class="sc_anchor" title="Home" data-description="&lt;i&gt;Return to Home&lt;/i&gt; - &lt;br&gt;navigate to home page of the site" data-icon="icon-home" data-url="{{ url('/') }}" data-separator="yes"></a>
<a id="toc_top" class="sc_anchor" title="To Top" data-description="&lt;i&gt;Back to top&lt;/i&gt; - &lt;br&gt;scroll to top of the page" data-icon="icon-double-up" data-url="" data-separator="yes"></a>
<div class="body_wrap">
    <div class="page_wrap">
        <div class="top_panel_fixed_wrap"> </div>
        <header class="top_panel_wrap top_panel_style_4 scheme_original d-none d-lg-block">
            <div class="top_panel_wrap_inner top_panel_inner_style_4 top_panel_position_above">
                <div class="top_panel_middle">
                    <div class="content_wrap">
                        <div class="contact_logo">
                            <div class="logo">
                              
                                <a href="{{route('Frontendhome')}}">
                                    @isset($setting->site_logo)
                                    <img src="{{ asset('logo/'.$setting->site_logo) }}" class="logo_main" alt="{{config('app.name')}}" width="239" height="59">
                                   @endisset
                                </a>
                            </div>
                        </div>

                        <div class="contact_field contact_cart">
                           
                            <a href="#" class="top_panel_cart_button text-center " data-items="0" data-summa="&#036;0.00">
                                <span style="
                                    font-size: 20px;" class="contact_icon icon-1 text-light mr-2 "></span>
 
                                <span class="contact_label contact_cart_label">cart:</span>
                                <span class="contact_cart_totals"> 
                                    <span class="cart_items">{{ cart_total_product() }} Items  </span>
                                   {{--  <span class="cart_summa">&#36;0.00</span> --}}
                                </span>
                            </a>
                            
                                            <ul class="d-flex account_login-area">
                    @auth
                    <li>
                        <a href="{{route('FrontendProfile')}}">
                            <i class="fa fa-user "><span class="pl-2">Profile</span></i>
                        </a>
                    </li>
                    @else
                    <li><a style="font-size: 15px !important" href="{{ route('login') }}"> Login/Register </a></li>
                    @endauth
                </ul>
                <style>
                    .sidebar_cart{
                        background: white !important
                    }
                </style>
                            <ul class="widget_area sidebar_cart sidebar">
                                <li>
                                    <div class="widget woocommerce widget_shopping_cart">
                                        <div class="hide_cart_widget_if_empty">
                                            <div class="widget_shopping_cart_content">
                                    
                                        <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                            @forelse (cart_product_view() as $cart_product)
                                            @php
                                             session()->put('mini-cart','true');
                                            $Attribute =$cart_product->Product->Attribute
                                            ->where('color_id',$cart_product->color_id)
                                            ->where('size_id',$cart_product->size_id)->first();
                                            @endphp
                                                            <li class="woocommerce-mini-cart-item mini_cart_item mb-2">
                                                        <a href="{{route('CartDelete',$cart_product->id)}}" class="remove remove_from_cart_button" >
                                                            ×
                                                        </a>		
                                                        <a href="{{ route('SingleProductView', $cart_product->Product->slug) }}">
                                                                <img src="{{ asset('thumbnail_img/' . $cart_product->Product->thumbnail_img) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{  $cart_product->Product->title }}	" loading="lazy" srcset="{{ asset('thumbnail_img/' . $cart_product->Product->thumbnail_img) }}" sizes="(max-width: 300px) 100vw, 300px" width="300" height="300">
                                                              <h6> {{  $cart_product->Product->title }}		</h6> 	
                                                            </a>
                                                                <span class="quantity">
                                                                    {{ $cart_product->quantity }} × 
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <bdi>
                                                                            <span class="woocommerce-Price-currencySymbol">
                                                                                ৳

                                                                </span>
                                                                @php
                                                                $regular_price =$Attribute->regular_price;
                                                                $sell_price = $Attribute->sell_price;
                                                                @endphp
                                                                {{($sell_price == '')? $regular_price : $sell_price}}
                                                                </bdi>
                                                            </span>
                                                            </span>				
                                                              </li>
                                                            @empty
                                                            <li>


	<p style="font-size: 13px !important" class="text-dark ml-2">No products in the cart.</p>



                                                            </li>
                                                         @endforelse
                                                        </ul>
                                    
                                        {{-- <p class="woocommerce-mini-cart__total total"> --}}
                                            @if (session()->get('mini-cart'))
                                        <a href="{{route('CartView')}}" style="width:100% !important" class="btn btn-success text-light mt-4 mb-2" width-"100%">View
                                            Cart</a>
                                    @endif
                                    </div></div></div></li>
                            </ul>
                        </div>
                        <div class="menu_main_wrap">
                            <nav class="menu_main_nav_area menu_hover_fade">
                                <ul id="menu_main" class="menu_main_nav">
                                    <li class="menu-item current-menu-ancestor current-menu-parent  {{ route('Frontendhome') == url()->current() ? 'active' : '' }}"><a href="{{ route('Frontendhome') }}"><span>Home</span></a>
                                    
                                    </li>
                                    <li class="menu-item menu-item-has-children"><a href="#"><span>About us</span></a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="{{ route('FrontendAbout') }}"><span>About</span></a></li>
                                            <li class="menu-item"><a href="{{ route('sisterconcern') }}"><span>Our Sister Concerns</span></a></li>
                                            @forelse ($pages as $page)
                                                
                                            <li class="menu-item"><a href="{{route('DynamicPage',$page->slug)}}"><span>{{ $page->heading }}</span></a></li>
                                            @empty
                                                
                                            @endforelse
                                           
                                        </ul>
                                    </li>
                                  

                                     <li class="menu-item"><a href="{{ route('service') }}"><span>Services</span></a></li>
                                     <li class="menu-item"><a href="{{ route('allproducts') }}"><span>Products</span></a></li>

                                    
                                  
                                   
                                    <li class="menu-item menu-item-has-children"><a href="{{ route('FrontndContact') }}"><span>Contact Us</span></a>
                                   
                                           
                                        
                                    </li>
                                 

                                     <li class="menu-item"><a href="{{route('CartView')}}"><span>Cart</span></a></li>
                                    
                                </ul>
                               
                           
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="header_mobile d-lg-none d-md-block">
            
           
            
            <div class="header-mobile ">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center mt-3 mb-3">
                            @auth
    
                            <a style="font-size: 15px" href="{{route('FrontendProfile')}}">
                                <i class="fa fa-user "><span class="pl-2">Profile</span></i>
                            </a>
                                @else
                                <a style="font-size: 15px" href="{{route('login')}}">
                                    <i class="fa fa-user "><span class="pl-2">Login/Register</span></i>
                                </a>
                            @endauth
                        </div>
                        </div>
                </div>
<div class="content_wrap">
    <div class="menu_button icon-menu"></div>
    <div class="logo">
        <a href="{{route('Frontendhome')}}">
            <img style="width:100% !important" src="{{ asset('logo/'.$setting->site_logo) }}" class="logo_main" alt="{{config('app.name')}}" >
           
        </a>
    </div>
    <div class="menu_main_cart top_panel_icon">
    <a href="#" class="top_panel_cart_button" >
    <span class="contact_icon icon-1"></span>
    {{-- <span class="contact_label contact_cart_label">cart:</span> --}}
    {{-- <span class="contact_cart_totals"> --}}
    {{-- <span class="cart_items">1 Item</span><span class="cart_summa">$22.90</span> --}}
    {{-- </span> --}}
    </a>
    <ul class="widget_area sidebar_cart sidebar"><li>
    <div class="widget woocommerce widget_shopping_cart"><div class="hide_cart_widget_if_empty"><div class="widget_shopping_cart_content">
    
        <ul class="woocommerce-mini-cart cart_list product_list_widget ">
            @forelse (cart_product_view() as $cart_product)
            @php
             session()->put('mini-cart','true');
            $Attribute =$cart_product->Product->Attribute
            ->where('color_id',$cart_product->color_id)
            ->where('size_id',$cart_product->size_id)->first();
            @endphp
                            <li class="woocommerce-mini-cart-item mini_cart_item mb-2">
                        <a href="{{route('CartDelete',$cart_product->id)}}" class="remove remove_from_cart_button" >
                            ×
                        </a>		
                        <a href="{{ route('SingleProductView', $cart_product->Product->slug) }}">
                                <img src="{{ asset('thumbnail_img/' . $cart_product->Product->thumbnail_img) }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{  $cart_product->Product->title }}	" loading="lazy" srcset="{{ asset('thumbnail_img/' . $cart_product->Product->thumbnail_img) }}" sizes="(max-width: 300px) 100vw, 300px" width="300" height="300">
                              <h6> {{  $cart_product->Product->title }}		</h6> 	
                            </a>
                                <span class="quantity">
                                    {{ $cart_product->quantity }} × 
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">
                                                ৳

                                </span>
                                @php
                                $regular_price =$Attribute->regular_price;
                                $sell_price = $Attribute->sell_price;
                                @endphp
                                {{($sell_price == '')? $regular_price : $sell_price}}
                                </bdi>
                            </span>
                            </span>				
                              </li>
                            @empty
                            <li>


<p style="font-size: 13px !important" class="text-dark ml-2">No products in the cart.</p>



                            </li>
                         @endforelse</ul>
                         @if (session()->get('mini-cart'))
                         <a href="{{route('CartView')}}" style="width:100% !important" class="btn btn-success text-light mt-4 mb-2" width-"100%">View
                             Cart</a>
                     @endif 
        
    
    </div></div></div></li></ul> </div>
    </div>
    
    <div class="mask"></div>
    
            </div>
     
            <div class="side_wrap">
                <div class="close">Close</div>
                <div class="panel_top">
                    <nav class="menu_main_nav_area">
                        <ul id="menu_mobile" class="menu_main_nav">
                            <li class="menu-item current-menu-ancestor current-menu-parent  {{ route('Frontendhome') == url()->current() ? 'active' : '' }} "><a href="{{ route('Frontendhome') }}"><span>Home</span></a>
                               
                            </li>
                                <li class="menu-item menu-item-has-children"><a href="#"><span>About us</span></a>
                                        <ul class="sub-menu">
                                            
                                            <li class="menu-item"><a href="{{route('FrontendAbout')}}"><span>About Arosh Agro</span></a></li>
                                            <li class="menu-item"><a href="{{ route('sisterconcern') }}"><span>Our Sister Concerns</span></a></li>
                                            @forelse ($pages as $page)
                                                
                                            <li class="menu-item"><a href="{{route('DynamicPage',$page->slug)}}"><span>{{ $page->heading }}</span></a></li>
                                            @empty
                                                
                                            @endforelse

                                           
                                        </ul>
                                </li>
                                   <li class="menu-item menu-item-has-children"><a href="#"><span>Our Services</span></a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="{{ route('service') }}"><span>Home Delivery</span></a></li>
                                            
                                           
                                        </ul>
                                    </li>
                          
                                     <li class="menu-item"><a href="{{ route('allproducts') }}"><span>Products</span></a></li>

                                                 
                                    <li class="menu-item menu-item-has-children"><a href="#"><span>Gallery</span></a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="{{ route('ImageGallery') }}"><span>Image Gallery</span></a></li>

                                             <li class="menu-item"><a href="{{ route('VideoGallery') }}"><span>Video Gallery</span></a></li>
                                            
                                           
                                        </ul>
                                    </li>
                                   
                                    <li class="menu-item"><a href="{{ route('FrontndContact') }}"><span>Contact Us</span></a>
            
                                    </li>

                                     <li class="menu-item"><a href="{{route('CartView')}}"><span>Cart</span></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="panel_bottom">
                </div>
            </div>
            <div class="mask"></div>
        </div>
        <!-- search-form here -->
        <!-- header-area start -->

        <!-- header-area end -->
        @yield('content')
        <!-- start social-newsletter-section -->
        <footer class="call_wrap">
            <div class="call_wrap_inner">
                <div class="content_wrap">
                    <div class="row">
                        <div class="col-lg-8 col-sm-6 col-12">
                            <h2>Where to Buy</h2>
                            <div>Our Products are currently available in online, headoffice and selling points</div>
                    </div>
                        <div class="col-lg-4 col-sm-6 col-12 mt-3">
                            
                            <a class="sc_button sc_button_size_large sc_button_style_border" href="{{ route('spoints') }}">Store Locator</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <style>
            .footer_link{
                color:  grey !important;
            }
            .footer_link:hover{
                color:  #0C743F !important;
            }
        </style>
        <footer class="footer_wrap widget_area scheme_original">
            <div class="footer_wrap_inner widget_area_inner">
                <div class="content_wrap">
                    <div class="columns_wrap">
                        <aside class="column-1_4 widget widget_nav_menu">
                            <h4 class="widget_title">About Us</h4>
                            <div class="menu-footer-menu-1-container">
                                <ul id="menu-footer-menu-1" class="menu">
                                    <li class="menu-item"><a class="footer_link" href="{{route('FrontendAbout')}}">About Arosh Agro</a></li>
                                    <li class="menu-item"><a class="footer_link" href="{{ route('sisterconcern') }}">Our Sister Concerns</a></li>
                                    @forelse ($pages as $page)
                                                
                                    <li class="menu-item"><a class="footer_link"  href="{{route('DynamicPage',$page->slug)}}"><span>{{ $page->heading }}</span></a></li>
                                    @empty
                                        
                                    @endforelse
                                    <style>
                                        .subscribe_input{
                                            border: none !important;
                                            width: 80%;
                                        font-size: 13px;
                                        padding: 5px 5px !important;
                                        }
                                    </style>
                                        <form action="{{ route('FrontendNewsLetter') }}" method="POST" id="SubscribeForm">
                                    <div class="input-group mt-4">
                                        @csrf
                                            <input required name="email" type="email" class="form-control p-0 subscribe_input" placeholder="Subscribe">
                                            <button type="submit" class="btn-sm text-light">
                                                <svg  xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                width="20" height="20"
                                                viewBox="0 0 50 50"
                                                style=" fill:#fff;"><path d="M 44.376953 5.9863281 C 43.889905 6.0076957 43.415817 6.1432497 42.988281 6.3144531 C 42.565113 6.4845113 40.128883 7.5243408 36.53125 9.0625 C 32.933617 10.600659 28.256963 12.603668 23.621094 14.589844 C 14.349356 18.562196 5.2382813 22.470703 5.2382812 22.470703 L 5.3046875 22.445312 C 5.3046875 22.445312 4.7547875 22.629122 4.1972656 23.017578 C 3.9185047 23.211806 3.6186028 23.462555 3.3730469 23.828125 C 3.127491 24.193695 2.9479735 24.711788 3.015625 25.259766 C 3.2532479 27.184511 5.2480469 27.730469 5.2480469 27.730469 L 5.2558594 27.734375 L 14.158203 30.78125 C 14.385177 31.538434 16.858319 39.792923 17.402344 41.541016 C 17.702797 42.507484 17.984013 43.064995 18.277344 43.445312 C 18.424133 43.635633 18.577962 43.782915 18.748047 43.890625 C 18.815627 43.933415 18.8867 43.965525 18.957031 43.994141 C 18.958531 43.994806 18.959437 43.99348 18.960938 43.994141 C 18.969579 43.997952 18.977708 43.998295 18.986328 44.001953 L 18.962891 43.996094 C 18.979231 44.002694 18.995359 44.013801 19.011719 44.019531 C 19.043456 44.030655 19.062905 44.030268 19.103516 44.039062 C 20.123059 44.395042 20.966797 43.734375 20.966797 43.734375 L 21.001953 43.707031 L 26.470703 38.634766 L 35.345703 45.554688 L 35.457031 45.605469 C 37.010484 46.295216 38.415349 45.910403 39.193359 45.277344 C 39.97137 44.644284 40.277344 43.828125 40.277344 43.828125 L 40.310547 43.742188 L 46.832031 9.7519531 C 46.998903 8.9915162 47.022612 8.334202 46.865234 7.7402344 C 46.707857 7.1462668 46.325492 6.6299361 45.845703 6.34375 C 45.365914 6.0575639 44.864001 5.9649605 44.376953 5.9863281 z M 44.429688 8.0195312 C 44.627491 8.0103707 44.774102 8.032983 44.820312 8.0605469 C 44.866523 8.0881109 44.887272 8.0844829 44.931641 8.2519531 C 44.976011 8.419423 45.000036 8.7721605 44.878906 9.3242188 L 44.875 9.3359375 L 38.390625 43.128906 C 38.375275 43.162926 38.240151 43.475531 37.931641 43.726562 C 37.616914 43.982653 37.266874 44.182554 36.337891 43.792969 L 26.632812 36.224609 L 26.359375 36.009766 L 26.353516 36.015625 L 23.451172 33.837891 L 39.761719 14.648438 A 1.0001 1.0001 0 0 0 38.974609 13 A 1.0001 1.0001 0 0 0 38.445312 13.167969 L 14.84375 28.902344 L 5.9277344 25.849609 C 5.9277344 25.849609 5.0423771 25.356927 5 25.013672 C 4.99765 24.994652 4.9871961 25.011869 5.0332031 24.943359 C 5.0792101 24.874869 5.1948546 24.759225 5.3398438 24.658203 C 5.6298218 24.456159 5.9609375 24.333984 5.9609375 24.333984 L 5.9941406 24.322266 L 6.0273438 24.308594 C 6.0273438 24.308594 15.138894 20.399882 24.410156 16.427734 C 29.045787 14.44166 33.721617 12.440122 37.318359 10.902344 C 40.914175 9.3649615 43.512419 8.2583658 43.732422 8.1699219 C 43.982886 8.0696253 44.231884 8.0286918 44.429688 8.0195312 z M 33.613281 18.792969 L 21.244141 33.345703 L 21.238281 33.351562 A 1.0001 1.0001 0 0 0 21.183594 33.423828 A 1.0001 1.0001 0 0 0 21.128906 33.507812 A 1.0001 1.0001 0 0 0 20.998047 33.892578 A 1.0001 1.0001 0 0 0 20.998047 33.900391 L 19.386719 41.146484 C 19.35993 41.068197 19.341173 41.039555 19.3125 40.947266 L 19.3125 40.945312 C 18.800713 39.30085 16.467362 31.5161 16.144531 30.439453 L 33.613281 18.792969 z M 22.640625 35.730469 L 24.863281 37.398438 L 21.597656 40.425781 L 22.640625 35.730469 z"></path></svg>
                                            
                                            </button>
                                        </div>
                                    </form>
                                 
                                </ul>
                            </div>
                        </aside>
                        <aside class="column-1_4 widget widget_nav_menu">
                            <h4 class="widget_title">Our Services</h4>
                            <div class="menu-footer-menu-2-container">
                                <ul id="menu-footer-menu-2" class="menu">
                                    @forelse ($services as $service)
                                        
                                    <li class="menu-item"><a class="footer_link" href="{{ route('ServiceView',$service->heading) }}">{{ $service->heading }}</a></li>
                                    @empty
                                        
                                    @endforelse
                                   
                                </ul>
                            </div>
                        </aside>
                        <aside class="column-1_4 widget widget_nav_menu">
                            <h4 class="widget_title">Gallery</h4>
                            <div class="menu-footer-menu-3-container">
                                <ul id="menu-footer-menu-3" class="menu">
                                    <li class="menu-item"><a class="footer_link" href="{{ route('ImageGallery') }}">Image Gallery</a></li>
                                    <li class="menu-item"><a class="footer_link" href="{{ route('VideoGallery') }}">Video Gallery</a></li>
                                   
                                </ul>
                            </div>
                        </aside>
                        <aside class="column-1_4 widget widget_nav_menu">
                            <h4 class="widget_title">Contact Us</h4>
                            <div class="menu-footer-menu-4-container">
                                <ul id="menu-footer-menu-4" class="menu">
                                    
                                      <li class="menu-item"><a class="footer_link" href="{{ route('FrontndContact') }}"><span>Contact Details</span></a></li>
                                            <li class="menu-item"><a  class="footer_link" href="{{ route('spoints') }}"><span>Selling Points </span></a></li>
                                            <ul class="socil-icon mt-4 mt-lg-2">
                                                @if($setting->facebook_link != '')
                                                    
                                                <li class="pr-2"> &nbsp; <a target="_blank" href="{{ $setting->facebook_link }}">
                                                    <i class="icon-facebook"></i></a>
                                                </li>
                                                @endif
                                                @if($setting->instagram_link != '')
                                                    
                                                <li> &nbsp; <a href="{{ $setting->instagram_link }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                    width="20" height="24"
                                                    viewBox="0 0 24 24"
                                                    style=" fill:#fff;">    <path d="M 8 3 C 5.243 3 3 5.243 3 8 L 3 16 C 3 18.757 5.243 21 8 21 L 16 21 C 18.757 21 21 18.757 21 16 L 21 8 C 21 5.243 18.757 3 16 3 L 8 3 z M 8 5 L 16 5 C 17.654 5 19 6.346 19 8 L 19 16 C 19 17.654 17.654 19 16 19 L 8 19 C 6.346 19 5 17.654 5 16 L 5 8 C 5 6.346 6.346 5 8 5 z M 17 6 A 1 1 0 0 0 16 7 A 1 1 0 0 0 17 8 A 1 1 0 0 0 18 7 A 1 1 0 0 0 17 6 z M 12 7 C 9.243 7 7 9.243 7 12 C 7 14.757 9.243 17 12 17 C 14.757 17 17 14.757 17 12 C 17 9.243 14.757 7 12 7 z M 12 9 C 13.654 9 15 10.346 15 12 C 15 13.654 13.654 15 12 15 C 10.346 15 9 13.654 9 12 C 9 10.346 10.346 9 12 9 z"></path></svg>    
                                                </a>
                                                </li>
                                                @endif
                                                @if($setting->youtube_link != '')

                                                <li> &nbsp; <a href="{{ $setting->youtube_link }}">
                                                    <i class="icon-youtube"></i></a>
                                                </li>
                                                @endif
                                                @if($setting->twitter_link != '')

                                                <li> &nbsp; <a href="{{ $setting->twitter_link }}">
                                                    <i class="icon-twitter"></i></a>
                                                </li>
                                                @endif
                                                
                                            </ul>
                                </ul>
                            </div>
                        </aside>
                        
                    </div>
                </div>
            </div>
        </footer>
      
      <div class="copyright_wrap copyright_style_menu scheme_original">
            <div class="copyright_wrap_inner">
                <div class="content_wrap">
                    <div class="  ">
                        <p class="text-center">Copyright © {{now()->format('Y')}} {{config('app.name')}} All rights reserved.
                        
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





        <a href="#" class="scroll_to_top icon-up text-light" title="Scroll to top"></a>
<div class="custom_html_section"></div>


<script type='text/javascript' src="{{ asset('front/jss/vendor/jquery/jquery.js') }}"></script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

          <script type='text/javascript' src="{{ asset('front/js/bootstrap.min.js') }}"></script>
     

 
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
               <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                   <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="   sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
      

{{--      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script> --}}

          

<script type='text/javascript' src="{{ asset('front/jss/vendor/jquery/jquery-migrate.min.js') }}"></script>
{{-- <script type='text/javascript' src="{{ asset('front/jss/custom/core.init.js') }}"></script> --}}

<script type='text/javascript' src="{{ asset('front/jss/custom/custom.js') }}"></script>
<script type='text/javascript' src='{{ asset('front/jss/vendor/esg/jquery.themepunch.tools.min.js') }}'></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/revslider/jquery.themepunch.revolution.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/revslider/extensions/revolution.extension.actions.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/revslider/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/revslider/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/revslider/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/modernizr.min.js') }}"></script>
{{-- <script type='text/javascript' src="{{ asset('front/jss/vendor/jquery/js.cookie.min.js') }}"></script> --}}
<script type='text/javascript' src="{{ asset('front/jss/vendor/superfish.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/custom/core.utils.js') }}"></script>
{{-- <script type='text/javascript' src="{{ asset('front/jss/custom/core.init.js') }}"></script> --}}
<script type='text/javascript' src="{{ asset('front/jss/custom/init.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/custom/core.debug.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/custom/embed.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/custom/shortcodes.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/comp/comp_front.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/ui/core.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/ui/widget.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/ui/tabs.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/isotope.pkgd.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/swiper/swiper.js') }}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 

 
 
        <!-- isotope.pkgd.min.js -->
        
        <script src="{{ asset('front/css/corner-popup.min.css') }}"></script>
        <script src="{{ asset('front/js/isotope.pkgd.min.js') }}"></script>
        <!-- imagesloaded.pkgd.min.js -->
        <script src="{{ asset('front/js/imagesloaded.pkgd.min.js') }}"></script>
        <!-- jquery.zoom.min.js -->
        <script src="{{ asset('front/js/jquery.zoom.min.js') }}"></script>
        <!-- countdown.js -->
        <script src="{{ asset('front/js/countdown.js') }}"></script>
        <!-- swiper.min.js -->
        <script src="{{ asset('front/js/swiper.min.js') }}"></script>
        {{-- <script src="{{ asset('front/js/price_range_script.js') }}"></script> --}}
        <!-- metisMenu.min.js -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- <script src="{{ asset('front/js/metisMenu.min.js') }}"></script> --}}
        <script src="{{ asset('front/js/test.js') }}"></script>
        <!-- mailchimp.js -->
        {{-- <script src="{{ asset('front/js/mailchimp.js') }}"></script> --}}
        <!-- jquery-ui.min.js -->
        <script src="{{ asset('front/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('front/js/corner-popup.min.js') }}"></script>
        <!-- main js -->

        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        
        <script src="{{ asset('front/js/selectsearch.js') }}"></script>
        <script type='text/javascript' src="{{ asset('front/jss/custom/core.init.js') }}"></script>
        <script src="{{ asset('front/js/scripts.js') }}"></script>

        @yield('script_js')
     
        <script>
            
   jQuery(document).ready(function($) {
        $("#SubscribeForm").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var actionUrl = form.attr('action');
    $.ajax({
    type: "POST",
    url: "{{route('FrontendNewsLetter')}}",
    data: form.serialize(), // serializes the form's elements.
    success: function(data)
    {
        document.getElementById("SubscribeForm").reset(); 
        Command: toastr["success"](data.subscribe)
    },
    error:function (response) {
          Command: toastr["warning"](response.responseJSON.errors.email)
        }
});
});
    });
            @guest
        $.fn.cornerpopup({
    variant: 1,
    slide: 1,
    popupImg: '{{asset('icon/unnamed.png')}}',
    position : 'left',
    header : '<h6 class="text-dark">Continue With Google</h6>', 
    link1: '{{route('GoogleRegister')}}',
    colors : '#99CB55',
    delay:70,    
    slide:true,
    button1 :'<span class="text-light">Continue</span>',
});

             
        @endguest
        </script>

    </body>

</html>



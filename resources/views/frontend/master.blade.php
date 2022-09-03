<!doctype html>
<html class="no-js" lang="en">

    <head>


     {{--    Start --}}

         <title>@yield('title',$setting->meta_title)</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="title" content="@yield('title',$setting->meta_title) ">
    <meta name="keyword" content="@yield('meta_keyword',$setting->meta_keyword)">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="description" content="@yield('meta_description',$setting->meta_description)">

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
        <header class="top_panel_wrap top_panel_style_4 scheme_original">
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

                                    
                                    {{-- <li class="menu-item menu-item-has-children"><a href="#"><span>Gallery</span></a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="{{ route('ImageGallery') }}"><span>Image Gallery</span></a></li>

                                             <li class="menu-item"><a href="{{ route('VideoGallery') }}"><span>Video Gallery</span></a></li>
                                            
                                           
                                        </ul>
                                    </li> --}}
                                   
                                    <li class="menu-item menu-item-has-children"><a href="{{ route('FrontndContact') }}"><span>Contact Us</span></a>
                                     {{--    <ul class="sub-menu">
                                            <li class="menu-item"><a href=""><span>Contact Details </span></a></li>
                                            
                                            <li class="menu-item"><a href=""><span>Selling Points </span></a></li>
                                            </ul> --}}
                                           
                                        
                                    </li>
                                    {{-- <li class="menu-item"><a href="{{ route('spoints') }}"><span>Selling Points</span></a></li> --}}

                                     <li class="menu-item"><a href="{{route('CartView')}}"><span>Cart</span></a></li>
                                    
                                </ul>
                               
                           
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="header_mobile">
            
           
            
            <div class="header-mobile">
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
    <div class="side_wrap">
    <div class="close">Close</div>
    <div class="panel_top">
    <nav class="menu_main_nav_area">
    <ul id="menu_mobile" class="menu_main_nav"><li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-38"><a href="#"><span class="open_child_menu"></span><span>Home</span></a>
    <ul class="sub-menu">
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-129 current_page_item menu-item-181"><a href="https://dairy-farm.ancorathemes.com/" aria-current="page"><span>Homepage 1</span></a></li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-179"><a href="https://dairy-farm.ancorathemes.com/homepage-2/"><span>Homepage 2</span></a></li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-180"><a href="https://dairy-farm.ancorathemes.com/homepage-3/"><span>Homepage 3</span></a></li>
    </ul>
    </li>
    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-39"><a href="#"><span class="open_child_menu"></span><span>About us</span></a>
    <ul class="sub-menu">
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-183"><a href="https://dairy-farm.ancorathemes.com/about-1/"><span>About 1</span></a></li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-182"><a href="https://dairy-farm.ancorathemes.com/about-2/"><span>About 2</span></a></li>
    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-329"><a href="#"><span class="open_child_menu"></span><span>Features</span></a>
    <ul class="sub-menu">
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-74"><a href="https://dairy-farm.ancorathemes.com/shortcodes/"><span>Shortcodes</span></a></li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a href="https://dairy-farm.ancorathemes.com/typography/"><span>Typography</span></a></li>
    </ul>
    </li>
    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-185"><a href="#"><span class="open_child_menu"></span><span>Tools</span></a>
    <ul class="sub-menu">
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-632"><a href="https://dairy-farm.ancorathemes.com/privacy-policy/"><span>Privacy Policy</span></a></li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-815"><a href="https://dairy-farm.ancorathemes.com/service-plus/"><span>Service plus</span></a></li>
    </ul>
    </li>
    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-330"><a href="#"><span class="open_child_menu"></span><span>Gallery</span></a>
    <ul class="sub-menu">
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-331"><a href="https://dairy-farm.ancorathemes.com/gallery-cobbles/"><span>Gallery Cobbles</span></a></li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-333"><a href="https://dairy-farm.ancorathemes.com/gallery-grid/"><span>Gallery Grid</span></a></li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-332"><a href="https://dairy-farm.ancorathemes.com/gallery-masonry/"><span>Gallery Masonry</span></a></li>
    </ul>
    </li>
    </ul>
    </li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184"><a href="https://dairy-farm.ancorathemes.com/farm/"><span>Farm</span></a></li>
    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-41"><a href="#"><span class="open_child_menu"></span><span>Blog</span></a>
    <ul class="sub-menu">
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-126"><a href="https://dairy-farm.ancorathemes.com/classic/"><span>Classic</span></a></li>
    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-127"><a href="#"><span class="open_child_menu"></span><span>Masonry</span></a>
    <ul class="sub-menu">
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-136"><a href="https://dairy-farm.ancorathemes.com/masonry-2-columns/"><span>Masonry 2 columns</span></a></li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-144"><a href="https://dairy-farm.ancorathemes.com/masonry-3-columns/"><span>Masonry 3 columns</span></a></li>
    </ul>
    </li>
    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-128"><a href="#"><span class="open_child_menu"></span><span>Portfolio</span></a>
    <ul class="sub-menu">
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-135"><a href="https://dairy-farm.ancorathemes.com/portfolio-2-columns/"><span>Portfolio 2 columns</span></a></li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-145"><a href="https://dairy-farm.ancorathemes.com/portfolio-3-columns/"><span>Portfolio 3 columns</span></a></li>
    </ul>
    </li>
    </ul>
    </li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-37"><a href="https://dairy-farm.ancorathemes.com/shop/"><span>Products</span></a></li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-168"><a href="https://dairy-farm.ancorathemes.com/our-recipes/"><span>Recipes</span></a></li>
    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-112"><a href="https://dairy-farm.ancorathemes.com/contacts/"><span>Contacts</span></a></li>
    </ul> </nav>
    </div>
    <div class="panel_bottom">
    </div>
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
                                   
                                    <li class="menu-item menu-item-has-children"><a href="{{ route('FrontndContact') }}"><span>Contact Us</span></a>
                                     {{--    <ul class="sub-menu">
                                             <li class="menu-item"><a href=""><span>Contact Details </span></a></li>
                                             </ul> --}}
                                          {{--   <li class="menu-item"><a href="{{ route('spoints') }}"><span>Selling Points </span></a></li> --}}
                                            
                                           
                                        
                                    </li>
                                          <li class="menu-item"><a href="{{ route('spoints') }}"><span>Selling Points</span></a></li>

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
{{--         <div class="search-area flex-style">
            <span class="closebar">Close</span>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 col-12">
                        <div class="search-form">
                            <form action="{{route('Frontendhome')}}">
                                <input name="search" type="text" placeholder="Search Here...">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
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
                                    <li class="menu-item"><a class="footer_link" href="recipes.html">Our Sister Concerns</a></li>
                                    @forelse ($pages as $page)
                                                
                                    <li class="menu-item"><a class="footer_link"  href="{{route('DynamicPage',$page->slug)}}"><span>{{ $page->heading }}</span></a></li>
                                    @empty
                                        
                                    @endforelse
                                 
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
                                    
                                </ul>
                            </div>
                        </aside>
                        {{-- <div class="container">

                            <div class="row ">
                                <div class="col-lg-6 col-sm-6 col-12 text-left">
                                    <div class="widget_inner">
                                        <div class="logo mt-0">
                                           <a href="{{route('Frontendhome')}}">
                                             <img src="{{ asset('logo/'.$setting->site_logo) }}" class="logo_main" alt="{{config('app.name')}}" width="74" height="74" >
         
                                           </a>
                                        </div>
                                     </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12 text-left">
                                    <div class="textwidget">
                                        <br> Email: {{$setting->email}}
                                        <br>
                                        <span >Phone: {{$setting->number}}</span>
                                        <br>
                                        <span>Adderess:</span>{{$setting->address}}
        
                                           
                                    </div>
                                    <div class="widget_inner mt-4">
                                        <div class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                                            <div class="sc_socials_item">
                                                <a href="#" target="_blank" class="social_icons social_twitter">
                                                    <span class="icon-twitter text-light"></span>
                                                </a>
                                            </div>
                                            <div class="sc_socials_item">
                                                      @if ($setting->facebook_link != '')
                                                <a href="{{$setting->facebook_link}}" target="_blank" class="social_icons social_facebook">
                                                    <span class="icon-facebook text-light"></span>
                                                </a>
                                                    @endif
        
         
                                            </div>
                                            <div class="sc_socials_item">
                                                <a href="#" target="_blank" class="social_icons social_gplus-1">
                                                    <span class="icon-gplus-1 text-light"></span>
                                                </a>
                                            </div>
                                            <div class="sc_socials_item">
                                                    @if ($setting->youtube_link != '')
                                                <a href="{{$setting->youtube_link}}" target="_blank" class="social_icons social_linkedin">
                                                    <span class="icon-youtube text-light"></span>
                                                </a> 
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <aside class="column-1_4 widget widget_socials">
                            <div class="widget_inner">
                               <div class="logo mt-0">
                                  <a href="{{route('Frontendhome')}}">
                                    <img src="{{ asset('logo/'.$setting->site_logo) }}" class="logo_main" alt="{{config('app.name')}}" width="74" height="74" >

                                  </a>
                               </div>
                            </div>
                        </aside>
                      
                        <aside class="column-1_4 widget widget_text">
                            <div class="textwidget">{{$setting->address}}
                                <br>
                                <span class="accent1">Phone: {{$setting->number}}</span>
                                 
                                <br> Email: {{$setting->email}}

                                   
                            </div>
                        </aside>
                        <aside class="column-1_4 widget widget_text">
                            <div class="textwidget"></div>
                        </aside>
                        <aside class="column-1_4 widget widget_socials">
                            <div class="widget_inner">
                                <div class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                                    <div class="sc_socials_item">
                                        <a href="#" target="_blank" class="social_icons social_twitter">
                                            <span class="icon-twitter text-light"></span>
                                        </a>
                                    </div>
                                    <div class="sc_socials_item">
                                              @if ($setting->facebook_link != '')
                                        <a href="{{$setting->facebook_link}}" target="_blank" class="social_icons social_facebook">
                                            <span class="icon-facebook text-light"></span>
                                        </a>
                                            @endif

 
                                    </div>
                                    <div class="sc_socials_item">
                                        <a href="#" target="_blank" class="social_icons social_gplus-1">
                                            <span class="icon-gplus-1 text-light"></span>
                                        </a>
                                    </div>
                                    <div class="sc_socials_item">
                                            @if ($setting->youtube_link != '')
                                        <a href="{{$setting->youtube_link}}" target="_blank" class="social_icons social_linkedin">
                                            <span class="icon-youtube text-light"></span>
                                        </a> 
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </aside> --}}
                    </div>
                </div>
            </div>
        </footer>
        <!-- end social-newsletter-section -->
        <!-- .footer-area start -->
        {{-- <div class="footer-area"> --}}
{{--             <div class="footer-top">
                <div class="container">
                    <div class="footer-top-item">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="footer-top-text text-center">
                                    <ul>
                                        <li><a href="{{route('Frontendhome')}}">home</a></li>
                                        <li><a href="">about us</a></li>
                                        <li><a href="{{route('Frontendshop')}}">shop</a></li>
                                        <li><a href="{{route('Frontendblog')}}">blog</a></li>
                                        <li><a href="">contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
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


        {{-- </div> --}}
        <!-- Messenger Chat plugin Code -->
{{-- 
        <div class="newsletter-overlay">
            <div id="newsletter-popup">
                <a href="#" class="popup-close">X</a>
                <div class="newsletter-in">
                    <h3>Join our Newsletter!</h3>
                    <form class="validate" method="post" action="{{route('FrontendNewsLetter')}}">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="email" placeholder="Enter Your Email Address..." autofocus
                                id="nsw_email" name="email" required="">
                        </div>
                        <div class="frm-submit">
                            <input type="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <!-- Your Chat plugin code -->
        <!-- Messenger Chat plugin Code -->
        <div id="fb-root"></div>

        <!-- Your Chat plugin code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

        <a href="#" class="scroll_to_top icon-up text-light" title="Scroll to top"></a>
<div class="custom_html_section"></div>

{{--         <script>
            
            var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "661548170721498");
  chatbox.setAttribute("attribution", "biz_inbox");
        </script>
        <!-- Your SDK code -->
        <script>
            window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v12.0'
    });
  };
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script> --}}

<script type='text/javascript' src="{{ asset('front/jss/vendor/jquery/jquery.js') }}"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

          <script type='text/javascript' src="{{ asset('front/js/bootstrap.min.js') }}"></script>
     

 
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
               <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                   <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="   sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      

{{--      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script> --}}

          

<script type='text/javascript' src="{{ asset('front/jss/vendor/jquery/jquery-migrate.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/custom/custom.js') }}"></script>
<script type='text/javascript' src='{{ asset('front/jss/vendor/esg/jquery.themepunch.tools.min.js') }}'></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/revslider/jquery.themepunch.revolution.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/revslider/extensions/revolution.extension.actions.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/revslider/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/revslider/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/revslider/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/modernizr.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/jquery/js.cookie.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/vendor/superfish.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/custom/core.utils.js') }}"></script>
<script type='text/javascript' src="{{ asset('front/jss/custom/core.init.js') }}"></script>
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
        <script src="{{ asset('front/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('front/js/test.js') }}"></script>
        <!-- mailchimp.js -->
        <script src="{{ asset('front/js/mailchimp.js') }}"></script>
        <!-- jquery-ui.min.js -->
        <script src="{{ asset('front/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('front/js/corner-popup.min.js') }}"></script>
        <!-- main js -->

        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <script src="{{ asset('front/js/selectsearch.js') }}"></script>
        <script src="{{ asset('front/js/scripts.js') }}"></script>

        @yield('script_js')
        {{-- <style>
            .corner-btn{
                color: white !important;
            }
        </style> --}}
        <script>
   $(".search-tigger a").on("click", function() {
        $(".search-area").addClass("current");
    });
    $(".closebar").on("click", function() {
        $(".search-area").removeClass("current");
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
    button1 :'Continue',
});

             @if (session('subscribe'))
            Swal.fire(
                'Thanks',
                '{{session("subscribe")}}',
                'success'
            )
             @endif
        @endguest
        </script>

    </body>

</html>



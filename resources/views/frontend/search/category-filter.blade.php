@extends('frontend.master')
@section('title') @if (url()->current() == route('Frontendhome'))
Search Result for "{{$search}}" BD-Muscle
@else
{{$category->catagory_name}} BD-Mucle
@endif @endsection
@section('content')

<style>
    li {
        list-style: none;
    }

    * {
        margin: 0px;
        padding-top: 0px;
    }

    i {
        padding-top: 10px;
    }

    .loadMore_btn {
        display: inline-block;
        padding: 8px 40px;
        border: 1px solid #ef4836;
        font-weight: 500;
        color: #ef4836;
        margin: 30px 0 0;
    }

    .loadMore_btn:hover {

        background-color: #ef4836;
        color: white;
    }

    .max_price {
        float: right;
        padding-left: 30px;
        color: black;
        background: white;
    }

    .min_price {
        color: black;
        background: white;
    }

</style>
{{--         <div class="top_panel_title top_panel_style_1  title_present breadcrumbs_present scheme_original">
            <div  class="bg_cust_1 top_panel_title_inner top_panel_inner_style_1 title_present_inner breadcrumbs_present_inner">
                <div class="content_wrap">
                    <h1 class="page_title">Shop View Category Wise</h1>
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="index.html">Home</a>
                        <span class="breadcrumbs_delimiter"></span>
                        <span class="breadcrumbs_item current">Shop View Category Wise</span>
                    </div>
                </div>
            </div>
        </div> --}}

                <div class="page_content_wrap page_paddings_yes">
            <div class="content_wrap">
                <div class="content">
                    <div class="list_products shop_mode_thumbs">
                        <nav class="woocommerce-breadcrumb">
                            <a href="index.html">Home</a>&nbsp;&#47;&nbsp;Shop
                        </nav>
                         @if ($category != '')
                           <h2 class="sc_section_title sc_item_title sc_item_title_without_descr cat5">{{$category->catagory_name}}<span></span></h2>
                           @endif
                       
                        <p class="woocommerce-result-count">
                            Showing all 9 results</p>
 
                        <ul class="products">
                            @forelse ($Products as $product)
                                    <li class="product has-post-thumbnail   instock purchasable">
                                        <div class="post_item_wrap">
                                            <div class="post_featured">
                                                <div class="post_thumb">
                                                   @if (collect($product->Attribute)->max('discount') != '')
                                                   <span style=" z-index: 2">{{collect($product->Attribute)->max('discount')}}%</span>
                                                   @endif
                                                   <a class="hover_icon hover_icon_link" href="{{route('SingleProductView',$product->slug)}}">
                                                       <img src="{{ asset('thumbnail_img/' . $product->thumbnail_img) }}" class="attachment-shop_catalog size-shop_catalog" alt="{{ $product->title }}" />
                                                   </a>
                                               </div>
                                           </div>
                                           <div class="post_content">
                                            <h2 class="woocommerce-loop-product__title"><a href="{{route('SingleProductView',$product->slug)}}">{{ $product->title }}</a></h2>
                                            @php
                                            $sale = collect($product->Attribute)->min('sell_price');
                                            $regular = collect($product->Attribute)->min('regular_price');
                                            @endphp
                                            <span class="price">
                                              @if ($sale == '')
                                              <span class="woocommerce-Price-amount amount">

                                               <span class="woocommerce-Price-currencySymbol">&#2547;</span> {{$regular}}
                                           </span>
                                           @else 
                                           <span class="woocommerce-Price-amount amount">
                                               <span style="text-decoration:line-through" class="woocommerce-Price-currencySymbol">&#2547; {{$regular}} </span>
                                           </span>
                                           <span class="woocommerce-Price-amount amount">
                                               <span class="woocommerce-Price-currencySymbol">&#2547;</span> {{$sale}} 
                                           </span>

                                           
                                           @endif
                                       </span>
                                       <a rel="nofollow" href="{{route('SingleProductView',$product->slug)}}" data-quantity="1" data-product_id="471" data-product_sku="" class="button add_to_cart_button">Add To Cart</a>
                                   </div>
                               </div>
                           </li>  
                         @empty
                            No Product
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="sidebar widget_area scheme_light" role="complementary">
                    <div class="sidebar_inner widget_area_inner">
                      
                        <aside class="widget woocommerce widget_product_categories">
                                                <div class="widget widget_search">
                        <h4 class="widget-title">Search Product</h4>
                        <form action="{{route('Frontendhome')}}">
                            <input name="search" value="{{$search}}" type="text" placeholder="Search Here...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    @if (url()->current() != route('Frontendhome'))
                    <div class="product-filter">
                        <h4 class="widget-title">Filter by Price</h4>
                        <div class="filter-price">
                            <form action="{{url()->current()}}" method="GET">
                                <input type="text" name="min_price" min=0 max="9900" value="0"
                                    oninput="validity.valid||(value='0');" id="min_price"
                                    class="price-range-field min_price" />
                                <div id="slider-range" class="price-filter-range" name="rangeInput">
                                    <input type="text" min=0 max="10000" value="10000" name="max_price"
                                        oninput="validity.valid||(value='10000');" id="max_price"
                                        class="price-range-field max_price" />
                                </div>
                                <div class="row mt-4">
                                    <div class="col-7">

                                    </div>
                                    <div class="col-5  text-right">
                                        <button type="submit" style="margin-left:90px;margin-top:10px">filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                            <h4 class="widget_title">Categories</h4>
                            <ul class="product-categories">
                            @foreach ($Categories as $catagory)
                                <li class="cat-item"><a href="{{route('CategorySearch',$catagory->slug)}}">{{$catagory->catagory_name}}</a></li>
                                  @endforeach
 
                            </ul>
                        </aside>
                    
                    </div>
                </div>
            </div>
        </div>

{{-- product area start --}}
{{-- <div class="product-area ptb-100 product-sidebar-area">
    <div class="container">
        <div class="row revarce-wrap">
            <div class="col-lg-3 col-12">
                <aside class="sidebar-area">
                    <div class="widget widget_search">
                        <h4 class="widget-title">Search Product</h4>
                        <form action="{{route('Frontendhome')}}">
                            <input name="search" value="{{$search}}" type="text" placeholder="Search Here...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    @if (url()->current() != route('Frontendhome'))
                    <div class="product-filter">
                        <h4 class="widget-title">Filter by Price</h4>
                        <div class="filter-price">
                            <form action="{{url()->current()}}" method="GET">
                                <input type="text" name="min_price" min=0 max="9900" value="0"
                                    oninput="validity.valid||(value='0');" id="min_price"
                                    class="price-range-field min_price" />
                                <div id="slider-range" class="price-filter-range" name="rangeInput">
                                    <input type="text" min=0 max="10000" value="10000" name="max_price"
                                        oninput="validity.valid||(value='10000');" id="max_price"
                                        class="price-range-field max_price" />
                                </div>
                                <div class="row mt-4">
                                    <div class="col-7">

                                    </div>
                                    <div class="col-5  text-right">
                                        <button type="submit" style="margin-left:90px;margin-top:10px">filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    <div class="widget widget_categories">
                        <h4 class="widget-title">Categories</h4>
                        <ul>
                            @foreach ($Categories as $catagory)

                            <li><a href="{{route('CategorySearch',$catagory->slug)}}">{{$catagory->catagory_name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="col-lg-9 col-12">
                <div class="row mb-30">
                    <div class="col-sm-4 col-12">
                        @if ($category != '')
                        <h3 style="color: #ef4836;">{{$category->catagory_name}}</h3>
                        @endif
                        <p class="test">Result : <span class="result">{{$Products->count()}}</span> Product </p>
                    </div>

                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="grid">
                        <ul class="row">
                            @forelse ($Products as $product)
                            <li class="col-lg-4 col-sm-6 col-12">
                                <div class="product-wrap">
                                    <div class="product-img">
                                        <img src="{{ asset('thumbnail_img/' . $product->thumbnail_img) }}"
                                            alt="{{ $product->title }}">
                                        <div class="product-icon flex-style">
                                            <ul>
                                                <li>
                                                    <a data-toggle="modal" style="padding-top: 7px"
                                                        data-target="#exampleModalCenter{{ $product->id }}"
                                                        href="javascript:void(0);"><i style="padding-top: 0"
                                                            class="fa fa-eye"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html" style="padding-top: 7px"><i
                                                            style="padding-top: 0" class="fa fa-heart"></i></a>
                                                </li>
                                                <li>
                                                    <a href="cart.html" style="padding-top: 7px"><i
                                                            style="padding-top: 0" class="fa fa-shopping-bag"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a
                                                href="{{route('SingleProductView',$product->slug)}}">{{ $product->title }}</a>
                                        </h3>
                                        @php
                                        $sale = collect($product->Attribute)->min('sell_price');
                                        $regular = collect($product->Attribute)->min('regular_price');
                                        @endphp
                                        @if ($sale == '')
                                        <p class="pull-left"> ৳
                                            {{$regular}}
                                        </p>
                                        @else
                                        <p class="pull-left "> ৳
                                            {{$sale}}
                                        </p>
                                        <p style="text-decoration:line-through" class="pull-left pl-2"> ৳
                                            {{$regular}}
                                        </p>
                                        @endif
                                        <ul class="pull-right d-flex">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-o"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <div class="modal fade" id="exampleModalCenter{{ $product->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="modal-body d-flex">
                                            <div class="product-single-img w-50 text-center mt-5">
                                                <img src="{{ asset('thumbnail_img/' . $product->thumbnail_img) }}"
                                                    alt="{{ $product->title }}">
                                            </div>
                                            <div class="product-single-content w-50">
                                                <h3>{{ $product->title }}</h3>
                                                <div class="rating-wrap fix">
                                                    <span class="pull-left">৳
                                                        @php
                                                        $sale = $product->sell_price;
                                                        $regular = $product->regular_price;
                                                        if ($sale == '') {
                                                        echo $regular;
                                                        } else {
                                                        echo $sale;
                                                        }
                                                        @endphp
                                                    </span>
                                                    <ul class="rating pull-right">
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li>(05 Customar Review)</li>
                                                    </ul>
                                                </div>
                                                <p>{{ $product->product_summary }}</p>
                                                <ul class="input-style">
                                                    <li class="quantity cart-plus-minus">
                                                        <input type="text" value="1" />
                                                    </li>
                                                    <li><a href="cart.html">Add to Cart</a></li>
                                                </ul>
                                                <ul class="cetagory">
                                                    <li>Categories:</li>
                                                    <li><a
                                                            href="{{route('CategorySearch',$product->slug )}}">{{ $product->catagory_name }}</a>
                                                    </li>
                                                </ul>
                                                <ul class="socil-icon">
                                                    <li>Share :</li>
                                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            No Product
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('script_js')

<script>
    var page = 1;
    $(document).on('click', '.loadMore_btn', function(event){
    page++;
    loadMoreData(page)
    // alert('ok');
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
        // $(".result").html( val +data.total);
        // $(".result").load(location.href + " .result");
        $('#ajax-data').append(data.html);
        $('.load_image').hide();
        $('.loadMore_btn').show();
    })
}


$("#slider-range").slider({
  range: true,
  orientation: "horizontal",
  min: 0,
  max: 10000,
  values: [0, 10000],
  step: 100,

  slide: function (event, ui) {
    if (ui.values[0] == ui.values[1]) {
      return false;
    }
    
    $("#min_price").val(ui.values[0]);
    $("#max_price").val(ui.values[1]);
  }
});


</script>
@endsection



{{-- @section('script_js')
<script>
alert('ok');
    
    function loadMoreData(page){
        $.ajax({
            url:'?page=' + page,
            type='get'
            .done(function(data){
                if (data.html == ''){
                    $('.ajax-load').html("No Product");
                    return;
                }
                $('#ajax-data').append(data.html);
            })
            .fail(function(jqXHR,ajaxOptions){
                alert('server error'); 
            })

        })
    }
    var page = 1;
    // ('.loadmore-btn').onclick(function(){
    //     alert('ok');
    // }})
alert('ok');
$(document).on('click', '.btn-regular', function(event){
// event.preventDefault();
// var page = $(this).attr('href').split('page=')[1];
// fetch_data(page);
alert('ok');
});
</script>

@endsection --}}
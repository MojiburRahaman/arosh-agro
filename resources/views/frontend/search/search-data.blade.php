@extends('frontend.master')
@section('title') @if (url()->current() == route('Frontendhome'))
Search Result for "{{$search}}" {{config('app.name')}}
@else
{{$category}} - {{config('app.name')}}
@endif @endsection


@section('content')

<style>
    .widget_categories ul li .active {
        color: red;

    }

    .cat-item {
        list-style-type: none !important;
    }

</style>


{{-- ok start --}}
<div class="body_wrap">
    <div class="page_wrap">

        <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">{{$category}}</h3>
        <div class="h-divider">
            <div class="shadows"></div>
            <div class="text2"><img src="http://localhost:8000/round_logo/logo 3 Big.png"></div>
        </div>

        <div class="page_content_wrap page_paddings_yes">
            <div class="content_wrap">
                <div class="content">
                    <div class="list_products shop_mode_thumbs">
                        {{-- <nav class="woocommerce-breadcrumb">
                            <a href="index.html">Home</a>&nbsp;/&nbsp;Shop
                        </nav>
                        <header class="woocommerce-products-header">

                        </header>

                        <p class="woocommerce-result-count">
                            Showing all 9 results</p>
                        <form class="woocommerce-ordering" method="GET">
                            <select name="orderby" onchange="this.form.submit()">
                                <option value="new">Sort by newest</option>
                                <option value="old">Sort by oldest</option>
                                <option value="popularity">Sort by popularity</option>
                            </select> --}}

                        {{-- <select name="orderby" class="orderby" onchange="this.form.submit()>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date" selected="selected">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select> --}}
                        </form>
                        <ul class="products">
                            @foreach ($Products as $latest_product)

                            <li class="product has-post-thumbnail column-1_3  instock purchasable">
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
                                                    class="woocommerce-Price-currencySymbol">&#2547; {{$regular}}
                                                </span>
                                            </span>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">&#2547;</span> {{$sale}}
                                            </span>


                                            @endif
                                        </span>
                                        <a rel="nofollow" href="{{route('SingleProductView',$latest_product->slug)}}"
                                            data-quantity="1" data-product_id="458" data-product_sku=""
                                            class=" button add_to_cart_button">Select options</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                        <ul class="row products" id="ajax-data">

                        </ul>
                        <ul class="no_data mt-4 mb-4" style="display: none">
                            <br>
                            <li class="text-center"> No More Product</li>
                        </ul>
                        @if ($Products->links() != '')
                        <div class="col-lg-12 text-center">
                            <div class="fortextbutton m-auto">
                                <div class="load_image" style="display: none">
                                        <img width="30%" src="{{asset('front/images/Reload-Image-Gif-1.gif')}}" alt="">
                                </div>
                            </div>

                            <div class="text-center m-auto">
                                <a class="loadMore_btn " href="javascript:void(0);">Load More</a>
                            </div>
                        </div>

                        @endif
                    </div>
                </div>
                <div class="sidebar widget_area scheme_light" role="complementary">
                    <div class="sidebar_inner widget_area_inner">
                             
                        <aside class="widget woocommerce widget_product_categories">
                            <h4 class="widget_title">Categories</h4>
                            <ul class="product-categories">
                                @forelse ($Categories as $cat)

                                <li class="cat-item"><a
                                        href="{{route('CategorySearch',$cat->slug)}}">{{$cat->catagory_name}}({{$cat->product_count}})</a>
                                </li>
                                @empty
                                <li class="cat-item">No Item</li>
                                @endforelse
                            </ul>
                        </aside>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
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
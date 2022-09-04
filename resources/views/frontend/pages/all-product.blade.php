@extends('frontend.master')
@section('title')
{{config('app.name') .'- All-Products'}}
@endsection
@section('content')
<div class=" page_paddings_yes">
    <div class="content_wrap">
        <div>
            <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">All Products</h3>
            <div class="h-divider">
                <div class="shadows"></div>
                <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
            </div>
            <div class="vc_row wpb_row vc_row-fluid ptb-100">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="sc_section margin_top_huge cat4" data-animation="animated fadeInUp normal">
                                <div class="sc_section_inner">
                                    <div class="sc_section_content_wrap">
                                        <div class="woocommerce columns-4">
                                            <ul class="products">
                                                @foreach ($latest_products as $latest_product)
                                                <li class="product has-post-thumbnail   instock purchasable">
                                                    <div class="post_item_wrap">
                                                        <div class="post_featured">
                                                            <div class="post_thumb">
                                                                @if($latest_product->comming_soon === 1)
                                                                <span class="coming_soon_tag">Coming Soon</span>
                                                                @endif
                                                                <a class="hover_icon hover_icon_link"
                                                                    href="{{route('SingleProductView',$latest_product->slug)}}">
                                                                    @if(collect($latest_product->Attribute)->max('discount')
                                                                    != '' && $latest_product->comming_soon == '')
                                                                    <span
                                                                        class="discount_tag">{{collect($latest_product->Attribute)->max('discount')}}%</span>
                                                                    @endif
                                                                    <img lazy="loading"
                                                                        src="{{ asset('thumbnail_img/' . $latest_product->thumbnail_img) }}"
                                                                        class="attachment-shop_catalog size-shop_catalog"
                                                                        alt="{{ $latest_product->title }}" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="post_content">
                                                            <h2
                                                                class="woocommerce-loop-product__title {{ ($latest_product->comming_soon === 1) ? 'pb-2': '' }}">
                                                                <a
                                                                    href="{{route('SingleProductView',$latest_product->slug)}}">{{
                                                                    $latest_product->title }}</a>
                                                            </h2>
                                                            @php
                                                            $sale =
                                                            collect($latest_product->Attribute)->min('sell_price');
                                                            $regular =
                                                            collect($latest_product->Attribute)->min('regular_price');
                                                            @endphp
                                                            @if($latest_product->comming_soon == '')
                                                            <span class="price">
                                                                @if ($sale == '')
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">&#2547;</span>
                                                                    {{$regular}}
                                                                </span>
                                                                @else
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span style="text-decoration:line-through"
                                                                        class="woocommerce-Price-currencySymbol">&#2547;
                                                                        {{$regular}} </span>
                                                                </span>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span
                                                                        class="woocommerce-Price-currencySymbol">&#2547;</span>
                                                                    {{$sale}}
                                                                </span>

                                                                @endif
                                                            </span>
                                                            @endif
                                                            @if($latest_product->comming_soon === 1)
                                                            <a rel="nofollow"
                                                                href="{{route('SingleProductView',$latest_product->slug)}}"
                                                                data-quantity="1" data-product_id="471"
                                                                data-product_sku=""
                                                                class="button add_to_cart_button">View Product</a>
                                                            @else
                                                            <a rel="nofollow"
                                                                href="{{route('SingleProductView',$latest_product->slug)}}"
                                                                data-quantity="1" data-product_id="471"
                                                                data-product_sku=""
                                                                class="button add_to_cart_button">Add To Cart</a>
                                                            @endif
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
            <div class="row mb-5">
                @if ($latest_products->links() != '')
                <div class="col-12 text-center ">
                    <div class="load_image " style="display:none">
                        <img width="30%" src="{{asset('front/images/Reload-Image-Gif-1.gif')}}" alt="load">
                    </div>
                    <div class="text-center">
                        <a class="loadMore_btn mleft-60" href="javascript:void(0);">Load More</a>
                    </div>

                </div>

                @endif
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
    
</script>
@endsection
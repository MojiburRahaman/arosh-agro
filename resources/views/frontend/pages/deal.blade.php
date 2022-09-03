@extends('frontend.master')
@section('title')
{{config('app.name')}} - {{ $Best_deal->title }}
@endsection
@section('content')
<div class=" page_paddings_yes">
    <div class="content_wrap">
        <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">{{ $Best_deal->title }}
        </h3>

        <div class="h-divider">
            <div class="shadows"></div>
            <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
        </div>


        <div class="row">
            <div class="sc_section_content_wrap">
                <div class="woocommerce columns-4">
                    <ul class="products ">
                        @foreach ($Best_deal->Product as $latest_product)
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
    </div>
</div>

@endsection
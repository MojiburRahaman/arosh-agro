@foreach ($Products as $Productss)


<li class="product has-post-thumbnail   instock purchasable">
    <div class="post_item_wrap">
        <div class="post_featured">
            <div class="post_thumb">
                @if($Productss->comming_soon === 1)
                <span class="coming_soon_tag">Coming Soon</span>
                @endif
                <a class="hover_icon hover_icon_link" href="{{route('SingleProductView',$Productss->slug)}}">
                    @if(collect($Productss->Attribute)->max('discount')
                    != '' && $Productss->comming_soon == '')
                    <span class="discount_tag">{{collect($Productss->Attribute)->max('discount')}}%</span>
                    @endif
                    <img lazy="loading" src="{{ asset('thumbnail_img/' . $Productss->thumbnail_img) }}"
                        class="attachment-shop_catalog size-shop_catalog" alt="{{ $Productss->title }}" />
                </a>
            </div>
        </div>
        <div class="post_content">
            <h2 class="woocommerce-loop-product__title {{ ($Productss->comming_soon === 1) ? 'pb-2': '' }}">
                <a href="{{route('SingleProductView',$Productss->slug)}}">{{
                    $Productss->title }}</a>
            </h2>
            @php
            $sale = collect($Productss->Attribute)->min('sell_price');
            $regular = collect($Productss->Attribute)->min('regular_price');
            @endphp
            @if($Productss->comming_soon == '')

            <span class="price">
                @if ($sale == '')
                <span class="woocommerce-Price-amount amount">

                    <span class="woocommerce-Price-currencySymbol">&#2547;</span> {{$regular}}
                </span>
                @else
                <span class="woocommerce-Price-amount amount">
                    <span style="text-decoration:line-through" class="woocommerce-Price-currencySymbol">&#2547;
                        {{$regular}} </span>
                </span>
                <span class="woocommerce-Price-amount amount">
                    <span class="woocommerce-Price-currencySymbol">&#2547;</span> {{$sale}}
                </span>


                @endif
            </span>
            @endif
            @if($Productss->comming_soon === 1)
            <a rel="nofollow" href="{{route('SingleProductView',$Productss->slug)}}" data-quantity="1"
                data-product_id="471" data-product_sku="" class="button add_to_cart_button">View Product</a>
            @else
            <a rel="nofollow" href="{{route('SingleProductView',$Productss->slug)}}" data-quantity="1"
                data-product_id="471" data-product_sku="" class="button add_to_cart_button">Add To Cart</a>
            @endif
        </div>
    </div>
</li>


@endforeach
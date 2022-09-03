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
            <a rel="nofollow" href="{{route('SingleProductView',$latest_product->slug)}}" data-quantity="1" data-product_id="458"
                data-product_sku="" class="button add_to_cart_button">Select options</a>
        </div>
    </div>
</li>
@endforeach
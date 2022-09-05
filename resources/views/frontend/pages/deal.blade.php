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

        {{-- <div class="row p-0 pt-2 pb-2  pl-0 mb-5">
            <div class="col-12 text-left ">
                <div>
                    <span class="pr-2 pr-lg-4" style="color: #99CB55">On Sale Now</span>
                    <span>Ending in</span>
                    <h3 id="clock"> </h3>
                </div>
            </div>
        </div> --}}
        <div class="row mt-5 mb-5">
            <div class="sc_section_content_wrap">
                <div class="woocommerce columns-4">
                    <ul class="products ">
                        @foreach ($Best_deal->Product as $latest_product)
                        <li class="product has-post-thumbnail   instock purchasable">
                            <div class="post_item_wrap">
                                <div class="post_featured">
                                    <div class="post_thumb">
                                        @if($latest_product->comming_soon === 1)
                                        <span class="coming_soon_tag">Coming Soon</span>
                                        @endif
                                        <a class="hover_icon hover_icon_link"
                                            href="{{route('SingleProductView',$latest_product->slug)}}">
                                            @if (collect($latest_product->Attribute)->max('discount') != '' &&
                                            $latest_product->comming_soon == '')
                                            <span
                                                class="discount_tag">{{collect($latest_product->Attribute)->max('discount')}}%</span>
                                            @endif
                                            <img src="{{ asset('thumbnail_img/' . $latest_product->thumbnail_img) }}"
                                                class="attachment-shop_catalog size-shop_catalog"
                                                alt="{{ $latest_product->title }}" />
                                        </a>
                                    </div>
                                </div>
                                <div class="post_content text-center">
                                    <h2
                                        class="woocommerce-loop-product__title {{ ($latest_product->comming_soon === 1) ? 'pb-2': '' }}">
                                        <a href="{{route('SingleProductView',$latest_product->slug)}}">{{
                                            $latest_product->title }}</a>
                                    </h2>
                                    @php
                                    $sale = collect($latest_product->Attribute)->min('sell_price');
                                    $regular = collect($latest_product->Attribute)->min('regular_price');
                                    @endphp
                                    @if($latest_product->comming_soon == '')

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
                                    @endif
                                    @if($latest_product->comming_soon === 1)
                                    <a rel="nofollow" href="{{route('SingleProductView',$latest_product->slug)}}"
                                        data-quantity="1" data-product_id="471" data-product_sku=""
                                        class="button add_to_cart_button">View Product</a>
                                    @else
                                    <a rel="nofollow" href="{{route('SingleProductView',$latest_product->slug)}}"
                                        data-quantity="1" data-product_id="471" data-product_sku=""
                                        class="button add_to_cart_button">Add To Cart</a>
                                    @endif
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
@section('script_js')


<script>
    @if ($Best_deal)
    // Set the date we're counting down to
    var countDownDate = new Date("{{ $Best_deal->expire_date }} {{ $Best_deal->expire_time }}").getTime();
    
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
    @endsection
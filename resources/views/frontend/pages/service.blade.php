@extends('frontend.master')
@section('title','Services')
@section('content')

<div class="pd-wrap">
    <div class="container">
        <div class="post_content">
            <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">Services</h3>
            <div class="h-divider">
                <div class="shadows"></div>
                <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
            </div>
        </div>
        <section class="we-offer-area text-center bg-gray">
            <div class="container">

                <div class="row our-offer-items less-carousel">
                    <!-- Single Item -->
                    @foreach($services as $key => $service)
                    <div class="col-md-4 col-sm-6 equal-height">
                        <div class="item">
                            <i class=" "> @isset($service->service_image)
                                <img style="width: 100%; border-radius: 40px;"
                                    src="{{asset('service_image/'.$service->service_image)}}" alt="v" />
                                @endisset</i>

                            <h4 class="mt-1">{{ $service->heading }}</h4>
                            <p>
                                {!!\Illuminate\Support\Str::limit($service->description??'',60)!!} <a class=" "
                                    href="{{route('ServiceView',['slug'=>$service->heading])}} ">Read
                                    More</a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single Item -->

                </div>
            </div>
        </section>
    </div>
</div>


@endsection
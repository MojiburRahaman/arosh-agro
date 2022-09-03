@extends('frontend.master')
@section('title')
{{config('app.name')}} - {{$page->heading}}
@endsection
@section('content')
<div class="container">
    <h3 class="sc_title sc_title_regular   text-center mt-3  mb-4">{{$page->heading}}</h3>

    <div class="h-divider">
        <div class="shadows"></div>
        <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
    </div>
    <div class="row ptb-100">
        <div class="col-12 col-lg-12 col-xl-12">

            @isset($page->thumbnail_img)
            <div class="row">

                <div class="sc_image text-center col-12 ">
                    <img src="{{asset('thumbnail_img/'.$page->thumbnail_img??'')}}" alt="{{$page->heading}}" />
                </div>
            </div>
            @endisset

            <div class="mt-5 wpb_text_column wpb_content_element mb-5">
                <div class="wpb_wrapper">
                    <p style="text-align: justify;">
                        {!!nl2br($page->description??'')!!}
                    </p>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
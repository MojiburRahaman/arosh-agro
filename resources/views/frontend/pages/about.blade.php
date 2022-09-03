@extends('frontend.master')
@section('title')
{{config('app.name') .'- About' }}
@endsection
@section('content')
<div class=" ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="about-wrap ">
                    <h3 class="sc_title sc_title_regular   text-center mt-3  mb-4">{{$about->heading}}</h3>
                    <div class="h-divider">
                        <div class="shadows"></div>
                        <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
                    </div>
                    <p class="text-justify">{!!nl2br($about->about??'')!!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
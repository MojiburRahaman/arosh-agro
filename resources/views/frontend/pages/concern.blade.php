@extends('frontend.master')
@section('title')
{{config('app.name')}} - Sister Concerns
@endsection
@section('content')
<div class="container mb-5">

    <div class="wpb_wrapper">

        <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">Our Sister Concerns
        </h3>

        <div class="h-divider">
            <div class="shadows"></div>
            <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
        </div>

        <div class="row mb-5 mt-5">
            @foreach($concerns as $key => $concern)
            <div class="col-lg-4 col-6 col-sm-6 pb-3">
                <div class="card  mt-3">
                    <div class="card-body">
                        <h4 class="mt-0 mb-0 text-center">{{ $concern->cocern_name??'' }}</h4>
                        <p class="text-center mt-2">{!!nl2br($concern->about_concern??'')!!}</p>
                        <p class="mb-1">Address : {!!nl2br($concern->address??'')!!} </p>
                        <p class="mb-1">Visit Our Site : {!!nl2br($concern->weblink??'')!!}
                        </p>

                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>


@endsection
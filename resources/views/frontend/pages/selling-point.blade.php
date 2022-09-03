@extends('frontend.master')
@section('title')
{{config('app.name')}} - Selling Points
@endsection
@section('content')


<div class=" page_paddings_yes mb-5">
    <div class="content_wrap">
        <div class="post_content mb-4">
            <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">Selling Points</h3>
            <div class="h-divider">
                <div class="shadows"></div>
                <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" />
                </div>
            </div>
        </div>
        @foreach($points as $key => $point)
        <div class="row mt-3 mb-4 mt-4" style="  border: 3px solid #0C743F">
            <div class="col-sm-12 col-md-6 col-lg-6 mt-2 col-12 mt-4 mb-4">
                <div class="card border-0">
                    <div class="card-body text-center" title="{!!nl2br($point->p_name??'')!!}">
                        <i class="fa fa-location-dot fa-5x mb-3" style="color:#0C743F;" aria-hidden="true"></i>
                        <h4 class="text-uppercase mb-1 mt-1">{!!nl2br($point->p_name??'')!!}</h4>
                        <address class="mb-1">{!!nl2br($point->address??'')!!}</address>
                        <P class="pb-0 mb-0 text-center">Mobile: {!!nl2br($point->mobile??'')!!}</P>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 mt-2 col-12 mt-4 mb-4">
                <div class="card border-0">
                    <div class="card-body text-center" title="{!!nl2br($point->p_name??'')!!}">
                        <!--Google map-->
                        <div class="mb-4">
                            <iframe src="{{ $point->location }}" width="100%" frameborder="0"
                                title="{!!nl2br($point->p_name??'')!!}" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <!--Buttons-->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
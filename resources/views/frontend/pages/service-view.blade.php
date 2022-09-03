@extends('frontend.master')
@section('title',config('app.name').'-'.$service->heading )
@section('content')


    <div class=" page_paddings_yes mb-5">
    <div class="content_wrap">
        <div class="post_content mb-4">
            <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">Service</h3>
            <div class="h-divider">
                <div class="shadows"></div>
                <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" />
                </div>
            </div>
        </div>
        <article class="post_item post_item_single post_featured_default post_format_standard page type-page hentry">
            <section class="post_content">
                <div class="vc_row wpb_row vc_row-fluid">

                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <h2 class="sc_title sc_title_regular cat5 text-center">
                                    {{ $service->heading }}
                                </h2>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="boderd">
                                            <div class="card-body">

                                                <p>{!!nl2br($service->description??'')!!}</p>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </article>
    </div>

</div>


@endsection
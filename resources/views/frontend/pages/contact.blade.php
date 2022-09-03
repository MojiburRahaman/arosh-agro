@extends('frontend.master')
@section('title')
{{config('app.name')}} - Contact
@endsection
@section('content')

<div class="pd-wrap">
    <div class="container">
        <div class="post_content mb-4">
            <h3 class="sc_title sc_title_regular  text-center mt-3 mb-1">Contact</h3>
            <div class="h-divider">
                <div class="shadows"></div>
                <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" />
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-sm-12 mt-3 mb-3  col-lg-6 p-0">
                @isset($setting->google_map)
                <iframe class=" map" src="{{ $setting->google_map}}" width="800" style="border:0;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                @endisset

            </div>
            <div class="col-sm-12 mt-3 mb-3  col-lg-6 p-0">
                <div class="card  rounded-0" style="border:none;">
                    <div class="" style="background-color:none;background-bottom:0px;">
                        <div class=" text-white text-center py-2 mt-4 mb-4">
                            <h3 class="mb-0 mt-0 mb-2"><i class="fa fa-envelope"></i> Message Us:</h3>
                            <p class="m-0 text-center">We’ll write rarely, but only the best content.</p>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="cf-msg"></div>
                        <form action="{{route('FrontendContactPost')}}" method="post" id="cf">
                            <div class="form-group">
                                <label class="text-light"> Your name </label>
                                <div class="input-group">
                                    <input spellcheck="true" type="text" class="form-control" placeholder="Name"
                                        id="fname" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Your email</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <input required type="mail" class="form-control" placeholder="Email" id="email"
                                        name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-light">Subject</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <input spellcheck="true" type="text" class="form-control" placeholder="Subject"
                                        required id="subject" name="subject">
                                    @csrf
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <div class="input-group mb-2 mb-sm-0">
                                    <textarea spellcheck="true" class="contact-textarea form-control"
                                        placeholder="Message" id="msg" name="message"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block  py-2 text-light mb-4">Submit
                                </button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
            <style>
                .map {
                    height: 100% !important;
                }

                @media (max-width:991px) {
                    .map {
                        height: 600px !important;
                    }
                }
            </style>
        </div>
        <div class="row">
            <div class="col-lg-4 mt-lg-4 mb-4">
                <div class="sc_section section_style_bordered_section text-center">
                    <div class="sc_section_inner">
                        <div class="sc_section_content_wrap">
                            <h4 class="sc_title sc_title_regular sc_align_center"
                                style="margin-top: 2.28em;margin-bottom: 0.28em;text-align:center;">Address</h4><span
                                class="sc_highlight">{{$setting->address}}</span>
                            <div class="vc_empty_space" style="height: 4.2em"><span class="vc_empty_space_inner"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-lg-4 mb-4">
                <div class="sc_section section_style_bordered_section text-center">
                    <div class="sc_section_inner">
                        <div class="sc_section_content_wrap">
                            <h4 class="sc_title sc_title_regular sc_align_center"
                                style="margin-top: 2.28em;margin-bottom: 0.28em;text-align:center;">Email</h4><span
                                class="sc_highlight">{{$setting->email}}</span>
                            <div class="vc_empty_space" style="height: 4.2em"><span class="vc_empty_space_inner"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-lg-4 mb-4">
                <div class="sc_section section_style_bordered_section text-center">
                    <div class="sc_section_inner">
                        <div class="sc_section_content_wrap">
                            <h4 class="sc_title sc_title_regular sc_align_center"
                                style="margin-top: 2.28em;margin-bottom: 0.28em;text-align:center;">Phone Number</h4>
                            <span class="sc_highlight">{{$setting->number}}</span>
                            <div class="vc_empty_space" style="height: 4.2em"><span class="vc_empty_space_inner"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- contact-area end -->


@endsection
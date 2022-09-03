@extends('frontend.master')
@section('title')
{{config('app.name') .'- Video Gallery'}}
@endsection
@section('content')
<div class=" page_paddings_yes mb-5">
  <div class="content_wrap">

    <h3 class="sc_title sc_title_regular   text-center mt-3  mb-4">VIDEO GALLERY</h3>
    <div class="h-divider">
      <div class="shadows"></div>
      <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
    </div>

    <div class="row  mb-5">
      @foreach($videos as $key => $video)
      @isset($video->video)
      <div class="col-md-4 col-12 col-sm-6 col-lg-4 mb-5">
        <video controls data-setup='{ "controls": true, "autoplay": false, "preload": "auto", "seek": true,}' loop>
          <source src="{{asset('videos/'.$video->video)}}" type="video/mp4">
        </video>
      </div>
      @endisset
      @endforeach
    </div>
</div>


@endsection
@section('script_js')

<script>
  var obj = document.createElement('video');
obj.controls = true;
/*gallerygallery*/
        // $('.portfolio-item').isotope({
        //  	itemSelector: '.item',
        //  	layoutMode: 'fitRows'
        //  });
         $('.portfolio-menu ul li').click(function(){
         	$('.portfolio-menu ul li').removeClass('active');
         	$(this).addClass('active');
         	
         	var selector = $(this).attr('data-filter');
         	$('.portfolio-item').isotope({
         		filter:selector
         	});
         	return  false;
         });
         $(document).ready(function() {
         var popup_btn = $('.popup-btn');
         popup_btn.magnificPopup({
         type : 'image',
         gallery : {
         	enabled : true
         }
         });
         });
/*gallerygallery*/

</script>
@endsection
@extends('frontend.master')
@section('title')
{{config('app.name') .'- Image Gallery'}}
@endsection
@section('content')
<style>
  .ptb {
    padding: 100px 0;
  }
</style>
<div class="container">

  <section class="post_content">

    <h3 class="sc_title sc_title_regular   text-center mt-3  mb-4">IMAGE GALLERY</h3>

    <div class="h-divider">
      <div class="shadows"></div>
      <div class="text2"><img src="{{asset('round_logo/logo 3 Big.png')}}" /></div>
    </div>
    <div class="row ptb">
      <div class="col-12">

        <p class="text-center">To view in full screen mode please click on any image.</p>
      </div>
      @foreach($images as $key => $gallery)
      @isset($gallery->image)
      <div class=" col-6 col-md-4 col-lg-3 p-3">
        <div class="lightbox-enabled" style="background-image:url({{ asset('image/' . $gallery->image) }})"
          data-imgsrc="{{ asset('image/' . $gallery->image) }}">
        </div>
      </div>
      @endisset
      @endforeach

      <section class="lightbox-container">
        <span class="material-icons-outlined lightbox-btn left" id="left">
          <i class="fas fa-angle-left"></i>

        </span>
        <span class="material-icons-outlined lightbox-btn right" id="right">
          <i class="fas fa-angle-right"></i>
        </span>
        <span class="close" id="close">
          <i class="fas fa-times"></i>
        </span>
        <div class="lightbox-image-wrapper">
          <img alt="lightboximage" class="lightbox-image">


        </div>
      </section>
    </div>
  </section>
</div>




@endsection
@section('script_js')

<script>
  /*gallerygallery*/
     
// Much of this code is not from me. I got a good chunk of the functionality from a tutorial I can't remember. I added the animations cause I'm tired of easy-to-implement galleries always looking dull. Thanks for looking! If you end up making any upgrades to the code, please let me know and I'll implement them here. Thanks!
// query selectors
const lightboxEnabled = document.querySelectorAll('.lightbox-enabled');
const lightboxArray = Array.from(lightboxEnabled);
const lastImage = lightboxArray.length-1;
const lightboxContainer = document.querySelector('.lightbox-container');
const lightboxImage = document.querySelector('.lightbox-image');
const lightboxBtns = document.querySelectorAll('.lightbox-btn');
const lightboxBtnRight = document.querySelector('#right');
const lightboxBtnLeft = document.querySelector('#left');
const close = document.querySelector('#close');
let activeImage;
// Functions
const showLightBox = () => {lightboxContainer.classList.add('active')}

const hideLightBox = () => {lightboxContainer.classList.remove('active')}

const setActiveImage = (image) => {
lightboxImage.src = image.dataset.imgsrc;
activeImage= lightboxArray.indexOf(image);
}

const transitionSlidesLeft = () => {
  lightboxBtnLeft.focus();
  $('.lightbox-image').addClass('slideright'); 
   setTimeout(function() {
  activeImage === 0 ? setActiveImage(lightboxArray[lastImage]) : setActiveImage(lightboxArray[activeImage-1]);
}, 250); 


  setTimeout(function() {
    $('.lightbox-image').removeClass('slideright');
}, 500);   
}

const transitionSlidesRight = () => {
 lightboxBtnRight.focus();
$('.lightbox-image').addClass('slideleft');  
  setTimeout(function() {
   activeImage === lastImage ? setActiveImage(lightboxArray[0]) : setActiveImage(lightboxArray[activeImage+1]);
}, 250); 
  setTimeout(function() {
    $('.lightbox-image').removeClass('slideleft');
}, 500);  
}

const transitionSlideHandler = (moveItem) => {
  moveItem.includes('left') ? transitionSlidesLeft() : transitionSlidesRight();
}

// Event Listeners
lightboxEnabled.forEach(image => {
   image.addEventListener('click', (e) => {
    showLightBox();
    setActiveImage(image);
    })                     
    })
lightboxContainer.addEventListener('click', () => {hideLightBox()})
close.addEventListener('click', () => {hideLightBox()})
lightboxBtns.forEach(btn => {
btn.addEventListener('click', (e) => {
e.stopPropagation();
  transitionSlideHandler(e.currentTarget.id);
})
})

lightboxImage.addEventListener('click', (e) => {
e.stopPropagation();

})



/*gallerygallery*/


</script>
@endsection
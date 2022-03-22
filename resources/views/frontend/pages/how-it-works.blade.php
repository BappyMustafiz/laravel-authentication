@extends('frontend.layouts.master')
@section('main-content')
@if($top_section)
   <section class="jumbotron jumbotron--cyan jumbotron--has-decorations jumbotron--small jumbotron--align-center">
      <div class="jumbotron__holder">
         <div class="jumbotron__container container">
            <div class="row align-items-center justify-content-center">
               <div class="col-12 col-lg-8 col-xl-7">
                  <h1 class="jumbotron__title h4" data-scroll="" data-scroll-call="">{{ $top_section->main_title}}</h1>
               </div>
            </div>
            @if($top_section->section_video)
               <div class="jumbotron__buttons btn-toolbar justify-content-center">
                  <div class="btn-group" data-scroll="" data-scroll-call="" data-delay="0.1">
                     <a class="btn btn-outline-primary" href="#" title="Watch the video" data-toggle="modal" data-target="#videoModal">
                        <span>Watch the video</span><i class="btn__icon icon-play"></i>
                     </a>
                  </div>
               </div>
            @endif
         </div>
         <div class="floating-clear floating-clear--top--right floating-decoration" data-scroll="" data-scroll-call="moveUp" data-delay="0">
            <div class="floating-decoration__box">
               <div class="floating-decoration__image"><img class="img-fluid" src="assets/public-site-v2/images/decorations/dots-large-orange.svg" alt=""></div>
            </div>
         </div>
         <div class="floating-clear floating-clear--top floating-decoration" data-scroll="" data-scroll-call="moveUp" data-delay="0.1">
            <div class="floating-decoration__box">
               <div class="floating-decoration__image"><img class="img-fluid" src="assets/public-site-v2/images/decorations/semi-line.svg" alt=""></div>
            </div>
         </div>
         <div class="floating-clear floating-clear--top--left floating-decoration" data-scroll="" data-scroll-call="moveUp" data-delay="0.2">
            <div class="floating-decoration__box">
               <div class="floating-decoration__image"><img class="img-fluid" src="assets/public-site-v2/images/decorations/wiggle-line.svg" alt=""></div>
            </div>
         </div>
         <div class="floating-circle floating-circle--yellow floating-circle--bottom floating-decoration" data-scroll="" data-scroll-call="moveUp" data-delay="0.30000000000000004">
            <div class="floating-decoration__box"></div>
         </div>
         <div class="floating-half-circle floating-half-circle--cyan_blue floating-half-circle--left floating-decoration" data-scroll="" data-scroll-call="moveUp" data-delay="0.4">
            <div class="floating-decoration__box"></div>
         </div>
      </div>
   </section>
@endif
@if($step_one)
<section class="site-section site-section--white site-section--get-started" id="get_started" data-progress-section="section-step1" data-tooltip="Get Started" data-hash="get-started">
   <div class="site-section__holder">
      <div class="site-section__container container">
         <div class="text-image-block text-image-block--text-large text-image-block--subtitle-large text-image-block--align-start text-image-block--content-left">
            <div class="text-image-block__holder">
               <div class="col-12">
                  <p class="text-image-block__label text-uppercase font-weight-bold mb-1 mb-md-1_5" data-scroll="" data-scroll-call="fadeIn">{{$step_one->step_title}}</p>
               </div>
               <div class="text-image-block__content-part col-12 col-lg-5 col-xl-4 mb-1_5 mb-md-3 mb-lg-2">
                  <h5 class="text-image-block__title" data-delay="0.05" data-scroll="" data-scroll-call="fadeIn">{{$step_one->main_title}}</h5>
                  <div class="text-image-block__description">
                     <div class="text-image-block__text-box">
                        <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                           <p>{{$step_one->content}}</p>
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="text-image-block__visual-part col-12 col-lg-6 col-xl-7" data-static-media data-delay="0.25" data-scroll="" data-scroll-call="fadeIn">
                  <div class="text-image-block__image-holder">
                     <img class="img-fluid text-image-block__visual" src="{{ asset('uploaded_files/images/pages/how_it_work_page/'.$step_one->section_image) }}" alt="{{$step_one->section_image}}" loading="lazy">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endif
@if($step_two)
<section class="site-section site-section--gray-light site-section--iterate" id="iterate" data-progress-section="section-step6" data-tooltip="Iterate" data-hash="iterate">
   <div class="site-section__holder">
      <div class="site-section__container container">
         <div class="text-image-block text-image-block--align-start text-image-block--content-left">
            <div class="text-image-block__holder">
               <div class="col-12">
                  <p class="text-image-block__label text-uppercase font-weight-bold mb-1 mb-md-1_5" data-scroll="" data-scroll-call="fadeIn">{{$step_two->step_title}}</p>
               </div>
               <div class="text-image-block__content-part col-12 col-lg-5 col-xl-4 mb-1_5 mb-md-3 mb-lg-2">
                  <div class="text-image-block__description">
                     <div class="text-image-block__text-box">
                        <h5 class="text-image-block__subtitle" data-delay="0.1" data-scroll="" data-scroll-call="fadeIn">{{$step_two->main_title}}</h5>
                        <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                           <p>{{$step_two->content}}</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="text-image-block__visual-part col-12 col-lg-6 col-xl-7" data-static-media data-delay="0.25" data-scroll="" data-scroll-call="fadeIn">
                  <div class="text-image-block__image-holder">
                     <img class="img-fluid text-image-block__visual" src="{{ asset('uploaded_files/images/pages/how_it_work_page/'.$step_two->section_image) }}" alt="{{$step_two->section_image}}" loading="lazy">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endif
@if($step_three)
<section class="site-section site-section--white site-section--iterate" id="iterate" data-progress-section="section-step6" data-tooltip="Iterate" data-hash="iterate">
   <div class="site-section__holder">
      <div class="site-section__container container">
         <div class="text-image-block text-image-block--align-start text-image-block--content-left">
            <div class="text-image-block__holder">
               <div class="col-12">
                  <p class="text-image-block__label text-uppercase font-weight-bold mb-1 mb-md-1_5" data-scroll="" data-scroll-call="fadeIn">{{$step_three->step_title}}</p>
               </div>
               <div class="text-image-block__content-part col-12 col-lg-5 col-xl-4 mb-1_5 mb-md-3 mb-lg-2">
                  <div class="text-image-block__description">
                     <div class="text-image-block__text-box">
                        <h5 class="text-image-block__subtitle" data-delay="0.1" data-scroll="" data-scroll-call="fadeIn">{{$step_three->main_title}}</h5>
                        <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                           <p>{{$step_three->content}}</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="text-image-block__visual-part col-12 col-lg-6 col-xl-7" data-static-media data-delay="0.25" data-scroll="" data-scroll-call="fadeIn">
                  <div class="text-image-block__image-holder">
                     <img class="img-fluid text-image-block__visual" src="{{ asset('uploaded_files/images/pages/how_it_work_page/'.$step_three->section_image) }}" alt="{{$step_three->section_image}}" loading="lazy">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endif
@if($step_four)
<section class="site-section site-section--gray-light site-section--iterate" id="iterate" data-progress-section="section-step6" data-tooltip="Iterate" data-hash="iterate">
   <div class="site-section__holder">
      <div class="site-section__container container">
         <div class="text-image-block text-image-block--align-start text-image-block--content-left">
            <div class="text-image-block__holder">
               <div class="col-12">
                  <p class="text-image-block__label text-uppercase font-weight-bold mb-1 mb-md-1_5" data-scroll="" data-scroll-call="fadeIn">{{$step_four->step_title}}</p>
               </div>
               <div class="text-image-block__content-part col-12 col-lg-5 col-xl-4 mb-1_5 mb-md-3 mb-lg-2">
                  <div class="text-image-block__description">
                     <div class="text-image-block__text-box">
                        <h5 class="text-image-block__subtitle" data-delay="0.1" data-scroll="" data-scroll-call="fadeIn">{{$step_four->main_title}}</h5>
                        <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                           <p>{{$step_four->content}}</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="text-image-block__visual-part col-12 col-lg-6 col-xl-7" data-static-media data-delay="0.25" data-scroll="" data-scroll-call="fadeIn">
                  <div class="text-image-block__image-holder">
                     <img class="img-fluid text-image-block__visual" src="{{ asset('uploaded_files/images/pages/how_it_work_page/'.$step_four->section_image) }}" alt="{{$step_four->section_image}}" loading="lazy">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endif
@if($bottom_section)
<section class="site-section">
   <div class="site-section__holder">
      <div class="site-section__container container">
         <div class="cta-block mx-md-n1_5 mx-lg-0 px-lg-1">
            <div class="cta-block__holder row no-gutters align-items-center">
               <div class="cta-block__visual-part col-12 col-md-7 col-lg-8">
                  <div class="embed-responsive cta-block__visual">
                     <div class="embed-responsive-item bg-retina-cover">
                        <span data-srcset="{{ asset('uploaded_files/images/pages/how_it_work_page/'.$bottom_section->section_image) }}"></span>
                     </div>
                  </div>
               </div>
               <div class="cta-block__content-part col-12 col-md-5 col-lg-4 text-center text-md-left">
                  <div class="cta-block__content">
                     <h5 class="cta-block__title">{{$bottom_section->main_title}}</h5>
                     @auth
                     @else
                        <div class="cta-block__cta">
                           <a class="btn cta-block__btn btn btn-primary" href="{{route('register')}}" title="Start for Free">
                              <span>Sign Up For Start</span>
                           </a>
                        </div>
                     @endauth
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endif
@if($top_section)
   @if($top_section->section_video)
      <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="videoModal">
         <div class="modal-dialog modal-xl modal-dialog-centered" role="dialog">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="embed-responsive embed-responsive-16by9">
                     @if($top_section->section_video)
                        <video width="320" height="240" controls autoplay loop muted playsinline controlsList="nodownload">
                           <source src="{{ asset('uploaded_files/videos/pages/how_it_work_page/'.$top_section->section_video) }}">  
                           Your browser does not support the video tag.
                        </video>
                     @endif 
                  </div>
               </div>
            </div>
         </div>
         <div class="close" tabindex="0" data-dismiss="modal" aria-label="Close modal"><span class="close__icon icon-cross"></span><span class="close__text">esc</span></div>
      </div>
   @endif
@endif
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $(document).on('click', '.close', function(){
            location.reload()
        });
        $(document).on('click', '.fade', function(){
            location.reload()
        });
    });
</script>
@endsection
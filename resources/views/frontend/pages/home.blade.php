@extends('frontend.layouts.master')
@section('main-content')
@if($top_section)
   <section class="site-section intro-section">
      <div class="intro-section__container container">
         <div class="intro-section__holder">
            <div class="intro-section__content-part">
               <div class="intro-section__content-holder">
                  <h1 class="intro-section__title" d1ata-show="true">{{ $top_section->main_title}}</h1>
                  <div class="intro-section__content" data-delay="0.2" d1ata-show="true">
                     <div class="intro-section__content-item">{{ $top_section->sub_title}}</div>
                  </div>
                  @auth
                  @else
                  <div class="intro-section__buttons btn-toolbar mx-n0_5 md-md-0">
                     <div class="btn-group flex-grow-1 flex-md-grow-0 mx-0_5 mb-1 mb-md-0 mr-md-1_5 ml-md-0" data-delay="0.3" d1ata-show="true">
                        <a class="btn btn-primary" href="{{route('register')}}">
                        <span>Sign Up For Start</span>
                        </a>
                     </div>
                  </div>
                  @endauth
               </div>
            </div>
            <div class="intro-section__visual-part">
               <div class="intro-section__visual" d1ata-show="true" data-scroll-call="fadeIn">
                  <div class="intro-section__image-holder">
                     <a class="intro-section__outer-link homeSectionLink" href="#" data-toggle="modal" data-target="#videoModal">
                        <img class="img-fluid" src="{{ asset('uploaded_files/images/pages/home_page/'.$top_section->section_image) }}" alt="{{ $top_section->section_image }}">
                        @if($top_section->section_video)
                           <div class="btn-play">
                              <img class="img-fluid" src="{{ asset('assets/public-site-v2/images/play-video.svg') }}" alt="Watch the video" title="Watch the video">
                           </div>
                        @endif
                     </a>
                  </div>
                  <span class="block__decoration block__decoration--half-circle" data-scroll="" data-scroll-speed="-0.9" data-scroll-offset="-100%, -100%">
                  <img class="img-fluid decoration-half-circle" src="{{ asset('assets/public-site-v2/images/decorations/half-circle-blue_2x.png') }}" alt="" loading="lazy"></span>
                  <span class="block__decoration block__decoration--dots-small" data-scroll="" data-scroll-speed="-0.5" data-scroll-offset="-100%, -100%">
                  <img class="img-fluid decoration-dots decoration-dots--small" src="{{ asset('assets/public-site-v2/images/decorations/dots-small-blue.svg') }}" alt="" loading="lazy"></span>
                  <span class="block__decoration block__decoration--dots-large-orange" data-scroll="" data-scroll-speed="-0.4" data-scroll-offset="-100%, -100%">
                  <img class="img-fluid decoration-dots decoration-dots--orange" src="{{ asset('assets/public-site-v2/images/decorations/dots-large-orange.svg') }}" alt="" loading="lazy"></span>
               </div>
            </div>
         </div>
      </div>
   </section>
@endif
@if($section_two)
   <section class="site-section site-section--flows">
      <div class="site-section__holder">
         <div class="site-section__container container">
            <div class="text-image-block text-image-block--image-offset-md py-xl-4_5 text-image-block--align-center text-image-block--content-left">
               <div class="text-image-block__holder">
                  <div class="text-image-block__content-part col-12 col-md-6 col-lg-5 col-xl-4 mb-2 mb-md-0">
                     <div class="text-image-block__description">
                        <div class="text-image-block__text-box">
                           <h5 class="text-image-block__subtitle" data-delay="0.1" data-scroll="" data-scroll-call="fadeIn">{{ $section_two->main_title }}</h5>
                           <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                              <p>{{ $section_two->sub_title }}</p>
                           </div>
                           <span data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                              <a class="link--arrow-right" href="{{ route('how_it_works') }}">See how</a>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="text-image-block__visual-part col-12 col-md-6 col-lg-7" data-delay="0.2" data-scroll="" data-scroll-call="fadeIn">
                     <img class="img-fluid" src="{{ asset('uploaded_files/images/pages/home_page/'.$section_two->section_image) }}" alt="{{ $section_two->section_image }}" loading="lazy" data-scroll="" data-scroll-speed="-1.25" data-scroll-offset="-50%, -50%">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
@endif
@if($section_three)
   <section class="site-section site-section--white site-section--present">
      <div class="site-section__holder">
         <div class="site-section__container container">
            <div class="text-image-block text-image-block--image-offset-md text-image-block--align-center text-image-block--content-right">
               <div class="text-image-block__holder">
                  <div class="text-image-block__content-part col-12 col-md-6 col-lg-5 col-xl-4 mb-2 mb-md-0">
                     <div class="text-image-block__description">
                        <div class="text-image-block__text-box">
                           <h5 class="text-image-block__subtitle" data-delay="0.1" data-scroll="" data-scroll-call="fadeIn">{{ $section_three->main_title }}</h5>
                           <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                              <p>{{ $section_three->sub_title }}</p>
                           </div>
                           <span data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                              <a class="link--arrow-right" href="{{ route('how_it_works') }}">See how</a>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="text-image-block__visual-part col-12 col-md-6 col-lg-7" data-delay="0.2" data-scroll="" data-scroll-call="fadeIn">
                     <div class="text-image-block__image-holder">
                        <picture>
                           <source  media="(max-width: 767px)">
                           <source  media="(max-width: 959px)">
                           <img class="img-fluid text-image-block__visual" src="{{ asset('uploaded_files/images/pages/home_page/'.$section_three->section_image) }}" alt="{{ $section_three->section_image }}" loading="lazy" style="max-width: 624px;">
                        </picture>
                     </div>
                     <span class="block__decoration block__decoration--dots-small" data-scroll="" data-scroll-speed="-0.5" data-scroll-offset="-100%, -100%"><img class="img-fluid decoration-dots decoration-dots--small" src="{{ asset('assets/public-site-v2/images/decorations/dots-small-blue.svg') }}" alt="" loading="lazy"></span><span class="block__decoration block__decoration--dots-large" data-scroll="" data-scroll-speed="-0.8" data-scroll-offset="-100%, -100%"><img class="img-fluid decoration-dots" src="{{ asset('assets/public-site-v2/images/decorations/dots-large-blue.svg') }}" alt="" loading="lazy"></span><span class="block__decoration block__decoration--half-circle-shape" data-scroll="" data-scroll-speed="0.7" data-scroll-offset="-100%, -100%"><img class="img-fluid decoration-half-circle-shape" src="{{ asset('assets/public-site-v2/images/decorations/3d-shape.png') }}" alt="" loading="lazy"></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
@endif
@if($section_four)
   <section class="site-section site-section--share">
      <div class="site-section__holder">
         <div class="site-section__container container">
            <div class="text-image-block py-lg-4_5 text-image-block--image-offset-md text-image-block--align-center text-image-block--content-left">
               <div class="text-image-block__holder">
                  <div class="text-image-block__content-part col-12 col-md-6 col-lg-5 col-xl-4 mb-1_5 mb-md-0">
                     <div class="text-image-block__description">
                        <div class="text-image-block__text-box">
                           <h5 class="text-image-block__subtitle" data-delay="0.1" data-scroll="" data-scroll-call="fadeIn">{{ $section_four->main_title }}</h5>
                           <div class="text-image-block__text" data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                              <p>{{ $section_four->sub_title }}</p>
                           </div>
                           <span data-delay="0.15" data-scroll="" data-scroll-call="fadeIn">
                              <a class="link--arrow-right" href="{{ route('how_it_works') }}">See how</a>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="text-image-block__visual-part col-12 col-md-6 col-lg-7 mb-1 mb-md-0 justify-content-center" data-delay="0.2" data-scroll="" data-scroll-call="fadeIn">
                     <div class="text-image-block__image-holder">
                        <img class="img-fluid text-image-block__visual" src="{{ asset('uploaded_files/images/pages/home_page/'.$section_four->section_image) }}" alt="{{ $section_four->section_image }}" loading="lazy">
                     </div>
                     <span class="block__decoration block__decoration--dots-small" data-scroll="" data-scroll-speed="-0.5" data-scroll-offset="-100%, -100%">
                        <img class="img-fluid decoration-dots decoration-dots--small" src="{{ asset('assets/public-site-v2/images/decorations/dots-small-blue.svg') }}" alt="" loading="lazy">
                     </span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
@endif
@if(count($testimonials) > 0)
   <section class="site-section testimonials-section testimonials-section--carousel">
      <div class="testimonials-section__container container">
         <div class="testimonials-section__holder site-section--cyan-light">
            <div class="testimonial-section__carousel" data-scroll data-scroll-call="fadeIn">
               <div class="swiper-container" data-testimonials-carousel>
                  <h4 class="testimonials-section__title" data-scroll data-scroll-call="moveUp"></h4>
                  <div class="swiper-wrapper">
                     @foreach($testimonials as $testimonial)
                        <div class="swiper-slide">
                           <div class="testimonial-element testimonial-element--small">
                              <blockquote class="testimonial-element__quote">
                                 <p class="testimonial-element__text" data-scroll="" data-scroll-call="fadeIn">
                                    {{ $testimonial->title }}
                                 </p>
                                 <cite class="testimonial-element__meta">
                                    @if($testimonial->user_image)
                                       <div class="testimonial-element__image" data-scroll="" data-scroll-call="fadeIn">
                                          <div class="testimonial-element__avatar-element">
                                             <img class="img-fluid testimonial-element__avatar" src="{{ asset('uploaded_files/images/testimonials/'.$testimonial->user_image) }}" alt="{{ $testimonial->user_name }}" loading="lazy">
                                          </div>
                                       </div>
                                    @endif
                                    <div class="testimonial-element__author" data-scroll="" data-scroll-call="fadeIn">
                                       <p class="testimonial-element__name">{{ $testimonial->user_name }}</p>
                                       <p class="testimonial-element__description">{{ $testimonial->designation }}</p>
                                    </div>
                                 </cite>
                              </blockquote>
                           </div>
                        </div>
                     @endforeach
                  </div>
                  <div class="swiper-pagination"></div>
                  <button class="btn btn btn-sm rounded-circle btn-outline-simple btn-arrow swiper-button-prev" tabindex="0">
                     <i class="btn__icon icon-arrow-left"></i>
                  </button>
                  <button class="btn btn btn-sm rounded-circle btn-outline-simple btn-arrow swiper-button-next" tabindex="0">
                     <i class="btn__icon icon-arrow-right"></i>
                  </button>
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
                           <source src="{{ asset('uploaded_files/videos/pages/home_page/'.$top_section->section_video) }}">  
                           Your browser does not support the video tag.
                        </video>
                     @endif 
                  </div>
               </div>
            </div>
         </div>
         <div class="close" tabindex="0" data-dismiss="modal" aria-label="Close modal">
            <span class="close__icon icon-cross"></span>
            <span class="close__text">esc</span>
         </div>
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
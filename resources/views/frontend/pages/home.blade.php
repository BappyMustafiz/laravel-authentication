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
                     <div class="text-image-block__parallax-holder text-image-block__parallax-holder--cyan text-image-block__parallax-holder--half-circle">
                        <img class="img-fluid text-image-block__visual" src="{{ asset('uploaded_files/images/pages/home_page/'.$section_two->section_image) }}" alt="{{ $section_two->section_image }}" loading="lazy" data-scroll="" data-scroll-speed="-1.25" data-scroll-offset="-50%, -50%">
                     </div>
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
<section class="site-section testimonials-section testimonials-section--carousel">
   <div class="testimonials-section__container container">
      <div class="testimonials-section__holder site-section--cyan-light">
         <div class="testimonial-section__carousel" data-scroll data-scroll-call="fadeIn">
            <div class="swiper-container" data-testimonials-carousel>
               <h4 class="testimonials-section__title" data-scroll data-scroll-call="moveUp">Trusted by over 50,000 people of the world’s leading companies</h4>
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <div class="testimonial-element testimonial-element--small">
                        <blockquote class="testimonial-element__quote">
                           <p class="testimonial-element__text" data-scroll="" data-scroll-call="fadeIn">Looks Amazing! Can't wait to use it. There was a void in my workflow and I have high hopes this will fit right in.</p>
                           <cite class="testimonial-element__meta">
                              <div class="testimonial-element__image" data-scroll="" data-scroll-call="fadeIn">
                                 <div class="testimonial-element__avatar-element">
                                    <img class="img-fluid testimonial-element__avatar" src="{{ asset('assets/public-site-v2/images/testimonials/small/shamraizg.jpg') }}" alt="Shamraiz Gul" loading="lazy">
                                    <svg class="clip-path" width="0" height="0">
                                       <defs>
                                          <clipPath id="avatarShapeRound" clipPathUnits="objectBoundingBox">
                                             <path fill="#f98a6b" d="M0.498,1 c0.15,0,0.25,-0.07,0.357,-0.165 s0.148,-0.198,0.148,-0.335 c0,-0.159,-0.062,-0.264,-0.166,-0.355 c-0.089,-0.079,-0.184,-0.145,-0.338,-0.145 c-0.256,0,-0.496,0.223,-0.496,0.5 s0.199,0.5,0.496,0.5"></path>
                                          </clipPath>
                                       </defs>
                                    </svg>
                                 </div>
                              </div>
                              <div class="testimonial-element__author" data-scroll="" data-scroll-call="fadeIn">
                                 <p class="testimonial-element__name"><a href="https://www.producthunt.com/@shamraizgul" target="_blank" rel="noreferrer">Shamraiz Gul</a></p>
                                 <p class="testimonial-element__description">User Experience Architect</p>
                              </div>
                           </cite>
                        </blockquote>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="testimonial-element testimonial-element--small">
                        <blockquote class="testimonial-element__quote">
                           <p class="testimonial-element__text" data-scroll="" data-scroll-call="fadeIn">It's the top choice for creating user flows that can help you visually to tell the stories behind them. Highly customizable and extremely easy to use.</p>
                           <cite class="testimonial-element__meta">
                              <div class="testimonial-element__image" data-scroll="" data-scroll-call="fadeIn">
                                 <div class="testimonial-element__avatar-element">
                                    <img class="img-fluid testimonial-element__avatar" src="{{ asset('assets/public-site-v2/images/testimonials/small/davidt.jpg') }}" alt="David Teodorescu" loading="lazy">
                                    <svg class="clip-path" width="0" height="0">
                                       <defs>
                                          <clipPath id="avatarShapeRound" clipPathUnits="objectBoundingBox">
                                             <path fill="#f98a6b" d="M0.498,1 c0.15,0,0.25,-0.07,0.357,-0.165 s0.148,-0.198,0.148,-0.335 c0,-0.159,-0.062,-0.264,-0.166,-0.355 c-0.089,-0.079,-0.184,-0.145,-0.338,-0.145 c-0.256,0,-0.496,0.223,-0.496,0.5 s0.199,0.5,0.496,0.5"></path>
                                          </clipPath>
                                       </defs>
                                    </svg>
                                 </div>
                              </div>
                              <div class="testimonial-element__author" data-scroll="" data-scroll-call="fadeIn">
                                 <p class="testimonial-element__name"><a href="https://twitter.com/davidteodorescu" target="_blank" rel="noreferrer">David Teodorescu</a></p>
                                 <p class="testimonial-element__description">Senior Product Designer @Fitbit</p>
                              </div>
                           </cite>
                        </blockquote>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="testimonial-element testimonial-element--small">
                        <blockquote class="testimonial-element__quote">
                           <p class="testimonial-element__text" data-scroll="" data-scroll-call="fadeIn">Stoked to give <a href='https://twitter.com/overflowapp' target='_blank' rel='noopener'>@overflowapp</a> a try — looks like it'll be super useful for documenting app user flows!</p>
                           <cite class="testimonial-element__meta">
                              <div class="testimonial-element__image" data-scroll="" data-scroll-call="fadeIn">
                                 <div class="testimonial-element__avatar-element">
                                    <img class="img-fluid testimonial-element__avatar" src="{{ asset('assets/public-site-v2/images/testimonials/small/chrism.jpg') }}" alt="Chris Messina" loading="lazy">
                                    <svg class="clip-path" width="0" height="0">
                                       <defs>
                                          <clipPath id="avatarShapeRound" clipPathUnits="objectBoundingBox">
                                             <path fill="#f98a6b" d="M0.498,1 c0.15,0,0.25,-0.07,0.357,-0.165 s0.148,-0.198,0.148,-0.335 c0,-0.159,-0.062,-0.264,-0.166,-0.355 c-0.089,-0.079,-0.184,-0.145,-0.338,-0.145 c-0.256,0,-0.496,0.223,-0.496,0.5 s0.199,0.5,0.496,0.5"></path>
                                          </clipPath>
                                       </defs>
                                    </svg>
                                 </div>
                              </div>
                              <div class="testimonial-element__author" data-scroll="" data-scroll-call="fadeIn">
                                 <p class="testimonial-element__name"><a href="https://twitter.com/chrismessina" target="_blank" rel="noreferrer">Chris Messina</a></p>
                                 <p class="testimonial-element__description">Product designer, & TBD.</p>
                              </div>
                           </cite>
                        </blockquote>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="testimonial-element testimonial-element--small">
                        <blockquote class="testimonial-element__quote">
                           <p class="testimonial-element__text" data-scroll="" data-scroll-call="fadeIn">Overflow is an excellent resource, and can be especially useful earlier in the product design process when product requirements are still being defined.</p>
                           <cite class="testimonial-element__meta">
                              <div class="testimonial-element__image" data-scroll="" data-scroll-call="fadeIn">
                                 <div class="testimonial-element__avatar-element">
                                    <img class="img-fluid testimonial-element__avatar" src="{{ asset('assets/public-site-v2/images/testimonials/small/dejm.jpg') }}" alt="Dej Mejia" loading="lazy">
                                    <svg class="clip-path" width="0" height="0">
                                       <defs>
                                          <clipPath id="avatarShapeRound" clipPathUnits="objectBoundingBox">
                                             <path fill="#f98a6b" d="M0.498,1 c0.15,0,0.25,-0.07,0.357,-0.165 s0.148,-0.198,0.148,-0.335 c0,-0.159,-0.062,-0.264,-0.166,-0.355 c-0.089,-0.079,-0.184,-0.145,-0.338,-0.145 c-0.256,0,-0.496,0.223,-0.496,0.5 s0.199,0.5,0.496,0.5"></path>
                                          </clipPath>
                                       </defs>
                                    </svg>
                                 </div>
                              </div>
                              <div class="testimonial-element__author" data-scroll="" data-scroll-call="fadeIn">
                                 <p class="testimonial-element__name"><a href="https://twitter.com/dejmejia" target="_blank" rel="noreferrer">Dej Mejia</a></p>
                                 <p class="testimonial-element__description">Senior UX Designer @Adobe</p>
                              </div>
                           </cite>
                        </blockquote>
                     </div>
                  </div>
               </div>
               <div class="swiper-pagination"></div>
               <button class="btn btn btn-sm rounded-circle btn-outline-simple btn-arrow swiper-button-prev" tabindex="0"><i class="btn__icon icon-arrow-left"></i></button><button class="btn btn btn-sm rounded-circle btn-outline-simple btn-arrow swiper-button-next" tabindex="0"><i class="btn__icon icon-arrow-right"></i></button>
            </div>
         </div>
      </div>
   </div>
</section>
@if($top_section)
   @if($top_section->section_video)
      <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="videoModal">
         <div class="modal-dialog modal-xl modal-dialog-centered" role="dialog">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="embed-responsive embed-responsive-16by9">
                     @if($top_section->section_video)
                        <video width="320" height="240" controls controlsList="nodownload">
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
@extends('frontend.layouts.master')
@section('styles')
<style>
   .training{
      font-size: 25px;
   }
   .checkbox{
      height: 20px;
      width: 20px;
   }
   .training_title{
      
   }
   .training_price{
      float: right;
   }
</style>
@endsection
@section('main-content')
<section class="jumbotron jumbotron--cyan-light jumbotron--has-decorations jumbotron--small jumbotron--align-center">
   <div class="jumbotron__holder">
      <div class="jumbotron__container container">
         <div class="row align-items-center justify-content-center">
            <div class="col-12 col-lg-8 col-xl-7">
               <h1 class="jumbotron__title h4" data-scroll="" data-scroll-call="">Simple pricing for any type of learner</h1>
            </div>
         </div>
      </div>
      <div class="floating-clear floating-clear--top--right floating-decoration" data-scroll="" data-scroll-call="moveUp" data-delay="0">
         <div class="floating-decoration__box">
            <div class="floating-decoration__image"><img class="img-fluid" src="{{ asset('assets/public-site-v2/images/decorations/dots-large-orange.svg') }}" alt=""></div>
         </div>
      </div>
      <div class="floating-clear floating-clear--top floating-decoration" data-scroll="" data-scroll-call="moveUp" data-delay="0.1">
         <div class="floating-decoration__box">
            <div class="floating-decoration__image"><img class="img-fluid" src="{{ asset('assets/public-site-v2/images/decorations/semi-line.svg') }}" alt=""></div>
         </div>
      </div>
      <div class="floating-clear floating-clear--top--left floating-decoration" data-scroll="" data-scroll-call="moveUp" data-delay="0.2">
         <div class="floating-decoration__box">
            <div class="floating-decoration__image"><img class="img-fluid" src="{{ asset('assets/public-site-v2/images/decorations/wiggle-line.svg') }}" alt=""></div>
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
<section class="site-section site-section--pricing">
   <div class="site-section__holder">
      <div class="site-section__container container">
         <div class="pricing-block" data-pricing-block data-scroll="" data-scroll-call="fadeIn">
            <div class="pricing-block__holder row">
               {{-- <div class="col-12 col-xl-5">
                  <div class="pricing-block__content">
                     <h4 class="price-block__content-title">Try Overflow for free for 14 days</h4>
                     <div class="price-block__content-text">
                        <p>No credit card required. Start for free, pick a plan later. You can cancel at any time.</p>
                     </div>
                  </div>
               </div> --}}
               <div class="col-12 col-xl-12">
                  <div class="pricing-boxes-block">
                     <div class="row">
                        @if($categories)
                           @foreach($categories as $category)
                              <div class="price-box col-12 col-md-4">
                                 <div class="card">
                                    <div class="card-header price-box__header">
                                       <div class="price-box__headline">
                                          <h4 class="price-box__heading">
                                             <span class="price-box__heading-text">{{ $category->name }}</span>
                                          </h4>
                                       </div>
                                    </div>
                                    <div class="card-body price-box__body">
                                       <p class="text-size-base pricing-box__list-title mb-1_5">Courses:</p>
                                       <ul class="list--checkmark pricing-box__list">
                                          @if($category->trainings)
                                             @foreach($category->trainings as $training)
                                             <li class="training">
                                                <input type="checkbox" value="1" class="checkbox" data-training="{{ $training->id }}">
                                                <span class="training_title">{{$training->title}}</span><span class="training_price">$ {{$training->price}}</span>
                                             </li>
                                             @endforeach
                                          @endif
                                       </ul>
                                       @auth
                                          <div class="price-box__button buy_now" data-category = "{{ $category->id }}">
                                             <a class="btn btn-primary w-100">
                                                <span>Buy Now</span>
                                             </a>
                                          </div>
                                       @else
                                          <div class="price-box__button">
                                             <a href="{{ route('register') }}">Sign Up to Buy now</a>
                                          </div>
                                       @endauth
                                    </div>
                                 </div>
                              </div>
                           @endforeach
                        @endif
                     </div>
                     <span class="block__decoration block__decoration--half-circle-vertical-orange-plain" data-scroll="" data-scroll-speed="-0.5" data-scroll-offset="-100%, -100%">
                        <img class="img-fluid decoration-half-circle decoration-half-circle--vertical decoration-half-circle--orange-plain" src="{{ asset('assets/public-site-v2/images/decorations/half-circle-vertical-orange-plain.svg') }}" alt="" loading="lazy">
                     </span>
                     <span class="block__decoration block__decoration--dots-large-yellow" data-scroll="" data-scroll-speed="-1" data-scroll-offset="-100%, -100%">
                        <img class="img-fluid decoration-dots decoration-dots--yellow" src="{{ asset('assets/public-site-v2/images/decorations/dots-large-yellow.svg') }}" alt="" loading="lazy">
                     </span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('scripts')
<script>
   $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let courseIds = [];
        $('.checkbox').click(function(){
            if ($(this).is(':checked')) {
               let training = $(this).data('training');
               const index = courseIds.findIndex((element) => element == training)
               if(index < 1){
                  courseIds.push(training)
               }
            } else {
               let training = $(this).data('training');
               const index = courseIds.findIndex((element) => element == training)
               if(index > -1){
                  courseIds.splice(index, 1);
               }
            }
        });
        $(document).on('click','.buy_now', function(){
           let category = $(this).data('category');

            let formData = {
               category: $(this).data('category'),
               courseIds: courseIds,
            };
        
            $.ajax({
                data: formData,
                url: "{{ route('buy_course') }}",
                type: "POST",
                dataType: 'json',
                success: function (response) {
                    toastr.success(response.message);
                    setTimeout(() => {
                       location.reload()
                    }, 200);
                },
                error: function (error) {
                    $.each(error.responseJSON.errors, function(index, value){
                        toastr.error(value);
                    })
                }
            });
        })


    });
</script>
@endsection
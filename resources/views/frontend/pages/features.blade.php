@extends('frontend.layouts.master')
@section('main-content')
<section class="jumbotron jumbotron--cyan jumbotron--has-decorations jumbotron--small jumbotron--align-center">
    <div class="jumbotron__holder">
        <div class="jumbotron__container container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-lg-8 col-xl-7">
                <h1 class="jumbotron__title h4" data-scroll="" data-scroll-call="">Features</h1>
            </div>
        </div>
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
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        
    });
</script>
@endsection
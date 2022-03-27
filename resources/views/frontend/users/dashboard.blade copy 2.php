@extends('frontend.user-dashboard.master')
@section('styles')
{{-- <link href="{{asset('assets/user-dashboard-assets/assets/css/plugin/font-awesome/fontawesome.css')}}" rel="stylesheet"> --}}
<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
{{-- <link href="{{asset('assets/user-dashboard-assets/assets/css/fonts/bootstrap.css')}}" rel="stylesheet"> --}}
{{-- <link href="{{asset('assets/user-dashboard-assets/assets/css/fonts/stylesheet.css')}}" rel="stylesheet"> --}}
<link href="{{asset('assets/user-dashboard-assets/assets/css/main.css')}}" rel="stylesheet">
<style>
   .comments li{
      cursor: pointer;
   }
   .tab-pane{
    display: none !important;
   }
   .collapse{
    display: none !important;
   }
   .show{
       display: block !important;
   }
   .video_area_wrap{
       padding: 5px;
   }
</style>
@endsection
@section('dashboard-content')
{{-- <section class="header sticky">
   <div class="pt8 pb6">
      <div class="flex flex-center">
         <svg class="icon icon-recent mr3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" height="16" width="16">
            <g fill="none" fill-rule="evenodd">
               <path d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm1-9V4a1 1 0 1 0-2 0v4a1 1 0 0 0 1 1h3a1 1 0 0 0 0-2H9z" fill="var(--color-icon-primary)"></path>
            </g>
         </svg>
         <h3 class="">Dashboard</h3>
      </div>
   </div>
</section> --}}
@if($trainings && count($trainings) > 0)
    <section class="video_area">
        <div class="video_area_wrap">
            <div class="main_video">
                <div class="main_video_content">
                    <div class="main_video_content_inner">
                        <video width="100%" controls autoplay loop muted playsinline controlsList="nodownload" id="video">
                            <source id="source">
                         </video>
                    </div>
                </div>
                <div class="video_overview">
                    <ul class="nav nav-tabs" id="myTab1" role="tablist1">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="Overview-tab1" data-toggle="tab" href="#Overview1" role="tab" aria-controls="Overview1" aria-selected="true">Overview</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent1">
                        <div class="tab-pane fade show active" id="Overview1" role="tabpanel" aria-labelledby="Overview-tab1">
                            <div class="inner overview">
                                <h2>About this course</h2>
                                <p>Program a complete game today. No special software or install required. All you need is a text editor and a web browser.</p>
                                <table class="table">
                                    <tr>
                                        <td>By the numbers</td>
                                        <td>
                                            Skill level: Beginner Level <br>
                                            Students: 310077 <br>
                                            Languages: English <br>
                                            Captions: Yes
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Features</td>
                                        <td>
                                            Available on iOS and Android
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>At the end of this short course you'll have programmed your first game. You'll learn gameplay development fundamentals by really doing it – writing and running real code on your own machine. Each step of the course has the source code attached exactly as it should look at that time (click "View Resources" then "Downloadable Resources"), for you to compare to or pick up from, so you can't get stuck!
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video_thumbnail">
                <div class="title">
                    <h2>Your Courses</h2>
                </div>
                <div class="thumbnail_content">
                    @foreach($trainings as $key =>  $training)
                    <div class="accordion" id="training_{{$key}}">
                        <div class="card">
                            <div class="card-header" id="heading_{{$key}}">
                                <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
                                    {{$training->training->title}}
                                </button>
                                </h2>
                            </div>
                        
                            <div id="collapse{{$key}}" class="collapse show" aria-labelledby="heading_{{$key}}" data-parent="#training_{{$key}}">
                                <div class="card-body">
                                    <ul>
                                        @foreach($training->training->videos as $video_key =>  $video)
                                        <li>
                                            <a class="author_comment" data-id="{{ $video->id }}">
                                                <span class="number">{{$video_key + 1}}</span>
                                                <div class="img">
                                                    <img src="{{asset('uploaded_files/images/trainings/'.$video->image)}}" alt="">
                                                </div>
                                                <div class="text">
                                                    <h2 class="heading">{{ $video->title }}</h2>
                                                    <p>{{ $video->short_description }}</p>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@else
   <div class="nodata">
      <div class="inner">
         <div class="title mb2">
            <h4 class="">Nothing enrolled yet</h4>
         </div>
         <div class="description">
            <p class="">For accessing courses please choose your suitable plan.</p>
         </div>
         <a class="button mt6" type="button" href="{{ route('pricing') }}">Buy Now</a>
      </div>
   </div>
@endif
@endsection
@section('scripts')
<script src="{{ asset('assets/user-dashboard-assets/assets/js/vendor/bootstrap.js') }}"></script>
<script src="{{ asset('assets/user-dashboard-assets/assets/js/plugin/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/user-dashboard-assets/assets/js/main.js') }}"></script>
<script>
   $(document).ready(function(){
      $.ajaxSetup({
         headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $(document).on('click', '.author_comment', function(){
         let formData = {
            videoId: $(this).data('id'),
         };
         $.ajax({
               data: formData,
               url: "{{ route('get_video_url') }}",
               type: "POST",
               dataType: 'json',
               success: function (response) {
                  if(response.data){
                     var video = document.getElementById('video');
                     var source = document.getElementById('source');

                     source.setAttribute('src', response.data.url);
                     video.load();
                     video.play();
                  }
               },
               error: function (error) {
                  $.each(error.responseJSON.errors, function(index, value){
                     toastr.error(value);
                  })
               }
         });   
      });
   });
</script>
@endsection
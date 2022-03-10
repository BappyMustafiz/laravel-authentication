@extends('frontend.user-dashboard.master')
@section('styles')
<link href="{{asset('assets/user-dashboard/assets/css/main.css')}}" rel="stylesheet">
<style>
   .comments li{
      cursor: pointer;
   }
</style>
@endsection
@section('dashboard-content')
<section class="header sticky">
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
</section>
<section class="inner">
   @if($trainings && count($trainings) > 0)
   <div class="container">
      <div class="row">
         <div class="col_md_7 col_lg_8 pr_7_half">
            <div class="card">
               <div class="card-header">
                  <div class="card-title">
                     <div class="d_flex_btwn">
                        <div >Watch Video</div>
                     </div>
                  </div>
               </div>
               <div class="card-body player_area">
                  <div id="video_wrap">
                     <div class="video_wrap_inner">
                        <video width="100%" controls autoplay loop muted playsinline controlsList="nodownload" id="video">
                           <source id="source">
                        </video>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col_md_5 col_lg_4 pl_7_half">
            <div class="card">
               <div class="card-header">
                  <div class="card-title">
                     <div class="card-title d_flex_btwn">Videos</div>
                  </div>
               </div>
               <div class="card-body">
                  <div id="chat_wrap">
                     @foreach($trainings as $training)
                        <div class="pinned_post_wrapper">
                           <div class="pinned_post">
                              <li>
                                 <div class="text">
                                    <h2>{{$training->training->title}}</h2>
                                 </div>
                              </li>
                           </div>
                        </div>
                        @if($training->training->videos && count($training->training->videos) > 0)
                        <div class="chat_head">
                           <ul class="comment_list">
                              <div class="comments">
                                 @foreach($training->training->videos as $video)
                                    <li>
                                       <div class="author_comment" data-id="{{ $video->id }}">
                                          <div class="text">
                                             <h2>{{ $video->title }}</h2>
                                          </div>
                                       </div>
                                    </li>
                                 @endforeach
                              </div>
                           </ul>
                        </div>
                        @endif
                     @endforeach
                     <div class="reply_chat"> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
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
</section>
@endsection
@section('scripts')
<script src="{{ asset('assets/user-dashboard/assets/js/main.js') }}"></script>
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
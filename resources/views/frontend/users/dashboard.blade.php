@extends('frontend.user-dashboard.master')

@section('styles')
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
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
        .ask_question > h2 {
            font-size: 18px;
            line-height: 1.5em;
            padding: 16px 15px;
            font-weight: 700;
            margin-bottom: 0;
        }
        .ask_question .form_radio {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            padding: 10px 6px;
            width: 100%;
            border: 1px solid #434349;
        }
    </style>
@endsection

@section('dashboard-content')
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
                                <a class="nav-link active" id="Exam-tab1" data-toggle="tab" href="#Exam" role="tab" aria-controls="Exam" aria-selected="true">Exam List</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="lp-tab1" data-toggle="tab" href="#certificate" role="tab" aria-controls="certificate" aria-selected="false">Certificate</a>
                            </li>  
                        </ul>
                        <div class="tab-content" id="myTabContent1">
                            <div class="tab-pane fade show active" id="Exam" role="tabpanel" aria-labelledby="Exam-tab1">
                                <div class="inner course_content">
                                    @if(!empty($trainings->first()->trainingExam))
                                        @foreach($trainings->first()->trainingExam as $key => $exam)
                                            <div class="accordion" id="exam_{{$key}}">
                                                <div class="card">
                                                    <div class="card-header" id="exam_heading_{{$key}}">
                                                        <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#exam_collapse{{$key}}" aria-expanded="true" aria-controls="exam_collapse{{$key}}">
                                                            {{$exam->test_title}}
                                                        </button>
                                                        </h2>
                                                    </div>
                                                    
                                                    <div id="exam_collapse{{$key}}" class="collapse" aria-labelledby="exam_heading_{{$key}}" data-parent="#exam_{{$key}}">
                                                        <div class="card-body">
                                                            <div class="ask_question">
                                                                @if(count($exam->questions) > 0)
                                                                    @foreach($exam->questions as $key => $question)
                                                                        <h2>Q1 : {{ $question->exam_title }}</h2>
                                                                        <div class="form_radio">
                                                                            <input type="radio" id="question{{ $question->mcq1 }}" name="radio">
                                                                            <label for="question{{ $question->mcq1 }}">
                                                                                <p>{{ $question->mcq1 }}</p>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form_radio">
                                                                            <input type="radio" id="question{{ $question->mcq2 }}" name="radio">
                                                                            <label for="question{{ $question->mcq2 }}">
                                                                                <p>{{ $question->mcq2 }}</p>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form_radio">
                                                                            <input type="radio" id="question{{ $question->mcq3 }}" name="radio">
                                                                            <label for="question{{ $question->mcq3 }}">
                                                                                <p>{{ $question->mcq3 }}</p>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form_radio">
                                                                            <input type="radio" id="question{{ $question->mcq4 }}" name="radio">
                                                                            <label for="question{{ $question->mcq4 }}">
                                                                                <p>{{ $question->mcq4 }}</p>
                                                                            </label>
                                                                        </div>
                                                                        <div class="form_radio">
                                                                            <input type="radio" id="question{{ $question->mcq5 }}" name="radio">
                                                                            <label for="question{{ $question->mcq5 }}">
                                                                                <p>{{ $question->mcq5 }}</p>
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                    <div>
                                                                        <button class="show_all">Submit</button>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="tab-pane fade" id="certificate" role="tabpanel" aria-labelledby="lp-tab1">
                                <div class="inner plan">
                                    <div class="table_responsive">
                                        <table class="table">
                                           <thead>
                                                <tr>
                                                    <th>Exam</th>
                                                    <th>Total Answer</th>
                                                    <th>Total Correct</th>
                                                    <th>Download</th>
                                                </tr>
                                           </thead>
                                           <tbody>
                                               
                                           </tbody>
                                        </table>
                                     </div>
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
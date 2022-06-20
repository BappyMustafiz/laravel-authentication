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
        .training_exam_list_inner{
            padding: 10px 50px 10px 50px !important;
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
        .exam_card_body{
            padding: 25px 40px 0px 40px !important;
        }
        .exam_result_table{
            display: table !important;
        }
        .exam_error_message{
            color: red;
        }
        .result_modal{
            pointer-events: all !important;
        }
        .post_comment .form-control{
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 15px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 3.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .like_dislike{
            padding: 14px 20px 0px 6px;
            top: 10px;
            position: relative;
        }
        .like_dislike i{
           font-size: 20px;
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
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="comment-tab1" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">Comments</a>
                            </li>  
                            <li class="nav-item" role="presentation">
                                <span class="like_dislike"><i class="lni lni-thumbs-up"></i></span>
                            </li>  
                            <li class="nav-item" role="presentation">
                                <span class="like_dislike"><i class="lni lni-thumbs-down"></i></span>
                            </li>  
                        </ul>
                        <div class="tab-content" id="myTabContent1">
                            <div class="tab-pane fade show active" id="Exam" role="tabpanel" aria-labelledby="Exam-tab1">
                                <div class="inner course_content">
                                    @if(!empty($trainings))
                                        @foreach($trainings as $key => $training)
                                            <div class="accordion" id="training_{{$key}}">
                                                <div class="card">
                                                    <div class="card-header" id="training_heading_{{$key}}">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#training_collapse{{$key}}" aria-expanded="true" aria-controls="training_collapse{{$key}}">
                                                                Training Name - @if(!empty($training->training)){{$training->training->title}} @endif
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="training_collapse{{$key}}" class="collapse @if($errors->has('answer')) show @endif" aria-labelledby="training_heading_{{$key}}" data-parent="#training_{{$key}}">
                                                        <div class="card-body training_exam_list_inner">
                                                            @if(count($training->trainingExam) > 0)
                                                                @foreach($training->trainingExam as $key => $exam)
                                                                    <div class="accordion" id="exam_{{$key}}">
                                                                        <div class="card">
                                                                            <div class="card-header" id="exam_heading_{{$key}}">
                                                                                <h2 class="mb-0">
                                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#exam_collapse{{$key}}" aria-expanded="true" aria-controls="exam_collapse{{$key}}">
                                                                                    Exam Name - {{$exam->test_title}}
                                                                                </button>
                                                                                </h2>
                                                                            </div>
                                                                            <div id="exam_collapse{{$key}}" class="collapse @if($errors->has('answer')) show @endif" aria-labelledby="exam_heading_{{$key}}" data-parent="#exam_{{$key}}">
                                                                                <div class="card-body exam_card_body">
                                                                                    <div class="ask_question">
                                                                                        @if(count($exam->questions) > 0)
                                                                                            <form method="POST" action="{{ route('exam_question_submit') }}">
                                                                                                @csrf
                                                                                                @foreach($exam->questions as $key => $question)
                                                                                                    <h2>Q1 : {{ $question->exam_title }}</h2>
                                                                                                    <div class="form_radio">
                                                                                                        <input type="radio"  value="{{ $question->mcq1 }}" id="question_{{ $question->id }}_{{ $question->mcq1 }}" name="answer[{{ $question->id }}]">
                                                                                                        <label for="question_{{ $question->id }}_{{ $question->mcq1 }}">
                                                                                                            <p>{{ $question->mcq1 }}</p>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="form_radio">
                                                                                                        <input type="radio" value="{{ $question->mcq2 }}" id="question_{{ $question->id }}_{{ $question->mcq2 }}" name="answer[{{ $question->id }}]">
                                                                                                        <label for="question_{{ $question->id }}_{{ $question->mcq2 }}">
                                                                                                            <p>{{ $question->mcq2 }}</p>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="form_radio">
                                                                                                        <input type="radio"  value="{{ $question->mcq3 }}" id="question_{{ $question->id }}_{{ $question->mcq3 }}" name="answer[{{ $question->id }}]">
                                                                                                        <label for="question_{{ $question->id }}_{{ $question->mcq3 }}">
                                                                                                            <p>{{ $question->mcq3 }}</p>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="form_radio">
                                                                                                        <input type="radio" value="{{ $question->mcq4 }}" id="question_{{ $question->id }}_{{ $question->mcq4 }}" name="answer[{{ $question->id }}]">
                                                                                                        <label for="question_{{ $question->id }}_{{ $question->mcq4 }}">
                                                                                                            <p>{{ $question->mcq4 }}</p>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    @if(!empty($question->mcq5))
                                                                                                        <div class="form_radio">
                                                                                                            <input type="radio"  id="question_{{ $question->id }}_{{ $question->mcq5 }}" name="answer[{{ $question->id }}]">
                                                                                                            <label for="question_{{ $question->id }}_{{ $question->mcq5 }}">
                                                                                                                <p>{{ $question->mcq5 }}</p>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                    @if ($errors->has('answer'))
                                                                                                        <p class="exam_error_message">{{ $errors->first('answer') }}</p>
                                                                                                    @endif
                                                                                                    <br>
                                                                                                @endforeach
                                                                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                                                                <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                                                                                                <div>
                                                                                                    <button type="submit" class="show_all examSubmitBtn">Submit</button>
                                                                                                </div>
                                                                                            </form>
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
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="tab-pane fade" id="certificate" role="tabpanel" aria-labelledby="lp-tab1">
                                <div class="inner plan">
                                    <div class="row mb_15">
                                        <div class="col-md-12">
                                           <div class="card">
                                              <div class="card_header">
                                                 <div class="card_title width_full">
                                                    <div class="d_flex_btwn">
                                                       <div>Exam Result</div>
                                                    </div>
                                                 </div>
                                              </div>
                                              <div class="card_body">
                                                  <div class="table_responsive">
                                                    <table class="table table_bordered table_center exam_result_table">
                                                        <thead>
                                                            <tr>
                                                                <th>Exam</th>
                                                                <th>Total Answer</th>
                                                                <th>Total Correct</th>
                                                                <th>Total Score</th>
                                                                <th>Download</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(count($trainingExamResult) > 0)
                                                                @foreach($trainingExamResult as $key => $result)
                                                                    @php
                                                                        $totalAnswer = App\Models\TrainingExamAnswer::where('training_exam_id', $result->training_exam_id)
                                                                                                        ->where('user_id', $result->user_id)
                                                                                                        ->where('exam_number', $result->exam_number)
                                                                                                        ->count();
                                    
                                                                        $totalCorrect = App\Models\TrainingExamAnswer::where('training_exam_id', $result->training_exam_id)
                                                                                                            ->where('user_id', $result->user_id)
                                                                                                            ->where('exam_number', $result->exam_number)
                                                                                                            ->where('correct', 1)
                                                                                                            ->sum('correct');

                                                                        $totalScore = App\Models\TrainingExamAnswer::where('training_exam_id', $result->training_exam_id)
                                                                                                        ->where('user_id', $result->user_id)
                                                                                                        ->where('exam_number', $result->exam_number)
                                                                                                        ->where('correct', 1)
                                                                                                        ->sum('score');
                                                                    @endphp
                                                                    <tr>
                                                                        <td>@if(!empty($$result->trainingExam)){{ $result->trainingExam->test_title }} - @endif {{ $result->exam_number }} Time</td>
                                                                        <td>{{ $totalAnswer }}</td>
                                                                        <td>{{ $totalCorrect }}</td>
                                                                        <td>{{ $totalScore }}</td>
                                                                        <td>
                                                                            <a class="btn btn_sm btn_success" href="{{ route('user_print_certificate', ['result' => $result->exam_number]) }}" target="_blank">Download Certificate</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                  </div>
                                              </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comment-tab1">
                                <div class="inner  announcements">
                                    <div class="inner_wrap">
                                        <form method="POST" action="{{ route('comment_submit') }}">
                                            @csrf
                                            <div class="post_comment">
                                                <img src="{{ asset('assets/user-dashboard-assets/assets/media/images/author.jpg') }}" alt="">
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="training_id" value="{{ $trainings ? $trainings[0]->id : '' }}">
                                                <input type="text" class="form-control" name="comment" placeholder="Enter your comment">
                                                <button type="submit">Submit</button>

                                                @if ($errors->has('comment'))
                                                    <div class="error-div">
                                                        <small class="text_danger">{{ $errors->first('comment') }}</small>
                                                    </div>
                                                @endif
                                                
                                            </div>
                                        </form>
                                        <div class="all_comment">
                                            @if($commentList)
                                                @foreach($commentList as $comment)
                                                    <div class="all_comment_inner">
                                                        <img src="{{ asset('assets/user-dashboard-assets/assets/media/images/author.jpg') }}" alt="">
                                                        <div class="text">
                                                            <p>
                                                                <a href="#">{{ auth()->user()->name }}</a> 
                                                                <span class="time">{{ $comment->created_at->diffForHumans() }}</span> 
                                                                <span><i class="fas fa-flag"></i></span>
                                                            </p>
                                                            <p>{{ $comment->comments }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
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
                                            @if(!empty($training->training)){{$training->training->title}}@endif
                                        </button>
                                        </h2>
                                    </div>
                                
                                    <div id="collapse{{$key}}" class="collapse show" aria-labelledby="heading_{{$key}}" data-parent="#training_{{$key}}">
                                        <div class="card-body">
                                            <ul>
                                                @if(!empty($training->training))
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
                                                @endif
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
    
    @if(session()->has('examResult'))
        <div data-modal="modal" class="modal result_modal open_modal">
            <div data-modal-close="modal" class="modal_overlay"></div> 
            <div class="modal_inner">
                <div class="modal_wrapper modal_1080p">
                    <div class="modal_header">
                        <h2>Result Modal</h2>
                    </div> 
                    <div class="modal_content">
                        <div class="row">
                            <div class="col_6">
                                <div class="form-group">
                                    <label>Total Given Answer</label>
                                    <p>{{ session('examResult')['total']['totalAnswer'] }}</p>
                                </div>
                            </div> 
                            <div class="col_6">
                                <div class="form-group ">
                                    <label>Total Correct Answer</label> 
                                    <p>{{ session('examResult')['total']['totalCorrect'] }}</p>
                                </div>
                            </div>
                            <div class="col_6">
                                <div class="form-group ">
                                    <label>Total Score Gained</label> 
                                    <p>{{ session('examResult')['total']['totalScore'] }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="d_flex_end">
                            <button class="btn btn_secondary result_modal_close mr_5">Cancel</button>
                        </div>
                    </div>
                </div>
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

        $(document).on('click', '.result_modal_close', function(){
              $(".result_modal").removeClass("open_modal");
        });
    });
    </script>
@endsection
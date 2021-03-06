@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.training_exam_question.partials.title')
@endsection
@section('styles')
    
@endsection
@section('admin-content')
    @include('backend.dashboard.admin.training_exam_question.partials.header-breadcrumbs')
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                @include('backend.layouts.partials.messages')
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('training-exam-question.index') }}" class="btn btn-info"> <i class="icofont icofont-list"></i> Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <form action="{{ route('training-exam-question.store') }}" method="POST" data-parsley-validate data-parsley-focus="first">
                            @csrf
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="question_title">Question Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="question_title" name="question_title" value="{{ old('question_title') }}" placeholder="Enter Question Title" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="exam_id">Exam <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="exam_id" name="exam_id" required>
                                            <option value="" selected>Select Exam</option>
                                            @foreach($trainingExams as $exam)
                                                <option value="{{ $exam->id }}" @if( old('exam_id') == $exam->id ) selected @endif>{{ $exam->test_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="question_type">Question Type</label>
                                        <select class="form-control custom-select" id="question_type" name="question_type" required>
                                            <option value="2" @if( old('question_type') == 2 ) selected @endif>Multiple choice</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="mcq1">Mcq One</label>
                                        <input type="text" class="form-control" id="mcq1" name="mcq1" value="{{ old('mcq1') }}" placeholder="Enter Mcq Question One"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="mcq2">Mcq Two</label>
                                        <input type="text" class="form-control" id="mcq2" name="mcq2" value="{{ old('mcq2') }}" placeholder="Enter Mcq Question Two"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="mcq3">Mcq Three</label>
                                        <input type="text" class="form-control" id="mcq3" name="mcq3" value="{{ old('mcq3') }}" placeholder="Enter Mcq Question Three"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="mcq4">Mcq Four</label>
                                        <input type="text" class="form-control" id="mcq4" name="mcq4" value="{{ old('mcq4') }}" placeholder="Enter Mcq Question Four"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="mcq5">Mcq Five</label>
                                        <input type="text" class="form-control" id="mcq1" name="mcq5" value="{{ old('mcq5') }}" placeholder="Enter Mcq Question Five"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="answer">Answer</label>
                                        <input type="text" class="form-control" id="answer" name="answer" value="{{ old('answer') }}" placeholder="Enter Answer of the Question"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"> <i class="icofont icofont-check"></i> Save</button>
                                    <a href="{{ route('training-exam-question.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".dropify").dropify();
    });
</script>
@endsection
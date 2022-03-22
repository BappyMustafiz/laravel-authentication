@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.training_exams.partials.title')
@endsection
@section('styles')
    
@endsection
@section('admin-content')
    @include('backend.dashboard.admin.training_exams.partials.header-breadcrumbs')
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
                                <a href="{{ route('training-exams.index') }}" class="btn btn-info"> <i class="icofont icofont-list"></i> Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <form action="{{ route('training-exams.update', $training_exam->id) }}" method="POST" data-parsley-validate data-parsley-focus="first">
                            @csrf
                            @method('put')
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="test_title">Video Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="test_title" name="test_title" value="{{ $training_exam->test_title }}" placeholder="Enter Exam Title" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="training_id">Training<span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="training_id" name="training_id" required>
                                            <option value="" selected>Select Training</option>
                                            @foreach($trainings as $training)
                                                @if($training->id == $training_exam->training_id)
                                                    <option value="{{ $training->id }}" selected>{{ $training->title }}</option>
                                                @else
                                                    <option value="{{ $training->id }}">{{ $training->title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="time_limit">Time Limit</label>
                                        <input type="number" min="0" class="form-control" id="time_limit" name="time_limit" value="{{ $training_exam->time_limit }}" placeholder="Enter Time Limit"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="number_of_question">Number of Question</label>
                                        <input type="number" min="0" class="form-control" id="number_of_question" name="number_of_question" value="{{ $training_exam->number_of_question }}" placeholder="Enter Number of Question"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="marks_per_question">Marks per Question</label>
                                        <input type="text" class="form-control" id="marks_per_question" name="marks_per_question" value="{{ $training_exam->marks_per_question }}" placeholder="Enter Marks per Question"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"> <i class="icofont icofont-check"></i> Update</button>
                                    <a href="{{ route('training-exams.index') }}" class="btn btn-danger">Cancel</a>
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
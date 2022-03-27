@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.videos.partials.title')
@endsection
@section('styles')
    
@endsection
@section('admin-content')
    @include('backend.dashboard.admin.videos.partials.header-breadcrumbs')
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
                                <a href="{{ route('videos.index') }}" class="btn btn-info"> <i class="icofont icofont-list"></i> Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                            @csrf
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Video Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter Video Title" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="training_id">Training <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="training_id" name="training_id" required>
                                            <option value="" selected>Select Training</option>
                                            @foreach($trainings as $training)
                                                <option value="{{ $training->id }}" @if( old('training_id') == $training->id ) selected @endif>{{ $training->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="video">Video <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control dropify" data-height="150" id="video" name="video" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="image">Image <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control dropify" data-height="150" id="image" name="image" 
                                        data-allowed-file-extensions="png jpg jpeg webp svg" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="short_description">Short Description <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="short_description" name="short_description" value="{{ old('short_description') }}" placeholder="Short Description" required=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"> <i class="icofont icofont-check"></i> Save</button>
                                    <a href="{{ route('videos.index') }}" class="btn btn-danger">Cancel</a>
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
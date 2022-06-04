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
                        <form action="{{ route('videos.update', $video->id) }}" enctype="multipart/form-data" method="POST" data-parsley-validate data-parsley-focus="first">
                            @csrf
                            @method('put')
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Video Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $video->title }}" placeholder="Enter Video Title" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="training_id">Training<span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="training_id" name="training_id" required>
                                            <option value="" selected>Select Training</option>
                                            @foreach($trainings as $training)
                                                @if($training->id == $video->training_id)
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
                                        <label class="control-label" for="video">Video</label>
                                        <input type="file" class="form-control dropify" data-height="150" id="video" name="video" 
                                        data-default-file="{{ $video->video != null ? asset('uploaded_files/videos/trainings/'.$video->video) : null }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="image">Image <span class="text-info">( Recommended Size: 120px X 80px )</span></label>
                                        <input type="file" class="form-control dropify" data-height="150" id="image" name="image" 
                                        data-allowed-file-extensions="png jpg jpeg webp svg" 
                                        data-default-file="{{ $video->image != null ? asset('uploaded_files/images/trainings/'.$video->image) : null }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="short_description">Short Description <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="short_description" name="short_description" value="{{ $video->short_description }}" placeholder="Short Description" required=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"> <i class="icofont icofont-check"></i> Update</button>
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
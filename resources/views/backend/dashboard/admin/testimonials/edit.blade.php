@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.testimonials.partials.title')
@endsection
@section('styles')
    
@endsection
@section('admin-content')
    @include('backend.dashboard.admin.testimonials.partials.header-breadcrumbs')
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
                                <a href="{{ route('testimonials.index') }}" class="btn btn-info"> <i class="icofont icofont-list"></i> Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <form action="{{ route('testimonials.update', $testimonial->id) }}" enctype="multipart/form-data" method="POST" data-parsley-validate data-parsley-focus="first">
                            @csrf
                            @method('put')
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Testimonial Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $testimonial->title }}" placeholder="Enter Testimonial Title" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="user_name">User Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $testimonial->user_name }}" placeholder="Enter User Name" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="designation">Designation <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="designation" name="designation" value="{{ $testimonial->designation }}" placeholder="Enter Designation" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="user_image">Image <span class="text-info">( Recommended Size: 48px X 48px )</span></label>
                                        <input type="file" class="form-control dropify" data-height="150" id="user_image" name="user_image" 
                                        data-allowed-file-extensions="png jpg jpeg webp svg" 
                                        data-default-file="{{ $testimonial->user_image != null ? asset('uploaded_files/images/testimonials/'.$testimonial->user_image) : null }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"> <i class="icofont icofont-check"></i> Update</button>
                                    <a href="{{ route('testimonials.index') }}" class="btn btn-danger">Cancel</a>
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
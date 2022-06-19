@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.brands.partials.title')
@endsection
@section('styles')
    
@endsection
@section('admin-content')
    @include('backend.dashboard.admin.brands.partials.header-breadcrumbs')
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
                                <a href="{{ route('brands.index') }}" class="btn btn-info"> <i class="icofont icofont-list"></i> Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <form action="{{ route('brands.update', $brand->id) }}" enctype="multipart/form-data" method="POST" data-parsley-validate data-parsley-focus="first">
                            @csrf
                            @method('put')
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Brand Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $brand->title }}" placeholder="Enter Brand Title" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="image">Image</label>
                                        <input type="file" class="form-control dropify" data-height="150" id="image" name="image" 
                                        data-allowed-file-extensions="png jpg jpeg webp svg" 
                                        data-default-file="{{ $brand->image != null ? asset('uploaded_files/images/brands/'.$brand->image) : null }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"> <i class="icofont icofont-check"></i> Update</button>
                                    <a href="{{ route('brands.index') }}" class="btn btn-danger">Cancel</a>
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
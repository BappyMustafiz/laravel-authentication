@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.blog_post.partials.title')
@endsection
@section('styles')
    
@endsection
@section('admin-content')
    @include('backend.dashboard.admin.blog_post.partials.header-breadcrumbs')
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
                                <a href="{{ route('blog-post.index') }}" class="btn btn-info"> <i class="icofont icofont-list"></i> Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <form action="{{ route('blog-post.update', $blogPost->id) }}" enctype="multipart/form-data" method="POST" data-parsley-validate data-parsley-focus="first">
                            @csrf
                            @method('put')
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-radio">
                                        <div class="radio radio-inline">
                                            <label>
                                                <input type="radio" id="statusActive" name="status" value="1" checked="{{ empty(old('status')) ? ($blogPost->status == 1 ? 'checked' : '') : (old('status') == 1 ? 'checked' : '') }}">
                                                <i class="helper"></i>Active
                                            </label>
                                        </div>

                                        <div class="radio radio-inline">
                                            <label>
                                                <input type="radio" id="statusInactive" name="status" value="0" checked="{{ empty(old('status')) ? ($blogPost->status == 0 ? 'checked' : '') : (old('status') == 0 ? 'checked' : '') }}">
                                                <i class="helper"></i>Inactive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Blog Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ empty(old('post_title')) ? ($errors->has('post_title') ? '' : $blogPost->title) : old('post_title') }}" placeholder="Enter Blog Title" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="category_id">Blog Category<span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="category_id" name="category_id" required>
                                            <option value="" selected>Select Blog Category</option>
                                            @foreach($blogCategories as $category)
                                                <option value="{{ $category->id }}" {{ empty(old('category_id')) ? ($errors->has('category_id') ? '' : ($blogPost->category_id == $category->id ? 'selected' : '')) :
                                                (old('category_id') == $category->id ? 'selected' : '') }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="post_description">Description</label>
                                        <textarea class="form-control" name="post_description" id="post_description" rows="8">{{ empty(old('post_description')) ? ($errors->has('post_description') ? '' : $blogPost->description) : old('post_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="image">Image</label>
                                        <div class="form-group">
                                            <label class="control-label" for="image">Image</label>
                                            <input type="file" class="form-control dropify" data-height="150" id="image" name="image" 
                                            data-allowed-file-extensions="png jpg jpeg webp svg" 
                                            data-default-file="{{ $blogPost->image != null ? asset('uploaded_files/images/blog_post/'.$blogPost->image) : null }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="tags">Tags</label>
                                        <input type="text" class="form_global" name="post_tags" id="tags" data-role="tagsinput" value="{{ empty(old('post_tags')) ? ($errors->has('post_tags') ? '' : $blogPost['tags']) : old('post_tags') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"> <i class="icofont icofont-check"></i> Save</button>
                                    <a href="{{ route('blog-post.index') }}" class="btn btn-danger">Cancel</a>
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
<script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
<script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".dropify").dropify();

        var options = {
            filebrowserImageBrowseUrl: '{{ url('training-manager') }}?type=Images',
            filebrowserImageUploadUrl: '{{ url('training-manager') }}/upload?type=Images&_token=',
            filebrowserBrowseUrl: '{{ url('training-manager') }}?type=Files',
            filebrowserUploadUrl: '{{ url('training-manager') }}?type=Files&_token='
        };

        CKEDITOR.config.allowedContent = true;
        CKEDITOR.replace('post_description', options);
    });
</script>
@endsection
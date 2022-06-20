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
                        <form action="{{ route('blog-post.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                            @csrf
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom_radio">
                                            <input type="radio" id="statusActiveCategory" name="statusCategory" class="custom-control-input"
                                                    value="1" {{ (old('statusCategory') == '1' || empty(old('statusCategory'))) ? 'checked' : '' }}>
                                            <label class="control-label" for="statusActiveCategory">Active</label>
                                        </div>
                                        <div class="custom_radio">
                                            <input type="radio" id="statusInactiveCategory" name="statusCategory" class="custom-control-input"
                                                    value="0" {{ old('statusCategory') == '0' ? 'checked' : '' }}>
                                            <label class="control-label" for="statusInactiveCategory">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Blog Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter Blog Title" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="category_id">Blog Category<span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="category_id" name="category_id" required>
                                            <option value="" selected>Select Blog Category</option>
                                            @foreach($blogCategories as $category)
                                                <option value="{{ $category->id }}" @if( old('category_id') == $category->id ) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="post_description">Description</label>
                                        <textarea class="form-control" name="post_description" id="post_description" rows="8">{{ old('post_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="image">Image</label>
                                        <input type="file" class="form-control dropify" data-height="150" id="image" name="image" 
                                        data-allowed-file-extensions="png jpg jpeg webp svg" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="tags">Tags</label>
                                        <input type="text" class="form-control" name="post_tags" id="tags" data-role="tagsinput">
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
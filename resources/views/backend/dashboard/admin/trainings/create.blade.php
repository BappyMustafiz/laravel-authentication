@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.trainings.partials.title')
@endsection
@section('styles')
    
@endsection
@section('admin-content')
    @include('backend.dashboard.admin.trainings.partials.header-breadcrumbs')
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
                                <a href="{{ route('trainings.index') }}" class="btn btn-info"> <i class="icofont icofont-list"></i> Back to List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
                        <form action="{{ route('trainings.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                            @csrf
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Training Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter Training Title" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="training_category_id">Training Category<span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="training_category_id" name="training_category_id" required>
                                            <option value="" selected>Select Training Category</option>
                                            @foreach($training_categories as $category)
                                                <option value="{{ $category->id }}" @if( old('training_category_id') == $category->id ) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="price">Price <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}"  placeholder="Enter Price" required=""/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="discount_price">Discount Price </label>
                                        <input type="text" class="form-control" id="discount_price" name="discount_price" value="{{ old('discount_price') }}" placeholder="Enter Discount Price"/>
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
                                        <label class="control-label" for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="8">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"> <i class="icofont icofont-check"></i> Save</button>
                                    <a href="{{ route('trainings.index') }}" class="btn btn-danger">Cancel</a>
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
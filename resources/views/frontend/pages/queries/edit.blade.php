@extends('frontend.layouts.master')
@section('main-content')
<section class="my_setting_top common_margin">
    <div class="container custom_container">
        <div class="row">
            <div class="col-12">
                <div class="product_wrap_title mt_20">
                    <h2><span>My Dashboard</span></h2>
                </div>
            </div>
        </div>
    </div>
    
    <div class="my_setting_area">
        <div class="container custom_container">
            <div class="row product_custom_margin">
                <div class="col-12">
                    <div class="order_history_filter">
                        <div class="row">
                            <div class="col-md-2 ">
                                <div class="left_cat d_none">
                                    <ul>
                                        <li @if(request()->routeIs('customer-dashboard')) class="active" @endif>
                                            <a href="{{ route('customer-dashboard') }}">Profile Setting</a>
                                        </li>
                                        <li @if(request()->routeIs('queries.index') || request()->routeIs('queries.create') || request()->routeIs('queries.edit')) class="active" @endif>
                                            <a href="{{ route('queries.index') }}">Query</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <!-- <b>6 Orders </b> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 m_none">
                    <div class="left_cat">
                        <ul>
                            <li @if(request()->routeIs('customer-dashboard')) class="active" @endif>
                                <a href="{{ route('customer-dashboard') }}">Profile Setting</a>
                            </li>
                            <li @if(request()->routeIs('queries.index') || request()->routeIs('queries.create') || request()->routeIs('queries.edit')) class="active" @endif>
                                <a href="{{ route('queries.index') }}">Query</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="my_setting_wrap">
                        <h2>My Query</h2>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <button class="btn_common" onclick="location.href='{{ route('queries.index') }}'">Back to List</button>
                            </div>
                        </div>
                        <form action="{{ route('queries.update', $customerQuery->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-12 @error('title') has_error @enderror">
                                    <label>Title</label>
                                    <input type="text" class="form-control" placeholder="Title" name="title" value="{{ $customerQuery->title }}">
                                    @error('title')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 @error('content') has_error @enderror">
                                    <label>Content</label>
                                    <textarea name="content" id="content" placeholder="Content" class="form-control" cols="10" rows="5">{{ $customerQuery->content }}</textarea>
                                    @error('content')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <button class="btn_common" type="submit"">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


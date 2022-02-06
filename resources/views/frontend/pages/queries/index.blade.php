@extends('frontend.layouts.master')
@section('styles')
<style>
    .order_history_table table tr td:last-child{
        text-align: left !important;
    }
</style>
@endsection
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
                                <button class="btn_common" onclick="location.href='{{ route('queries.create') }}'">Add New</button>
                            </div>
                        </div>
                        <div class="order_history_table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Content </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($queries)
                                        @foreach($queries as $key => $query)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $query->title }}</td>
                                                <td>{{ $query->content }}</td>
                                                <td>
                                                    <a href="{{ route('queries.edit', $query->id) }}" class="text-info">Edit</a> | 
                                                    <span style="display: inline-block">
                                                        <form action="{{ route('queries.destroy', $query->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-danger" style="border: none; background:none">Delete</button>
                                                    </form>
                                                    </span>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


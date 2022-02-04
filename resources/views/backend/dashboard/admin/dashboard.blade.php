@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.partials.title')
@endsection
@section('styles')
    <style>
        .active{
            background: rgba(0, 0, 0, .1);
            border-left: 2px solid #2ed8b6;
        }
    </style>
@endsection
@section('admin-content')
    @include('backend.dashboard.admin.partials.header-breadcrumbs')
    <div class="page-body">
        <div class="row">
            
        </div>
    </div>
@endsection
@section('scripts')

@endsection
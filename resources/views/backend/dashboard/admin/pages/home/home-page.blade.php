@extends('backend.layouts.master')
@section('title')
Home Page | Admin Panel - 
{{ config('app.name') }}
@endsection
@section('styles')
    
@endsection
@section('admin-content')
    <div class="page-header">
        <div class="page-header-title">
            <h4>Home Page</h4>
        </div>
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Home Page</li>
            </ul>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                @include('backend.layouts.partials.messages')
                @include('backend.dashboard.admin.pages.home.form-components.section_one')
                @include('backend.dashboard.admin.pages.home.form-components.section_brand')
                @include('backend.dashboard.admin.pages.home.form-components.section_two')
                @include('backend.dashboard.admin.pages.home.form-components.section_three')
                @include('backend.dashboard.admin.pages.home.form-components.section_four')
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
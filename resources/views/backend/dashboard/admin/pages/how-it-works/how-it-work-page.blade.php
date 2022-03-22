@extends('backend.layouts.master')
@section('title')
How it Work Page | Admin Panel - 
{{ config('app.name') }}
@endsection
@section('styles')
    
@endsection
@section('admin-content')
    <div class="page-header">
        <div class="page-header-title">
            <h4>How it Work Page</h4>
        </div>
        <div class="page-header-breadcrumb">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">How it Work Page</li>
            </ul>
        </div>
    </div>
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                @include('backend.layouts.partials.messages')
                @include('backend.dashboard.admin.pages.how-it-works.form-components.top_section')
                @include('backend.dashboard.admin.pages.how-it-works.form-components.step_one')
                @include('backend.dashboard.admin.pages.how-it-works.form-components.step_two')
                @include('backend.dashboard.admin.pages.how-it-works.form-components.step_three')
                @include('backend.dashboard.admin.pages.how-it-works.form-components.step_four')
                @include('backend.dashboard.admin.pages.how-it-works.form-components.bottom_section')
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
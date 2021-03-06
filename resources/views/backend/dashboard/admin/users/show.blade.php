@extends('backend.layouts.master')
@section('title')
    @include('backend.dashboard.admin.users.partials.title')
@endsection
@section('styles')
    
@endsection
@section('admin-content')
    @include('backend.dashboard.admin.users.partials.header-breadcrumbs')
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                @include('backend.layouts.partials.messages')
                <div class="card">
                    <div class="card-block">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">First Name </label>
                                    <br>
                                    {{ $user->first_name }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Last Name </label>
                                    <br>
                                    {{ $user->last_name }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Email </label>
                                    <br>
                                    {{ $user->email }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="status">Status </label>
                                    <br>
                                    {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <a  class="btn btn-info" href="{{ route('users.index') }}"> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    
</script>
@endsection
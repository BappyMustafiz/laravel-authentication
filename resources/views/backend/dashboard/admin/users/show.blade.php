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
                                    <label class="control-label" for="name">User Name </label>
                                    <br>
                                    {{ $user->name }}
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
                                    {{ $user->admin_verified === 1 ? 'Verified' : 'Unverified' }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Kennel Name </label>
                                    <br>
                                    {{ $user->kennel_name }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Usda License </label>
                                    <br>
                                    {{ $user->usda_license }}
                                </div>
                            </div>
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
                                    <label class="control-label" for="name">Phone </label>
                                    <br>
                                    {{ $user->phone }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Address</label>
                                    <br>
                                    {{ $user->address }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Address 2</label>
                                    <br>
                                    {{ $user->address_two }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">City </label>
                                    <br>
                                    {{ $user->city }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">State </label>
                                    <br>
                                    {{ $user->state }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Country </label>
                                    <br>
                                    {{ $user->country }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Post Code</label>
                                    <br>
                                    {{ $user->postal_code }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="name">Kennel Description </label>
                                    <br>
                                    {{ $user->kennel_description }}
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
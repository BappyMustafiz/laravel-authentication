@extends('frontend.layouts.master')
@section('styles')
<style>
    .custom_button{
        border: none !important;
        background: inherit!important;
        text-decoration: none!important;
        cursor: pointer!important;
    }
</style>
@endsection
@section('main-content')
<div class="login_area">
    <div class="login_content">
        <div class="login_form">
            <h2>You forgot your Password?</h2>
            <p>Don't worry, reset your password below</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group @error('email') has_error @enderror @if(session('status')) has_error @endif">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <small>
                            <span>{{ $message }}</span>
                        </small>
                    @enderror
                    @if(session('status'))
                        <small>
                            <span>{{ session('status') }}</span>
                        </small>
                    @endif
                </div>
                <div class="d_flex_start mt_20 mb_20 login_btn_wrap">
                    <button type="submit" class="btn login_btn" style="width: 100%;">Email Password Reset Link</button>
                </div>
                <div class="card-footer">
                    <div class="col-sm-12 col-xs-12 text-center">
                        <span class="text-muted">Want to Log In?</span>
                        <a class="ml_20 custom_button" href="{{ route('login') }}">Sign In</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="login_banner">
            <img src="{{asset('assets/frontend/media/images/login_bg.png')}}" alt="" class="img-fluid">
        </div>
    </div>
</div>
@endsection
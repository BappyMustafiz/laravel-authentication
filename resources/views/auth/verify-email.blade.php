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
            <h2>Please Verify Email</h2>
            <p >Thanks for signing up! Before getting started, could <br> you verify your email address by clicking on  the link <br> we just emailed to you? If you didn't receive the <br> email, we will gladly send you another.</p>
            @if (session('status') == 'verification-link-sent')
                <p>A new verification link has been sent to the email <br> address you provided during registration.</p>
            @endif
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <button type="submit" class="btn login_btn" style="width: 100%;">Resend Verification Email</button>
                    </div>
                </div>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="card-footer">
                    <div class="col-sm-12 col-xs-12 text-center">
                        <span class="text-muted">Want to Sign Out?</span>
                        <button type="submit" class="ml_20 custom_button">Sign Out</button>
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
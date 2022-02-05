@extends('frontend.layouts.master')
@section('main-content')
<div class="login_area">
    <div class="login_content">
        <div class="login_form">
            <h2>Existing Accounts Log In</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group @error('email') has_error @enderror">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <small>
                            <span>{{ $message }}</span>
                        </small>
                    @enderror
                </div>
                <div class="form-group @error('password') has_error @enderror">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{ old('password') }}">
                    @error('password')
                        <small>
                            <span>{{ $message }}</span>
                        </small>
                    @enderror
                </div>
                <div class="d_flex_start mt_20 mb_20 login_btn_wrap">
                    <button type="submit" class="btn login_btn">LOGIN</button>
                    @if (Route::has('password.request'))
                        <div class="col-sm-6 col-xs-12 forgot-phone text-right">
                            <a href="{{ route('password.request') }}" class="ml_20"> Forgot Password?</a>
                        </div>
                    @endif
                </div>
            </form>
            <h2>New Account Registration</h2>
            <a href="{{ route('register') }}" class="btn login_btn">Click Here To Register</a>
        </div>
        <div class="login_banner">
            <img src="{{asset('assets/frontend/media/images/login_bg.png')}}" alt="" class="img-fluid">
        </div>
    </div>
</div>
@endsection
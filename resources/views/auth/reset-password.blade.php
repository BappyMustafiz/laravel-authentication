@extends('frontend.layouts.master')
@section('main-content')
<div class="login_area">
    <div class="login_content">
        <div class="login_form">
            <h2>Reset Password</h2>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="form-group @error('email') has_error @enderror">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email', $request->email) }}">
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
                <div class="form-group @error('password_confirmation') has_error @enderror">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" placeholder="Password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                        <small>
                            <span>{{ $message }}</span>
                        </small>
                    @enderror
                </div>
                <div class="d_flex_start mt_20 mb_20 login_btn_wrap">
                    <button type="submit" class="btn login_btn">Reset Password</button>
                </div>
            </form>
        </div>
        <div class="login_banner">
            <img src="{{asset('assets/frontend/media/images/login_bg.png')}}" alt="" class="img-fluid">
        </div>
    </div>
</div>
@endsection
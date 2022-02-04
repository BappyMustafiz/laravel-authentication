@extends('frontend.layouts.master')
@section('main-content')
<div class="login_area">
    <div class="login_content">
        <div class="login_form">
            <h2>Existing Accounts Log In</h2>
            <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group has_error">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <small><span> Field doesn't look like valid.</span></small>
                </div>
                <div class="d_flex_start mt_20 mb_20 login_btn_wrap">
                    <button type="submit" class="btn login_btn">LOGIN</button>
                    <a href="#" class="ml_20">Forget Password</a>
                </div>
            </form>
            <h2>New Account Registration</h2>
            <a href="{{ route('customer-register') }}" class="btn login_btn">Click Here To Register</a>
        </div>
        <div class="login_banner">
            <img src="{{asset('assets/frontend/media/images/login_bg.png')}}" alt="" class="img-fluid">
        </div>
    </div>
</div>
@endsection
@extends('backend.auth.master')

@section('auth-content')
<section class="login p-fixed d-flex text-center bg-primary">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="login-card card-block auth-body">
                    <form class="md-float-material" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="text-center">
                            <a href="/">
                                <img src="{{ asset('assets/backend/assets/images/auth/logo.png') }}" alt="logo.png">
                            </a>
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">You forgot your Password? </h3>
                                    <h5 class="text-center" style="color: #666666">Don't worry, reset your password below</h5>
                                </div>
                            </div>
                            <p class="text-inverse b-b-default text-right">Back to <a href="{{ route('login') }}">Sign In</a></p>
                            <div class="input-group" @error('email') style="margin-bottom: 0px !important" @enderror @if(session('status')) style="margin-bottom: 0px !important" @endif >
                                <input type="text" class="form-control @error('email')form-control-danger @enderror" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                <span class="md-line"></span>
                            </div>
                            @error('email')
                                <span class="messages">
                                    <p class="text-danger error text-left">{{ $message }}</p>
                                </span>
                            @enderror
                            @if(session('status'))
                                <span class="messages">
                                    <p class="text-info error text-left">{{ session('status') }}</p>
                                </span>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Email Password Reset Link</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
@endsection
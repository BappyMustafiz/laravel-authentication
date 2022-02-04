@extends('backend.auth.master')

@section('auth-content')
<section class="login p-fixed d-flex text-center bg-primary">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="login-card card-block auth-body">
                    <form class="md-float-material" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="text-center">
                            <a href="/">
                                <img src="{{ asset('assets/backend/assets/images/auth/logo.png') }}" alt="logo.png">
                            </a>
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Sign up</h3>
                                </div>
                            </div>
                            @include('backend.layouts.partials.auth-messages')
                            <div class="input-group" @error('email')style="margin-bottom: 0px !important" @enderror>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email')form-control-danger @enderror" placeholder="Email">
                                <span class="md-line"></span>
                            </div>
                            @error('email')
                                <span class="messages">
                                    <p class="text-danger error text-left">{{ $message }}</p>
                                </span>
                            @enderror

                            <div class="input-group" @error('password')style="margin-bottom: 0px !important" @enderror>
                                <input type="password" name="password" class="form-control @error('password')form-control-danger @enderror" placeholder="Password">
                                <span class="md-line"></span>
                            </div>
                            @error('password')
                                <span class="messages">
                                    <p class="text-danger error text-left">{{ $message }}</p>
                                </span>
                            @enderror

                            <div class="input-group" @error('password_confirmation')style="margin-bottom: 0px !important" @enderror>
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation')form-control-danger @enderror"" placeholder="Confirm Password">
                                <span class="md-line"></span>
                            </div>
                            @error('password_confirmation')
                                <span class="messages">
                                    <p class="text-danger error text-left">{{ $message }}</p>
                                </span>
                            @enderror

                            <div class="input-group" @error('kennel_name')style="margin-bottom: 0px !important" @enderror>
                                <input type="text" name="kennel_name" value="{{ old('kennel_name') }}" class="form-control @error('kennel_name')form-control-danger @enderror" placeholder="Kennel Name">
                                <span class="md-line"></span>
                            </div>
                            @error('kennel_name')
                                <span class="messages">
                                    <p class="text-danger error text-left">{{ $message }}</p>
                                </span>
                            @enderror

                            <div class="input-group" @error('name')style="margin-bottom: 0px !important" @enderror>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name')form-control-danger @enderror" placeholder="User Name">
                                <span class="md-line"></span>
                            </div>
                            @error('name')
                                <span class="messages">
                                    <p class="text-danger error text-left " style="margin-bottom: 0px !important">{{ $message }}</p>
                                </span>
                            @enderror

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Create Account</button>
                                </div>
                            </div>
                            @if (Route::has('login'))
                                <div class="card-footer">
                                    <div class="col-sm-12 col-xs-12 text-center">
                                        <span class="text-muted">Already have an account?</span>
                                        <a href="{{ route('login') }}" class="f-w-600 p-l-5">Sign In</a>
                                    </div>
                                </div>
                            @endif
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
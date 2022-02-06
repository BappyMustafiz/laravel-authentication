@extends('backend.auth.master')

@section('auth-content')
<section class="login p-fixed d-flex text-center bg-primary">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="login-card card-block auth-body">
                    <form class="md-float-material" method="POST" action="{{ route('admin-login-post') }}">
                        @csrf
                        <div class="text-center">
                            <a href="/">
                                <img src="{{ asset('assets/backend/assets/images/auth/logo.png') }}" alt="logo.png">
                            </a>
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Sign In</h3>
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
                                    <p class="text-danger error text-left" style="margin-bottom: 0px !important">{{ $message }}</p>
                                </span>
                            @enderror
                            
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
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
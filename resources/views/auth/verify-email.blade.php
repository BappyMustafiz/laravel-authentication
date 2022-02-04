@extends('backend.auth.master')
@section('styles')
    <style>
        .custom_button{
            border: none !important;
            background: inherit!important;
            color: #0275d8!important;
            text-decoration: none!important;
            cursor: pointer!important;
        }
    </style>
@endsection
@section('auth-content')
<section class="login p-fixed d-flex text-center bg-primary">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="login-card card-block auth-body">
                    <div class="text-center">
                        <a href="/">
                            <img src="{{ asset('assets/backend/assets/images/auth/logo.png') }}" alt="logo.png">
                        </a>
                    </div>
                    <div class="auth-box">
                        <p style="color: #777 !important;">Thanks for signing up! Before getting started, could <br> you verify your email address by clicking on  the link <br> we just emailed to you? If you didn't receive the <br> email, we will gladly send you another.</p>
                        @if (session('status') == 'verification-link-sent')
                            <p style="color: #777 !important;">A new verification link has been sent to the email <br> address you provided during registration.</p>
                        @endif
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Resend Verification Email</button>
                                </div>
                            </div>
                        </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="card-footer">
                                <div class="col-sm-12 col-xs-12 text-center">
                                    <span class="text-muted">Want to Sign Out?</span>
                                    <button type="submit" class="f-w-600 p-l-5 custom_button">Sign Out</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
@extends('frontend.auth.master')
@section('auth-content')
    <div class="text-center mb10">
        <h1 class="">Forgot your password?</h1>
        <p class="mt2 pg2">Please enter the email address you used to sign up and we’ll send you a password reset link.</p>
    </div>
    <form class="form" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="input @error('email') error @enderror @if(session('status')) error @endif">
            <label class="above">
                <span class="descriptor">Email</span>
                <input name="email" type="email" value="{{ old('email') }}" autocomplete="off">
                @error('email')
                    <div class="message">
                        <small class="mt2 error error@text">{{ $message }}</small>
                    </div>
                @enderror
                @if(session('status'))
                    <div class="message">
                        <small class="mt2 error error@text">{{ session('status') }}</small>
                    </div>
                @endif
            </label>
        </div>
        <div class="group buttons">
            <button class="button" type="submit">Email Password Reset Link</button>
        </div>
    </form>
    <div class="mt4 mb4 separator flex" style="height: 22px;">
        <div style="flex: 1 1 0%; border-top: 1px solid var(--color-separator); margin-top: 11px;"></div>
        <p class="ml4 mr4 dark60@text pg2">or</p>
        <div style="flex: 1 1 0%; border-top: 1px solid var(--color-separator); margin-top: 11px;"></div>
    </div>
    <div class="mt4 flex justify-center">
        <small class="dark60@text">Back to 
        <a class="textbutton" href="{{ route('login') }}">Sign in</a>
        </small>
    </div>
@endsection
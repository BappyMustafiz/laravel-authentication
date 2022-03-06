@extends('frontend.auth.master')
@section('auth-content')
    <div class="text-center mb10">
        <h1 class="">Sign in</h1>
    </div>
    <form class="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input @error('email') error @enderror">
            <label class="above">
                <span class="descriptor">Email</span>
                <input name="email" type="email" value="{{ old('email') }}" autocomplete="off">
                @error('email')
                    <div class="message">
                        <small class="mt2 error error@text">{{ $message }}</small>
                    </div>
                @enderror
            </label>
        </div>
        <div class="relative flex mv10">
        <div class="input @error('password') error @enderror">
            <label class="above">
                <span class="descriptor">Password</span>
                <input name="password" type="password" value="{{ old('password') }}" autocomplete="off">
                @error('password')
                    <div class="message">
                        <small class="mt2 error error@text">{{ $message }}</small>
                    </div>
                @enderror
            </label>
        </div>
        @if (Route::has('password.request'))
            <div class="absolute top right">
                <a class="textbutton secondary" href="{{ route('password.request') }}">Forgot password?</a>
            </div>
        @endif
        </div>
        <div class="group buttons">
            <button class="button" type="submit">Sign in</button>
        </div>
    </form>
    <div class="mt4 mb4 separator flex" style="height: 22px;">
        <div style="flex: 1 1 0%; border-top: 1px solid var(--color-separator); margin-top: 11px;"></div>
        <p class="ml4 mr4 dark60@text pg2">or</p>
        <div style="flex: 1 1 0%; border-top: 1px solid var(--color-separator); margin-top: 11px;"></div>
    </div>
    <div class="mt4 flex justify-center">
        <small class="dark60@text">Don’t have an account? 
        <a class="textbutton" href="{{ route('register') }}">Sign up</a>
        </small>
    </div>
@endsection
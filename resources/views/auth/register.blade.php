@extends('frontend.auth.master')
@section('auth-content')
    <div class="text-center mb10">
        <h1 class="">Sign up</h1>
        <p class="mt2 pg2">Sign up to start your full-featured free trial.</p>
    </div>
    <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="group">
            <div class="input flex-grow @error('first_name') error @enderror">
                <label class="above">
                    <span class="descriptor">First Name</span>
                    <input name="first_name" type="text" value="{{ old('first_name') }}">
                    @error('first_name')
                        <div class="message">
                            <small class="mt2 error error@text">{{ $message }}</small>
                        </div>
                    @enderror
                </label>
            </div>
            <div class="input flex-grow @error('last_name') error @enderror">
                <label class="above">
                    <span class="descriptor">Last Name</span>
                    <input name="last_name" type="text" value="{{ old('last_name') }}">
                    @error('last_name')
                        <div class="message">
                            <small class="mt2 error error@text">{{ $message }}</small>
                        </div>
                    @enderror
                </label>
            </div>
        </div>
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
        <div class="input @error('password_confirmation') error @enderror">
            <label class="above">
                <span class="descriptor">Confirm Password</span>
                <input name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" autocomplete="off">
                @error('password_confirmation')
                    <div class="message">
                        <small class="mt2 error error@text">{{ $message }}</small>
                    </div>
                @enderror
            </label>
        </div>
        <div class="input checkbox @error('terms') error @enderror">
            <label class="right">
                <span class="descriptor">I have read and accept the 
                    <a class="textbutton" href="#!" tabindex="-1" target="_blank" rel="noopener noreferrer">Terms of Service</a>
                </span>
                <input name="terms" type="checkbox" value="1">
               <div class="toggle"></div>
            </label>
            @error('terms')
                <div class="message">
                    <small class="mt2 error error@text">{{ $message }}</small>
                </div>
            @enderror
        </div>
        <div class="group buttons">
            <button class="button" type="submit">Sign up</button>
        </div>
    </form>
    <div class="mt4 mb4 separator flex" style="height: 22px;">
        <div style="flex: 1 1 0%; border-top: 1px solid var(--color-separator); margin-top: 11px;"></div>
        <p class="ml4 mr4 dark60@text pg2">or</p>
        <div style="flex: 1 1 0%; border-top: 1px solid var(--color-separator); margin-top: 11px;"></div>
    </div>
    <div class="mt4 flex justify-center">
        <small class="dark60@text">Already have an account? 
        <a class="textbutton" href="{{ route('login') }}">Sign in</a>
        </small>
    </div>
@endsection
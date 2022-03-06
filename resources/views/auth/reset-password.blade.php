@extends('frontend.auth.master')
@section('auth-content')
    <div class="text-center mb10">
        <h1 class="">Reset Password</h1>
    </div>
    <form class="form" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="input @error('email') error @enderror">
            <label class="above">
                <span class="descriptor">Email</span>
                <input name="email" type="email" value="{{ old('email', $request->email) }}" autocomplete="off">
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
        <div class="group buttons">
            <button class="button" type="submit">Reset Password</button>
        </div>
    </form>
@endsection
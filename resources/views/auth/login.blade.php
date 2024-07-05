<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container form-container">
    <div class="form-box">
        <h3 class="text-center">{{ __('Login') }}</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

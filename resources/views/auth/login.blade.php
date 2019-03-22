@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/auth/login.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class="container">

        {{-- USER PHOTO --}}
        <div class='user-photo'>
            <img id='user-photo' src='/images/login.jpg' alt='Image of user'>
        </div>

        {{-- EMAIL / PASSWORD --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- EMAIL --}}
            <div class="form-group row">
                <div class="col-md-10 offset-md-1">
                    <label for="email"
                           class="col-md-10 offset-md-1 col-form-label text-md-center">{{ __('E-Mail Address') }}</label>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-10 offset-md-1">
                    <input id="email"
                           type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email"
                           value="{{ old('email') }}"
                           required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- PASSWORD --}}
            <div class="form-group row">
                <div class="col-md-10 offset-md-1">
                    <label for="password"
                           class="col-md-10 offset-md-1 col-form-label text-md-center">{{ __('Password') }}</label>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-10 offset-md-1">
                    <input id="password"
                           type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password"
                           required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- REMEMBER ME --}}
            <div class="form-group row">
                <div class="col-md-9 offset-md-3">
                    <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-md-center" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
                <div class="col-md-10 offset-md-2">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>

        </form>

    </div>

@endsection

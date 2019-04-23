@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/auth/login.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='container-fluid'>

        <div class='login-box'>

            <div class='login-wrapper'>

                <h1 id='login' class='align-items-center'>Login</h1>

                <form id='form' method='POST' action='{{ route("login") }}'>
                    @csrf

                    {{-- EMAIL --}}
                    <div id='email-form-group' class='form-group'>
                        <input id='email'
                               type='email'
                               class='form-control{{ $errors->has("email") ? " is-invalid" : "" }}'
                               name='email'
                               value='{{ old("email") }}'
                               placeholder='{{ old("email") ? old("email") : "email@domain.harvard.edu" }}'
                               required>
                        @if ($errors->has('email'))
                            <span class='invalid-feedback' role='alert'>
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{-- PASSWORD --}}
                    <div class='form-group'>
                        <input id='password'
                               type='password'
                               class='form-control{{ $errors->has("password") ? " is-invalid" : "" }}'
                               placeholder='{{ old("password") ? old("password") : "Password" }}'
                               name='password'
                               required>
                        @if ($errors->has('password'))
                            <span class='invalid-feedback' role='alert'>
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{-- REMEMBER ME --}}
                    <div class='form-check'>
                        <input class='form-check-input'
                               type='checkbox'
                               name='remember'
                               id='remember' {{ old("remember") ? "checked" : "" }}>
                        <label class='form-check-label text-md-center' for='remember'>
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    {{-- BUTTON --}}
                    <div class='login-btn'>
                        <button type='submit' class='btn btn-primary'>
                            {{ __('Login') }}
                        </button>
                    </div>

                </form>

            </div> {{-- END OF LOGIN-WRAPPER --}}

            {{-- FORGOT PASSWORD --}}
            @if (Route::has('password.request'))
                <a class='btn btn-link forgot-password' href='{{ route('password.request') }}'>
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

        </div> {{-- END OF LOGIN-BOX --}}

    </div> {{-- END OF CONTAINER-FLUID --}}

@endsection

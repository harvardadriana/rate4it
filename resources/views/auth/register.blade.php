@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/auth/register.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='container row justify-content-center'>
        <div class='col-md-10'>

            {{-- Heading --}}
            <div class='row'>
                <div class='col-md-5 offset-md-5'>
                    <h1>Register</h1>
                </div>
            </div>

            <form method='POST' action='{{ route('register') }}'>
                @csrf

                {{-- Name --}}
                <div class='form-group row'>
                    <label for='name' class='col-md-5 col-form-label text-md-right'>{{ __('Name') }}</label>

                    <div class='col-md-6'>
                        <input id='name' type='text' class='form-control{{ $errors->has('name') ? ' is-invalid' : '' }}' name='name' value='{{ old('name') }}' required autofocus>

                        @if ($errors->has('name'))
                            <span class='invalid-feedback' role='alert'>
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Email address --}}
                <div class='form-group row'>
                    <label for='email' class='col-md-5 col-form-label text-md-right'>{{ __('E-Mail Address') }}</label>

                    <div class='col-md-6'>
                        <input id='email' type='email' class='form-control{{ $errors->has('email') ? ' is-invalid' : '' }}' name='email' value='{{ old('email') }}' required>

                        @if ($errors->has('email'))
                            <span class='invalid-feedback' role='alert'>
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Password --}}
                <div class='form-group row'>
                    <label for='password' class='col-md-5 col-form-label text-md-right'>{{ __('Password') }}</label>

                    <div class='col-md-6'>
                        <input id='password' type='password' class='form-control{{ $errors->has('password') ? ' is-invalid' : '' }}' name='password' required>

                        @if ($errors->has('password'))
                            <span class='invalid-feedback' role='alert'>
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {{-- Confirm password --}}
                <div class='form-group row'>
                    <label for='password-confirm' class='col-md-5 col-form-label text-md-right'>{{ __('Confirm Password') }}</label>

                    <div class='col-md-6'>
                        <input id='password-confirm' type='password' class='form-control' name='password_confirmation' required>
                    </div>
                </div>

                <div class='form-group row mb-0'>
                    <div class='col-md-5 offset-md-5'>
                        <button type='submit' class='btn btn-primary'>
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

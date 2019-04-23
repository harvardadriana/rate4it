@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/auth/register.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='container-fluid'>

        <div class='login-box'>

            {{-- HEADING --}}
            <h1>Register</h1>

            <form method='POST' action='{{ route('register') }}'>
                @csrf

                {{-- MESSAGE USER --}}
                <div class='row form-group email-requirement'>
                    <div class='col-md-7 offset-md-5'>
                        <small>* A Harvard email account is required for registration</small>
                    </div>
                </div>


                {{-- NAME --}}
                <div class='row form-group'>
                    <label for='name' class='col-10 col-md-5 col-form-label'>{{ __('Name') }}</label>
                    <input id='name'
                           type='text'
                           class='col-10 col-md-6 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}'
                           name='name'
                           value='{{ old('name') }}'
                           required
                           autofocus>
                    @if ($errors->has('name'))
                        <span id='error-messages' class='col-10 col-md-6 offset-md-6 invalid-feedback' role='alert'>
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                {{-- USERNAME --}}
                <div class='row form-group'>
                    <label for='username'
                           class='col-10 col-md-5 col-form-label'>{{ __('Username visible to others') }}</label>
                    <input id='username'
                           type='text'
                           class='col-10 col-md-6 form-control{{ $errors->has('username') ? ' is-invalid' : '' }}'
                           name='username'
                           value='{{ old('username') }}'
                           required>
                    @if ($errors->has('username'))
                        <span id='error-messages' class='col-10 col-md-6 offset-md-6 invalid-feedback' role='alert'>
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>

                {{-- EMAIL ADDRESS --}}
                <div class='row form-group'>
                    <label for='email' class='col-10 col-md-5 col-form-label'>{{ __('Your Harvard E-Mail') }}</label>
                    <input id='email'
                           type='email'
                           class='col-10 col-md-6 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}'
                           name='email'
                           value='{{ old('email') }}'
                           placeholder='email@domain.harvard.edu'
                           required>
                    @if ($errors->has('email'))
                        <span id='error-messages' class='col-10 col-md-6 offset-md-6 invalid-feedback' role='alert'>
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                {{-- PASSWORD --}}
                <div class='row form-group'>
                    <label for='password' class='col-10 col-md-5 col-form-label'>{{ __('Password') }}</label>
                    <input id='password'
                           type='password'
                           class='col-10 col-md-6 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}'
                           name='password'
                           required>
                    @if ($errors->has('password'))
                        <span id='error-messages' class='col-10 col-md-6 offset-md-6 invalid-feedback' role='alert'>
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                {{-- CONFIRM PASSWORD --}}
                <div class='row form-group'>
                    <label for='password-confirm'
                           class='col-10 col-md-5 col-form-label'>{{ __('Confirm Password') }}</label>
                    <input id='password-confirm'
                           type='password'
                           class='col-10 col-md-6 form-control'
                           name='password_confirmation'
                           required>
                </div>

                {{-- REGISTER BUTTON --}}
                <div class='row form-group mb-0'>
                    <div class='col-md-6 offset-md-5'>
                        <button type='submit' class='btn btn-primary'>
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>

@endsection

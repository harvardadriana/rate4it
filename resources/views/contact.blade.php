@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/contact.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='contact'>

        <div class='row justify-content-center'>

            <div class='col-11 col-sm-10 col-md-9 col-lg-8 align-self-center contact-col'>

                <h1>Contact us</h1>

                <form action='{{ url('contact') }}' method='POST'>

                    {{ csrf_field() }}

                    <div class='form-group'>
                        <label for='email'>Email:</label>
                        @include('includes.error', ['errorField' => 'email'])
                        <input id='email' name='email' class='form-control' value='{{ old('email') }}'>
                    </div>

                    <div class='form-group'>
                        <label for='subject'>Subject:</label>
                        @include('includes.error', ['errorField' => 'subject'])
                        <input id='subject' name='subject' class='form-control' value='{{ old('subject') }}'>
                    </div>

                    <div class='form-group'>
                        <label for='message'>Message:</label>
                        @include('includes.error', ['errorField' => 'message'])
                        <textarea id='message'
                                  name='message'
                                  class='form-control'
                                  maxlength='300'
                                  rows='5'>{{ old('message') }}</textarea>
                    </div>

                    <input id='submit-message' type='submit' value='Send message'>

                </form>

            </div>

        </div>

    </div>

@endsection
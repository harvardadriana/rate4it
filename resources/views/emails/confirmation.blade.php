@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/emails/confirmation.css'>
@endpush


@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='confirmation'>

        <div class='row d-flex justify-content-center confirmation-row'>

            <div class='col-11 col-sm-10 col-md-9 col-lg-8 confirmation-col'>

                <div class='text-center'>
                    <img src='/svg/contact/letter.svg' alt='Letter'>
                    <h1>Your email has been sent.</h1>
                </div>

                <div class='email-content justify-content-center'>

                    <div class='row'>
                        <div class='col-12'>
                            <p>From: </p>
                        </div>
                        <div class='col-10 offset-1'>
                            <p class='box'>{{ $email }}</p>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-12'>
                            <p>Subject: </p>
                        </div>
                        <div class='col-10 offset-1'>
                            <p class='box'>{{ $subject }}</p>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col-12'>
                            <p>Message: </p>
                        </div>
                        <div class='col-10 offset-1'>
                            <p class='box'>{{ $bodyMessage }}</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
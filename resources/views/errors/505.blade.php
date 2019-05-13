@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/errors/404.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-transparent.png' alt='Rate4it Logo'>
@endpush

@section('content')

    <div id='error-404' class='container'>

        <div class='row page-not-found'>

            <div class='col'>
                <p id='uh-oh-message'>uh-oh..</p>
                <p class='user-message'>You have reached the edge of the universe.</p>
                <h1>(505 ERROR)</h1>
                <p class='user-message'>Stay calm and return to the previous page.</p>

                <button id='home' type='button' class='btn btn-outline-light btn-lg'>
                    <a href='/'>Home</a>
                </button>
            </div>

        </div>

    </div>

@endsection
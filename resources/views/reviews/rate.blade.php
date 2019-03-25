@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/reviews/rate.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <h1>Welcome to {{ config('app.name') }}</h1>
    <p>This is the rating page...</p>

    <div class='blue'>
    </div>
    <div class='gradient'>
    </div>

@endsection
@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/homepage.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='content'>

        <div class='row layout-hero d-flex justify-content-center'>

            {{-- GIF --}}
            <div id='gif' class='col-12 col-sm-10 col-lg-7 order-lg-2 col-xl-6 order-xl-2 gif text-center'>
                <img class='gif img-fluid'
                     src='/gif/gif/hero-animation.gif'
                     alt='Student seating with his computer in a yard'>
            </div>

            {{-- CONTENT COLUMN --}}
            <div id='content-column' class='col-12 col-sm-10 col-lg-5 order-lg-1 col-xl-6 order-xl-1'>
                <h1>Choosing your next course?</h1>
                <p>It&#39;s important to choose a course that will help you achieve
                   your goals. Search for your next course and check other students' reviews.</p>
                <a id='search' class='btn btn-link btn-lg' href='/search'>Search for courses</a>
            </div>

        </div>

        <div class='row transition'>
            <svg xmlns='http://www.w3.org/2000/svg' viewBox='50 20 50 80' preserveAspectRatio='none'>
                <path d='M0,100 C15,100 35,50 50,50 L50,50 C65,50 85,100 100,100 Z'/>
            </svg>
        </div>

        <div class='row end'></div>

    </div>

@endsection
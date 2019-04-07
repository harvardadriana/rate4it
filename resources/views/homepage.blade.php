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

        <div class='row layout-hero align-items-center justify-content-center'>

            {{-- GIF --}}
            <div class='col-sm-10 col-lg-7 gif'>
                <img class='gif' src='/gif/gif/hero-animation.gif' alt='Student seating with his computer in a yard'>
            </div>

            {{-- CONTENT COLUMN --}}
            <div id='content-column' class='col-10 col-sm-10 col-lg-5'>
                <h1 id='content-heading'>Choosing your next course?</h1>
                <p id='content-text'>It&#39;s important to choose a course that will help you achieve
                                     your goals. Search for your next course and check other students' reviews.</p>

                <div id='search-course'>
                    <a id='search' href='/search'>Search for courses</a>
                </div>
            </div>

        </div>

        <div class='row transition'>
            <svg xmlns='http://www.w3.org/2000/svg' viewBox='50 20 50 80' preserveAspectRatio='none'>
                <path d='M0,100 C15,100 35,50 50,50 L50,50 C65,50 85,100 100,100 Z'/>
            </svg>
        </div>

        <div class='row end'></div>

    </div> {{-- end .content --}}

@endsection
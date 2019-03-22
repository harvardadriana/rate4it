@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/homepage.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-white.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='content'>

        <div class='content-box'>

            <div class='box'>

                {{-- LEFT COLUMN --}}
                <div class='left-column left'>

                    <h1>Choosing your next course?</h1>

                    <p>It&#39;s important to choose a course that will help you achieve your goals. Search for your next course and ...</p>

                    <div id='search-course' value='Search'>
                        <a id='search' href='/search'>Search for courses</a>
                    </div>

                </div>

                {{-- ILLUSTRATION --}}
                {{--<img class='illustration left' src='/images/3.png' alt='...'>--}}
                <div class='illustration left'>
                    [GIF HERE]
                </div>

            </div>

        </div>

        <div class='middle'></div>

    </div>

@endsection
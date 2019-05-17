@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/about.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='about'>

        {{-- HEADER --}}
        <div class='recommendations-header justify-content-center'>

            <div class='row justify-content-center'>
                <img id='bulb' src='/svg/aboutus/light-bulb.svg' alt='Light bulb'>
            </div>
            <div class='row justify-content-center'>
                <h1>About Rate4it</h1>
            </div>
            <div class='row justify-content-center'>
                <p class='about-us'>It's important to choose a course that will help you achieve your goals.
                                    Rate4it is a web application for course reviews developed to assist Harvard Extension School students making better choices throughout their college careers, by increasing the information exchanged about courses. To create more accurate reviews, only students with Harvard email accounts are allowed to register.</p>
            </div>

            <div class='row tips'>
                <div class='col-2 offset-1'>
                    <img class='check-list' src='/svg/aboutus/check-list.svg' alt='Check list with an apple'>
                </div>
                <div class='col-8 offset-1'>
                    <h2>What should you know before using this site</h2>
                    <p class='considerations'>While rating websites can be a helpful tool, there are some considerations to keep in mind while using them.</p>
                </div>
            </div>

        </div>

        {{-- SUGGESTIONS LIST --}}
        <div class='row suggestions'>

            <div class='col-12 col-md-9 offset-md-1 col-lg-8 offset-lg-3 suggestions-col'>

                <h2>Keep in mind:</h2>
                <ul class='list-group list-group-flush'>
                    <li class='list-group-item'>
                        <img src='/svg/aboutus/checked.svg' alt='Check mark'>
                        <div class='no-wrap'>Do not take the reviews as fact</div>
                    </li>
                    <li class='list-group-item'>
                        <img src='/svg/aboutus/checked.svg' alt='Check mark'>
                        <div class='no-wrap'>Look for more student's opinions</div>
                    </li>
                    <li class='list-group-item'>
                        <img src='/svg/aboutus/checked.svg' alt='Check mark'>
                        <div class='no-wrap'>Check multiple sources for a consensus</div>
                    </li>
                    <li class='list-group-item'>
                        <img src='/svg/aboutus/checked.svg' alt='Check mark'>
                        <div class='no-wrap'>The majority of students who take the time to rate courses have extreme opinions of them, whether they are positive or negative. Such extreme opinions are often biased and somewhat inaccurate</div>
                    </li>
                    <li class='list-group-item'>
                        <img src='/svg/aboutus/checked.svg' alt='Check mark'>
                        <div class='no-wrap'>It is more common for people to write negative reviews than positive</div>
                    </li>
                    <li class='list-group-item'>
                        <img src='/svg/aboutus/checked.svg' alt='Check mark'>
                        <div class='no-wrap'>The reviews reflect a one-sided story</div>
                    </li>
                    <li class='list-group-item'>
                        <img src='/svg/aboutus/checked.svg' alt='Check mark'>
                        <div class='no-wrap'>Students who complain about poor grades but did not work to achieve higher ones does not reflect the quality of the course</div>
                    </li>
                    <li class='list-group-item'>
                        <img src='/svg/aboutus/checked.svg' alt='Check mark'>
                        <div class='no-wrap'>Read between the lines for the most realistic portrayals of the course</div>
                    </li>
                    <li class='list-group-item'>
                        <img src='/svg/aboutus/checked.svg' alt='Check mark'>
                        <div class='no-wrap'>Always push yourself: do not avoid courses that ranks highly on the difficulty scale. Great courses are often the most challenging</div>
                    </li>
                </ul>

            </div>

        </div>

    </div>

@endsection
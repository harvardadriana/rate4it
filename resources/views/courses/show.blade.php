@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/courses/showcourse.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('title')
    {{ $course->title }}
@endsection

@section('content')

    @if($course)

        <div class='results'>

            {{-- COURSE DETAILS --}}
            <div class='course-details'>

                <p class='subject-course-code'>{{ $course->subject_and_course_code }}</p>
                <h1>{{ $course->title }}</h1>
                <p class='professor'>Professor(s): </p>

                {{-- LOOP THROUGH ALL INSTRUCTORS OF THE COURSE --}}
                @foreach($course->instructors as $instructor)
                    <p class='instructor'>{{ $instructor->first_name . ' ' . $instructor->last_name }}</p>
                @endforeach

                {{-- DISPLAY OVERALL RATING ONLY IF THERE ARE REVIEWS --}}
                @if($course->number_of_reviews != 0)

                    <p class='review'>***** Rating: {{ $course->overall_rating }} -
                        <span class='badge badge-primary badge-pill'>{{ $course->number_of_reviews }} reviews</span>
                    </p>

                {{-- DISPLAY REVIEWS --}}




                {{-- DISPLAY REVIEWS --}}

                @else
                    <p class='first-review'>
                        <small>
                            <a href='/reviews/create-review/{{ $course->id }}'>Be the first one to review this course</a>
                        </small>
                    </p>
                @endif
            </div>

        </div>

        <div class='reviews'>

            {{--LIST OF RATINGS GO HERE--}}
            <h2>xx rating(s) found</h2>

            <ul class='listReviews'>

                {{--INDIVIDUAL REVIEW--}}
                <li class='reviewItem'>

                    {{--REVIEW SIDEBAR--}}
                    <div class='reviewSidebar'>
                        <div class='reviewSidebarContent'>

                            {{--USER'S AVATAR RESPONSIVE-PHOTO--}}
                            <div class='user-avatar'></div>
                            {{--USER'S NAME AND LOCATION--}}
                            <div class='media-story'>
                                <div class='user-name'></div>
                                <div class='user-location'></div>
                                <div class='user-course'></div>
                            </div>
                        </div>
                    </div>

                    {{--REVIEW WRAPPER--}}
                    <div class='reviewWrapper'>

                        {{--REVIEW CONTENT--}}
                        <div class='review-content'>
                            <div>
                                {{--RATINGS AND DATE--}}
                                <div>
                                    <div>icons-stars</div>
                                    <div>date</div>
                                </div>

                                {{--COMMENTS--}}
                                <div>Text goes here...</div>
                            </div>
                        </div>

                        {{--REVIEW FOOTER--}}
                        <div class='review-footer'>
                            <div class='rateReview voting-feedback'>
                                <ul>
                                    <li class='vote-item inline-block'>
                                        <a class='thumbs-up' href=''>
                                            <span>icon-thumbs up</span>
                                            <span>numbers</span>
                                        </a>
                                    </li>
                                    <li class='vote-item inline-block'>
                                        <a class='thumbs-down' href=''>
                                            <span>icon-thumbs down</span>
                                            <span>numbers</span>
                                        </a>
                                    </li>
                                    <li class='vote-item inline-block'>
                                        <a class='report' href=''>
                                            <span>Report</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>


        </div>

    @else
        <p>No reviews found.</p>
    @endif

@endsection


{{--<ul class='reviewsList'>--}}
{{--<li class='reviewItem'>--}}
{{--<div class='courseDetails'>--}}
{{--<div class='imageSubject'></div>--}}
{{--<div class='overallRatings'>--}}
{{--<div class='courseSubjectAndCode'>--}}
{{--<div class='courseTitle'>--}}
{{--<div class='overallRating'>--}}
{{--<div class='numberReviews'>--}}
{{--<div class='instructors'>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class='userReview'></div>--}}
{{--</li>--}}
{{--</ul>--}}
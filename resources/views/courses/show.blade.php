@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-white.css'>
    <link rel='stylesheet' type='text/css' href='/css/courses/showcourse.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-white.jpg' alt='Rate4it Logo'>
@endpush

@section('title')
    {{ $course->title }}
@endsection

@section('content')

<div class='content'>

    @if($course)

        {{-- COURSE WRAPPER --}}
        <div class='row course-wrapper max-col-width'>

            <div class='col-2 subject-course-code'>
                <div id='subject' class='row justify-content-center align-content-center'>
                    <p>{{ $course->subject_and_course_code }}</p>
                </div>
                <div id='icon' class='row justify-content-center align-content-center'>
                    <img src='/images/icons/subjects/{{ $course->subject->code }}.svg' alt='{{ $course->subject->code }}'>
                </div>
            </div>

            <div class='col-7 course'>
                <h1>{{ $course->title }}</h1>
                <p class='professor'>Professor(s): </p>
                {{-- LOOP THROUGH ALL INSTRUCTORS OF THE COURSE --}}
                @foreach($course->instructors as $instructor)
                    <p class='instructor'>{{ $instructor->first_name . ' ' . $instructor->last_name }}</p>
                @endforeach
            </div>

        </div>

        <div class='blue-banner'>

            {{-- COURSE STATISTICS --}}
            <div class='row course-statistics max-col-width'>

                <div class='box col primeira'>
                    <img src='/images/icons/exam1.svg' alt='Overall rating icon'>
                    <h2> {{-- FILL HERE --}} 100% </h2>
                    <p>is the overall rating of the course</p>
                </div>

                <div class='box col segunda'>
                    <img src='/images/icons/replay1.svg' alt='Take the course again icon'>
                    <h2> {{-- FILL HERE --}} 100%</h2>
                    <p>of the students would take this course again</p>
                </div>

                <div class='box col terceira'>
                    <img src='/images/icons/thumbs-up.svg' alt='Deeper insight icon'>
                    <h2> {{-- % FILL HERE --}} 100% </h2>
                    <p>of the students gained deeper insight after taking this course</p>
                </div>

            </div>

        </div>







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


        <div class='reviews-wrapper'>

            <div class='reviews max-col-width'>

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

        </div>

    @else
        <p>No reviews found.</p>
    @endif

</div> {{-- END OF CONTENT --}}

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
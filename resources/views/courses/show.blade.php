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

            {{-- SUBJECT COURSE CODE --}}
            <div class='col-2 subject-course-code'>
                <div id='subject' class='row justify-content-center align-content-center'>
                    <p>{{ $course->subject_and_course_code }}</p>
                </div>
                <div id='icon' class='row justify-content-center align-content-center'>
                    <img src='/images/icons/subjects/{{ $course->subject->code }}.svg' alt='{{ $course->subject->code }}'>
                </div>
            </div>

            {{-- COURSE --}}
            <div class='col-7 course'>
                <h1>{{ $course->title }}</h1>
                <p class='professor'>Professor(s): </p>
                {{-- LOOP THROUGH ALL INSTRUCTORS OF THE COURSE --}}
                @foreach($course->instructors as $instructor)
                    <p class='instructor'>
                        <img class='professor-icon' src='/images/icons/show/professor.svg' alt='Person reading a book'>{{ $instructor->first_name . ' ' . $instructor->last_name }}
                    </p>
                @endforeach
            </div>

            {{-- RATING --}}
            @if($course->overall_rating)
                <div class='col-2 rating'>
                    <div class='row overall-rating'>
                        <span>{{ $course->overall_rating }}</span>
                    </div>
                    <div class='row stars justify-content-center'>
                        @for($i=0; $i<5; $i++)
                            <img id='star' src='/images/star-on.png' alt='Rating stars'>
                        @endfor
                    </div>
                </div>
            @endif

        </div>

        @if($course->number_of_reviews)

            {{-- COURSE STATISTICS --}}
            <div class='blue-banner'>
                <div class='row course-statistics max-col-width'>
                    <div class='box col'>
                        <img src='/images/icons/show/exam.svg' alt='Overall rating icon'>
                        <h2>{{ $course->overall_rating }} % </h2>
                        <p>is the overall rating of the course</p>
                    </div>

                    <div class='box col'>
                        <img src='/images/icons/show/deep-insight.svg' alt='Deeper insight icon'>
                        <h2>{{ $course->gain_deeper_insight }} % </h2>
                        <p>of the students gained deeper insight after taking this course</p>
                    </div>

                    <div class='box col'>
                        <img src='/images/icons/show/replay.svg' alt='Take the course again icon'>
                        <h2>{{ $course->take_course_again }} %</h2>
                        <p>of the students would take this course again</p>
                    </div>
                </div>
            </div>


            {{-- ADDITIONAL COURSE STATISTICS --}}
            {{--<div class='row additional-statistics max-col-width'>--}}
                {{--<h3>{{ $course->number_of_reviews }} rating(s) found</h3>--}}
                {{--<p class='review'>***** Rating: {{ $course->overall_rating }} ---}}
                    {{--<span class='badge badge-primary badge-pill'>{{ $course->number_of_reviews }} reviews</span>--}}
                {{--</p>--}}
            {{--</div>--}}





            {{-- REVIEWS WRAPPER --}}
            <div class='reviews-wrapper'>

                {{--LIST OF REVIEWS --}}
                <ul class='list-group list-group-flush'>

                    {{-- LOOP THROUGH ALL REVIEWS FOUND --}}
                    {{--@foreach($reviewslist as $review)--}}

                        {{-- REVIEW ITEM --}}
                        <li class='list-group-item d-flex flex-row review-item'>

                            {{-- REVIEW-SIDEBAR --}}
                            <div class='review-sidebar'>

                                {{-- USER'S AVATAR --}}
                                <div class='d-flex align-items-center user-avatar'>
                                    <img src='/images/icons/show/user-avatar.png' alt='User-avatar'>
                                </div>
                                {{-- USERNAME / DATE --}}
                                <div class='d-flex align-items-center username-date'>
                                    <div class='user-date'>
                                        {{--<p>{{ $user->username }}</p>--}}
                                        <p id='username'>USER NAME</p>
                                        {{--<p>{{ $review->created_at }}</p>--}}
                                        <p id='date'> DATE</p>
                                    </div>
                                </div>

                            </div>

                            {{-- REVIEW --}}
                            <div class='review'>

                                <div class='user-overall-rating'><div>user-overall-rating</div></div>
                                <div class='comments'><p>comments</p></div>
                                <div class='tips'><p>tips</p></div>

                                {{-- VOTING FEEDBACK --}}
                                <div class='voting-feedback'>

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

                        </li>

                    {{--@endforeach--}}

                </ul>

            <div>






        @else









            {{-- IF THERE ARE NO REVIEWS --}}
            <div class='row noreviews-wrapper max-col-width'>
                <div class='col-9 purple-banner d-flex justify-content-center'>
                    <a id='first-review' href='/reviews/create/{{ $course->title_for_url }}/{{ $course->crn}}'>
                        <img id='hand-rating' src='/images/icons/rating.png' alt='Hand rating'>
                        Be the first one to review this course
                    </a>
                </div>
            </div>

        @endif

    @else
        {{-- IF THE COURSE IS NOT FOUND --}}
        <div class='blue-banner'>
            <h1>The course was not found.</h1>
        </div>
    @endif

</div>

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
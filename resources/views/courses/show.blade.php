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

        @if(session('alert'))
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
                <h3 class='alert-heading'>Well done!</h3>
                <p>{{ session('alert') }}</p>
            </div>
        @endif

        <div class='row course-wrapper'>

            {{-- SUBJECT COURSE CODE COL --}}
            <div class='col-2 subject-course-code'>
                <div id='subject' class='row align-items-center'>
                    <p>{{ $course->subject_and_course_code }}</p>
                </div>
                <div id='icon' class='row align-items-center'>
                    <img src='/images/icons/subjects/{{ $course->subject->code }}.svg' alt='Course subject icon'>
                </div>
            </div>

            {{-- COURSE COL --}}
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

            {{-- OVERALL RATING COL --}}
            @if($course->rate->overall_rating)
                <div class='col-2'>
                    <div class='row overall-rating'>
                        <span>{{ $course->rate->overall_rating }}</span>
                    </div>
                    <div class='row review-stars justify-content-center'>
                        @include('modules.review-stars', ['field' => $course->rate->overall_rating])
                    </div>
                </div>
            @endif

        </div>

        {{-- RATE BUTTON --}}
        <div class='row rate'>
            <div class='col-2 offset-9 rate-btn'>
                <div id='rate-button'>
                    <a id='rate' href='/reviews/create/{{ $course->title_for_url }}/{{ $course->crn }}'>Rate course</a>
                </div>
            </div>
        </div>

        @if($course->rate->number_of_reviews)

            {{-- COURSE STATISTICS --}}
            <div class='blue-banner'>
                <div class='row course-statistics'>
                    <div class='box col'>
                        <img src='/images/icons/show/exam.svg' alt='Overall rating icon'>
                        <h2>{{ $course->rate->overall_rating }}</h2>
                        <p>is the overall rating of the course</p>
                    </div>
                    <div class='box col'>
                        <img src='/images/icons/show/deep-insight.svg' alt='Deeper insight icon'>
                        <h2>{{ $course->rate->gain_deeper_insight }} %</h2>
                        <p>of the students gained deeper insight after taking this course</p>
                    </div>
                    <div class='box col'>
                        <img src='/images/icons/show/replay.svg' alt='Take the course again icon'>
                        <h2>{{ (round((($course->rate->take_course_again * 100) / $course->rate->number_of_reviews))) }} %</h2>
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

                <h2>{{ $numberReviews }} review(s) found:</h2>

                {{--LIST OF REVIEWS --}}
                <ul class='list-group list-group-flush'>

                    {{-- LOOP THROUGH ALL REVIEWS FOUND --}}
                    @foreach($reviewsListArray as $reviews => $review)

                        {{-- REVIEW ITEM --}}
                        <li class='list-group-item d-flex flex-row review-item'>

                            {{-- REVIEW-SIDEBAR --}}
                            <div class='review-sidebar text-center'>

                                <img class='user-avatar' src='/images/icons/show/user-avatar.png' alt='User-avatar'>
                                <div class='username-date'>
                                    <p id='username'>{{ $review->user->username }}</p>
                                    <p id='date'>{{ $review->created_at->format('m/d/Y') }}</p>
                                </div>

                            </div>

                            {{-- REVIEW --}}
                            <div class='review'>

                                <div class='user-overall-rating'>
                                    @include('modules.review-stars', ['field' => $review->overall_rating])
                                </div>
                                <p><span class='tips'>Comment: </span>{{ $review->comments }}</p>
                                <p><span class='tips'>Tips: </span>{{ $review->survival_tips }}</p>

                                {{-- VOTING FEEDBACK --}}
                                <div class='row d-flex voting-feedback'>

                                    <div class='vote-item justify-content-start'>
                                        <a class='thumbs-up' href=''>
                                            <img src='/images/icons/show/thumbsup.svg' alt='Thumbs up'>
                                        </a>
                                    </div>
                                    <div class='list-inline d-flex justify-content-start'>
                                        <span class='vote-numbers'>number</span>
                                    </div>
                                    <div class='vote-item d-flex justify-content-start'>
                                        <a class='thumbs-down list-inline' href=''>
                                            <img src='/images/icons/show/thumbsdown.svg' alt='Thumbs down'>
                                        </a>
                                    </div>
                                    <div class='vote-item list-inline'>
                                        <a class='report' href=''>
                                            <span>Report</span>
                                        </a>
                                    </div>

                                </div>

                            </div>

                        </li>

                    @endforeach

                </ul>

            </div>






        @else









            {{-- IF THERE ARE NO REVIEWS --}}
            <div class='row noreviews-wrapper'>
                <div class='col-12 col-md-11 purple-banner d-flex justify-content-center'>
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
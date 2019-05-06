@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-white.css'>
    <link rel='stylesheet' type='text/css' href='/css/courses/show.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-white.jpg' alt='Rate4it Logo'>
@endpush

@section('title')
    {{ $course->title ?? ''}}
@endsection

@section('content')

    <div class='content'>

        @if($course)

            <div class='row course-wrapper'>

                {{-- SUBJECT-COURSE-CODE COL --}}
                <div class='col-2 subject-course-code'>
                    <div id='subject' class='row'>
                        <p>{{ $course->subject_and_course_code }}</p>
                    </div>
                    <div id='icon' class='row align-items-top'>
                        <img src='/svg/subjects/{{ $course->subject->code }}.svg' alt='Course subject icon'>
                    </div>
                </div>

                {{-- COURSE TITLE COL --}}
                <div class='col-7 course'>
                    <h1>{{ $course->title }}</h1>
                    <p class='subject-name'>{{ $course->subject->name }}</p>
                    <div class=' d-flex d-inline'>
                        <img class='professor-icon' src='/svg/show/professor.svg' alt='Person reading a book'>
                        <p class='professor'>Professor(s): </p>
                        <div class='instructor'>
                            {{-- LOOP THROUGH ALL INSTRUCTORS OF THE COURSE --}}
                            @foreach($course->instructors as $instructor)
                                <p class='instructor'>{{ $instructor->first_name . ' ' . $instructor->last_name }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- OVERALL RATING COL --}}
                @if($course->rate->overall_rating)
                    <div class='col-2'>
                        <div class='row overall-rating'>
                            <span>{{ number_format($course->rate->overall_rating, 1, '.', '') }}</span>
                        </div>
                        <div class='row review-stars justify-content-center'>
                            @include('modules.review-stars', ['field' => $course->rate->overall_rating])
                        </div>
                    </div>
                @endif

            </div>

            {{-- CONFIRMATION OF SUBMISSION OF REVIEW, IF ANY --}}
            @if(session('alert'))
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <h3 class='alert-heading'>Well done!</h3>
                    <p>{{ session('alert') }}</p>
                </div>
            @endif

            @if($course->rate->number_of_reviews)

                {{-- COURSE STATISTICS --}}
                <div class='blue-banner'>
                    <div class='row course-statistics'>
                        <div class='box col'>
                            <img src='/svg/show/exam.svg' alt='Overall rating icon'>
                            <h2>{{ number_format($course->rate->overall_rating, 1, '.', '') }}</h2>
                            <p>is the overall rating of the course</p>
                        </div>
                        <div class='box col'>
                            <img src='/svg/show/deep-insight.svg' alt='Deeper insight icon'>
                            <h2>{{ $course->rate->gain_deeper_insight }} %</h2>
                            <p>of the students gained deeper insight after taking this course</p>
                        </div>
                        <div class='box col'>
                            <img src='/svg/show/replay.svg' alt='Take the course again icon'>
                            <h2>{{ (round((($course->rate->take_course_again * 100) / $course->rate->number_of_reviews))) }} %</h2>
                            <p>of the students would take this course again</p>
                        </div>
                    </div>
                </div>

                {{-- RATE BUTTON --}}
                <div class='row rate'>
                    <div class='col-2 offset-8 col-md-2 offset-md-9 rate-btn'>
                        <div id='rate-button'>
                            <a id='rate'
                               href='/reviews/create/{{ $course->title_for_url }}/{{ $course->crn }}'>Rate course</a>
                        </div>
                    </div>
                </div>

                {{--ADDITIONAL STATISTICS --}}
                <div class='additional-statistics-banner'>
                    @include('modules.rating-explanation')
                </div>

                <div class='reviews-wrapper'>
                    <h2>{{ $numberReviews }} review(s) found:</h2>
                    <ul class='list-group list-group-flush'>
                        {{-- LOOP THROUGH ALL REVIEWS FOUND --}}
                        @foreach($reviewsListArray as $reviews => $review)

                            {{-- REVIEW ITEM --}}
                            <li class='list-group-item d-flex flex-row review-item'>
                                <div class='review-sidebar text-center'>
                                    <img class='user-avatar' src='/images/show/user-avatar.png' alt='User-avatar'>
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
                                    <p><span class='comment-tips'>Comment: </span>{{ $review->comments }}</p>
                                    <p><span class='comment-tips'>Tips: </span>{{ $review->survival_tips }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            @else
                {{-- IF THERE ARE NO REVIEWS --}}
                <div class='row no-reviews-wrapper'>
                    <div class='col-12 col-md-11 review-banner d-flex justify-content-center'>
                        <a id='first-review' href='/reviews/create/{{ $course->title_for_url }}/{{ $course->crn}}'>
                            <img id='hand-rating' src='/images/show/rating.png' alt='Hand rating'>
                            <span>Be the first one to review this course</span>
                        </a>
                    </div>
                </div>
            @endif

        @else
            {{-- IF THE COURSE IS NOT FOUND --}}
            @include('modules.alert-messages', ['message' => 'The course was not found'])
        @endif

    </div>

@endsection
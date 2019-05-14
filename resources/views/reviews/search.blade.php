@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav.css'>
    <link rel='stylesheet' type='text/css' href='/css/search-main.css'>
    <link rel='stylesheet' type='text/css' href='/css/reviews/search.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-white.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='content'>

        {{-- SEARCH BOX --}}
        <div class='blue-banner'>

            <h1>Search course for rating:</h1>

            <form class='form-group'
                  role='search'
                  aria-label='Search for a course'
                  action='/reviews-process'
                  method='GET'>

                <div class='row padding'>

                    <div class='col-10 col-sm-11 search-box'>

                        <input list='courses'
                               class='form-control left'
                               type='text'
                               name='searchTerm'
                               size='60'
                               value='{{ $searchTerm ? $searchTerm : '' }}'
                               placeholder='Enter course title...'>
                        <datalist id='courses'>

                            @foreach($courseTitlesArray as $courseTitle)
                                <option value='{{ $courseTitle }}'></option>
                            @endforeach

                        </datalist>

                    </div>

                    <div class='col-2 col-sm-1 search-button'>

                        <button type='submit' class='btn btn-default left' value='Search'>
                            <img src='/images/reviews/search.png' alt='Magnifying glass'>
                        </button>

                    </div>

                </div>

            </form>

        </div>

        @if($searchTerm)

            {{-- IF NO COURSES ARE FOUND --}}
            @if(count($searchResults) == 0)

                @if(session('alert'))

                    @include('modules.alert-messages', ['message' => session('alert')])

                @endif

            @else

                {{-- IF THERE ARE ANY COURSES FOUND --}}
                <div class='results-wrapper'>

                    <h2>{{ $numberCourses }} {{ $numberCourses > 1 ? ' courses' : ' course' }} found:</h2>

                    <div class='list-group list-group-flush'>

                        {{-- LOOP THROUGH ALL COURSES FOUND --}}
                        @foreach($searchResults as $course)

                            <a class='list-group-item list-group-item-action d-flex flex-row review-item'
                               href='/reviews/create/{{ $course->title_for_url }}/{{ $course->crn }}'>

                                <div class='results-sidebar-col'>

                                    <div class='subject-container'>

                                        <p>{{ $course->subject_and_course_code }}</p>

                                    </div>

                                    <div class='subject-icon'>

                                        <img src='/svg/subjects/{{ $course->subject->code }}.svg'
                                             alt='Course subject icon'>

                                    </div>

                                </div>

                                <div class='course-details-col'>

                                    <h2 class='course-title'>
                                        {{ $course->title }}
                                    </h2>

                                    @if($course->rate->number_of_reviews == 0)

                                        {{-- IF NO REVIEWS ARE FOUND --}}
                                        <div class='review-course'>

                                            <p class='d-inline'>Be the first to rate this course</p>
                                            <img id='hand-rating'
                                                 class='d-inline'
                                                 src='/images/show/rating.png'
                                                 alt='Hand clicking on stars'>

                                        </div>

                                    @else

                                        {{-- IF THERE ARE ANY REVIEWS FOUND --}}
                                        <div class='rate d-flex'>

                                            <div class='user-overall-rating d-inline-block'>

                                                @include('modules.review-stars', ['field' => $course->rate->overall_rating])

                                            </div>

                                            <div class='number-reviews d-inline-block'>

                                                <p>{{ $course->rate->number_of_reviews . ' reviews'}} </p>

                                            </div>

                                        </div>

                                    @endif

                                    <div class=' d-flex d-inline'>

                                        <img class='professor-icon' src='/svg/show/professor.svg' alt='Person reading a book'>
                                        <p class='professor'>Professor(s): </p>
                                        <div class='instructor'>

                                            {{--LOOP THROUGH ALL INSTRUCTORS OF THE COURSE--}}
                                            @foreach($course->instructors as $instructor)
                                                <p class='instructor'>{{ $instructor->first_name . ' ' . $instructor->last_name }}</p>
                                            @endforeach

                                        </div>

                                    </div>

                                </div>

                            </a>

                        @endforeach

                    </div>

                </div>

            @endif

        @endif

    </div>

@endsection
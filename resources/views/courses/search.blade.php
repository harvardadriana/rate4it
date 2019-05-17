@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav.css'>
    <link rel='stylesheet' type='text/css' href='/css/courses/search-main.css'>
    <link rel='stylesheet' type='text/css' href='/css/courses/search.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-white.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='content'>

        <div class='blue-banner'>

            <div class='search-wrapper'>

                <h1>Find course:</h1>

                <form class='form-group'
                      id='searchForm'
                      role='search'
                      aria-label='Search for a course'
                      action='/search-process'
                      method='GET'>

                    <div class='row reset'>
                        <a id='reset' class='btn btn-outline-light btn-lg' href='/search'>Reset Filters</a>
                    </div>

                    <div class='row'>

                        <div class='col-12 col-sm-6 col-lg-3'>
                            {{-- COURSE CODE DROPDOWN --}}
                            <label for='searchCourseCode'>Course Code</label>
                            <select id='searchCourseCode' name='searchCourseCode'>
                                <option value=''>Course Code...</option>
                                @foreach($courseCodesArray as $courseCode)
                                    <option value='{{ $courseCode }}' {{ $searchCourseCode == $courseCode ? 'selected' : '' }}>{{ $courseCode }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class='col-12 col-sm-6 col-lg-3'>
                            {{-- COURSE TITLE DROPDOWN --}}
                            <label for='searchCourseTitle'>Course Title</label>
                            <select id='searchCourseTitle' name='searchCourseTitle'>
                                <option value=''>Course Title...</option>
                                @foreach($courseTitlesArray as $key => $courseTitle)
                                    <option value='{{ $courseTitle }}' {{ $searchCourseTitle == $courseTitle ? 'selected' : '' }}>{{ $courseTitle }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class='col-12 col-sm-6 col-lg-3'>
                            {{-- SUBJECT DROPDOWN --}}
                            <label for='searchSubject'>Subject</label>
                            <select id='searchSubject' name='searchSubject'>
                                <option value=''>Subject...</option>
                                @foreach($subjectsArray as $key => $subject)
                                    <option value='{{ $key }}' {{ $searchSubject == $key ? 'selected' : '' }}>{{ $subject }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class='col-12 col-sm-6 col-lg-3'>
                            {{-- INSTRUCTOR DROPDOWN --}}
                            <label for='searchInstructor'>Instructor</label>
                            <select id='searchInstructor' name='searchInstructor'>
                                <option value=''>Instructor...</option>
                                @foreach($instructorsArray as $key => $instructor)
                                    <option value='{{ $key }}' {{ $searchInstructor == $key ? 'selected' : '' }}>{{ $instructor[0] . ', ' . $instructor[1] }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                </form>

            </div>

        </div>

        @if($searchCourseTitle || $searchCourseCode || $searchSubject || $searchInstructor)

            {{-- IF NO COURSES ARE FOUND --}}
            @if(count($searchResults) == 0)

                @if(session('alert'))
                    @include('modules.alert-messages', ['message' => session('alert')])
                @endif

            @else

                {{-- IF FOUND COURSES --}}
                <div class='results-wrapper'>

                    <h2>{{ $numberCourses }} {{ $numberCourses > 1 ? ' courses' : ' course' }} found:</h2>

                    <div class='list-group list-group-flush'>

                        {{-- LOOP THROUGH ALL COURSES FOUND --}}
                        @foreach($searchResults as $course)

                            <a class='list-group-item list-group-item-action d-flex flex-row review-item'
                               href='/course/{{ $course->title_for_url }}/{{ $course->crn }}'>

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

                                    <h2 class='course-title'>{{ $course->title }}</h2>

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

                                        {{-- IF REVIEWS FOUND --}}
                                        <div class='rate d-flex'>

                                            <div class='user-overall-rating d-inline-block'>
                                                @include('modules.review-stars', ['field' => $course->rate->overall_rating])
                                            </div>

                                            <div class='number-reviews d-inline-block'>
                                                <p>{{ $course->rate->number_of_reviews }} {{ $course->rate->number_of_reviews > 1 ? ' reviews' : ' review' }}</p>
                                            </div>

                                        </div>

                                    @endif

                                    <div class=' d-flex d-inline'>

                                        <img class='professor-icon'
                                             src='/svg/show/professor.svg'
                                             alt='Person reading a book'>
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

@push('scripts')
    <script src='/js/search.js'></script>
@endpush
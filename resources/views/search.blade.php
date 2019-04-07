@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav.css'>
    <link rel='stylesheet' type='text/css' href='/css/courses/search.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-white.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='content'>

        <div class='wrapper'>

            {{-- SEARCH BOX --}}
            <div class='search-box'>

                <h1>{{ 'title' }}:</h1>

                <form class='form-group'
                      role='search'
                      aria-label='Search for a course'
                      action='/{{ 'path' }}'
                      method='GET'>

                    <input list='courses'
                           class='form-control left'
                           type='text'
                           name='searchTerm'
                           size='60'
                           value='{{ old('searchTerm') }}'
                           placeholder='{{ ($searchTerm ? $searchTerm : 'Enter course title...') }}'>
                    <datalist id='courses'>
                        @foreach($coursesArray as $courseTitle)
                            <option value='{{ $courseTitle }}'></option>
                        @endforeach
                    </datalist>
                    <button type='submit' class='btn btn-default left' value='Search'>
                        <img src='/images/search.png' alt='Magnifying glass'>
                    </button>

                </form>

            </div>

        </div>

        {{-- RESULTS --}}
        @if($searchTerm)

            @if(count($searchResults) != 0)

                <div class='results'>

                    <h2>{{ $numberCourses }} course(s) found:</h2>

                    <ul class='list-group list-group-flush'>

                        {{-- LOOP THROUGH ALL COURSES FOUND --}}
                        @foreach($searchResults as $course)

                            <li class='list-group-item'>

                                {{-- LOGO  --}}
                                <div class='subject-course-code left'>
                                    <p>{{ $course->subject_and_course_code }}</p>
                                </div>

                                {{-- COURSE DETAILS --}}
                                <div class='course-details left'>
                                    <p class='course'><a href='/{{ $course->title_for_url }}/{{ $course->crn }}'>{{ $course->title }}</a></p>
                                    <p class='professor'>Professor(s): </p>

                                    {{-- LOOP THROUGH ALL INSTRUCTORS OF THE COURSE --}}
                                    @foreach($course->instructors as $instructor)
                                        <p class='instructor'>{{ $instructor->first_name . ' ' . $instructor->last_name }}</p>
                                    @endforeach

                                    {{-- DISPLAY ONLY IF THERE ARE REVIEWS --}}
                                    @if($course->number_of_reviews != 0)

                                        <p class='review'>***** Rating: {{ $course->overall_rating }} -
                                            <span class='badge badge-primary badge-pill'>{{ $course->number_of_reviews }} reviews</span>
                                        </p>

                                    @else
                                        <p class='review'>
                                            <small>
                                                <a href='/reviews/create-review/{{ $course->id }}'>Be the first one to review this course</a>
                                            </small>
                                        </p>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class='results'>
                    <h2 class='noResults'>No reviews found.</h2>
                </div>
            @endif

        @endif

    </div>

@endsection
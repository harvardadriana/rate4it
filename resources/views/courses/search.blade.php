@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/modules/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/courses/search.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    <div class='content'>

        <div class='outer-search'>

            {{-- SEARCH BOX --}}
            <div class='search-box'>

                <h1>Find a course:</h1>

                <form class='form-group'
                      role='search'
                      aria-label='Search for a course'
                      action='/search-process'
                      method='GET'>
                    <input list='courses'
                           class='form-control'
                           type='text'
                           name='searchTerm'
                           size='60'
                           value='{{ old('searchTerm') }}'
                           placeholder='{{ ($searchTerm ? $searchTerm : 'Search for courses...') }}'>
                    <datalist id='courses'>
                        @foreach($coursesArray as $courseTitle)
                            <option value='{{ $courseTitle }}'></option>
                        @endforeach
                    </datalist>
                    <button type='submit' class='btn btn-default' value='Search'>Search</button>
                </form>

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
                                        <p class='course'><a href='/courses/{{ $course->id }}'>{{ $course->title }}</a></p>
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
                        <p class='noResults'>No reviews found.</p>
                    </div>
                @endif

            @endif

        </div>

    </div>

@endsection
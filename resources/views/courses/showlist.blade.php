@extends('layouts.master')

@section('content')

    <div class='results'>

        @if(count($searchResults) != 0)

            <h2>List of courses found:</h2>

            <ul class='list-group list-group-flush'>

                {{-- Loop through all courses found --}}
                @foreach($searchResults as $course)

                    <li class='list-group-item'>

                        {{-- LOGO  --}}
                        <div class='left left-side-course'>
                            <p>{{ $course->subject_and_course_code }}</p>
                        </div>

                        {{-- COURSE DETAILS --}}
                        <div class='right right-side-course'>
                            <h3 class='course'><a href='/courses/{{ $course->id }}'>{{ $course->title }}</a></h3>
                            <p>Professor(s): </p>

                            {{-- Loop through all instructors of this course --}}
                            @foreach($course->instructors as $instructor)
                                <p class='instructor'>{{ $instructor->first_name . ' ' . $instructor->last_name }}</p>
                            @endforeach

                            {{-- Display only if there are reviews --}}
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
        @else
            <p>No reviews found.</p>
        @endif

    </div>

@endsection
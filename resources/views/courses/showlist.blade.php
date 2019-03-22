@extends('layouts.master')

@push('styles')
    <link rel='stylesheet' type='text/css' href='/css/nav-blue.css'>
    <link rel='stylesheet' type='text/css' href='/css/courses/showlist.css'>
@endpush

@push('logo')
    <img id='logo' src='/images/logo-blue.jpg' alt='Rate4it Logo'>
@endpush

@section('content')

    @if(count($searchResults) != 0)

        <div class='content'>

            <div class='list'>

                <h2>List of courses found:</h2>

                <ul class='list-group list-group-flush'>

                    {{-- LOOP THROUGH ALL COURSES FOUND --}}
                    @foreach($searchResults as $course)

                        <li class='list-group-item'>

                            {{-- LOGO  --}}
                            <div class='left subject-course-code'>
                                <p>{{ $course->subject_and_course_code }}</p>
                            </div>

                            {{-- COURSE DETAILS --}}
                            <div class='left course-details'>
                                <p class='course'><a href='/courses/{{ $course->id }}'>{{ $course->title }}</a></p>
                                <p>Professor(s): </p>

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

                    {{-- PAGINATION --}}
                    {!! $searchResults->appends(['courses/list'])->links() !!}

                </ul>
            </div>
        </div>
    {{--@else--}}
        {{--<p>No reviews found.</p>--}}
    @endif
@endsection
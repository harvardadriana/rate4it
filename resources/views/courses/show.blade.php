@extends('layouts.master')

@section('title')
    {{ $course->title }}
@endsection

@push('head')


@endpush

@section('content')

    <h1>{{ $course->title }}</h1>

    <div class=''>
        <h2>{{$course->subject_and_course_code}}</h2>

        {{-- Loop through all instructors of this course --}}
        @foreach($course->instructors as $instructor)
            <p>{{ $instructor->first_name . ' ' . $instructor->last_name }}</p>
        @endforeach

        {{-- Display only if there are reviews --}}
        @if($course->number_of_reviews != 0)
            <p>Overall Rating: {{ $course->overall_rating }}</p>
            <p>Number of reviews: {{ $course->number_of_reviews }}</p>


            {{-- LIST OF RATINGS GO HERE --}}
            {{--<p>List of ratings goes here...</p>--}}

            {{--<ul class='listReviews'>--}}

            {{-- INDIVIDUAL REVIEW --}}
            {{--<li class='reviewItem'>--}}

            {{-- REVIEW SIDEBAR --}}
            {{--<div class='reviewSidebar'>--}}
            {{--<div class='reviewSidebarContent'>--}}

            {{-- USER'S AVATAR RESPONSIVE-PHOTO --}}
            {{--<div class='user-avatar'></div>--}}
            {{-- USER'S NAME AND LOCATION --}}
            {{--<div class='media-story'>--}}
            {{--<div class='user-name'></div>--}}
            {{--<div class='user-location'></div>--}}
            {{--<div class='user-course'></div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{-- REVIEW WRAPPER --}}
            {{--<div class='reviewWrapper'>--}}

            {{-- REVIEW CONTENT --}}
            {{--<div class='review-content'>--}}
            {{--<div>--}}
            {{-- RATINGS AND DATE --}}
            {{--<div>--}}
            {{--<div>icons-stars</div>--}}
            {{--<div>date</div>--}}
            {{--</div>--}}

            {{-- COMMENTS --}}
            {{--<div>Text goes here...</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{-- REVIEW FOOTER --}}
            {{--<div class='review-footer'>--}}
            {{--<div class='rateReview voting-feedback'>--}}
            {{--<ul>--}}
            {{--<li class='vote-item inline-block'>--}}
            {{--<a class='thumbs-up' href='' >--}}
            {{--<span>icon-thumbs up</span>--}}
            {{--<span>numbers</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li class='vote-item inline-block'>--}}
            {{--<a class='thumbs-down' href='' >--}}
            {{--<span>icon-thumbs down</span>--}}
            {{--<span>numbers</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li class='vote-item inline-block'>--}}
            {{--<a class='report' href='' >--}}
            {{--<span>Report</span>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--</ul>--}}

        @else
            <p><a href='/reviews/create-review/{{ $course->id }}'>Be the first one to review this course</a></p>
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
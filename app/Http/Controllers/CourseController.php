<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Instructor;
use App\Subject;
use App\Degree;
use App\Review;

class CourseController extends Controller
{
    /**
     *  GET  '/search'
     */
    public function search(Request $request)
    {
        # Get all courses with instructors from DB
        $coursesList = Course::with('instructors')->orderBy('title')->get();
        $coursesArray = [];
        $instructorsArray = [];

        # Get titles of the courses
        foreach ($coursesList as $course) {
            # Avoid duplicated course titles
            if (!in_array($course->title, $coursesArray)) {
                $coursesArray[$course->id] = $course->title;
            }

            # Get all instructors
            foreach ($course['instructors'] as $eachInstructor) {
                $instructorsArray[$course->id] = [$eachInstructor->last_name, $eachInstructor->first_name];
            }
        }

        return view('courses.search')->with([
            'coursesArray' => $coursesArray,
            'instructorsArray' => $instructorsArray,
            'searchTerm' => $request->session()->get('searchTerm', ''),
            'searchResults' => $request->session()->get('searchResults', []),
            'numberCourses' => $request->session()->get('numberCourses', '')
        ]);
    }

    /**
     *  GET  '/search-process'
     */
    public function searchProcess(Request $request)
    {
        # Validate search
        $request->validate([
            'searchTerm' => 'required'
        ]);

        # Extract the search term
        $searchTerm = $request->input('searchTerm', null);
        $searchResults = [];
        $numberCourses = null;

        # Search for all courses that matches the search term
        if ($searchTerm) {
            $searchResults = Course::with('instructors')->where('title', '=', $searchTerm)->get();
            $numberCourses = count($searchResults);
        }

        return redirect('/search')->with([
            'searchTerm' => $searchTerm,
            'searchResults' => $searchResults,
            'numberCourses' => $numberCourses,
            'alert' => 'Course ' . $searchTerm . ' not found.'
        ]);
    }

    /**
     *  GET  '/course/{title}/{crn}'
     */
    public function show($title, $crn)
    {
        $numberReviews = 0;

        # Get the course requested by the user
        $course = Course::with('instructors')->where('crn', '=', $crn)->first();

        # Get all reviews related to that course
        $reviewsListArray = Review::where('course_id', '=', $course['id'])->orderByDesc('created_at')->get();

        # If the course is not found, redirect to search page
        if (!$course) {
            return redirect('/search');
        }

        # If there are reviews of the course, count number of reviews
        if ($reviewsListArray) {
            $numberReviews = count($reviewsListArray);
        }

        return view('courses.show')->with([
            'course' => $course,
            'reviewsListArray' => $reviewsListArray,
            'numberReviews' => $numberReviews,
            'alert' => null
        ]);
    }

//    /**
//     *  GET  '/courses/list'
//     */
//    public function showList(Request $request)
//    {
//        return view('courses.showlist')->with([
//            'searchResults' => $request->session()->get('searchResults', []),
//        ]);
//    }
}


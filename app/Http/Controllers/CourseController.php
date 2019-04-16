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
        $coursesList = Course::with('instructors')->orderBy('title')->get();
        $coursesArray = [];         // course->id + course->title
        $instructorsArray = [];     // course->id + f.name + l.name

        # Get all course titles
        foreach($coursesList as $course) {

            # Avoid duplicated course titles
            if (!in_array($course->title, $coursesArray)) {
                $coursesArray[$course->id] = $course->title;
            }

            # Get all instructors
            foreach ($course['instructors'] as $eachInstructor) {
                $instructorsArray[$course->id] = [$eachInstructor->last_name, $eachInstructor->first_name];
            }
        }

        return view ('search')->with([
            'coursesArray' => $coursesArray,
            'instructorsArray' => $instructorsArray,
            'searchTerm' => $request->session()->get('searchTerm', ''),
            'searchResults' => $request->session()->get('searchResults', []),
            'numberCourses' => $request->session()->get('numberCourses', ''),
            'alert' => $request->session()->get('alert', null),
            'pageTitle' => 'Find a course',
            'path' => '/search-process'
        ]);
    }

    /**
     *  GET  '/search-process'
     */
    public function searchProcess(Request $request)
    {
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
            'alert' => 'Course ' . $searchTerm . ' not found.',
            'pageTitle' => 'Find a course',
            'path' => '/search-process'
        ]);
    }

    /**
     *  GET  '/{title}/{crn}'
     */
    public function show($title, $crn)
    {
        $course = Course::with('instructors')->where('crn', '=', $crn)->first();

        if(!$course) {
            return redirect('/')->with([
                'alert' => 'Course ' . $title . ' not found.'
            ]);
        }

        return view('courses.show')->with([
            'course' => $course
        ]);
    }

    /**
     *  GET  '/courses/list'
     */
    public function showList(Request $request)
    {
        return view('courses.showlist')->with([
            'searchResults' => $request->session()->get('searchResults', []),
        ]);
    }
}


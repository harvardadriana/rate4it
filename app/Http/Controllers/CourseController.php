<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Instructor;
use App\Subject;

class CourseController extends Controller
{
    /**
     *  GET  '/'
     */
    public function search(Request $request)
    {
        $coursesList = Course::with('instructors')->orderBy('title')->get();
        $coursesArray = [];         // course->id + course->title
        $instructorsArray = [];     // course->id + f.name + l.name

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

        return view ('courses.search')->with([
            'coursesArray' => $coursesArray,
            'instructorsArray' => $instructorsArray,
            'searchTerm' => $request->session()->get('searchTerm', ''),
            'searchResults' => $request->session()->get('searchResults', []),
        ]);
    }


    /**
     *  GET  '/courses/search-process'
     */
    public function searchProcess(Request $request)
    {
        # Extract the search term
        $searchTerm = $request->input('searchTerm', null);
        $searchResults = [];
        $course = null;

        # Search for all courses that matches the search term
        if ($searchTerm) {
            $searchResults = Course::with('instructors')->where('title', '=', $searchTerm)->get();
        }

        $numberCoursesFound = count($searchResults);

        if($numberCoursesFound == 1) {
            foreach ($searchResults as $courses) {
                $course = $courses->id;
            }
        } elseif($numberCoursesFound >= 2) {
            $course = 'list';
        }

        if($course) {
            return redirect('/courses/'.$course)->with([
                'searchResults' => $searchResults
            ]);
        }

        return redirect('/')->with([
            'alert' => 'Course ' . $searchTerm . ' not found.'
        ]);
    }

    /**
     *  GET  /courses/{id}
     */
    public function show($id)
    {
        $course = Course::with('instructors')->where('id', '=', $id)->first();

        if(!$course) {
            return redirect('/')->with([
                'alert' => 'Course ' . $id . ' not found.'
            ]);
        }

        return view('courses.show')->with([
            'course' => $course
        ]);
    }

    /**
     *  GET  /courses/list
     */
    public function showList(Request $request)
    {
        return view('courses.showlist')->with([
            'searchResults' => $request->session()->get('searchResults', []),
        ]);
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Instructor;
use App\Subject;
use App\Review;

class CourseController extends Controller
{
    /**
     *  GET  '/search'
     */
    public function search(Request $request)
    {
        # Get all courses with instructors and subject from the DB
        $allCourses = Course::with('instructors')->with('subject')->orderBy('title')->get();

        # Get all course codes, course titles, subjects, and instructors for dropdown
        $courseCodesArray = Course::getCourseCodes($allCourses);
        $courseTitlesArray = Course::getCourseTitles($allCourses);
        $subjectsArray = Subject::getSubjects($allCourses);
        $instructorsArray = Instructor::getInstructors($allCourses);

        return view('courses.search')->with([
            'courseCodesArray' => $request->session()->get('courseCodesArray', $courseCodesArray),
            'courseTitlesArray' => $request->session()->get('courseTitlesArray', $courseTitlesArray),
            'subjectsArray' => $request->session()->get('subjectsArray', $subjectsArray),
            'instructorsArray' => $request->session()->get('instructorsArray', $instructorsArray),
            'searchCourseCode' => $request->session()->get('searchCourseCode', ''),
            'searchCourseTitle' => $request->session()->get('searchCourseTitle', ''),
            'searchSubject' => $request->session()->get('searchSubject', ''),
            'searchInstructor' => $request->session()->get('searchInstructor', ''),
            'searchResults' => $request->session()->get('searchResults', []),
            'numberCourses' => $request->session()->get('numberCourses', '')
        ]);
    }

    /**
     *  GET  '/search-process'
     */
    public function searchProcess(Request $request)
    {
        # Extract the searched terms
        $searchCourseCode = $request->input('searchCourseCode', null);
        $searchCourseTitle = $request->input('searchCourseTitle', null);
        $searchSubject = $request->input('searchSubject', null);
        $searchInstructor = $request->input('searchInstructor', null);

        $numberCourses = null;

        # Get all courses with instructors and subject from the DB
        $searchResults = Course::with('instructors')->with('subject')->orderBy('title')->get();

        # Filter courses that matches the course code selected
        if ($searchCourseCode) {
            $searchResults = collect($searchResults->where('subject_and_course_code', '=', $searchCourseCode)->all());
        }

        # Filter courses that matches the course title selected
        if ($searchCourseTitle) {
            $searchResults = collect($searchResults->where('title', '=', $searchCourseTitle)->all());
        }

        # Filter courses that matches the subject selected
        if ($searchSubject) {
            $searchResults = collect($searchResults->where('subject_id', '=', $searchSubject)->all());
        }

        # Filter courses that matches the instructor selected
        if ($searchInstructor) {
            $instructorCourses = [];
            foreach ($searchResults as $key => $course) {
                foreach ($course['instructors'] as $instructor) {
                    if ($instructor['id'] == $searchInstructor) {
                        $instructorCourses[] = $course;
                    }
                }
            }
            $searchResults = collect($instructorCourses);
        }

        # Count how many results found
        $searchResultsArray = $searchResults->toArray();
        $numberCourses = count($searchResultsArray);

        # Get all course codes, course titles, subjects, and instructors for dropdown
        $courseCodesArray = Course::getCourseCodes($searchResults);
        $courseTitlesArray = Course::getCourseTitles($searchResults);
        $subjectsArray = Subject::getSubjects($searchResults);
        $instructorsArray = Instructor::getInstructors($searchResults);

        return redirect('/search')->with([
            'searchCourseCode' => $searchCourseCode,
            'searchCourseTitle' => $searchCourseTitle,
            'searchSubject' => $searchSubject,
            'searchInstructor' => $searchInstructor,

            'courseCodesArray' => $courseCodesArray,
            'courseTitlesArray' => $courseTitlesArray,
            'subjectsArray' => $subjectsArray,
            'instructorsArray' => $instructorsArray,

            'searchResults' => $searchResults,
            'numberCourses' => $numberCourses,
            'alert' => 'Course ' . $searchCourseTitle . ' not found.'
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

    /**
     *  GET  '/courses/list'
     */
//    public function showList(Request $request)
//    {
//        return view('courses.showlist')->with([
//            'searchResults' => $request->session()->get('searchResults', []),
//        ]);
//    }
}


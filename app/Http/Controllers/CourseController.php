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
        # Get all courses with instructors and subject from the DB
        $allCourses = Course::with('instructors')->with('subject')->orderBy('title')->get();

        # Get all course codes, course titles, subjects, and instructors
        $courseCodesArray = Course::getCourseCodes($allCourses);
        $courseTitlesArray = Course::getCourseTitles($allCourses);
        $subjectsArray = Subject::getSubjects($allCourses);
        $instructorsArray = Instructor::getInstructors($allCourses);

        return view('courses.test')->with([
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

        $courseCodesArray = [];
        $courseTitlesArray = [];
        $subjectsArray = [];
        $instructorsArray = [];

        $searchResults = [];
        $numberCourses = null;

        if ($searchCourseCode) {
            # Get all courses that match the subject-course-code searched
            $searchResults = Course::with('instructors')->with('subject')->where('subject_and_course_code', '=', $request->input('searchCourseCode'))->orderBy('title')->get();

            $numberCourses = count($searchResults);

            # Get all course codes, course titles, subjects, and instructors
            $courseCodesArray = Course::getCourseCodes($searchResults);
            $courseTitlesArray = Course::getCourseTitles($searchResults);
            $subjectsArray = Subject::getSubjects($searchResults);
            $instructorsArray = Instructor::getInstructors($searchResults);
        }

        if ($searchCourseTitle) {
            # Get all courses that match the course title searched
            $searchResults = Course::with('instructors')->with('subject')->where('title', '=', $request->input('searchCourseTitle'))->orderBy('title')->get();

            if ($searchResults) {
                $numberCourses = count($searchResults);

                # Get all course codes, course titles, subjects, and instructors
                $courseCodesArray = Course::getCourseCodes($searchResults);
                $courseTitlesArray = Course::getCourseTitles($searchResults);
                $subjectsArray = Subject::getSubjects($searchResults);
                $instructorsArray = Instructor::getInstructors($searchResults);
            }
        }

        if ($searchSubject) {
            # Get all courses that match the subject searched
            $subjectId = Subject::where('name', '=', $searchSubject)->pluck('id');

            # Get all courses with instructors and subject from the DB with the requested subject id
            $searchResults = Course::with('instructors')->with('subject')->orderBy('title')->where('subject_id', '=', $subjectId[0])->get();

            if ($searchResults && $subjectId) {
                $numberCourses = count($searchResults);

                # Get all course codes, course titles, subjects, and instructors
                $courseCodesArray = Course::getCourseCodes($searchResults);
                $courseTitlesArray = Course::getCourseTitles($searchResults);
                $subjectsArray = Subject::getSubjects($searchResults);
                $instructorsArray = Instructor::getInstructors($searchResults);
            }
        }

        if ($searchInstructor) {
            # Get all courses with the instructor searched
            $searchResults = Instructor::find($searchInstructor)->courses()->get();

            if ($searchResults && $searchInstructor) {
                $numberCourses = count($searchResults);

                # Get all course codes, course titles, subjects, and instructors
                $courseCodesArray = Course::getCourseCodes($searchResults);
                $courseTitlesArray = Course::getCourseTitles($searchResults);
                $subjectsArray = Subject::getSubjects($searchResults);
                $instructorsArray = Instructor::getInstructors($searchResults);
            }
        }

        //  $coursesAll = DB::table('courses')
        //    ->join('instructors', 'instructors.id', '=', $instructorId)->get();

//            $conditions[] = '->where(\'subject_and_course_code\', \'=\', $searchCourseCode)';
        //    }

//
////
//        $coursesList2 = Course::with('instructors')->with('subject')
//                                     ->where('title', $request->input('searchCourse'))
//                                     ->where('subject_id', '=', $subjectId)
//                                     ->where('subject_and_course_code', '=', $searchCourseCode)
//                                     ->get();

        return redirect('/search/test')->with([
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


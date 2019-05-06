<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Instructor;
use App\Subject;
use App\Degree;
use App\Review;
use App\User;
use Carbon\Carbon;

class ReviewController extends Controller
{

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     *  GET  '/reviews'
     */
    public function search(Request $request)
    {
        # Get all courses with instructors from DB
        $coursesList = Course::with('instructors')->orderBy('title')->get();
        $coursesArray = [];
        $instructorsArray = [];

        # Get titles of the courses
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

        return view ('reviews.search')->with([
            'coursesArray' => $coursesArray,
            'instructorsArray' => $instructorsArray,
            'searchTerm' => $request->session()->get('searchTerm', ''),
            'searchResults' => $request->session()->get('searchResults', []),
            'numberCourses' => $request->session()->get('numberCourses', '')
        ]);
    }

    /**
     *  GET  '/reviews-process'
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

        return redirect('/reviews')->with([
            'searchResults' => $searchResults,
            'searchTerm' => $searchTerm,
            'numberCourses' => $numberCourses,
            'alert' => 'Course ' . $searchTerm . ' not found.'
        ]);
    }

    /**
     *  GET  '/reviews/create/{title_for_url}/{crn}'
     */
    public function create($title_for_url, $crn)
    {
        # Get the course to be rated
        $course = Course::with('instructors')->where('crn', '=', $crn)->first();

        # If the course is not found, redirects to reviews page
        if(!$course) {
            return redirect('/reviews')->with([
                'alert' => 'Course ' . $title_for_url . ' not found.'
            ]);
        } else {

            # Check if user has rated the course before
            $previousReview = Review::where('user_id', '=', Auth::user()->id)->where('course_id', '=', $course->id)->first();

            # If there are no previous ratings for the course from this user, create review
            if ($previousReview == null) {
                return view('reviews.create')->with([
                    'course' => $course,
                    'title_for_url' => $title_for_url,
                    'crn' => $crn
                ]);
            } else {

                # Otherwise redirect user to reviews page
                return redirect('/reviews')->with([
                    'searchResults' => [],
                    'searchTerm' => $course->title,
                    'alert' => 'You have rated this course before'
                ]);
            }
        }
    }

    /**
     *  POST  '/reviews'
     */
    public function store(Request $request)
    {
        # Validate inputs from user
        $request->validate([
            'overall_rating' => 'required|numeric',
            'take_course_again' => 'required|numeric',
            'difficulty' => 'required|numeric',
            'clear_objectives' => 'required|numeric',
            'organized' => 'required|numeric',
            'gain_deeper_insight' => 'required|numeric',
            'workload' => 'required|numeric',
            'clear_assignment_instructions' => 'required|numeric',
            'grading' => 'required|numeric',
            'material' => 'required|numeric',
            'clarity' => 'required|numeric',
            'knowledge' => 'required|numeric',
            'feedback' => 'required|numeric',
            'performance' => 'required|numeric',
            'grade' => 'required',
            'survival_tips' => 'required',
            'comments' => 'required'
        ]);

        # Get user ID
        $userId = Auth::user()->id;

        # Get the course title_for_url and crn
        $course_id = $request->course_id;
        $course = Course::with('rate')->where('id', '=', $course_id)->first();

        # Save new review
        $newReview = new Review();
        $newReview->overall_rating = $request->overall_rating;
        $newReview->take_course_again = $request->take_course_again;
        $newReview->difficulty = $request->difficulty;
        $newReview->clear_objectives = $request->clear_objectives;
        $newReview->organized = $request->organized;
        $newReview->gain_deeper_insight = $request->gain_deeper_insight;
        $newReview->workload = $request->workload;
        $newReview->clear_assignment_instructions = $request->clear_assignment_instructions;
        $newReview->grading = $request->grading;
        $newReview->material = $request->material;
        $newReview->clarity = $request->clarity;
        $newReview->knowledge = $request->knowledge;
        $newReview->feedback = $request->feedback;
        $newReview->performance = $request->performance;
        $newReview->grade = $request->grade;
        $newReview->survival_tips = $request->survival_tips;
        $newReview->comments = $request->comments;
        $newReview->user_id = $userId;
        $newReview->course_id = $course_id;
        $newReview->save();

        # Update the course overall rating
        $base = ($course->rate->number_of_reviews == 0 ? '1' : '2');
        $course->rate->overall_rating = ($course->rate->overall_rating + $newReview->overall_rating)/$base;
        $course->rate->take_course_again = $course->rate->take_course_again + $request->take_course_again;
        $course->rate->difficulty = ($course->rate->difficulty + $newReview->difficulty)/$base;
        $course->rate->clear_objectives = ($course->rate->clear_objectives + $newReview->clear_objectives)/$base;
        $course->rate->organized = ($course->rate->organized + $newReview->organized)/$base;
        $course->rate->gain_deeper_insight = ($course->rate->gain_deeper_insight + $newReview->gain_deeper_insight)/$base;
        $course->rate->workload = ($course->rate->workload + $newReview->workload)/$base;
        $course->rate->clear_assignment_instructions = ($course->rate->clear_assignment_instructions + $newReview->clear_assignment_instructions)/$base;
        $course->rate->grading = ($course->rate->grading + $newReview->grading)/$base;
        $course->rate->material = ($course->rate->material + $newReview->material)/$base;
        $course->rate->clarity = ($course->rate->clarity + $newReview->clarity)/$base;
        $course->rate->knowledge = ($course->rate->knowledge + $newReview->knowledge)/$base;
        $course->rate->feedback = ($course->rate->feedback + $newReview->feedback)/$base;
        $course->rate->number_of_reviews = $course->rate->number_of_reviews + 1;
        $course->rate->save();

        // Course::calculateOverallRating($course, $newReview);



        return redirect('/' . $course->title_for_url . '/' . $course->crn)->with([
            'alert' => 'Your review for ' . $course->title . ' has been posted.'
        ]);
    }

}

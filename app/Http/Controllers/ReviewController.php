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
use App\Rate;

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
            'alert' => $request->session()->get('alert', null),
            'numberCourses' => $request->session()->get('numberCourses', ''),
            'pageTitle' => 'Search course for rating',
            'path' => '/reviews-process'
        ]);
    }

    /**
     *  GET  '/reviews-process'
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

        return redirect('/reviews')->with([
            'searchResults' => $searchResults,
            'searchTerm' => $searchTerm,
            'numberCourses' => $numberCourses,
            'alert' => 'Course ' . $searchTerm . ' not found.',
            'pageTitle' => 'Search course for rating',
            'path' => '/reviews-process'
        ]);
    }

    /**
     *  GET  '/reviews/create/{title_for_url}/{crn}'
     */
    public function create($title_for_url, $crn)
    {
        $course = Course::with('instructors')->where('crn', '=', $crn)->first();

        if(!$course) {
            return redirect('/reviews')->with([
                'alert' => 'Course ' . $title_for_url . ' not found.'
            ]);
        } else {

            return view('reviews.create')->with([
                'course' => $course,
                'title_for_url' => $title_for_url,
                'crn' => $crn
            ]);
        }
    }

    /**
     *  POST  '/reviews'
     */
    public function store(Request $request)
    {
        // Validate inputs from user
        $request->validate([
            'course_id' => 'required',
            'overall_rating' => 'required|numeric',
            'take_course_again' => 'required|numeric',
            'attendance_mandatory' => 'required|alpha',
            'class_taken_for_credit' => 'required|alpha',
            'difficulty' => 'required|numeric',
            'clear_objectives' => 'required|numeric',
            'organized' => 'required|numeric',
            'gain_deeper_insight' => 'required|numeric',
            'workload' => 'required|numeric',
            'helpful_assignments' => 'required|numeric',
            'clear_assignment_instructions' => 'required|numeric',
            'grading' => 'required|numeric',
            'material' => 'required|numeric',
            'clarity' => 'required|numeric',
            'knowledge' => 'required|numeric',
            'feedback' => 'required|numeric',
            'helpfulness_TA' => 'required|numeric',
            'performance' => 'required|numeric',
            'attendance' => 'required|numeric',
            'hours_studying' => 'required|numeric',
            'grade' => 'required',
            'survival_tips' => 'required',
            'comments' => 'required'
        ]);

        // Get user ID
        $userId = Auth::user()->id;

        // Get the course title_for_url and crn
        $course_id = $request->course_id;
        $course = Course::with('rate')->where('id', '=', $course_id)->first();

        // Save new review
        $newReview = new Review();
        $newReview->overall_rating = $request->overall_rating;
        $newReview->take_course_again = $request->take_course_again;
        $newReview->attendance_mandatory = $request->attendance_mandatory;
        $newReview->class_taken_for_credit = $request->class_taken_for_credit;
        $newReview->difficulty = $request->difficulty;
        $newReview->clear_objectives = $request->clear_objectives;
        $newReview->organized = $request->organized;
        $newReview->gain_deeper_insight = $request->gain_deeper_insight;
        $newReview->workload = $request->workload;
        $newReview->helpful_assignments = $request->helpful_assignments;
        $newReview->clear_assignment_instructions = $request->clear_assignment_instructions;
        $newReview->grading = $request->grading;
        $newReview->material = $request->material;
        $newReview->clarity = $request->clarity;
        $newReview->knowledge = $request->knowledge;
        $newReview->feedback = $request->feedback;
        $newReview->helpfulness_TA = $request->helpfulness_TA;
        $newReview->performance = $request->performance;
        $newReview->attendance = $request->attendance;
        $newReview->hours_studying = $request->hours_studying;
        $newReview->grade = $request->grade;
        $newReview->survival_tips = $request->survival_tips;
        $newReview->comments = $request->comments;
        $newReview->user_id = $userId;
        $newReview->course_id = $course_id;
        $newReview->save();

        // Update the course overall rate
        $base = ($course->rate->number_of_reviews == 0 ? '1' : '2');
        $course->rate->overall_rating = ($course->rate->overall_rating + $newReview->overall_rating)/$base;
        $course->rate->take_course_again = $course->rate->take_course_again + $request->take_course_again;
        $course->rate->difficulty = ($course->rate->difficulty + $newReview->difficulty)/$base;
        $course->rate->clear_objectives = ($course->rate->clear_objectives + $newReview->clear_objectives)/$base;
        $course->rate->organized = ($course->rate->organized + $newReview->organized)/$base;
        $course->rate->gain_deeper_insight = ($course->rate->gain_deeper_insight + $newReview->gain_deeper_insight)/$base;
        $course->rate->workload = ($course->rate->workload + $newReview->workload)/$base;
        $course->rate->helpful_assignments = ($course->rate->helpful_assignments + $newReview->helpful_assignments)/$base;
        $course->rate->clear_assignment_instructions = ($course->rate->clear_assignment_instructions + $newReview->clear_assignment_instructions)/$base;
        $course->rate->grading = ($course->rate->grading + $newReview->grading)/$base;
        $course->rate->material = ($course->rate->material + $newReview->material)/$base;
        $course->rate->clarity = ($course->rate->clarity + $newReview->clarity)/$base;
        $course->rate->knowledge = ($course->rate->knowledge + $newReview->knowledge)/$base;
        $course->rate->feedback = ($course->rate->feedback + $newReview->feedback)/$base;
        $course->rate->helpfulness_TA = ($course->rate->helpfulness_TA + $newReview->helpfulness_TA)/$base;
        $course->rate->number_of_reviews = $course->rate->number_of_reviews + 1;
        $course->rate->save();

        return redirect('/' . $course->title_for_url . '/' . $course->crn)->with([
            'alert' => 'Your review for ' . $course->title . ' has been posted.'
        ]);
    }

}

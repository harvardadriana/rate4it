<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function instructors()
    {
        return $this->belongsToMany('App\Instructor')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function rate()
    {
        return $this->hasOne('App\Rate');
    }

    /**
     * Update the course overall rating
     */
    public static function calculateOverallRating($course, $newReview)
    {
        $base = ($course->rate->number_of_reviews == 0 ? '1' : '2');
        $course->rate->overall_rating = ($course->rate->overall_rating + $newReview->overall_rating) / $base;
        $course->rate->take_course_again = $course->rate->take_course_again + $newReview->take_course_again;
        $course->rate->difficulty = ($course->rate->difficulty + $newReview->difficulty) / $base;
        $course->rate->clear_objectives = ($course->rate->clear_objectives + $newReview->clear_objectives) / $base;
        $course->rate->organized = ($course->rate->organized + $newReview->organized) / $base;
        $course->rate->gain_deeper_insight = ($course->rate->gain_deeper_insight + $newReview->gain_deeper_insight) / $base;
        $course->rate->workload = ($course->rate->workload + $newReview->workload) / $base;
        $course->rate->clear_assignment_instructions = ($course->rate->clear_assignment_instructions + $newReview->clear_assignment_instructions) / $base;
        $course->rate->grading = ($course->rate->grading + $newReview->grading) / $base;
        $course->rate->material = ($course->rate->material + $newReview->material) / $base;
        $course->rate->clarity = ($course->rate->clarity + $newReview->clarity) / $base;
        $course->rate->knowledge = ($course->rate->knowledge + $newReview->knowledge) / $base;
        $course->rate->feedback = ($course->rate->feedback + $newReview->feedback) / $base;
        $course->rate->number_of_reviews = $course->rate->number_of_reviews + 1;
        $course->rate->save();
    }

    /**
     * Get all course codes
     */
    public static function getCourseCodes($searchResults)
    {
        $courseCodesArray = [];

        foreach ($searchResults as $course) {
            if (!in_array($course->subject_and_course_code, $courseCodesArray)) {
                $courseCodesArray[] = $course->subject_and_course_code;
            }
        }

        asort($courseCodesArray);

        return $courseCodesArray;
    }

    /**
     * Get all course titles
     */
    public static function getCourseTitles($searchResults)
    {
        $courseTitlesArray = [];

        foreach ($searchResults as $course) {
            if (!in_array($course->title, $courseTitlesArray)) {
                $courseTitlesArray[$course->id] = $course->title;
            }
        }

        return $courseTitlesArray;
    }
}

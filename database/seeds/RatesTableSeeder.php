<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Rate;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $allCourses = Course::all();

        # Loop through all courses, and create a rate for each course
        foreach ($allCourses as $courses => $course) {
            # Save the new rate
            $rate = new Rate();
            $rate->overall_rating = 0.0;
            $rate->take_course_again = 0;
            $rate->difficulty = 0.0;
            $rate->clear_objectives = 0.0;
            $rate->organized = 0.0;
            $rate->gain_deeper_insight = 0.0;
            $rate->workload = 0.0;
            $rate->helpful_assignments = 0.0;
            $rate->clear_assignment_instructions = 0.0;
            $rate->grading = 0.0;
            $rate->material = 0.0;
            $rate->clarity = 0.0;
            $rate->knowledge = 0.0;
            $rate->feedback = 0.0;
            $rate->helpfulness_TA = 0.0;
            $rate->number_of_reviews = 0;
            $rate->course_id = $course->id;
            $rate->save();
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Subject;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        # Extract courses data from Harvard's courses catalogue JSON file
        $extensionCatalogueJS = file_get_contents(database_path('/extensioncatalogue.js'));
        $extensionCatalogue = json_decode($extensionCatalogueJS, true);
        $allCourses = $extensionCatalogue['courses'];
        $count = count($allCourses);

        # Loop through all courses, and save each course
        foreach ($allCourses as $key => $courseData) {

            # Retrieve 'subject' id from 'Subjects' Table
            $subjectId = Subject::where('code', '=', $courseData['subject_code'])->pluck('id')->first();

            # Save the new course
            $course = new Course();
            $course->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $course->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $course->title_for_sort = $courseData['title_for_sort'];
            $course->title = $courseData['title'];
            $course->title_for_url = str_replace(' ','-', $courseData['title_for_sort']);
            $course->subject_and_course_code = $courseData['subject_and_course_code'];
            $course->code = $courseData['course_code'];
            $course->code_int = $courseData['course_code_int'];
            $course->hes_id = $courseData['id'];
            $course->crn = $courseData['crn_as_string'];
            $course->crn_as_int = $courseData['crn'];
            $course->college_code = $courseData['college_code'];
            $course->subject_id = $subjectId;
            $course->number_of_reviews = 0;
            $course->overall_rating = 0;
            $course->save();
            $count--;
        }
    }
}

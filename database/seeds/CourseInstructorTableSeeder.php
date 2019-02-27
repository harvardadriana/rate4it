<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Instructor;

class CourseInstructorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        # Extract data from Harvard's course catalogue JSON file
        $extensionCatalogueJS = file_get_contents(database_path('/extensioncatalogue.js'));
        $extensionCatalogue = json_decode($extensionCatalogueJS, true);
        $allCourses = $extensionCatalogue['courses'];

        $count = count($allCourses);

        foreach ($allCourses as $key => $courseData) {

            # Get the course and the instructors array
            $course = Course::where('hes_id', '=', $courseData['id'])->first();
            $instructorsArray = $courseData['instructors'];

            # Loop through each instructor
            foreach ($instructorsArray as $key => $instructors) {

                # Get the last name of instructor
                $fullNameArray = explode(', ', $instructors);
                $lastName = $fullNameArray[0];

                # Get the instructor
                $instructor = Instructor::where('last_name', '=', $lastName)->first();

                $course->instructors()->save($instructor);
            }
        }
    }
}

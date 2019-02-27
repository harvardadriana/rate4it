<?php

use Illuminate\Database\Seeder;
use App\Instructor;

class InstructorsTableSeeder extends Seeder
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

        $instructorsAll = [];
        $count = count($allCourses);

        # Loop through all courses
        foreach ($allCourses as $key => $course) {

            # Loop through all instructors in each course
            foreach ($course['instructors'] as $eachInstructor) {

                # Avoid entering the same instructor twice in the DB
                if (!in_array($eachInstructor, $instructorsAll)) {

                    # Separate fist and last names
                    $fullNameArray = explode(', ', $eachInstructor);

                    # Add new instructor
                    $instructor = new Instructor();
                    $instructor->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
                    $instructor->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
                    $instructor->first_name = $fullNameArray[1];
                    $instructor->last_name = $fullNameArray[0];
                    $instructor->save();
                    $count--;
                    $instructorsAll[] = $eachInstructor;
                }
            }
        }
    }
}

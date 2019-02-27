<?php

use Illuminate\Database\Seeder;
use App\Subject;

class SubjectsTableSeeder extends Seeder
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

        $subjectsAll = [];
        $count = count($allCourses);

        # Loop through all courses
        foreach ($allCourses as $key => $courseData) {

            # Avoid entering the same instructor twice in the DB
            if (!in_array($courseData['subject_code'], $subjectsAll)) {

                # Add new subject
                $subject = new Subject();
                $subject->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
                $subject->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
                $subject->name = $courseData['subjects'][0];
                $subject->code = $courseData['subject_code'];
                $subject->save();
                $count--;
                $subjectsAll[] = $courseData['subject_code'];
            }
        }
    }
}

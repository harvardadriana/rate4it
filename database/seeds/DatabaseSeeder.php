<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DegreesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(InstructorsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(CourseInstructorTableSeeder::class);
        $this->call(RatesTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Degree;

class DegreesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        # Extract degrees data from Harvard Extension's catalogue JSON file
        $degreesJS = file_get_contents(database_path('/degrees.js'));
        $degrees = json_decode($degreesJS, true);
        $count = count($degrees);

        # Loop through all degrees, and save each one
        foreach ($degrees as $key => $degreeData) {

            # Save the new degree
            $degree = new Degree();
            $degree->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $degree->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $degree->title = $degreeData['title'];
            $degree->hes_id = $degreeData['id'];
            $degree->save();
            $count--;
        }
    }
}

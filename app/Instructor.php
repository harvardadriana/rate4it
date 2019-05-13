<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    public function courses()
    {
        return $this->belongsToMany('App\Course')->withTimestamps();
    }

    /**
     * Get all instructors
     */
    public static function getInstructors($searchResults)
    {
        $instructorsArray = [];

        foreach ($searchResults as $course) {
            # Get all instructors
            # Loop through all instructors in each course
            foreach ($course['instructors'] as $eachInstructor) {
                # Avoid entering the same instructor twice in the DB
                if (!in_array($eachInstructor['id'], $instructorsArray)) {
                    $instructorsArray[$eachInstructor['id']] = [$eachInstructor['last_name'], $eachInstructor['first_name']];
                }
            }
        }

        # Sort array in alphabetic order
        asort($instructorsArray);

        return $instructorsArray;
    }

}

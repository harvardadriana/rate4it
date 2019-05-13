<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    /**
     * Get all subjects
     */
    public static function getSubjects($searchResults)
    {
        $subjectsArray = [];

        foreach ($searchResults as $course) {
            $subjectsArray[$course['subject_id']] = $course['subject']['name'];
        }

        # Eliminate duplicated subjects
        $subjectsArray = array_unique($subjectsArray);

        # Sort array in alphabetic order
        asort($subjectsArray);

        return $subjectsArray;
    }
}

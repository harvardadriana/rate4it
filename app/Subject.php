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
            if (!in_array($course->subject_id, $subjectsArray)) {
                $subjectsArray[$course->subject_id] = $course['subject']['name'];
            }
        }

        # Sort array in alphabetic order
        asort($subjectsArray);

        return $subjectsArray;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function instructors()
    {
        return $this->belongsToMany('App\Instructor')->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}

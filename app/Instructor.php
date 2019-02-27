<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    public function courses()
    {
        return $this->belongsToMany('App\Course')->withTimestamps();
    }
}

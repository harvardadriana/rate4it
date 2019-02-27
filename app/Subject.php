<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}

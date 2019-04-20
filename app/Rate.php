<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     *  GET  '/rate'
     */
    public function rate()
    {
        return view('reviews.rate');
    }
}

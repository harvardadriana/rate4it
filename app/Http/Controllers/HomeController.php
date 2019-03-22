<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Return homepage
     */
    public function __invoke()
    {
        return view('homepage');
    }
}

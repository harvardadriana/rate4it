<?php

/*
|--------------------------------------------------------------------------
| HomeController
|--------------------------------------------------------------------------
*/
Route::get('/', 'HomeController');
Route::get('/contact', 'HomeController@sendEmail');
Route::post('/contact', 'HomeController@postEmail');
Route::get('/about', 'HomeController@about');

/*
|--------------------------------------------------------------------------
| ReviewController / Verified users only
|--------------------------------------------------------------------------
*/
Route::get('/reviews', 'ReviewController@search')->middleware('verified');
Route::get('/reviews-process', 'ReviewController@searchProcess')->middleware('verified');
Route::post('/reviews', 'ReviewController@store')->middleware('verified');
Route::get('/reviews/create/{title_for_url}/{crn}', 'ReviewController@create')->middleware('verified');

/*
|--------------------------------------------------------------------------
| CourseController / Search courses
|--------------------------------------------------------------------------
*/
Route::get('/search', 'CourseController@search');
Route::get('/search-process', 'CourseController@searchProcess');
Route::get('/course/{title_for_url}/{crn}', 'CourseController@show');

/*
|--------------------------------------------------------------------------
| Email verification
|--------------------------------------------------------------------------
|
*/
Auth::routes(['verify' => true]);
Route::auth();
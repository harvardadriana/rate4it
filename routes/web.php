<?php

use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/
Route::get('/','HomeController');


/*
|--------------------------------------------------------------------------
| Review courses / Verified users only
|--------------------------------------------------------------------------
*/
//Route::group(['middleware' => 'auth'], function () {

    Route::get('/reviews','ReviewController@search')->middleware('verified');
    Route::get('/reviews-process', 'ReviewController@searchProcess')->middleware('verified');
    Route::post('/reviews','ReviewController@store')->middleware('verified');
    Route::get('/reviews/create/{title_for_url}/{crn}', 'ReviewController@create')->middleware('verified');

//});

/*
|--------------------------------------------------------------------------
| Email verification
|--------------------------------------------------------------------------
|
*/
Auth::routes(['verify' => true]);

Route::auth();


/*
|--------------------------------------------------------------------------
| DELETE LATER
|--------------------------------------------------------------------------
*/
Route::get('/search/test','TestController@searchtest');
Route::get('/search-processtest', 'TestController@searchProcesstest');

Route::get('/test2', 'TestController@test2');
Route::get('/findCourseTitle', 'TestController@findCourseTitle');


/*
|--------------------------------------------------------------------------
| Search courses
|--------------------------------------------------------------------------
*/
Route::get('/search','CourseController@search');
Route::get('/search-process', 'CourseController@searchProcess');
Route::get('/course/{title_for_url}/{crn}', 'CourseController@show');

/*
|--------------------------------------------------------------------------
| CLEAN UP
|--------------------------------------------------------------------------
|
*/
/*
Route::post('/reviews', 'ReviewController@store');              //reviews.store
Route::get('/reviews/create', 'ReviewController@create');       //reviews.create
Route::get('/reviews/{review}', 'ReviewController@show');       //reviews.show
Route::put('/reviews/{review}', 'ReviewController@update');     //reviews.update
Route::get('/reviews/{id}/delete', 'ReviewController@delete');
Route::delete('/reviews/{review}', 'ReviewController@destroy'); //reviews.destroy
Route::get('/reviews/{review}/edit', 'ReviewController@edit');  //reviews.edit
*/


//Route::view('/about', 'about');
//Route::view('/contact', 'contact');

//Route::get('/courses/list', 'CourseController@showList');
//Route::get('/show', 'CourseController@show');

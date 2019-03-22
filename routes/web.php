<?php

use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/
Route::get('/','HomeController');

Route::get('/search','CourseController@search');
Route::get('/search-process', 'CourseController@searchProcess');

//Route::get('/courses/list', 'CourseController@showList');
Route::get('/courses/{id}', 'CourseController@showCourse');

//Route::get('/show', 'CourseController@show');

Route::get('/rate', 'ReviewController@rate')->middleware('verified');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
|
*/
Auth::routes(['verify' => true]);



/*
|--------------------------------------------------------------------------
| CLEAN UP
|--------------------------------------------------------------------------
|
*/



//Route::view('/about', 'about');
//Route::view('/contact', 'contact');


/*
|--------------------------------------------------------------------------
| RESTRICTING MULTIPLE ROUTES
|--------------------------------------------------------------------------
|
*/

//Route::group(['middleware' => 'auth'], function () {
//
//    # Rate a course
//    Route::get('/courses/rate', 'CourseController@rate');
//    Route::post('/courses', 'CourseController@store');
//
//});


/*
|--------------------------------------------------------------------------
| TESTING - MAIL
|--------------------------------------------------------------------------
|
*/
Route::get('/mail', function () {

    $data = [
        'title' => 'hi',
        'content' => 'content here'
    ];


    Mail::send('emails.test', $data, function ($message) {

        $message->to('lin_nrt@hotmail.com', 'Adriana')->subject('hello');

    });


});


/*
|--------------------------------------------------------------------------
| DELETE AFTER TESTING
|--------------------------------------------------------------------------
|
*/
Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});


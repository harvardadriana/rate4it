<?php

use Illuminate\Support\Facades\Mail;

Route::get('/rate', function () {
    return view('reviews.rate');
})->middleware('verified');


Route::get('/search', function () {
    return view('courses.search');
});

Route::get('/show', function () {
    return view('courses.show');
});

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
| Homepage
|--------------------------------------------------------------------------
|
*/
Route::get('/','HomeController');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
|
*/
Auth::routes(['verify' => true]);




Route::get('/mail', function () {

    $data = [
        'title' => 'hi',
        'content' => 'content here'
    ];


    Mail::send('emails.test', $data, function($message) {

        $message->to('adriana_sugihara@mac.com', 'AdrianaMac')->subject('hello');

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


<?php

use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/
Route::get('/','HomeController');
Route::get('/homepage2','ReviewController@homepage2');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
|
*/
Auth::routes(['verify' => true]);

/*
|--------------------------------------------------------------------------
| Review courses
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function () {

    Route::get('/reviews','ReviewController@search');
    Route::get('/reviews-process', 'ReviewController@searchProcess');
    Route::post('/reviews','ReviewController@store');
    Route::get('/reviews/create/{title_for_url}/{crn}', 'ReviewController@create');

});

/*
|--------------------------------------------------------------------------
| Search courses
|--------------------------------------------------------------------------
*/
Route::get('/search','CourseController@search');
Route::get('/search-process', 'CourseController@searchProcess');
Route::get('/{title_for_url}/{crn}', 'CourseController@show');

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

Route::get('/courses/search2','TestController@search2');






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

        $message->to('adrianarossettisugih@g.harvard.edu', 'Adriana')->subject('hello');

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


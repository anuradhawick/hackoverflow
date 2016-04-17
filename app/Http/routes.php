<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('loginregister');
});

Route::get('/hackathons', function () {
    return view('hackathons');
});

Route::get('/meetups', function () {
    return view('meetup');
});

Route::get('/others', function () {
    return view('otherevents');
});

Route::get('/{type}/view/{id}', function ($type, $id) {
    return view('viewEvent', ['eventID' => $id, 'type' => $type]);
});



/*
 * Routes related to events
 * */

Route::get('/events/{type}', 'EventController@view');

Route::get('/events/{type}/{id}', 'EventController@viewEvent');

Route::get('/post-event/{type}', 'EventController@postForm');

/*
 * Routes related to forum posts
 * */

Route::get('/forum/post', function () {
    return view('postForum');
});

Route::get('/forum/{id}', 'ForumController@view');

Route::get('/forum/', 'ForumController@viewPosts');


// Route for accessing test controller
Route::get('/test/', ['uses' => 'test@test']);


/*
 * DB inserts and DB operations are performed using the below routing functions
 * Middleware associated are defined in these routes
 * */

Route::post('/forum/post', 'ForumController@post');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

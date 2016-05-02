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

    Route::group(['middleware' => 'auth'], function () {
        /*
         * Posting in the forum related routes
         * */
        Route::get('/forum/post', function () {
            return view('postForum');
        });
        /*
         * Posting and saving the data to the forum
         * */
        Route::post('/forum/post', 'ForumController@post');

        /*
         * Posting events
         * */
        Route::get('/post-event/{type}', 'EventController@postEvent');

    });
    /*
     * Routes related to normal views
     * */

    Route::get('/', function () {
        return view('index');
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

    /*
     * Routes related to forum posts
     * */


    Route::get('/forum/{id}', 'ForumController@view');

    Route::get('/forum/', 'ForumController@viewPosts');


    // Route for accessing test controller
    Route::get('/test/', ['uses' => 'test@test']);

    /*
     * Routes related to authentication of the users
     * */

    Route::get('/login', function () {
        if (!\Illuminate\Support\Facades\Auth::check()) {
            return view('loginregister');
        } else {
            return redirect('/');
        }
    });
    Route::post('/login', 'Auth\AuthController@authenticate');

    Route::get('/logout', 'Auth\AuthController@logout');

});

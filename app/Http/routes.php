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
        Route::get('/forum/like/', 'ForumController@likeForum');
        /*
         * Posting and saving the data to the forum
         * */
        Route::post('/forum/post', 'ForumController@post');

        /*
         * Posting events form page
         * */
        Route::get('/post-event/{type}', 'EventController@postEvent');

        /*
         * Posting events and saving data
         * */
        Route::post('/post-event/{type}', 'EventController@postEventSave');

        /*
         * Routes related to user profile
         * */
        Route::get('/profile', "ProfileController@viewPage");

        Route::post('/subscriptions', "ProfileController@subscribe");

        Route::get('/profile/forum/', 'ProfileController@myForumPosts');

        Route::get('/profile/{type}', 'ProfileController@myEvents');

        /*
         * Routes related to updating posts
         * */
        Route::get('/profile/forum/update/{id}', 'ForumController@editForum');

        Route::post('/profile/forum/update/{id}', 'ForumController@update');

        Route::get('/profile/{type}/update/{id}', 'EventController@editEventView');

        Route::post('/profile/{type}/update/{id}', 'EventController@editEvent');

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

    Route::get('/forum/likes/', 'ForumController@likesData');

    Route::get('/forum/{id}', 'ForumController@view');

    Route::get('/forum/', 'ForumController@viewPosts');


    // Route for accessing test controller

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
//    Route::post('/register', 'Auth\RegistrationController@registerUser');

    Route::post('/login', 'Auth\AuthController@authenticate');

    Route::get('/logout', 'Auth\AuthController@logout');

    Route::get('/check/', 'Auth\RegistrationController@checkAvailable');

    /*
     * Routes related to miscellaneous pages
     * */

    Route::get('/about-us', function () {
        return view('aboutus');
    });

    Route::get('/contact-us', function () {
        return view('contactus');
    });

    Route::post('/contact-us', 'ContactController@sendContactMessage');

    Route::get('/test', function () {
        return view('email_layouts.contact', ['event' => \App\Event::find(1)]);

    });

//    Route::get('/test/', ['uses' => 'test@test']);


});


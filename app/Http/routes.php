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

        /*
         * Route group for admins functionality
         * */
        Route::group(['middleware' => 'admin'], function () {

            Route::get('/admin/', 'AdminController@view_home');

            Route::get('/admin/forum', 'AdminController@view_forum');

            Route::get('/admin/hack', 'AdminController@view_hack');

            Route::get('/admin/meet', 'AdminController@view_meet');

            Route::get('/admin/other', 'AdminController@view_other');

            Route::get('/admin/reports', 'AdminController@view_other');

            Route::get('/admin/errors', 'AdminController@view_error');

            Route::get('/admin/administration', 'AdminController@administration');

            Route::post('/admin/administration', 'AdminController@addRemoveAdmin');

            Route::post('/admin/delete_post', 'AdminController@deleteForum');

            Route::post('/admin/delete_hack', 'AdminController@deleteHack');

            Route::post('/admin/delete_meet', 'AdminController@deleteMeet');

            Route::post('/admin/delete_other', 'AdminController@deleteOther');
            
            Route::get('/admin/see_users', 'AdminController@seeUsers');

        });
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

    /*
     * Route related to the search query
     * */
    Route::get('/search', 'SearchController@search');

    Route::get('/search/events', 'SearchController@searchEvents');

    Route::get('/search/forum', 'SearchController@searchForum');


//    Route::get('/test', function () {
//        $var = DB::table('events')
//            ->join('tag_event', 'tag_event.event_id', '=', 'events.id')
//            ->join('tags', 'tags.id', '=', 'tag_event.tag_id')
//            ->join('event_info', 'events.id', '=', 'event_info.info_id')
//            ->where('tags.tag', 'like', '%' . 'idea' . '%')
//            ->paginate(10);
//        return $var->next_page_url;
//    });

});


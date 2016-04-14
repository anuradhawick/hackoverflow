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
    return view('viewEvent', ['hackID' => $id, 'type' => $type]);
});

Route::get('/forum/post', function () {
    return view('postForum');
});

Route::get('/forum/post/{id}', function ($id) {
    return view('forumArticles', ['id' => $id]);
});

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

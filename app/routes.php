<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'auth'), function()
{
    // root route, redirect to home, if not logged in, will go to login page
    Route::get('/', array('as' => 'home', function()
    {
        return View::make('home');
    }));

    // routes for messages
    Route::get('messages', 'MessageController@getAll');
    Route::get('messages/{id}', 'MessageController@get');
    Route::post('messages', 'MessageController@create');
    Route::put('messages/{id}', 'MessageController@update');

    // routes for comments
    Route::get('comments', 'CommentController@getByIds');
    Route::post('comments', 'CommentController@create');

    // routes for saved messages
    Route::get('savedmessages', 'SavedMessageController@getAll');
    Route::post('savedmessages', 'SavedMessageController@create');

    // routes for user
    Route::controller('user', 'UserController');
});


// routes for login and signup
Route::get('/login', 'UserController@showLogin')->before('guest');
Route::post('/login', 'UserController@doLogin');
Route::get('/logout', 'UserController@doLogout');
Route::get('/register', 'UserController@showRegister');
Route::post('/register', 'UserController@doRegister');
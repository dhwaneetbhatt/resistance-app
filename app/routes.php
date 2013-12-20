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

Route::group(array("before" => "auth"), function()
{
    Route::get('/', array("as" => "home", function()
    {
        return View::make('home');
    }));

    Route::controller('messages', 'MessageController');

    Route::controller('comments', 'CommentController');

    Route::controller('user', 'UserController');
});

Route::get('/login', array("as" => "login",
                           "uses" => "UserController@showLogin"
          ))->before('guest');

Route::post('/login', 'UserController@doLogin');

Route::get('/logout', 'UserController@doLogout');
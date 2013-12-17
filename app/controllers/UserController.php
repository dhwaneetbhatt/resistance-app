<?php

/**
 * This controller handles the User model and related RESTful service
 */
class UserController extends BaseController
{
    /**
     * Method for returning the login view
     */
    public function showLogin()
    {
        return View::make('login');
    }

    /**
     * Method for handling login attempt
     */
    public function doLogin()
    {
        $user = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        if (Auth::attempt($user))
        {
            return Redirect::route('home');
        }
        
        // authentication failure! lets go back to the login page
        return Redirect::route('login');
    }

    /**
     * Logout
     */
    public function doLogout()
    {
        Auth::logout();
        return View::make('login');
    }

}
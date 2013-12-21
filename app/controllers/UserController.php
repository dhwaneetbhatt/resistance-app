<?php

/**
 * This controller handles the User model and related RESTful services
 */
class UserController extends BaseController
{

    /**
     * Return the current logged in user
     */
    public function getIndex()
    {
        // get user from the currently logged in session
        $id = Auth::user()->id;
        $user = User::find($id);

        $out = array(
            'id' => $user->id,
            'email' => $user->email,
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'rank' => $user->rank->name
        );

        return $out;
    }

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
<?php

/**
 * This controller handles the User model and related RESTful services
 */
class UserController extends BaseController
{
    protected $layout = "views.main";

    /**
     * Return the current logged in user
     */
    public function getIndex()
    {
        return UserHelper::getCurrentUser();
    }

    /**
     * Returns the signup form
     */
    public function showRegister()
    {
        $this->layout->content = View::make('views.register');
    }

    /**
     * Method for handling user registration
     */
    public function doRegister()
    {
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes())
        {
            $user = new User;
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->avatar = UserHelper::getAvatar($user->email);
            $user->save();
            return Redirect::to('/login')
                   ->with('message', 'Welcome to the Resistance !!!');
        }
        else
        {
            return Redirect::to('/register')
                   ->with('message', 'The following errors occurred')
                   ->withErrors($validator)->withInput();
        }
    }

    /**
     * Method for returning the login view
     */
    public function showLogin()
    {
        $this->layout->content = View::make('views.login');
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
        else
        {
            // authentication failure! lets go back to the login page
            return Redirect::to('/login')
                   ->with('message', 'Your username/password combination was incorrect')
                   ->withInput();    
        }
    }

    /**
     * Logout
     */
    public function doLogout()
    {
        Auth::logout();
        $this->layout->content = View::make('views.login');
    }

}
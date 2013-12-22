<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface
{
    protected $table = 'users';

    public static $rules = array(
       'first_name'=>'required|alpha|min:2',
       'last_name'=>'required|alpha|min:2',
       'email'=>'required|email|unique:users',
       'password'=>'required|alpha_num|between:6,64|confirmed',
       'password_confirmation'=>'required|alpha_num|between:6,64'
    );

    /**
     * Excluded password the model's JSON form.
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Rank for the user
     */
    public function rank()
    {
        return $this->hasOne('Rank', 'id', 'rank_id');
    }

    /**
     * Messages for the user
     */
    public function messages()
    {
        return $this->hasMany('Message', 'user_id', 'id');
    }

}
<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface
{
    protected $table = 'users';

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
     * Messages for the user
     */
    public function messages()
    {
        return $this->hasMany('Message');
    }

}
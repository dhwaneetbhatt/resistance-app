<?php

/**
 * Helper class for User
 */
class UserHelper extends Helper
{
    private static $BASE_GRAVATAR_URL = 'http://www.gravatar.com/avatar/';

    /**
     * Returns currently logged in user
     */
    public static function getCurrentUser()
    {
        // get user from the currently logged in session
        $id = Auth::user()->id;
        $dbUser = User::find($id);

        $user = array(
            'id' => $dbUser->id,
            'email' => $dbUser->email,
            'firstName' => $dbUser->first_name,
            'lastName' => $dbUser->last_name,
            'rank' => $dbUser->rank->name,
            'avatar' => $dbUser->avatar
        );
        return $user;
    }

    public static function getAvatar($email)
    {
        $email = strtolower(trim($email));
        $hash = md5($email);
        $url = self::$BASE_GRAVATAR_URL . $hash;
        return $url;
    }

}
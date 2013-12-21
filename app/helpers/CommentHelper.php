<?php

/**
 * Helper class for Comment
 */
class CommentHelper extends Helper
{
    /**
     * This method transforms the data from db specific values to the one
     * expected by the svc/API
     */
    public static function getSvcModel($dbComment)
    {
        // PHP, for some weird reason, gives seconds since 1970
        $creationDate = $dbComment->created_at->getTimestamp() * 1000;

        // get the username
        $user = $dbComment->user;
        $username = $user->first_name . ' ' .  $user->last_name;
        $rank = $user->rank->name;

        $comment = array(
            'id' => $dbComment->id,
            'userId' =>  $user->id,
            'user' => $username,
            'rank' => $rank,
            'text' => $dbComment->text,
            'creationDate' => $creationDate
        );
        return $comment;
    }

    /**
     * Array level Helper method
     */
    public static function getSvcArray($dbComments)
    {
        // array to be returned to the UI
        $comments = array();

        foreach ($dbComments as $dbComment)
        {
            array_push($comments, self::getSvcModel($dbComment));
        }
        return $comments;
    }

}
<?php

/**
 * Helper class for Message
 */
class MessageHelper extends Helper
{
    /**
     * This helper class transforms the data from db specific values to the
     * one expected by the svc/API
     */
    public static function getSvcModel($dbMessage)
    {
        // PHP, for some weird reason, gives seconds since 1970
        $creationDate = $dbMessage->created_at->getTimestamp() * 1000;

        // get the username
        $user = $dbMessage->user;
        $username = $user->first_name . ' ' .  $user->last_name;
        $rank = $user->rank->name;

        $commentIds = Helper::getIds($dbMessage->comments);

        $currentUser = UserHelper::getCurrentUser();
        $interaction = self::getInteraction($currentUser['id'], $dbMessage->id);

        $message = array(
            'id' => $dbMessage->id,
            'userId' =>  $user->id,
            'user' => $username,
            'rank' => $rank,
            'avatar' => $user->avatar,
            'text' => $dbMessage->text,
            'upvotes' => $dbMessage->upvotes,
            'downvotes' => $dbMessage->downvotes,
            'interaction' => $interaction,
            'comments' => $commentIds,
            'creationDate' => $creationDate
        );
        return $message;
    }

    /**
     * Array level Helper method
     */
    public static function getSvcArray($dbMessages)
    {
        // array to be returned to the UI
        $messages = array();

        foreach ($dbMessages as $dbMessage)
        {
            array_push($messages, self::getSvcModel($dbMessage));
        }
        return $messages;
    }

    /**
     * Gets the interaction flag for this message and user
     */
    public static function getInteraction($userId, $messageId)
    {
        $result = false;
        $value = Interaction::where('user_id', $userId)
                    ->where('message_id', $messageId)
                    ->pluck('user_id');
        if (!is_null($value))
        {
            $result = true;
        }
        return $result;
    }
}
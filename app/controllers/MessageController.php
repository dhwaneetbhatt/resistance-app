<?php

/**
 * This class handles the RESTful services related to the Message model
 */
class MessageController extends BaseController
{
    /**
     * Return a list of all messages
     */
    public function getIndex()
    {
        // array to be returned to the UI
        $messages = array();

        // fetch all messages sorted by creation date
        $dbMessages = Message::orderBy('created_at', 'desc')->get();

        foreach ($dbMessages as $message)
        {
            // PHP, for some weird reason, gives seconds since 1970
            $creationDate = $message->created_at->getTimestamp() * 1000;

            // get the username
            $user = $message->user;
            $username = $user->first_name . ' ' .  $user->last_name;
            $rank = $user->rank->name;

            array_push($messages, array(
                "id" => $message->id,
                "user" => $username,
                "rank" => $rank,
                "text" => $message->text,
                "creationDate" => $creationDate
            ));
        }

        // return the response
        $out = array("message" => $messages);
        return $out;
    }

    /**
     * Save a new message to db
     */
    public function postIndex()
    {   
        $message = Input::get('message');

        $message = new Message(array(
            'user_id' => $message['userId'],
            'text' => $message['text']
        ));
        $message->save();
    }
}
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

        // fetch all messages
        $dbMessages = Message::all();

        foreach ($dbMessages as $message)
        {
            array_push($messages, array(
                "id" => $message->id,
                "userId" => $message->user_id,
                "text" => $message->text
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
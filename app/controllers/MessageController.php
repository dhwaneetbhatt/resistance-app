<?php

/**
 * This class handles the RESTful services related to the Message model
 */
class MessageController extends BaseController
{
    /**
     * Return a list of all messages
     */
    public function getAll()
    {
        // fetch all messages sorted by creation date
        $dbMessages = Message::orderBy('created_at', 'desc')->get();

        $messages  = MessageHelper::getSvcArray($dbMessages);

        // return the response
        $out = array('message' => $messages);
        return $out;
    }

    /**
     * Return a message along with its comments
     */
    public function get($id)
    {
        // fetch all messages sorted by creation date
        $dbMessage = Message::find($id);

        $message  = MessageHelper::getSvcModel($dbMessage);
        $comments = CommentHelper::getSvcArray($dbMessage->comments);

        // return the response
        $out = array('message' => $message, 'comments' => $comments);
        return $out;
    }

    /**
     * Save a new message to db
     */
    public function create()
    {   
        $message = Input::get('message');

        $dbMessage = new Message(array(
            'user_id' => $message['userId'],
            'text' => $message['text']
        ));
        $dbMessage->save();

        $message['id'] = $dbMessage->id;
        $out = array('message' => $message);
        return $out;
    }

    /**
     * Update the model
     */
    public function update($id)
    {   
        $message = Input::get('message');

        $dbMessage = Message::find($id);
        $dbMessage->upvotes = $message['upvotes'];
        $dbMessage->downvotes = $message['downvotes'];
        $dbMessage->save();

        // for the current user, mark this message as interacted
        $currentUser = UserHelper::getCurrentUser();
        Interaction::create(array(
            'user_id' => $currentUser['id'],
            'message_id' => $id
        ));

        $message['id'] = $dbMessage->id;
        $message['interaction'] = true;
        $out = array('message' => $message);
        return $out;
    }
}
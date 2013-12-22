<?php

/**
 * This class handles the RESTful services related to the SavedMessage
 */
class SavedMessageController extends BaseController
{
    /**
     * Return a list of all saved messages
     */
    public function getAll()
    {
        $userId = Input::get('userId');

        // fetch all messages for this user
        $dbSavedMessages = DB::table('saved_messages')->where('user_id', $userId)->get();

        $savedMessages  = SavedMessageHelper::getSvcArray($dbSavedMessages);

        return $savedMessages;
    }

    /**
     * Save a new message to db
     */
    public function create()
    {   
        $userId = Input::get('userId');
        $messageId = Input::get('messageId');

        DB::insert(
            'insert into saved_messages set user_id = ?, message_id = ?',
            array($userId, $messageId)
        );
    }

}
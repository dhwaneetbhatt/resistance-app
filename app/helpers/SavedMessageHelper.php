<?php

/**
 * Helper class for SavedMessage
 */
class SavedMessageHelper extends Helper
{
    /**
     * This helper class transforms the data from db specific values to the
     * one expected by the svc/API
     */
    public static function getSvcModel($dbSavedMessage)
    {
        $dbMessage = Message::find($dbSavedMessage->message_id);
        $message = MessageHelper::getSvcModel($dbMessage);
        return $message;
    }

    /**
     * Array level Helper method
     */
    public static function getSvcArray($dbSavedMessages)
    {
        // array to be returned to the UI
        $savedMessages = array();

        foreach ($dbSavedMessages as $dbSavedMessage)
        {
            array_push($savedMessages, self::getSvcModel($dbSavedMessage));
        }
        return $savedMessages;
    }
}
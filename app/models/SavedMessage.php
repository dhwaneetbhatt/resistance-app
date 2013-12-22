<?php

class SavedMessage extends Eloquent
{
    protected $table = 'saved_messages';

    // these can be updated
    protected $fillable = array('user_id', 'message_id');
}
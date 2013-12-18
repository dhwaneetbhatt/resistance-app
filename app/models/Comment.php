<?php

class Comment extends Eloquent
{
    protected $table = 'comments';

    // these can be updated
    protected $fillable = array('user_id', 'message_id', 'text');

    /**
     * Returns the message to which this comment belongs
     */
    public function message()
    {
        return $this->belongsTo('Message');
    }

    /**
     * Returns the user who posted this comment
     */
    public function user()
    {
        return $this->belongsTo('User');
    }
}
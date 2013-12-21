<?php

class Message extends Eloquent
{
    protected $table = 'messages';

    // these can be updated
    protected $fillable = array('user_id', 'text', 'upvotes', 'downvotes');

    /**
     * Returns the user who posted this message
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * Returns all the comments for this message
     */
    public function comments()
    {
        return $this->hasMany('Comment', 'message_id', 'id')->orderBy('created_at', 'desc');
    }
}
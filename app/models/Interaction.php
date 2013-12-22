<?php

class Interaction extends Eloquent
{
    protected $table = 'interactions';

    // these can be updated
    protected $fillable = array('user_id', 'message_id');
}
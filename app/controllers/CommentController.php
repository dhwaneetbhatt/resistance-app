<?php

/**
 * This class handles the RESTful services related to the Comment model
 */
class CommentController extends BaseController
{
    /**
     * Return a list of all comments
     */
    public function getIndex()
    {
        // fetch all comments
        $comments = Comment::all();

        return $comments;
    }

    /**
     * Save a new comment to db
     */
    public function postNew()
    {
        $comment = new Comment(Input::all());
        $comment->save();
    }
}
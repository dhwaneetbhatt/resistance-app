<?php

/**
 * This class handles the RESTful services related to the Comment model
 */
class CommentController extends BaseController
{
    /**
     * Return a list of all comments
     */
    public function getByIds()
    {
        // to be returned in the response
        $comments = array();

        $ids = Input::get('ids');

        foreach ($ids as $id)
        {
            array_push($comments, CommentHelper::getSvcModel(Comment::find($id)));
        }

        return $comments;
    }

    /**
     * Save a new comment to db
     */
    public function create()
    {
        $comment = Input::get('comment');

        $dbComment = new Comment(array(
            'user_id' => $comment['userId'],
            'message_id' => $comment['messageId'],
            'text' => $comment['text']
        ));
        $dbComment->save();

        $comment['id'] = $dbComment->id;
        $out = array('comment' => $comment);
        return $out;

    }
}
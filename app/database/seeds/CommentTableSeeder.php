<?php

class CommentTableSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        
        DB::table('comments')->delete();

        $userId1 = User::where('email', 'dhwaneetbhatt@gmail.com')->pluck('id');
        $userId2 = User::where('email', 'will.smith@email.com')->pluck('id');
        $messages = Message::where('user_id', $userId1)->get();

        foreach($messages as $message)
        {
            $id1 = $message->id;
        }

        Comment::create(array(
            'user_id' => $userId2,
            'message_id' => $id1,
            'text' => "Jai ho !!!"
        ));

        Comment::create(array(
            'user_id' => $userId2,
            'message_id' => $id1,
            'text' => "You want the best, Here I am."
        ));

        $userId2 = User::where('email', 'will.smith@email.com')->pluck('id');
        $messages = Message::where('user_id', $userId2)->get();

        foreach($messages as $message)
        {
            $id2 = $message->id;
        }

        Comment::create(array(
            'user_id' => $userId1,
            'message_id' => $id2,
            'text' => "Go teach yourself a gun first."
        ));
    }
}
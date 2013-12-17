<?php

class CommentTableSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        
        DB::table('comments')->delete();

        $userId = User::where('email', 'john.connor@email.com')->pluck('id');
        $id = Message::where('user_id', $userId)->firstOrFail()->pluck('id');

        Log::debug($id);

        Comment::create(array(
            'user_id' => $userId,
            'message_id' => $id,
            'text' => "Jai ho !!!"
        ));

        Comment::create(array(
            'user_id' => $userId,
            'message_id' => $id,
            'text' => "You want the best, Here I am."
        ));        
    }
}
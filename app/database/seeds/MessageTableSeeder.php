<?php

class MessageTableSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        
        DB::table('messages')->delete();

        $id1 = User::where('email', 'dhwaneetbhatt@gmail.com')->pluck('id');
        $id2 = User::where('email', 'kyle.reese@email.com')->pluck('id');
        $id3 = User::where('email', 'will.smith@email.com')->pluck('id');

        Message::create(array(
            'user_id' => $id1,
            'text' => 'The revolution has started !!!'
        ));

        Message::create(array(
            'user_id' => $id2,
            'text' => 'Me kya karu???'
        ));

        Message::create(array(
            'user_id' => $id3,
            'text' => 'Weapons traning program tomorrow for rookies !!!',
            'upvotes' => 1
        ));
    }
}
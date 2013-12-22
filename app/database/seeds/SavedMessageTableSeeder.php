<?php

class SavedMessageTableSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        
        DB::table('saved_messages')->delete();

        $userId1 = User::where('email', 'dhwaneetbhatt@gmail.com')->pluck('id');
        $userId2 = User::where('email', 'will.smith@email.com')->pluck('id');

        $id = Message::where('user_id', $userId1)->firstOrFail()->pluck('id');

        SavedMessage::create(array(
            'user_id' => $userId2,
            'message_id' => $id
        ));

    }
}
<?php

class SavedMessageTableSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        
        DB::table('saved_messages')->delete();

        $userId1 = User::where('email', 'john.connor@email.com')->pluck('id');
        $userId2 = User::where('email', 'will.smith@email.com')->pluck('id');

        $id = Message::where('user_id', $userId1)->firstOrFail()->pluck('id');

        DB::insert(
            'insert into saved_messages set user_id = ?, message_id = ?',
            array($userId2, $id)
        );
    }
}
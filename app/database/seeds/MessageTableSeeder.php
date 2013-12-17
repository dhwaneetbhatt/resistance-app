<?php

class MessageTableSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        
        DB::table('messages')->delete();

        $id1 = User::where('email', 'john.connor@email.com')->pluck('id');

        $id2 = User::where('email', 'will.smith@email.com')->pluck('id');

        Message::create(array(
            'user_id' => $id1,
            'text' => "The revolution has started !!!"
        ));

        Message::create(array(
            'user_id' => $id2,
            'text' => "Weapons traning program tomorrow for rookies !!!"
        ));
    }
}
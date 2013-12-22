<?php

class InteractionTableSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        
        DB::table('interactions')->delete();

        $userId2 = User::where('email', 'kyle.reese@email.com')->pluck('id');
        $userId3 = User::where('email', 'will.smith@email.com')->pluck('id');

        $messages = Message::where('user_id', $userId3)->get();

        foreach($messages as $message)
        {
            $id = $message->id;
        }

        Interaction::create(array(
            'user_id' => $userId2,
            'message_id' => $id
        ));

    }
}
<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        
        DB::table('users')->where('email', '!=', 'dhwaneetbhatt@gmail.com')->delete();

        $id1 = Rank::where('name', 'Rookie')->pluck('id');

        $id2 = Rank::where('name', 'Squadron Leader')->pluck('id');

        User::create(array(
            'email' => 'kyle.reese@email.com',
            'password' => Hash::make('future'),
            'first_name' => 'Kyle',
            'last_name' => 'Reese',
            'rank_id' => $id1,
            'avatar' => UserHelper::getAvatar('kyle.reese@email.com')
        ));

        User::create(array(
            'email' => 'will.smith@email.com',
            'password' => Hash::make('irobot'),
            'first_name' => 'Will',
            'last_name' => 'Smith',
            'rank_id' => $id2,
            'avatar' => UserHelper::getAvatar('will.smith@email.com')
        ));
    }
}
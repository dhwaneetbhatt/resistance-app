<?php

class UserTableSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        
        DB::table('users')->delete();

        $id1 = Rank::where('name', 'Resistance Leader')->pluck('id');

        $id2 = Rank::where('name', 'Squadron Leader')->pluck('id');

        User::create(array(
            'email' => 'john.connor@email.com',
            'password' => Hash::make('leader'),
            'first_name' => 'John',
            'last_name' => 'Connor',
            'rank_id' => $id1
        ));

        User::create(array(
            'email' => 'will.smith@email.com',
            'password' => Hash::make('irobot'),
            'first_name' => 'Will',
            'last_name' => 'Smith',
            'rank_id' => $id2
        ));
    }
}
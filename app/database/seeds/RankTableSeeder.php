<?php

class RankTableSeeder extends Seeder
{
    public function run()
    {
        Eloquent::unguard();
        
        DB::table('ranks')->delete();

        Rank::create(array(
            'name' => 'Resistance Leader'
        ));

        Rank::create(array(
            'name' => 'Squadron Leader'
        ));
    }
}
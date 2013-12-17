<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('saved_messages')->delete();
		DB::table('comments')->delete();
		DB::table('messages')->delete();
		DB::table('users')->delete();
		DB::table('ranks')->delete();

		$this->call('RankTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('MessageTableSeeder');
		$this->call('CommentTableSeeder');
		$this->call('SavedMessageTableSeeder');
	}

}
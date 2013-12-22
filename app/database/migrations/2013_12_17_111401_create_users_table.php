<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            // columns
            $table->increments('id');
            $table->string('email');
            $table->string('password', 64);
            $table->string('first_name', 32);
            $table->string('last_name', 32);
            $table->string('avatar', 64);
            $table->unsignedInteger('rank_id');
            $table->timestamps();

            // indexes and constraints
            $table->unique('email');
            $table->foreign('rank_id')->references('id')->on('ranks');
        });

        $rankId = Rank::where('name', 'Resistance Leader')->pluck('id');
        Eloquent::unguard();
        User::create(array(
            'email' => 'dhwaneetbhatt@gmail.com',
            'password' => Hash::make('leader'),
            'first_name' => 'John',
            'last_name' => 'Connor',
            'rank_id' => $rankId,
            'avatar' => UserHelper::getAvatar('dhwaneetbhatt@gmail.com')
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }

}
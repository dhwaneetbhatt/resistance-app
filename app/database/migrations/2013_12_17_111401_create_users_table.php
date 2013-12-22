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
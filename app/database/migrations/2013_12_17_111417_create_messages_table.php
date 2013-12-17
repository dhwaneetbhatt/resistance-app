<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            // columns
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('text');
            $table->unsignedInteger('upvotes');
            $table->unsignedInteger('downvotes');
            $table->timestamps();

            // indexes and constraints
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }

}
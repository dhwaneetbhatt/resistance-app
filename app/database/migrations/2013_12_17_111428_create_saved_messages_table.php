<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavedMessagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_messages', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            // columns
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('message_id');
            $table->timestamps();

            // indexes and constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('message_id')->references('id')->on('messages');
            $table->primary(array('user_id', 'message_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved_messages');
    }

}
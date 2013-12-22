<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            // columns
            $table->increments('id');
            $table->string('name', 100);
            $table->timestamps();

            // indexes
            $table->unique('name');
        });

        Eloquent::unguard();
        Rank::create(array('name' => 'Resistance Leader'));
        Rank::create(array('name' => 'Squadron Leader'));
        Rank::create(array('name' => 'Unit Commander'));
        Rank::create(array('name' => 'Weapons Specialist'));
        Rank::create(array('name' => 'Rookie'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ranks');
    }

}
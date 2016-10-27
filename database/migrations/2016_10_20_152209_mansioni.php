<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mansioni extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mansioni', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('settore_id')->unsigned();
            $table->foreign('settore_id')->references('id')->on('settori');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

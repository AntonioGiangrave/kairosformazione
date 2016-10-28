<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corsi', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titolo');
            $table->integer('durata');
            $table->integer('aula');
            $table->string('info_aula');
            $table->integer('fad');
            $table->string('info_fad');
            $table->string('cfp');
            $table->string('competenza_albi');
            $table->string('validita');
            $table->string('programma');
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

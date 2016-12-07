<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulaSessioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aule_sessioni', function(Blueprint $table) {
            $table->increments('id');
            $table->string('descrizione');
            $table->timestamp('dal');
            $table->timestamp('al');
            $table->string('orario_dalle');
            $table->string('orario_alle');
            $table->string('giorni');
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

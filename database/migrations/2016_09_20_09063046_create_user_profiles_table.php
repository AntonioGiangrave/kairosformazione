<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('data_nascita');
            $table->string('citta_nascita');
            $table->string('sesso');
            $table->string('codicefiscale');
            $table->string('nazione_residenza');
            $table->string('citta_residenza');
            $table->string('cap_residenza');
            $table->string('telefono');
            $table->string('titolo_studio');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');
            $table->string('costo_orario_lordo');
            $table->string('inquadramento');
            $table->string('ccnl');
            $table->string('mansione_ruolo');
            $table->string('divisione');
            $table->integer('ordine_id')->unsigned();
            $table->foreign('ordine_id')->references('id')->on('ordini_professionali');
            $table->integer('sicurezza');
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

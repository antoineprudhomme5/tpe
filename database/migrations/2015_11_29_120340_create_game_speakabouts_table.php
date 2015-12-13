<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameSpeakaboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_speakabouts', function(Blueprint $table) {
            $table->increments('id');
            $table->string('link'); // lien vers la ressource
            $table->string('type'); // img, audio, ..
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('game_speakabouts');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameSynonymsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_synonyms', function(Blueprint $table) {
            $table->increments('id');
            $table->string('word'); // the word
            $table->string('p1'); // choice 1
            $table->string('p2'); // choice 1
            $table->string('p3'); // choice 1
            $table->string('response'); // the good choice
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('game_synonyms');
    }
}

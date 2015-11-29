<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameSpeakaboutRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_speakabout_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->string('time');
            $table->integer('points')->default(0);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('speakabout_id')->unsigned();
            $table->foreign('speakabout_id')
                ->references('id')->on('game_speakabouts')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
        Schema::table('game_speakabout_records', function(Blueprint $table) {
            $table->dropForeign('game_speakabout_records_user_id_foreign');
        });
        Schema::table('game_speakabout_records', function(Blueprint $table) {
            $table->dropForeign('game_speakabout_records_speakabout_id_foreign');
        });
        Schema::drop('game_speakabout_records');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer', function(Blueprint $table) {
            $table->increments('id');
            $table->string('answer'); // mcq question
            $table->boolean('correct');
            $table->integer('id_question')->unsigned();
            $table->foreign('id_question')
                ->references('id')->on('question')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer', function(Blueprint $table) {
            $table->dropForeign('answer_id_question_foreign');
        });
        Schema::drop('answer');
    }
}

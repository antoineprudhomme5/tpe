<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function(Blueprint $table) {
            $table->increments('id');
            $table->string('question'); // mcq question
            $table->integer('id_mcq')->unsigned();
            $table->foreign('id_mcq')
                ->references('id')->on('mcq');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question', function(Blueprint $table) {
            $table->dropForeign('question_id_mcq_foreign');
        });
        Schema::drop('question');
    }
}
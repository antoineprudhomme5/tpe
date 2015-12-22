<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('profile_question_id')->unsigned();
            $table->foreign('profile_question_id')
                ->references('id')->on('profiles_questions')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->text('answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles_answers', function(Blueprint $table) {
            $table->dropForeign('profiles_answers_user_id_foreign');
        });
        Schema::table('profiles_answers', function(Blueprint $table) {
            $table->dropForeign('profiles_answers_profile_question_id_foreign');
        });
        Schema::drop('profiles_answers');
    }
}

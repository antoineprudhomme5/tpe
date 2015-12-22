<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_achievements', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->integer('achievement_id')->unsigned();
            $table->foreign('achievement_id')
                ->references('id')->on('achievements')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_achievements', function(Blueprint $table) {
            $table->dropForeign('users_achievements_user_id_foreign');
        });
        Schema::table('users_achievements', function(Blueprint $table) {
            $table->dropForeign('users_achievements_achievement_id_foreign');
        });
        Schema::drop('users_achievements');
    }
}

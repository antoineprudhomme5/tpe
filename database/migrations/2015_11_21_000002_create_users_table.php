<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('firstname');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('avatar');
            $table->integer('points')->default(0);
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')->on('users_categories')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->rememberToken();
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
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_category_id_foreign');
        });
        Schema::drop('users');
    }
}

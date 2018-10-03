<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMcqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcq', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('playable')->default(false);
            $table->string('description')->default("no description");
            $table->string('name'); // mcq name
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mcq');
    }
}

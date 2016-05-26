<?php

use Illuminate\Database\Seeder;

class McqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mcq')->insert(array(
            array("id" => 1, "name" => "quizz1", "playable" => true),
            array("id" => 2, "name" => "quizz2", "playable" => true)
        ));
    }
}

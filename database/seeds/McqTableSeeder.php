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
            array("id" => 1, "name" => "quizz1", "playable" => true, "description" => "no description"),
            array("id" => 2, "name" => "quizz2", "playable" => true, "description" => "no description"),
            array("id" => 3, "name" => "Synonyms", "playable" => true, "description" => "Find the synonym of the given word")
        ));
    }
}

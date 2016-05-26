<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question')->insert(array(
            array("id" => 1, "question" => "q1", "id_mcq" => "1", "playable" => true),
            array("id" => 2, "question" => "q2", "id_mcq" => "1", "playable" => true),
            array("id" => 3, "question" => "q3", "id_mcq" => "1", "playable" => true),

            array("id" => 4, "question" => "q4", "id_mcq" => "2", "playable" => true),
            array("id" => 5, "question" => "q5", "id_mcq" => "2", "playable" => true),
            array("id" => 6, "question" => "q6", "id_mcq" => "2", "playable" => true),

            array("id" => 7, "question" => "currently", "id_mcq" => "3", "playable" => true),
            array("id" => 8, "question" => "slightly", "id_mcq" => "3", "playable" => true),
            array("id" => 9, "question" => "keen", "id_mcq" => "3", "playable" => true)
        ));
    }
}

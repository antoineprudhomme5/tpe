<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answer')->insert(array(
            array("answer" => "q1a1", "id_question" => "1", "correct" => true),
            array("answer" => "q1a2", "id_question" => "1", "correct" => false),

            array("answer" => "q2a1", "id_question" => "2", "correct" => true),
            array("answer" => "q2a2", "id_question" => "2", "correct" => false),
            array("answer" => "q2a3", "id_question" => "2", "correct" => false),
            array("answer" => "q2a4", "id_question" => "2", "correct" => false),

            array("answer" => "q3a1", "id_question" => "3", "correct" => true),
            array("answer" => "q3a2", "id_question" => "3", "correct" => false),
            array("answer" => "q3a3", "id_question" => "3", "correct" => false),

            array("answer" => "q4a1", "id_question" => "4", "correct" => true),
            array("answer" => "q4a2", "id_question" => "4", "correct" => false),

            array("answer" => "q5a1", "id_question" => "5", "correct" => true),
            array("answer" => "q5a2", "id_question" => "5", "correct" => false),
            array("answer" => "q5a3", "id_question" => "5", "correct" => false),
            array("answer" => "q5a4", "id_question" => "5", "correct" => false),

            array("answer" => "q6a1", "id_question" => "6", "correct" => true),
            array("answer" => "q6a2", "id_question" => "6", "correct" => false),
            array("answer" => "q6a3", "id_question" => "6", "correct" => false),

            array("answer" => "now", "id_question" => "7", "correct" => true),
            array("answer" => "short", "id_question" => "7", "correct" => false),
            array("answer" => "actually", "id_question" => "7", "correct" => false),

            array("answer" => "a lot", "id_question" => "8", "correct" => false),
            array("answer" => "kind of", "id_question" => "8", "correct" => true),
            array("answer" => "bad", "id_question" => "8", "correct" => false),

            array("answer" => "small", "id_question" => "9", "correct" => false),
            array("answer" => "calm", "id_question" => "9", "correct" => false),
            array("answer" => "impatient", "id_question" => "9", "correct" => true),
        ));
    }
}

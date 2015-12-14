<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert(array(
            array('title' => 'Game of synonyms', 'description' => 'The goal is to find the synonym of the word which appears between 3 choices.', 'alias' => 'synonyms'),
            array('title' => 'Speak about', 'description' => "A subjet appears on the screen. You have to record yourself during around 2 minutes by speaking on this subject.<br><b>Use Audacity to record your speaking. Open it before start the game to win time.</b>", 'alias' => 'speak_about')
        ));
    }
}

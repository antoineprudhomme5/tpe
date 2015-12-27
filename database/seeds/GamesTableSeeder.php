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
            array('title' => 'Game of synonyms', 'description' => 'The goal is to find the synonym of the word which appears among 3 choices.', 'alias' => 'synonyms'),
            array('title' => 'Speak about', 'description' => "A topic will appear on the screen. You have to record yourself during about 2 minutes by speaking about this topic.<br><b>Use Audacity to record your speaking. Open it before starting the game so that you can be ready on time.</b>", 'alias' => 'speak_about')
        ));
    }
}

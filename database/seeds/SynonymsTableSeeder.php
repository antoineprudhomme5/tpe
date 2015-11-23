<?php

use Illuminate\Database\Seeder;

class SynonymsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_synonyms')->insert(array(
            array('word' => 'currently', 'p1' => 'now', 'p2' => 'short', 'p3' => 'actually', 'response' => 'now'),
            array('word' => 'slightly', 'p1' => 'a lot', 'p2' => 'kind of', 'p3' => 'bad', 'response' => 'kind of'),
            array('word' => 'moderately', 'p1' => 'a little', 'p2' => 'kind of', 'p3' => 'slowly', 'response' => 'a little'),
            array('word' => 'common', 'p1' => 'familiar', 'p2' => 'easy', 'p3' => 'original', 'response' => 'familiar'),
            array('word' => 'valuable', 'p1' => 'important', 'p2' => 'cheap', 'p3' => 'rare', 'response' => 'important'),
            array('word' => 'keen', 'p1' => 'impatient', 'p2' => 'small', 'p3' => 'calm', 'response' => 'impatient')
        ));
    }
}

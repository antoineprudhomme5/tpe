<?php

use Illuminate\Database\Seeder;

class AchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('achievements')->insert(array(
            array('title' => 'First connexion', 'link' => 'badges/first.png', 'parent' => 'app'),
            array('title' => 'Completed profile', 'link' => 'badges/profil.png', 'parent' => 'app'),

            array('title' => '100 points', 'link' => 'badges/100.png', 'parent' => 'games'),
            array('title' => '500 points', 'link' => 'badges/500.png', 'parent' => 'games'),
            array('title' => '1000 points', 'link' => 'badges/1000.png', 'parent' => 'games'),
            array('title' => '2500 points', 'link' => 'badges/2500.png', 'parent' => 'games'),
            array('title' => '5000 points', 'link' => 'badges/5000.png', 'parent' => 'games'),

            array('title' => '1 comment', 'link' => 'badges/comment1.png', 'parent' => 'forum'),
            array('title' => '10 comments', 'link' => 'badges/comment10.png', 'parent' => 'forum'),
            array('title' => '25 comments', 'link' => 'badges/comment25.png', 'parent' => 'forum'),
            array('title' => '50 comments', 'link' => 'badges/comment50.png', 'parent' => 'forum'),
            array('title' => '100 comments', 'link' => 'badges/comment100.png', 'parent' => 'forum'),
            array('title' => '200 comments', 'link' => 'badges/comment200.png', 'parent' => 'forum'),

            array('title' => '1 topic', 'link' => 'badges/topics1.png', 'parent' => 'forum'),
            array('title' => '10 topics', 'link' => 'badges/topics10.png', 'parent' => 'forum'),
            array('title' => '25 topics', 'link' => 'badges/topics25.png', 'parent' => 'forum'),
            array('title' => '50 topics', 'link' => 'badges/topics50.png', 'parent' => 'forum'),
            array('title' => '100 topics', 'link' => 'badges/topics100.png', 'parent' => 'forum'),

            array('title' => '1 speak about game', 'link' => 'badges/speakabout1.png', 'parent' => 'speak_about'),
            array('title' => '10 speak about games', 'link' => 'badges/speakabout10.png', 'parent' => 'speak_about'),
            array('title' => '25 speak about games', 'link' => 'badges/speakabout25.png', 'parent' => 'speak_about'),
            array('title' => '50 speak about games', 'link' => 'badges/speakabout50.png', 'parent' => 'speak_about'),
            array('title' => '100 speak about games', 'link' => 'badges/speakabout100.png', 'parent' => 'speak_about'),

            array('title' => '1 synonyms game', 'link' => 'badges/synonyms1.png', 'parent' => 'synonyms'),
            array('title' => '10 synonyms games', 'link' => 'badges/synonyms10.png', 'parent' => 'synonyms'),
            array('title' => '25 synonyms games', 'link' => 'badges/synonyms25.png', 'parent' => 'synonyms'),
            array('title' => '50 synonyms games', 'link' => 'badges/synonyms50.png', 'parent' => 'synonyms'),
            array('title' => '100 synonyms games', 'link' => 'badges/synonyms100.png', 'parent' => 'synonyms'),
        ));
    }
}

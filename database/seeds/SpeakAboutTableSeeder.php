<?php

use Illuminate\Database\Seeder;

class SpeakAboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_speakabouts')->insert(array(
            array('link' => 'public/games/speakabout/img1.jpg', 'type' => 'img'),
            array('link' => 'public/games/speakabout/img2.jpg', 'type' => 'img'),
            array('link' => 'public/games/speakabout/mario.mp3', 'type' => 'audio')
        ));
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameSpeakAbout extends Model
{
    protected $table = 'game_speakabouts';

    public $timestamps = false;

    /**
     * One game ressource have many record
     */
    public function records()
    {
        return $this->hasMany('App\GameSpeakAboutRecord');
    }
}

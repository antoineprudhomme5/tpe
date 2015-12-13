<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameSpeakAboutRecord extends Model
{
    protected $table = 'game_speakabout_records';

    /**
     * Each Record belongs to a ressource of the speak about game
     */
    public function speakAbout()
    {
        return $this->belongsTo('App\GameSpeakAbout');
    }

    /**
     * Each Record belongs to a user
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

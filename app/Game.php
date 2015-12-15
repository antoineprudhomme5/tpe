<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    /**
     * One game have many game history
     */
    public function gamesHistory()
    {
        return $this->hasMany('App\GameHistory');
    }
}

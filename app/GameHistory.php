<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameHistory extends Model
{
    protected $table = 'games_history';

    /**
     * Each history belongs to a user
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
    /**
     * Each history belongs to a game
     */
    public function game(){
        return $this->belongsTo('App\Game');
    }
}

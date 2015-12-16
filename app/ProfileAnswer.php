<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileAnswer extends Model
{
    protected $table = 'profiles_answers';
    public $timestamps = false;


    /**
     * Each answer belongs to a question of profile
     */
    public function question()
    {
        return $this->belongsTo('App\ProfileQuestion');
    }

    /**
     * Each answer belongs to a question of profile
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }

}

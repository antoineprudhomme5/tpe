<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $table = 'achievements';

    public $timestamps = false;

    /**
     * @return all the users who have this achievement
     *//*
    public function users()
    {
        return $this->belongsToMany('App\User');
    }*/
}

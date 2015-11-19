<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    /**
    * Each Topic belongs to a user
    */
    public function user() 
	{
		return $this->belongsTo('App\User');
	}

	/**
    * One topic have many posts
    */
    public function posts() 
    {
        return $this->hasMany('App\Post');
    }
}

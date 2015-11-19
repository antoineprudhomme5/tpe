<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'posts';

	/**
    * Each Post belongs to a user
    */
    public function user() 
	{
		return $this->belongsTo('App\User');
	}

	/**
    * Each Post belongs to a Topic
    */
    public function topic() 
	{
		return $this->belongsTo('App\Topic');
	}
}

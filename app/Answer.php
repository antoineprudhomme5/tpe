<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answer';
    public $timestamps = false;

    /**
     * Each Answer belongs to a Question
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}

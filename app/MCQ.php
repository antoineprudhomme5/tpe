<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCQ extends Model
{
    protected $table = 'mcq';
    public $timestamps = false;

    /**
     * get the questions for the mcq
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}

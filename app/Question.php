<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    public $timestamps = false;

    /**
     * get the answers for the question
     */
    public function answers()
    {
        return $this->hasMany('App\Answer', 'id_question');
    }

    /**
     * Each Question belongs to a MCQ
     */
    public function mcq()
    {
        return $this->belongsTo('App\MCQ');
    }
}

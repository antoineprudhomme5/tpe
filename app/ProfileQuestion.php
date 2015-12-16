<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileQuestion extends Model
{
    protected $table = 'profiles_questions';

    /**
     * Each question has one answer
     */
    public function answers()
    {
        return $this->hasMany('App\ProfileAnswer');
    }

}

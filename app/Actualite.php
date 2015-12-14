<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    protected $table = 'actualites';

    public function user(){
        return $this->belongsTo('App\User');
    }
}

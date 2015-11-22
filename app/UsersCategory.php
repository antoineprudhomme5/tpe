<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersCategory extends Model
{
    protected $table = 'users_categories';

    /**
     * One category have many users
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}

<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'firstname', 'avatar', 'points', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
    * One user have many topics
    */
    public function topics() 
    {
        return $this->hasMany('App\Topic');
    }

    /**
    * One user have many posts
    */
    public function posts() 
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Each User belongs to a category of users
     */
    public function category()
    {
        return $this->belongsTo('App\UsersCategory');
    }

    /**
     * One user have many speak about records
     */
    public function records()
    {
        return $this->hasMany('App\GameSpeakAboutRecord');
    }

    /**
     * One user have many game history
     */
    public function gamesHistory()
    {
        return $this->hasMany('App\GameHistory');
    }

    /**
     * One user has many answers
     */
    public function answers()
    {
        return $this->hasMany('App\ProfileAnswer');
    }

    /**
     * @return all the achievements from this user
     */
    public function achievements()
    {
        return $this->belongsToMany('App\Achievement', 'users_achievements');
    }
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    public $timestamps = false;
    protected $hidden = ['password','remember_token'];
    /**
     * @return Forum_post
     */
    public function forum_posts()
    {
        return $this->hasMany('App\Forum_post', 'user_id', 'id');
    }

    /**
     * @return Event
     */
    public function events()
    {
        return $this->hasMany('App\Event', 'user_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    public $timestamps = false;

    /**
     * @return User
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * @return Hackevent
     */
    public function hackathon()
    {
        return $this->hasOne('App\Hackevent', 'hack_id', 'id');
    }

    /**
     * @return Meetevent
     */
    public function meetup()
    {
        return $this->hasOne('App\Meetevent', 'meet_id', 'id');
    }

    /**
     * @return Otherevent
     */
    public function otherevent()
    {
        return $this->hasOne('App\Otherevent', 'others_id', 'id');
    }
}

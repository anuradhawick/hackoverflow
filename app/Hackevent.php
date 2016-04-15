<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hackevent extends Model
{
    protected $table = 'hackathons';
    public $timestamps = false;

    /**
     * @return Event
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'hack_id', 'id');
    }
}

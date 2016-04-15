<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otherevent extends Model
{
    protected $table = 'other_events';
    public $timestamps = false;

    /**
     * @return Event
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'others_id', 'id');
    }
}

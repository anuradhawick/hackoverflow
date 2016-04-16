<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventinfo extends Model
{
    protected $table = 'event_info';
    public $timestamps = false;

    /**
     * @return Event
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'info_id', 'id');
    }
}

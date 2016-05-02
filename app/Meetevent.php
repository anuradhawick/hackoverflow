<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meetevent extends Model
{
    protected $table = 'meets';
    public $timestamps = false;


    /**
     * @return Event
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'meet_id', 'id');
    }
}

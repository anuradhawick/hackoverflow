<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meetevent extends Model
{
    protected $table = 'meets';
    public $timestamps = false;


    public function event()
    {
        return $this->belongsTo('App\Event', 'meet_id', 'id');
    }
}

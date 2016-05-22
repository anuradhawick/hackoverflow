<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    public $timestamps = false;

    /**
     * @return Event
     */
    public function events()
    {
        return $this->belongsToMany('App\Event', 'tag_event', 'tag_id', 'event_id');
    }
}

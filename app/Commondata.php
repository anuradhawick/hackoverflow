<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Commondata
 * @package App
 */
class Commondata extends Model
{
    protected $table = 'commons';
    public $timestamps = false;

    /**
     * @return Event
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'com_id', 'id');
    }
}

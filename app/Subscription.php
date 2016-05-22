<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public $timestamps = false;
    protected $table = 'subscriptions';

    /**
     * @return User
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_subscription', 'sub_id', 'user_id');
    }
}

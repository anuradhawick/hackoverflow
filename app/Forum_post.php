<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum_post extends Model
{
    protected $table = 'forum_posts';

    /**
     * @return User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

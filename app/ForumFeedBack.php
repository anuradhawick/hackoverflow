<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumFeedBack extends Model
{
    protected $table = 'forum_feedback';

    /**
     * @return \App\Forum_post
     */
    public function forum()
    {
        return $this->belongsTo('App\Forum_post', 'forum_id', 'id');
    }

    /**
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}

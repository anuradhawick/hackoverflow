<?php

namespace App\Http\Controllers;

use App\Event;
use App\Forum_post;
use App\Hackevent;
use App\User;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;

use App\Http\Requests;

class test extends Controller
{
    public function test()
    {
//        $post = new Forum_post();
//        $post->user_id = 1;
//        $post->title = "Third post";
//        $post->post = "lorem ipsum dolor sit amet";
//        $post->uuid = Uuid::uuid();
//        $post->save();

//        $user = User::where('email', 'anuradhawick@gmail.com')->first();
//        echo $user->password . '<br>';
//
//        $posts = Forum_post::where('user_id', 1)->get();
//        foreach ($posts as $p) {
//            echo $p->title . "<br>";
//        }


//        $event = new Event();
//        $event->user_id = 1;
//        $event->name = "First event";
//        $event->type = "Hack";
//        $event->save();


//        $hack = new Hackevent();
//        $hack->hack_id = 1;
//        $hack->participant_info = "second Info";
//        $hack->reward = "rew";
//        $hack->duration = "rew";
//        $hack->team_count = 5;
//        $hack->max_per_team_no = 50;
//        $hack->min_per_team_no = 3;
//        $hack->save();
        $user = User::find(1);

        $event = Event::find(1);
        echo $event->hackathon . "<br>";

        $hack = Hackevent::find(1);
        echo $hack->event->user;
        return '<br>done';
    }
}

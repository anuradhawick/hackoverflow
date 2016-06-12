<?php

namespace App\Http\Controllers;

use App\Event;
use App\Forum_post;
use App\ForumFeedBack;
use App\Hackevent;
use App\Meetevent;
use App\Otherevent;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function view_home()
    {
        $object = new \stdClass();
        $object->user_count = User::count();
        $object->forum_count = Forum_post::count();
        $object->hack_count = Hackevent::count();
        $object->meetup_count = Meetevent::count();
        $object->other_count = Otherevent::count();
        $object->like_count = ForumFeedBack::count();

        return view('admin_views.stats', ['object' => $object]);
    }

    public function view_forum()
    {
        $posts = Forum_post::orderBy('created_at', 'desc')->paginate(20);
        return view('admin_views.forum', ['posts' => $posts]);
    }

    public function view_meet()
    {
        $meets = Event::with('meetup', 'event_info', 'tags')->where('type', 'meetups')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin_views.meet', ['meets' => $meets]);
    }

    public function view_hack()
    {
        $hacks = Event::with('hackathon', 'event_info', 'tags')->where('type', 'hackathons')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin_views.hack', ['hacks' => $hacks]);
    }

    public function view_other()
    {
        $others = Event::with('otherevent', 'event_info', 'tags')->where('type', 'other')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin_views.other', ['others' => $others]);
    }

    public function view_error()
    {
        $object = new \stdClass();
        $object->user_count = User::count();
        $object->forum_count = Forum_post::count();
        $object->hack_count = Hackevent::count();
        $object->meetup_count = Meetevent::count();
        $object->other_count = Otherevent::count();
        $object->like_count = ForumFeedBack::count();

        return view('admin_views.home', ['object' => $object]);
    }

    public function view_report()
    {
        $object = new \stdClass();
        $object->user_count = User::count();
        $object->forum_count = Forum_post::count();
        $object->hack_count = Hackevent::count();
        $object->meetup_count = Meetevent::count();
        $object->other_count = Otherevent::count();
        $object->like_count = ForumFeedBack::count();

        return view('admin_views.home', ['object' => $object]);
    }
}

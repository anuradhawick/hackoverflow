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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Psy\Util\Json;

class AdminController extends Controller
{
    /**
     * Home page for the Administrator
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * List all forum posts
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view_forum()
    {
        $posts = Forum_post::orderBy('created_at', 'desc')->paginate(20);
        return view('admin_views.forum', ['posts' => $posts]);
    }

    /**
     * List all meetup events
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view_meet()
    {
        $meets = Event::with('meetup', 'event_info', 'tags')->where('type', 'meetups')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin_views.meet', ['meets' => $meets]);
    }

    /**
     * List all hackathon events
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view_hack()
    {
        $hacks = Event::with('hackathon', 'event_info', 'tags')->where('type', 'hackathons')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin_views.hack', ['hacks' => $hacks]);
    }

    /**
     * List all the other events
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view_other()
    {
        $others = Event::with('otherevent', 'event_info', 'tags')->where('type', 'other')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin_views.other', ['others' => $others]);
    }

    /**
     * Add or remove admin View
     *
     * @return View
     */
    public function administration()
    {
        $admins = User::where('admin', 1)->get();
        return view('admin_views.administration', ['admins' => $admins]);
    }

    /**
     * Delete the forum requested by the Admin
     * @return Json
     */
    public function deleteForum()
    {
        $id = request()->input('id');
        $forum = Forum_post::find($id);
        try {
            DB::transaction(function () use ($forum) {
                $forum->forumFeedback()->delete();
                $forum->delete();
            });
        } catch (\Exception $e) {
        }
        return json_encode(true);
    }


    /**
     * Delete the hackathon requested by Admin
     * @return Json
     */
    public function deleteHack()
    {
        $id = request()->input('id');
        $event = Event::findOrFail($id);
        $hack = $event->hackathon;
        $eventinfo = $event->event_info;
        $com = $event->commondata;
        try {
            DB::transaction(function () use ($com, $hack, $event, $eventinfo) {
                $com->delete();
                $hack->delete();
                $eventinfo->delete();
                $event->tags()->detach();
                $event->delete();
            });
        } catch (\Exception $e) {
            abort(500);
        }

        return json_encode(true);
    }


    /**
     * Delete the meetup requested by Admin
     * @return Json
     */
    public function deleteMeet()
    {
        $id = request()->input('id');
        $event = Event::findOrFail($id);
        $meet = $event->meetup;
        $eventinfo = $event->event_info;
        $com = $event->commondata;
        try {
            DB::transaction(function () use ($com, $meet, $event, $eventinfo) {
                $com->delete();
                $meet->delete();
                $eventinfo->delete();
                $event->tags()->detach();
                $event->delete();
            });
        } catch (\Exception $e) {
            abort(500);
        }

        return json_encode(true);
    }


    /**
     * Delete the other event requested by Admin
     * @return Json
     */
    public function deleteOther()
    {
        $id = request()->input('id');
        $event = Event::findOrFail($id);
        $other = $event->otherevent;
        $eventinfo = $event->event_info;
        $com = $event->commondata;
        try {
            DB::transaction(function () use ($com, $eventinfo, $event, $other) {
                $com->delete();
                $other->delete();
                $eventinfo->delete();
                $event->tags()->detach();
                $event->delete();
            });
        } catch (\Exception $e) {
            abort(500);
        }

        return json_encode(true);
    }


    /**
     * Add or remove admin determined by the email address
     * @return Json
     */
    public function addRemoveAdmin()
    {
        switch (request()->input('action')) {
            case 'add':
                $user = User::where('email', request()->input('email'))->firstOrFail();
                $user->admin = 1;
                $user->save();
                return json_encode(true);
            case 'remove':
                if (User::where('admin', 1)->count() < 2) {
                    abort(403); // Not allowing to remove the only admin available
                }
                $user = User::where('email', request()->input('email'))->firstOrFail();
                $user->admin = 0;
                $user->save();
                return json_encode(true);
            default:
                abort(404);
        }
    }


    /**
     * Return the matching email addresses
     *
     * @return Json
     */
    public function seeUsers()
    {
        return User::where('email', 'like', request('email') . '%')->take(5)->get();
    }
    
}

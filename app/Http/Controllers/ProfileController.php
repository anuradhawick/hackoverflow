<?php

namespace App\Http\Controllers;

use App\Event;
use App\Forum_post;
use App\Managers\SubscriptionManager;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @return void
     */
    public function subscribe()
    {
        $hack = request()->input('hack');
        $meet = request()->input('meet');
        $other = request()->input('other');

        SubscriptionManager::subscribe($hack, $meet, $other);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewPage()
    {
        $user = Auth::user();
        $subs = $user->subscriptions;
        $hack = false;
        $meet = false;
        $other = false;
        foreach ($subs as $sub) {
            if ($sub->event_type == "hackathons") {
                $hack = true;
            }
            if ($sub->event_type == "meetups") {
                $meet = true;
            }
            if ($sub->event_type == "other") {
                $other = true;
            }
        }
        return view("profile", ["hack" => $hack, "meet" => $meet, "other" => $other, "user" => $user]);
    }


    public function myForumPosts()
    {
        $user = Auth::user();
        $posts = Forum_post::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('profile_views.myposts', ['posts' => $posts]);
    }


    /**
     * @return mixed
     */
    public function viewHacks()
    {
        $user = Auth::user();
        $hacks = Event::with('hackathon', 'event_info', 'tags')->where('type', 'hackathons')->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(6);
        return view('profile_views.myevents', ['events' => $hacks, 'type' => 1]);
    }

    /**
     * @return mixed
     */
    public function viewMeets()
    {
        $user = Auth::user();
        $meets = Event::with('hackathon', 'event_info', 'tags')->where('type', 'meetups')->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(6);
        return view('profile_views.myevents', ['events' => $meets, 'type' => 2]);
    }

    /**
     * @return mixed
     */
    public function viewOtherEvents()
    {
        $user = Auth::user();
        $others = Event::with('otherevent', 'event_info', 'tags')->where('type', 'other')->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(6);
        return view('profile_views.myevents', ['events' => $others, 'type' => 3]);
    }


    /**
     * view all the events given the type, a string
     *
     * @param $type
     * @return mixed
     */
    public function myEvents($type)
    {
        switch ($type) {
            case 'hackathons':
                return $this->viewHacks();
                break;
            case 'meetups':
                return $this->viewMeets();
                break;
            case 'other':
                return $this->viewOtherEvents();
                break;
            default:
                return redirect('/events/hackathons');
        }
    }
}

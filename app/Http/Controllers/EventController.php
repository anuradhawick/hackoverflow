<?php

namespace App\Http\Controllers;

use App\Event;
use App\Hackevent;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
    public function postEvent(Request $req)
    {

    }

    public function view($type)
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
        }
    }

    // This is the event id of the Event table
    public function viewEvent($type, $id)
    {
        switch ($type) {
            case 'hackathons':
                return $this->viewHack($id);
                break;
            case 'meetups':
                return $this->viewMeet($id);
                break;
            case 'other':
                break;
        }
    }

    public function viewHacks()
    {
        $hacks = Event::with('hackathon', 'event_info')->where('type', 'hackathons')->orderBy('created_at', 'desc')->get();
        return view('events', ['events' => $hacks, 'type' => 1]);
    }

    public function viewMeets()
    {
        $meets = Event::with('hackathon', 'event_info')->where('type', 'meetups')->orderBy('created_at', 'desc')->get();
        return view('events', ['events' => $meets, 'type' => 2]);
    }

    public function viewOtherEvents()
    {
        $others = Event::with('otherevent', 'event_info')->where('type', 'other')->orderBy('created_at', 'desc')->get();
        return view('events', ['events' => $others, 'type' => 3]);
    }

    public function viewHack($id)
    {
        $hack = Event::with('hackathon', 'commondata', 'event_info')->find($id);
        return view('viewEvent', ['event' => $hack, 'type' => 1]);
    }

    public function viewMeet($id)
    {
        $hack = Event::with('meetup', 'commondata', 'event_info')->find($id);
        return view('viewEvent', ['event' => $hack, 'type' => 2]);
    }
}

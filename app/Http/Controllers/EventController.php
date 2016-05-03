<?php

namespace App\Http\Controllers;

use App\Event;
use App\Hackevent;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
    // rendering the publish form
    /**
     * @param $type
     * @return mixed
     */
    public function postEvent($type)
    {
        switch ($type) {
            case 'hackathon':
                return view('postEvent', ['type' => 1]);
                break;
            case 'meetup':
                return view('postEvent', ['type' => 2]);
                break;
            case 'other':
                return view('postEvent',['type'=>3]);
                break;
            default:
                return redirect('/');
        }
    }

    // view all the events given the type, a string
    /**
     * @param $type
     * @return mixed
     */
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
            default:
                return redirect('/events/hackathons');
        }
    }

    // View a particular event, given a string type and id of the Event table
    /**
     * @param $type
     * @param $id
     * @return mixed
     */
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
                return $this->viewOtherEvent($id);
                break;
            default:
                return redirect('/events/hackathons');
        }
    }

    /**
     * @return mixed
     */
    public function viewHacks()
    {
        $hacks = Event::with('hackathon', 'event_info','tags')->where('type', 'hackathons')->orderBy('created_at', 'desc')->paginate(5);
        return view('events', ['events' => $hacks, 'type' => 1]);
    }

    /**
     * @return mixed
     */
    public function viewMeets()
    {
        $meets = Event::with('hackathon', 'event_info','tags')->where('type', 'meetups')->orderBy('created_at', 'desc')->paginate(5);
        return view('events', ['events' => $meets, 'type' => 2]);
    }

    /**
     * @return mixed
     */
    public function viewOtherEvents()
    {
        $others = Event::with('otherevent', 'event_info','tags')->where('type', 'other')->orderBy('created_at', 'desc')->paginate(5);
        return view('events', ['events' => $others, 'type' => 3]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function viewHack($id)
    {
        $hack = Event::with('hackathon', 'commondata', 'event_info','tags')->find($id);
        return view('viewEvent', ['event' => $hack, 'type' => 1]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function viewMeet($id)
    {
        $hack = Event::with('meetup', 'commondata', 'event_info','tags')->find($id);
        return view('viewEvent', ['event' => $hack, 'type' => 2]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function viewOtherEvent($id)
    {
        $others = Event::with('otherevent', 'commondata', 'event_info','tags')->find($id);
        return view('viewEvent', ['event' => $others, 'type' => 3]);
    }
}

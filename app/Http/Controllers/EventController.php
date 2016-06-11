<?php

namespace App\Http\Controllers;

use App\Event;
use App\Jobs\SendBatchEmail;
use App\Managers\TagManager;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EventController extends Controller
{
    /**
     * @param $id
     * @return mixed
     */
    public function viewHack($id)
    {
        $hack = Event::with('hackathon', 'commondata', 'event_info', 'tags')->find($id);
        return view('viewEvent', ['event' => $hack, 'type' => 1]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function viewMeet($id)
    {
        $hack = Event::with('meetup', 'commondata', 'event_info', 'tags')->find($id);
        return view('viewEvent', ['event' => $hack, 'type' => 2]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function viewOtherEvent($id)
    {
        $others = Event::with('otherevent', 'commondata', 'event_info', 'tags')->find($id);
        return view('viewEvent', ['event' => $others, 'type' => 3]);
    }

    /**
     * Posting the event to be saved in the database
     *
     * @param $type
     * @return mixed
     */
    public function postEventSave($type)
    {
        switch ($type) {
            case 'hackathon':
                // Adding a hackathon
                $user = Auth::user();
                $event = new \App\Event();
                $event->name = request()->input('name');
                $event->type = 'hackathons';
                $user->events()->save($event);
                // setting specific info
                $hack = new \App\Hackevent();
                $hack->participant_info = "".request()->input('partInfo');
                $hack->reward = "".request()->input('reward');
                $hack->duration = "".request()->input('duration');
                $hack->team_count = "".request()->input('teamcount');
                $hack->max_per_team_no = "".request()->input('maxTeam');
                $hack->min_per_team_no = "".request()->input('minTeam');
                $event->hackathon()->save($hack);
                // set common data
                $com = new \App\Commondata();
                $com->flier_url = "".request()->input('furl');
                $com->url = "".request()->input('wurl');
                $com->comment_id = \Faker\Provider\Uuid::uuid();
                // Saving tags
                $event->tags()->saveMany(TagManager::getTagsArray(request()->input('tags')));
                $com->google_form = "".request()->input('gform');
                $event->commondata()->save($com);
                // set event info
                $eventinfo = new \App\Eventinfo();
                $eventinfo->organizer = "".request()->input('organizer');
                $eventinfo->venue = "".request()->input('venue');
                $eventinfo->reg_deadline = "".request()->input('regDate');
                $eventinfo->event_date = "".request()->input('eventDate');
                $eventinfo->description = "".request()->input('desc');
                $event->event_info()->save($eventinfo);
                $this->postToSubscribers($event);
                return redirect('/events/hackathons/' . $event->id);
                break;
            case 'meetup':
                // Adding a meetup
                $user = Auth::user();
                $event = new \App\Event();
                $event->name = request()->input('name');
                $event->type = 'meetups';
                $user->events()->save($event);
                // settting specific info
                $meet = new \App\Meetevent();
                $meet->participant_info = request()->input('partInfo');
                $meet->duration = request()->input('duration');
                $meet->head_count = request()->input('headcount');
                $event->meetup()->save($meet);
                // set common data
                $com = new \App\Commondata();
                $com->flier_url = request()->input('furl');
                $com->url = request()->input('wurl');
                $com->comment_id = \Faker\Provider\Uuid::uuid();
                $com->google_form = request()->input('gform');
                $event->commondata()->save($com);
                // Saving tags
                $event->tags()->saveMany(TagManager::getTagsArray(request()->input('tags')));
                // set event info
                $eventinfo = new \App\Eventinfo();
                $eventinfo->organizer = request()->input('organizer');
                $eventinfo->venue = request()->input('venue');
                $eventinfo->reg_deadline = request()->input('regDate');
                $eventinfo->event_date = request()->input('eventDate');
                $eventinfo->description = request()->input('desc');
                $event->event_info()->save($eventinfo);
                $this->postToSubscribers($event);
                return redirect('/events/meetups/' . $event->id);
                break;
            case 'other':
                // Adding a Other event
                $user = Auth::user();
                $event = new \App\Event();
                $event->name = request()->input('name');
                $event->type = 'other';
                $user->events()->save($event);
                // settting specific info
                $other = new \App\Otherevent();
                $other->participant_info = request()->input('partInfo');
                $other->duration = request()->input('duration');
                $other->head_count = request()->input('headcount');
                $event->otherevent()->save($other);
                // set common data
                $com = new \App\Commondata();
                $com->flier_url = request()->input('furl');
                $com->url = request()->input('wurl');
                $com->comment_id = \Faker\Provider\Uuid::uuid();
                // Saving tags
                $event->tags()->saveMany(TagManager::getTagsArray(request()->input('tags')));
                $com->google_form = request()->input('gform');
                $event->commondata()->save($com);
                // set event info
                $eventinfo = new \App\Eventinfo();
                $eventinfo->organizer = request()->input('organizer');
                $eventinfo->venue = request()->input('venue');
                $eventinfo->reg_deadline = request()->input('regDate');
                $eventinfo->event_date = request()->input('eventDate');
                $eventinfo->description = request()->input('desc');
                $event->event_info()->save($eventinfo);
                $this->postToSubscribers($event);
                return redirect('/events/other/' . $event->id);
                break;
            default:
                return redirect('/');
        }
    }


    /**
     * Send the Event to queue to be send asynchronously
     *
     * @param Event $event
     */
    private function postToSubscribers(Event $event)
    {
        $job = new SendBatchEmail($event);
        dispatch($job);
    }

    /**
     * rendering the publish form
     *
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
                return view('postEvent', ['type' => 3]);
                break;
            default:
                return redirect('/');
        }
    }


    /**
     * view all the events given the type, a string
     *
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


    /**
     * View a particular event, given a string type and id of the Event table
     *
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
        $hacks = Event::with('hackathon', 'event_info', 'tags')->where('type', 'hackathons')->orderBy('created_at', 'desc')->paginate(6);
        return view('events', ['events' => $hacks, 'type' => 1]);
    }

    /**
     * @return mixed
     */
    public function viewMeets()
    {
        $meets = Event::with('hackathon', 'event_info', 'tags')->where('type', 'meetups')->orderBy('created_at', 'desc')->paginate(6);
        return view('events', ['events' => $meets, 'type' => 2]);
    }

    /**
     * @return mixed
     */
    public function viewOtherEvents()
    {
        $others = Event::with('otherevent', 'event_info', 'tags')->where('type', 'other')->orderBy('created_at', 'desc')->paginate(6);
        return view('events', ['events' => $others, 'type' => 3]);
    }

    /**
     * Render the edit view of the event
     *
     * @param $type
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editEventView($type, $id)
    {
        switch ($type) {
            case 'hackathons':
                $hack = Event::with('hackathon', 'commondata', 'event_info', 'tags')->find($id);
                if ($hack->user == Auth::user())
                    return view('editor_layouts.editevent', ['event' => $hack, 'type' => 1]);
                abort(403);
                break;
            case 'meetups':
                $meet = Event::with('meetup', 'commondata', 'event_info', 'tags')->find($id);
                if ($meet->user == Auth::user())
                    return view('editor_layouts.editevent', ['event' => $meet, 'type' => 2]);
                abort(403);
                break;
            case 'other':
                $other = Event::with('otherevent', 'commondata', 'event_info', 'tags')->find($id);
                if ($other->user == Auth::user())
                    return view('editor_layouts.editevent', ['event' => $other, 'type' => 3]);
                abort(403);
                break;
            default:
                abort(403);
                break;
        }
    }

    /**
     *  Save the edited event
     *
     * @param $type
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editEvent($type, $id)
    {
        switch ($type) {
            case 'hackathons':
                $hack = Event::find($id);
                if ($hack->user == Auth::user())
                    return $this->editHack($id);
                abort(401);
                break;
            case 'meetups':
                $meet = Event::find($id);
                if ($meet->user == Auth::user())
                    return $this->editMeet($id);
                abort(401);
                break;
            case 'other':
                $other = Event::find($id);
                if ($other->user == Auth::user())
                    return $this->editOtherEvent($id);
                abort(401);
                break;
            default:
                abort(403);
                break;
        }
    }

    /**
     * This method edit and save the hackathon
     *
     * @param $id
     * @return View
     */
    private function editHack($id)
    {
        $event = Event::find($id);
        $hack = $event->hackathon;
        $eventinfo = $event->event_info;
        $com = $event->commondata;
        switch (request()->input('submit')) {
            case 'update':
                $event->name = request()->input('name');
                $event->save();
                // setting specific info
                $hack->participant_info = request()->input('partInfo');
                $hack->reward = request()->input('reward');
                $hack->duration = request()->input('duration');
                $hack->team_count = request()->input('teamcount');
                $hack->max_per_team_no = request()->input('maxTeam');
                $hack->min_per_team_no = request()->input('minTeam');
                $hack->save();
                // set common data
                $com->flier_url = request()->input('furl');
                $com->url = request()->input('wurl');
                // Saving tags
                $event->tags()->detach();
                $event->tags()->saveMany(TagManager::getTagsArray(request()->input('tags')));
                $com->google_form = request()->input('gform');
                $com->save();
                // set event info
                $eventinfo->organizer = request()->input('organizer');
                $eventinfo->venue = request()->input('venue');
                $eventinfo->reg_deadline = request()->input('regDate');
                $eventinfo->event_date = request()->input('eventDate');
                $eventinfo->description = request()->input('desc');
                $eventinfo->save();

                return redirect('/events/hackathons/' . $event->id);
                break;
            case 'delete':
                $com->delete();
                $hack->delete();
                $eventinfo->delete();
                $event->tags()->detach();
                $event->delete();
                return redirect('/profile/hackathons/');
                break;
            default:
                abort(403);
        }
    }

    /**
     * This method edit and save the meetup
     *
     * @param $id
     * @return View
     */
    private function editMeet($id)
    {
        $event = Event::find($id);
        $meet = $event->meetup;
        $eventinfo = $event->event_info;
        $com = $event->commondata;
        switch (request()->input('submit')) {
            case 'update':
                $event->name = request()->input('name');
                $event->save();
                // settting specific info
                $meet->participant_info = request()->input('partInfo');
                $meet->duration = request()->input('duration');
                $meet->head_count = request()->input('headcount');
                $meet->save();
                // set common data
                $com->flier_url = request()->input('furl');
                $com->url = request()->input('wurl');
                $com->google_form = request()->input('gform');
                $com->save();
                // Saving tags
                $event->tags()->detach();
                $event->tags()->saveMany(TagManager::getTagsArray(request()->input('tags')));
                // set event info
                $eventinfo->organizer = request()->input('organizer');
                $eventinfo->venue = request()->input('venue');
                $eventinfo->reg_deadline = request()->input('regDate');
                $eventinfo->event_date = request()->input('eventDate');
                $eventinfo->description = request()->input('desc');
                $eventinfo->save();

                return redirect('/events/meetups/' . $event->id);
                break;

            case 'delete':
                $com->delete();
                $meet->delete();
                $eventinfo->delete();
                $event->tags()->detach();
                $event->delete();

                return redirect('/profile/meetups/');
                break;
            default:
                abort(403);
        }
    }

    /**
     * This method edit and save the other event
     *
     * @param $id
     * @return View
     */
    private function editOtherEvent($id)
    {
        $event = Event::find($id);
        $other = $event->otherevent;
        $eventinfo = $event->event_info;
        $com = $event->commondata;
        switch (request()->input('submit')) {
            case 'update':
                $event->name = request()->input('name');
                $event->save();
                // settting specific info
                $other->participant_info = request()->input('partInfo');
                $other->duration = request()->input('duration');
                $other->head_count = request()->input('headcount');
                $other->save();
                // set common data
                $com->flier_url = request()->input('furl');
                $com->url = request()->input('wurl');
                // Saving tags
                $event->tags()->detach();
                $event->tags()->saveMany(TagManager::getTagsArray(request()->input('tags')));
                $com->google_form = request()->input('gform');
                $com->save();
                // set event info
                $eventinfo->organizer = request()->input('organizer');
                $eventinfo->venue = request()->input('venue');
                $eventinfo->reg_deadline = request()->input('regDate');
                $eventinfo->event_date = request()->input('eventDate');
                $eventinfo->description = request()->input('desc');
                $eventinfo->save();

                return redirect('/events/other/' . $event->id);
                break;

            case 'delete':
                $com->delete();
                $other->delete();
                $eventinfo->delete();
                $event->tags()->detach();
                $event->delete();

                return redirect('/profile/other/');
                break;
            default:
                abort(403);
        }
    }
}

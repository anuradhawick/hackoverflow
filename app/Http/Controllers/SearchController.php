<?php

namespace App\Http\Controllers;

use App\Event;
use App\Forum_post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class SearchController extends Controller
{
    /**
     * Return the Modal Content
     *
     * @return View
     */
    public function search()
    {
        $key = request()->input('key');
        $events = DB::table('events')
            ->join('tag_event', 'tag_event.event_id', '=', 'events.id')
            ->join('tags', 'tags.id', '=', 'tag_event.tag_id')
            ->join('event_info', 'events.id', '=', 'event_info.info_id')
            ->where('tags.tag', 'like', '%' . $key . '%')
            ->paginate(10);
        $forums = Forum_post::where('post', 'like', '%' . $key . '%')->paginate(10);

        return view('modals.search_modal', ['key' => $key, 'events' => $events, 'forums' => $forums]);
    }


    /**
     * Return the table of search results required for events search
     *
     * @return View
     */
    public function searchEvents()
    {
        $key = request()->input('key');
        $events = DB::table('events')
            ->join('tag_event', 'tag_event.event_id', '=', 'events.id')
            ->join('tags', 'tags.id', '=', 'tag_event.tag_id')
            ->join('event_info', 'events.id', '=', 'event_info.info_id')
            ->where('tags.tag', 'like', '%' . $key . '%')
            ->paginate(10);

        return view('modals.eventSearchTable', ['events' => $events]);
    }

    /**
     * Return the table of forum items related to the search
     * 
     * @return View
     */
    public function searchForum()
    {
        $key = request()->input('key');

        $forums = Forum_post::where('post', 'like', '%' . $key . '%')->paginate(10);

        return view('modals.forumSearchTable', ['key' => $key, 'forums' => $forums]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     *
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

//        return json_encode($events);
        return view('modals.search_modal', ['key' => $key, 'events' => $events]);
    }
}

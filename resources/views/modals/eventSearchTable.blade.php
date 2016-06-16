<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/16/16
 * Time: 19:25
 */
?>
<table class="table table-hover" width="100%">
    <thead>
    <tr>
        <th width="20%">Even type</th>
        <th width="30%">Name</th>
        <th width="50%">Description</th>
    </tr>
    </thead>
    <tbody>
    @foreach($events as $event)
        <tr>
            <td><a target="_blank" href="/events/{{ $event->type }}">{{ studly_case($event->type) }}</a>
            </td>
            <td><a target="_blank" href="/events/{{ $event->type }}/{{ $event->id }}">{{ $event->name }}</a>
            </td>
            <td><a href="javascript:void(0)"></a>{{ str_limit($event->description,30) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<hr>
<div class="col-sm-offset-4 col-sm-2">
    @if($events->previousPageUrl() != null)
        <a href="{{ $events->previousPageUrl() }}" class="event_page">Previous</a>
    @endif
</div>
<div class="col-sm-2">
    @if($events->count() > $events->currentPage())
        <a href="{{ $events->nextPageUrl() }}" class="event_page">Next</a>
    @endif
</div>

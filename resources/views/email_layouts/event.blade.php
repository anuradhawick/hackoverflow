<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/11/16
 * Time: 12:38
 */
?>

<body>
<div>
    <div>
        <br>
        <img src="{{ asset('/images/logo.png')  }}" alt="logo" style="margin: auto; display: block">
    </div>
    <hr>
    <br>
    <div>
        <h2 style="text-align: center">Event alert</h2>
        <img style="margin: auto; display: block;" src="{{ $event->commondata->flier_url }}" alt="Flier URL">
        <hr>
        <h4 style="text-align: center">Event type: {{ $event->type }}</h4>
        <hr>
        <h4 style="text-align: center">Event registration deadline: {{ $event->event_info->reg_deadline }}</h4>
        <hr>
        <h4 style="text-align: center">Event date: {{ $event->event_info->event_date }}</h4>
        <hr>
        <h4 style="text-align: center">Event organizer: {{ $event->event_info->organizer }}</h4>
        <hr>
        <p style="text-align: center"><strong>Get registered <a
                        href="{{ url()->to('/events')}}/{{ $event->type }}/{{ $event->id }}">now</a>!</strong></p>
    </div>
    <hr>
    <h5 style="text-align: center">DVios &copy; {{ \Carbon\Carbon::today()->year }}</h5>
</div>
</body>
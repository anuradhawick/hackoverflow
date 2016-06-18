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
        <img src="{{ $message->embed(public_path()."/images/logo.png")  }}" alt="logo"
             style="margin: auto; display: block">
    </div>
    <hr>
    <div>
        <h2 style="text-align: center">Event alert</h2>
        <img style="margin: auto; display: block;" src="{{ $event->commondata->flier_url }}" alt="Flier URL">
        <hr>
        <table align="center" width="50%">
            <tr>
                <td>Event type</td>
                <td>-</td>
                <td>{{ $event->type }}</td>
            </tr>
            <tr>
                <td>Event registration deadline</td>
                <td>-</td>
                <td>{{ $event->event_info->reg_deadline }}</td>
            </tr>
            <tr>
                <td>Event date</td>
                <td>-</td>
                <td>{{ $event->event_info->event_date }}</td>
            </tr>
            <tr>
                <td>Event organizer</td>
                <td>-</td>
                <td>{{ $event->event_info->organizer }}</td>
            </tr>
        </table>
        <hr>
        <p style="text-align: center"><strong>Get registered <a
                        href="{{ "http://www.hacknews.info/events/". $event->type."/".$event->id }}">now</a>!</strong>
        </p>
    </div>
    <hr>
    <h5 style="text-align: center">DVios &copy; {{ \Carbon\Carbon::today()->year }}</h5>
    <hr>
</div>
</body>
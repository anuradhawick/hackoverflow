<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/11/16
 * Time: 23:43
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
        <h2 style="text-align: center">Contact message</h2>
        <hr>
        <table align="center" width="50%">
            <tr>
                <td>Name</td>
                <td>-</td>
                <td>{{ $object->name }}</td>
            </tr>
            <tr>
                <td>Subject</td>
                <td>-</td>
                <td>{{ $object->subject }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>-</td>
                <td>{{ $object->email }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>-</td>
                <td>{{ $object->phone }}</td>
            </tr>
            <tr>
                <td>Company</td>
                <td>-</td>
                <td>{{ $object->company }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top">Message</td>
                <td style="vertical-align: top">-</td>
                <td>{{ $object->message }}</td>
            </tr>
        </table>
    </div>
    <hr>
    <h5 style="text-align: center">DVios &copy; {{ \Carbon\Carbon::today()->year }}</h5>
    <hr>
</div>
</body>

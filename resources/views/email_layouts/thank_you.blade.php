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
        <h3 style="text-align: center">Thank you for registering at <a href="http://hackoverflow93.herokuapp.com">HackOverflow</a>
        </h3>
        <hr>
        <img src="{{ $user->picture }}" alt="" style="margin: auto;display: block; border-radius: 50%">
        <table align="center" width="50%">
            <tr>
                <td>Your name</td>
                <td>-</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>Your email</td>
                <td>-</td>
                <td>{{ $user->email }}</td>
            </tr>
        </table>
    </div>
    <hr>
    <h5 style="text-align: center"><a
                href="https://www.facebook.com/TeamDVios/">DVios </a>&copy; {{ \Carbon\Carbon::today()->year }}</h5>
    <hr>
</div>
</body>


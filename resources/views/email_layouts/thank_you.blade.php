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
        <h3 style="text-align: center">Thank you for registering at <a href="http://hackoverflow93.herokuapp.com">HackOverflow</a></h3>
        <hr>
        <img src="{{ $user->picture }}" alt="" style="margin: auto;display: block; border-radius: 50%">
        <h3 style="text-align: center">Your name: {{ $user->name }}</h3>
        <h3 style="text-align: center">Your email: {{ $user->email }}</h3>
    </div>
    <hr>
    <h5 style="text-align: center"><a href="https://www.facebook.com/TeamDVios/">DVios </a>&copy; {{ \Carbon\Carbon::today()->year }}</h5>
    <hr>
</div>
</body>


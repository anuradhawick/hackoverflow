<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/11/16
 * Time: 12:38
 */
?>

<body style="background: #d5d5d5;">
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
        <img class="img-circle" src="{{ $user->picture }}" alt="" style="margin: auto;display: block; border-radius: 50%">
        <h4 style="text-align: center">{{ $user->name }}</h4>
        <h4 style="text-align: center">{{ $user->email }}</h4>
    </div>
    <hr>
    <h5 style="text-align: center">DVios &copy; {{ \Carbon\Carbon::today()->year }}</h5>
</div>
</body>


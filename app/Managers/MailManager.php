<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 6/11/16
 * Time: 11:44
 */

namespace App\Managers;


use App\Event;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailManager
{
    public static function sendEmailToUser(User $user)
    {
        Mail::send('email_layouts.thank_you', ['user' => $user], function ($message) {
            $message->sender("anuradha.sanjeewa@live.com", $name = "HackOverflow Admin");
            $message->to($user->email, $name = "Anu");
        });
    }

    public static function sendEmailToList($event_id)
    {
        Mail::send('email_layouts.event', ['event' => Event::with('event_info')->with('commondata')->find($event_id), 'type' => 'hackathon', 'url' => 'http://www.google.lk'], function ($message) {
            $message->sender("anuradha.sanjeewa@live.com", $name = "Test");
            $message->to("anuradha.sanjeewa@ymail.com", $name = "Anu");
        });
    }
}
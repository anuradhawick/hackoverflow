<?php
/**
 * Created by IntelliJ IDEA.
 * User: anuradhawick
 * Date: 5/22/16
 * Time: 14:39
 */

namespace App\Managers;


use App\Subscription;
use Illuminate\Support\Facades\Auth;

class SubscriptionManager
{
    /**
     * Subscribe the logged in user to each of the item type
     * 1 - subscribe
     * 0 - un-subscribe
     *
     * @param $hack
     * @param $meet
     * @param $other
     * @return bool
     */
    public static function subscribe($hack, $meet, $other)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $hack_sub = Subscription::where('event_type', 'hackathons')->first();
            $meet_sub = Subscription::where('event_type', 'meetups')->first();
            $other_sub = Subscription::where('event_type', 'other')->first();
            $user->subscriptions()->detach();
            // updating hack
            if ($hack == 1) {
                $user->subscriptions()->attach($hack_sub->id);
            }
            // updating meet
            if ($meet == 1) {
                $user->subscriptions()->attach($meet_sub->id);
            }
            // updating other
            if ($other == 1) {
                $user->subscriptions()->attach($other_sub->id);
            }
            return true;
        } else {
            return false;
        }
    }
}
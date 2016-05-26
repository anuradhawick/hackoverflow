<?php

namespace App\Http\Controllers;

use App\Forum_post;
use App\Managers\SubscriptionManager;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @return void
     */
    public function subscribe()
    {
        $hack = request()->input('hack');
        $meet = request()->input('meet');
        $other = request()->input('other');

        SubscriptionManager::subscribe($hack, $meet, $other);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewPage()
    {
        $user = Auth::user();
        $subs = $user->subscriptions;
        $hack = false;
        $meet = false;
        $other = false;
        foreach ($subs as $sub) {
            if ($sub->event_type == "hack") {
                $hack = true;
            }
            if ($sub->event_type == "meet") {
                $meet = true;
            }
            if ($sub->event_type == "other") {
                $other = true;
            }
        }
        return view("profile", ["hack" => $hack, "meet" => $meet, "other" => $other, "user" => $user]);
    }
    
}

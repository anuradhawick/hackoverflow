<?php

namespace App\Http\Controllers;

use App\Managers\SubscriptionManager;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function subscribe()
    {
        $hack = request()->input('hack');
        $meet = request()->input('meet');
        $other = request()->input('other');

        SubscriptionManager::subscribe($hack, $meet, $other);
    }
}

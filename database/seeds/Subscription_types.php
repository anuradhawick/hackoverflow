<?php

use Illuminate\Database\Seeder;

class Subscription_types extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hack = new \App\Subscription();
        $hack->event_type='hack';
        $hack->save();
        $hack = new \App\Subscription();
        $hack->event_type='meet';
        $hack->save();
        $hack = new \App\Subscription();
        $hack->event_type='other';
        $hack->save();
    }
}

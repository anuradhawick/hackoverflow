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
        $hack->event_type='hackathons';
        $hack->save();
        $hack = new \App\Subscription();
        $hack->event_type='meetups';
        $hack->save();
        $hack = new \App\Subscription();
        $hack->event_type='other';
        $hack->save();
    }
}

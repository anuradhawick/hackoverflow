<?php

use App\Forum_post;
use Faker\Provider\Uuid;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Adding the default user
        DB::table('users')->insert([
            'name' => 'Anuradha Wickramarachchi',
            'email' => 'anuradhawick@gmail.com',
            'password' => bcrypt('asdwas')
        ]);

        /*Get the added user*/
        $user = \App\User::find(1);
        for ($i = 1; $i < 20; $i++) {
            // Adding a hackathon
            $event = new \App\Event();
            $event->name = 'Test hack '.$i;
            $event->type = 'hackathons';
            $user->events()->save($event);
            // setting specific info
            $hack = new \App\Hackevent();
            $hack->participant_info = 'Info '.$i;
            $hack->reward = 'Info '.$i;
            $hack->duration = 'Info '.$i;
            $hack->team_count = 15;
            $hack->max_per_team_no = 5;
            $hack->min_per_team_no = 3;
            $event->hackathon()->save($hack);
            // set common data
            $com = new \App\Commondata();
            $com->flier_url = 'https://d3n8a8pro7vhmx.cloudfront.net/adriel/pages/240/attachments/original/1323313229/CityCampSF_Hackathon_Flyer.jpg?1323313229';
            $com->url = 'http://www.google.com';
            $com->comment_id = \Faker\Provider\Uuid::uuid();
            $com->tags = 'Google,gsoc,dialog,'.$i;
            $com->google_form = 'https://docs.google.com/forms/d/1dtYGZoKRNIhAxAsJdqQCf5z7uPtyXMaNcxBBFEqUGVk/viewform?embedded=true';
            $event->commondata()->save($com);
            // set event info
            $eventinfo = new \App\Eventinfo();
            $eventinfo->organizer = 'Ideamart'.$i;
            $eventinfo->venue = 'Dialog Town hall'.$i;
            $eventinfo->reg_deadline = '2016-12-12';
            $eventinfo->event_date = '2017-12-12';
            $eventinfo->description = 'This is a best hack organized by Dialog'.$i;
            $event->event_info()->save($eventinfo);

            // Adding a meetup
            $event = new \App\Event();
            $event->name = 'Test meet '.$i;
            $event->type = 'meetups';
            $user->events()->save($event);
            // settting specific info
            $meet = new \App\Meetevent();
            $meet->participant_info = 'Info '.$i;
            $meet->duration = 'Info '.$i;
            $meet->head_count = 50;
            $event->meetup()->save($meet);
            // set common data
            $com = new \App\Commondata();
            $com->flier_url = 'http://photos1.meetupstatic.com/photos/event/5/0/f/c/highres_260900732.jpeg';
            $com->url = 'http://www.yahoo.com';
            $com->comment_id = \Faker\Provider\Uuid::uuid();
            $com->tags = 'WSO2,JAVA,'.$i;
            $com->google_form = 'https://docs.google.com/forms/d/1dtYGZoKRNIhAxAsJdqQCf5z7uPtyXMaNcxBBFEqUGVk/viewform?embedded=true';
            $event->commondata()->save($com);
            // set event info
            $eventinfo = new \App\Eventinfo();
            $eventinfo->organizer = 'WSO2';
            $eventinfo->venue = 'WSO2 trace expert city '.$i;
            $eventinfo->reg_deadline = '2016-12-12';
            $eventinfo->event_date = '2017-12-12';
            $eventinfo->description = 'Annual JAVA meetup '.$i;
            $event->event_info()->save($eventinfo);

            // Adding a Other event
            $event = new \App\Event();
            $event->name = 'Test other '.$i;
            $event->type = 'other';
            $user->events()->save($event);
            // settting specific info
            $other = new \App\Otherevent();
            $other->participant_info = 'Info other type of event '.$i;
            $other->duration = 'Info '.$i;
            $other->head_count = 50;
            $event->otherevent()->save($other);
            // set common data
            $com = new \App\Commondata();
            $com->flier_url = 'http://www.andhowcreative.com/new/wp-content/uploads/2012/02/austin-tech-event-v4.jpg';
            $com->url = 'http://www.yahoo.com';
            $com->comment_id = \Faker\Provider\Uuid::uuid();
            $com->tags = 'WSO2,JAVA,'.$i;
            $com->google_form = 'https://docs.google.com/forms/d/1dtYGZoKRNIhAxAsJdqQCf5z7uPtyXMaNcxBBFEqUGVk/viewform?embedded=true';
            $event->commondata()->save($com);
            // set event info
            $eventinfo = new \App\Eventinfo();
            $eventinfo->organizer = 'Microsoft '.$i;
            $eventinfo->venue = 'Nawam mawatha colombo '.$i;
            $eventinfo->reg_deadline = '2016-12-12';
            $eventinfo->event_date = '2017-12-12';
            $eventinfo->description = 'Annual Innovate program for developers';
            $event->event_info()->save($eventinfo);

            // Adding a forum post
            $forum_post = new Forum_post();
            $forum_post->title = "$i forum post";
            $forum_post->post = "Lorem ipsum dolor site amet ".$i;
            $forum_post->uuid = Uuid::uuid();
            $user->forum_posts()->save($forum_post);
        }

    }
}

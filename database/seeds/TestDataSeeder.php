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
            'fname' => 'Anuradha',
            'mname' => 'Sanjeewa',
            'lname' => 'Wickramarachchi',
            'tel' => '0712165724',
            'admin' => 1,
            'email' => 'anuradhawick@gmail.com',
            'password' => bcrypt('asdwas')
        ]);

        /*Get the added user*/
        $user = \App\User::find(1);
        for ($i = 1; $i < 1; $i++) {
            // Adding a hackathon
            $event = new \App\Event();
            $event->name = 'Test hack ' . $i;
            $event->type = 'hackathons';
            $user->events()->save($event);
            // setting specific info
            $hack = new \App\Hackevent();
            $hack->participant_info = 'Info ' . $i;
            $hack->reward = 'Info ' . $i;
            $hack->duration = 'Info ' . $i;
            $hack->team_count = 15;
            $hack->max_per_team_no = 5;
            $hack->min_per_team_no = 3;
            $event->hackathon()->save($hack);
            // set common data
            $com = new \App\Commondata();
            $com->flier_url = 'https://d3n8a8pro7vhmx.cloudfront.net/adriel/pages/240/attachments/original/1323313229/CityCampSF_Hackathon_Flyer.jpg?1323313229';
            $com->url = 'http://www.google.com';
            $com->comment_id = \Faker\Provider\Uuid::uuid();
            // Saving tags
            $event->tags()->saveMany(\App\Http\Managers\TagManager::getTagsArray('ideamart,Takas.lk'));
            $com->google_form = 'https://docs.google.com/forms/d/1dtYGZoKRNIhAxAsJdqQCf5z7uPtyXMaNcxBBFEqUGVk/viewform?embedded=true';
            $event->commondata()->save($com);
            // set event info
            $eventinfo = new \App\Eventinfo();
            $eventinfo->organizer = 'Ideamart' . $i;
            $eventinfo->venue = 'Dialog Town hall' . $i;
            $eventinfo->reg_deadline = '2016-12-12';
            $eventinfo->event_date = '2017-12-12';
            $eventinfo->description = 'This is a best hack organized by Dialog' . $i;
            $event->event_info()->save($eventinfo);

            // Adding a meetup
            $event = new \App\Event();
            $event->name = 'Test meet ' . $i;
            $event->type = 'meetups';
            $user->events()->save($event);
            // settting specific info
            $meet = new \App\Meetevent();
            $meet->participant_info = 'Info ' . $i;
            $meet->duration = 'Info ' . $i;
            $meet->head_count = 50;
            $event->meetup()->save($meet);
            // set common data
            $com = new \App\Commondata();
            $com->flier_url = 'http://photos1.meetupstatic.com/photos/event/5/0/f/c/highres_260900732.jpeg';
            $com->url = 'http://www.yahoo.com';
            $com->comment_id = \Faker\Provider\Uuid::uuid();
            $com->google_form = 'https://docs.google.com/forms/d/1dtYGZoKRNIhAxAsJdqQCf5z7uPtyXMaNcxBBFEqUGVk/viewform?embedded=true';
            $event->commondata()->save($com);
            // Saving tags
            $event->tags()->saveMany(\App\Http\Managers\TagManager::getTagsArray('ideamart,Wso2'));
            // set event info
            $eventinfo = new \App\Eventinfo();
            $eventinfo->organizer = 'WSO2';
            $eventinfo->venue = 'WSO2 trace expert city ' . $i;
            $eventinfo->reg_deadline = '2016-12-12';
            $eventinfo->event_date = '2017-12-12';
            $eventinfo->description = 'Annual JAVA meetup ' . $i;
            $event->event_info()->save($eventinfo);

            // Adding a Other event
            $event = new \App\Event();
            $event->name = 'Test other ' . $i;
            $event->type = 'other';
            $user->events()->save($event);
            // settting specific info
            $other = new \App\Otherevent();
            $other->participant_info = 'Info other type of event ' . $i;
            $other->duration = 'Info ' . $i;
            $other->head_count = 50;
            $event->otherevent()->save($other);
            // set common data
            $com = new \App\Commondata();
            $com->flier_url = 'http://www.andhowcreative.com/new/wp-content/uploads/2012/02/austin-tech-event-v4.jpg';
            $com->url = 'http://www.yahoo.com';
            $com->comment_id = \Faker\Provider\Uuid::uuid();
            // Saving tags
            $event->tags()->saveMany(\App\Http\Managers\TagManager::getTagsArray('pcjt,Wso2'));
            $com->google_form = 'https://docs.google.com/forms/d/1dtYGZoKRNIhAxAsJdqQCf5z7uPtyXMaNcxBBFEqUGVk/viewform?embedded=true';
            $event->commondata()->save($com);
            // set event info
            $eventinfo = new \App\Eventinfo();
            $eventinfo->organizer = 'Microsoft ' . $i;
            $eventinfo->venue = 'Nawam mawatha colombo ' . $i;
            $eventinfo->reg_deadline = '2016-12-12';
            $eventinfo->event_date = '2017-12-12';
            $eventinfo->description = 'Annual Innovate program for developers';
            $event->event_info()->save($eventinfo);

            // Adding a forum post
            $forum_post = new Forum_post();
            $forum_post->title = "$i forum post";
            $forum_post->post = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)." . $i;
            $forum_post->uuid = Uuid::uuid();
            $user->forum_posts()->save($forum_post);
        }

    }
}

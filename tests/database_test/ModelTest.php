<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelTest extends TestCase
{
    /*
     * Test adding models to the database
     * */
    public function testUser()
    {
        $user = new \App\User();
        $user->given_name = "Test";
        $user->family_name = "Test";
        $user->name = "Test Test";
        $user->password = bcrypt("test_pw");
        $user->sub = "1234";
        $user->picture = "http://sample.sample.com";
        $user->admin = 1;
        $user->email = "test@test.com";

        $user->save();
        $this->seeInDatabase('users', $user->getAttributes());
        $user->delete();
    }

    public function testForum()
    {
        $user = new \App\User();
        $user->save();
        $forum_post = new \App\Forum_post();
        $forum_post->title = "Test Post";
        $forum_post->post = "Test Post";
        $forum_post->uuid = \Faker\Provider\Uuid::uuid();

        $user->forum_posts()->save($forum_post);
        $this->seeInDatabase('forum_posts', $forum_post->getAttributes());
        $forum_post->delete();
        $user->delete();
    }

    public function testHack()
    {
        $user = new \App\User();
        $user->save();
        $event = new \App\Event();
        $event->name = 'Test hack ';
        $event->type = 'hackathons';
        $user->events()->save($event);
        // setting specific info
        $hack = new \App\Hackevent();
        $hack->participant_info = 'Test info';
        $hack->reward = 'Test reward';
        $hack->duration = 'Test duration';
        $hack->team_count = 10;
        $hack->max_per_team_no = 5;
        $hack->min_per_team_no = 3;
        $event->hackathon()->save($hack);
        // set common data
        $com = new \App\Commondata();
        $com->flier_url = 'https://flier.test.com';
        $com->url = 'https://url.test.com';
        $com->comment_id = \Faker\Provider\Uuid::uuid();
        // Saving tags
        $event->tags()->saveMany(\App\Managers\TagManager::getTagsArray('test'));
        $com->google_form = 'https://form.test.com';
        $event->commondata()->save($com);
        // set event info
        $eventinfo = new \App\Eventinfo();
        $eventinfo->organizer = 'Test organizer';
        $eventinfo->venue = 'Test venue';
        $eventinfo->reg_deadline = '2016-12-12';
        $eventinfo->event_date = '2017-12-12';
        $eventinfo->description = 'Test description';
        $event->event_info()->save($eventinfo);

        $this->seeInDatabase('events', $event->getAttributes());
        $this->seeInDatabase('hackathons', $hack->getAttributes());
        $this->seeInDatabase('commons', $com->getAttributes());
        $this->seeInDatabase('event_info', $eventinfo->getAttributes());

        $eventinfo->delete();
        $com->delete();
        $hack->delete();
        $tags = $event->tags();
        foreach ($tags as $tag) {
            $tag->delete();
        }
        $event->tags()->detach();
        $event->delete();
        $tags->delete();
        $user->delete();
    }


    public function testMeet()
    {
        $user = new \App\User();
        $user->save();
        // Adding meet event
        $event = new \App\Event();
        $event->name = 'Test meet';
        $event->type = 'meetups';
        $user->events()->save($event);
        // settting specific info
        $meet = new \App\Meetevent();
        $meet->participant_info = 'Test info';
        $meet->duration = 'Test duration';
        $meet->head_count = 10;
        $event->meetup()->save($meet);
        // set common data
        $com = new \App\Commondata();
        $com->flier_url = 'https://flier.test.com';
        $com->url = 'https://url.test.com';
        $com->comment_id = \Faker\Provider\Uuid::uuid();
        $com->google_form = 'https://form.test.com';
        $event->commondata()->save($com);
        // Saving tags
        $event->tags()->saveMany(\App\Managers\TagManager::getTagsArray('test'));
        // set event info
        $eventinfo = new \App\Eventinfo();
        $eventinfo->organizer = 'Test organizer';
        $eventinfo->venue = 'Test venue';
        $eventinfo->reg_deadline = '2016-12-12';
        $eventinfo->event_date = '2017-12-12';
        $eventinfo->description = 'Test description';
        $event->event_info()->save($eventinfo);

        $this->seeInDatabase('events', $event->getAttributes());
        $this->seeInDatabase('meets', $meet->getAttributes());
        $this->seeInDatabase('commons', $com->getAttributes());
        $this->seeInDatabase('event_info', $eventinfo->getAttributes());

        $eventinfo->delete();
        $com->delete();
        $meet->delete();
        $tags = $event->tags();
        foreach ($tags as $tag) {
            $tag->delete();
        }
        $event->tags()->detach();
        $event->delete();
        $tags->delete();
        $user->delete();
    }


    public function testOther()
    {
        $user = new \App\User();
        $user->save();
        // Adding a Other event
        $event = new \App\Event();
        $event->name = 'Test other';
        $event->type = 'other';
        $user->events()->save($event);
        // settting specific info
        $other = new \App\Otherevent();
        $other->participant_info = 'Test info';
        $other->duration = 'Test duration';
        $other->head_count = 50;
        $event->otherevent()->save($other);
        // set common data
        $com = new \App\Commondata();
        $com->flier_url = 'https://flier.test.com';
        $com->url = 'https://url.test.com';
        $com->comment_id = \Faker\Provider\Uuid::uuid();
        // Saving tags
        $event->tags()->saveMany(\App\Managers\TagManager::getTagsArray('test'));
        $com->google_form = 'https://form.test.com';
        $event->commondata()->save($com);
        // set event info
        $eventinfo = new \App\Eventinfo();
        $eventinfo->organizer = 'Test organizer';
        $eventinfo->venue = 'Test venue';
        $eventinfo->reg_deadline = '2016-12-12';
        $eventinfo->event_date = '2017-12-12';
        $eventinfo->description = 'Test description';
        $event->event_info()->save($eventinfo);

        $this->seeInDatabase('events', $event->getAttributes());
        $this->seeInDatabase('other_events', $other->getAttributes());
        $this->seeInDatabase('commons', $com->getAttributes());
        $this->seeInDatabase('event_info', $eventinfo->getAttributes());

        $eventinfo->delete();
        $com->delete();
        $other->delete();
        $tags = $event->tags();
        foreach ($tags as $tag) {
            $tag->delete();
        }
        $event->tags()->detach();
        $event->delete();
        $tags->delete();
        $user->delete();
    }
}

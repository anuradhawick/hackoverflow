<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
    /*
     * Tests for routes in the home page
     * */

    public function testEventHack()
    {
        $this->visit('/')->click('Events')->click('Hackathons')->seePageIs('/events/hackathons');
    }

    public function testEventMeet()
    {
        $this->visit('/')->click('Events')->click('Meet-Ups')->seePageIs('/events/meetups');
    }

    public function testEventOther()
    {
        $this->visit('/')->click('Events')->click('Other')->seePageIs('/events/other');
    }

    public function testForumView()
    {
        $this->visit('/')->click('Forum')->click('View')->seePageIs('/forum');
    }

    public function testForumNewPost()
    {
        $user = new \App\User();
        $this->actingAs($user)->visit('/')->click('Forum')->click('New post')->seePageIs('/forum/post');
    }

    public function testAboutUs()
    {
        $this->visit('/')->click('About Us')->seePageIs('/about-us');
    }

    public function testContactUs()
    {
        $this->visit('/')->click('Contact Us')->seePageIs('/contact-us');
    }


    public function testPostHack()
    {
        $user = new \App\User();
        $this->actingAs($user)->visit('/')->click('New Hackathon')->seePageIs('/post-event/hackathon');
    }

    public function testPostMeet()
    {
        $user = new \App\User();
        $this->actingAs($user)->visit('/')->click('New Meet-Up')->seePageIs('/post-event/meetup');
    }

    public function testPostOther()
    {
        $user = new \App\User();
        $this->actingAs($user)->visit('/')->click('New Other Event')->seePageIs('/post-event/other');
    }
}

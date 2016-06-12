<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthRedirectTest extends TestCase
{
    /*
     * Test for redirects that user requires login
     * */

    public function testPostForum()
    {
        $this->visit('/forum/post')->seePageIs('/login');
    }

    public function testPostHack()
    {
        $this->visit('/post-event/hackathon')->seePageIs('/login');
    }

    public function testPostMeet()
    {
        $this->visit('/post-event/meetup')->seePageIs('/login');
    }

    public function testPostOther()
    {
        $this->visit('/post-event/other')->seePageIs('/login');
    }

    public function testProfile()
    {
        $this->visit('/profile')->seePageIs('/login');
    }

    /*
     * Routes that are inside forum
     * */

    public function testMyForum()
    {
        $this->visit('/profile/forum')->seePageIs('/login');
    }

    public function testMyHacks()
    {
        $this->visit('/profile/hackathons')->seePageIs('/login');
    }

    public function testMyMeets()
    {
        $this->visit('/profile/meetups')->seePageIs('/login');
    }

    public function testMyOtherEvents()
    {
        $this->visit('/profile/other')->seePageIs('/login');
    }


    /*
     * Routes related to admin user
     * */
    public function testAdminPage()
    {
        $this->visit('/admin')->seePageIs('/login');
    }

    public function testAdminForumPage()
    {
        $this->visit('/admin/forum')->seePageIs('/login');
    }

    public function testAdminHackPage()
    {
        $this->visit('/admin/hack')->seePageIs('/login');
    }

    public function testAdminMeetPage()
    {
        $this->visit('/admin/meet')->seePageIs('/login');
    }

    public function testAdminOtherPage()
    {
        $this->visit('/admin/other')->seePageIs('/login');
    }
}

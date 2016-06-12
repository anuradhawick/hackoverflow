<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminRoutesTest extends TestCase
{
    /*
     * Test routes that are meant for admin
     * */
    public function testAdminPage()
    {
        $user = new \App\User();
        $user->admin = 1;
        $this->actingAs($user)->visit('/admin')->seePageIs('/admin');
    }

    public function testAdminForumPage()
    {
        $user = new \App\User();
        $user->admin = 1;
        $this->actingAs($user)->visit('/admin/forum')->seePageIs('/admin/forum');
    }

    public function testAdminHackPage()
    {
        $user = new \App\User();
        $user->admin = 1;
        $this->actingAs($user)->visit('/admin/hack')->seePageIs('/admin/hack');
    }

    public function testAdminMeetPage()
    {
        $user = new \App\User();
        $user->admin = 1;
        $this->actingAs($user)->visit('/admin/meet')->seePageIs('/admin/meet');
    }

    public function testAdminOtherPage()
    {
        $user = new \App\User();
        $user->admin = 1;
        $this->actingAs($user)->visit('/admin/other')->seePageIs('/admin/other');
    }
}

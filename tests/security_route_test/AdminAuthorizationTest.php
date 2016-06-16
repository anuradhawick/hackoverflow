<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminAuthorizationTest extends TestCase
{
    /*
     * Testing unauthorized error for normal users
     * */

    public function testAdminPage()
    {
        $user = new \App\User();
        $this->actingAs($user)->call('GET', '/admin');
        $this->assertResponseStatus(401);
    }

    public function testAdminForumPage()
    {
        $user = new \App\User();
        $this->actingAs($user)->call('GET', '/admin/forum');
        $this->assertResponseStatus(401);
    }

    public function testAdminHackPage()
    {
        $user = new \App\User();
        $this->actingAs($user)->call('GET', '/admin/hack');
        $this->assertResponseStatus(401);
    }

    public function testAdminMeetPage()
    {
        $user = new \App\User();
        $this->actingAs($user)->call('GET', '/admin/meet');
        $this->assertResponseStatus(401);
    }

    public function testAdminOtherPage()
    {
        $user = new \App\User();
        $this->actingAs($user)->call('GET', '/admin/other');
        $this->assertResponseStatus(401);
    }

    public function testAdminAdministrationPage()
    {
        $user = new \App\User();
        $this->actingAs($user)->call('GET', '/admin/administration');
        $this->assertResponseStatus(401);
    }

}

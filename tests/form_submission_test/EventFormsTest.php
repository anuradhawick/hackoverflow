<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventFormsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHack()
    {
        $user = \App\User::find(1);
        $this->actingAs($user)->visit('/forum/post')
            ->type('post name testing', 'name')
            ->type('post content testing', 'post')
            ->press('Post')
            ->seePageIs('/forum/'.\Illuminate\Support\Facades\DB::table('forum_posts')->orderBy('id','desc')->first()->id);
    }
}

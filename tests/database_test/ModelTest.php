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
        
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactFormTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testContactUs()
    {
        $this->visit('/contact-us')->json('POST', '/contact-us', ['name' => 'Name', 'subject' => 'Subject','_token'=>csrf_token()])
            ->seeJson(['name' => 'Name']);
    }
}

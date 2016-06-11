<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactMail;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
    public function sendContactMessage()
    {
        $object = new \stdClass();
        $object->name = request()->input('name');
        $object->subject = request()->input('subject');
        $object->company = request()->input('company');
        $object->message = request()->input('message');
        $object->email = request()->input('email');
        $object->phone = request()->input('phone');

        $job = new SendContactMail($object);
        $this->dispatch($job);

        return json_encode($object);
    }
}

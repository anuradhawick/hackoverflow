<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendContactMail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $object;

    /**
     * Create a new job instance.
     *
     * @param \stdClass $object
     */
    public function __construct(\stdClass $object)
    {
        $this->object = $object;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->attempts() > 2) {
            return;
        }
        Mail::send('email_layouts.contact', ['object' => $this->object], function ($message) {
            $message->sender("anuradha.sanjeewa@live.com", $name = "HackOverflow Admin");
            $message->to("anuradhawick@gmail.com", "Anuradha Wickramarachchi");
            $message->subject("Contact message");
        });
    }

    /**
     * Handle a job failure.
     *
     * @return void
     */
    public function failed()
    {
        // TODO
    }
}

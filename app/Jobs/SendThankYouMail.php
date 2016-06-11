<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Managers\MailManager;
use App\User;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendThankYouMail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('email_layouts.thank_you', ['user' => $this->user], function ($message) {
            $message->sender("anuradha.sanjeewa@live.com", $name = "HackOverflow Admin");
            $message->to($this->user->email, $this->user->name);
            $message->subject("Welcome to HackOverflow");
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

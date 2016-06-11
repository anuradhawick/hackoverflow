<?php

namespace App\Jobs;

use App\Event;
use App\Jobs\Job;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendBatchEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $event;

    /**
     * Create a new job instance.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @internal param Event $event
     */
    public function handle()
    {
        DB::table('users')->join('user_sub', 'user_sub.user_id', '=', 'users.id')->join('subscriptions', 'subscriptions.id', '=', 'user_sub.sub_id')->where('subscriptions.event_type', $this->event->type)->chunk(10, function ($users) {
            foreach ($users as $user) {
                Mail::send('email_layouts.event', ['event' => $this->event], function ($message) use ($user) {
                    $message->sender("anuradha.sanjeewa@live.com", $name = "HackOverflow Admin");
                    $message->to($user->email, $user->name);
                    switch ($this->event->type) {
                        case 'hackathons':
                            $message->subject("New hackathon event");
                            break;
                        case 'meetups':
                            $message->subject("New meetup event");
                            break;
                        case 'other':
                            $message->subject("New event");
                            break;
                    }
                });
            }
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

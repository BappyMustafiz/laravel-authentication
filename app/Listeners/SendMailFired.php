<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\SendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailFired implements ShouldQueue
{
    public function __construct()
    {
    }
    public function handle(SendMail $event)
    {
        $mailContents = $event->mail;

        Mail::send('emails.user_registration_email', ['mailContents' => $mailContents], function ($message) {
            $message->subject('New User Registered');
            $message->to('admin@dev.com');
        });
    }
}

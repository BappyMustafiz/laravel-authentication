<?php

namespace App\Providers;

use App\Events\SendMail;
use App\Listeners\SendMailFired;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SendMail::class => [
            SendMailFired::class,
        ],
    ];
    public function boot()
    {
        parent::boot();
    }
}

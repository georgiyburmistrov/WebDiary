<?php

namespace App\Listeners;

use App\Events\UserRegistration;
use App\Mail\SentPassword;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMessageUserRegistration
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistration $event): void
    {
        Mail::to($event->user)->send(new SentPassword($event->password));
    }
}

<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUserMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeNewUserRegisterListener
{
    /**
     * @param $event
     */
    public function handle($event)
    {
        Mail::to($event->user['email'])->send(new WelcomeNewUserMail());

    }
}

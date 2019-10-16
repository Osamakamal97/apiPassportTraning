<?php

namespace App\Listeners;

use App\Mail\CommentMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class AddNewCommentListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {

        sleep(10);

        Mail::to($event->user['email'])->send(new CommentMail());
    }
}

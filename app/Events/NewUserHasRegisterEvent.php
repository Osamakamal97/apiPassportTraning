<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NewUserHasRegisterEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    /**
     * NewUserHasRegisterEvent constructor.
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}

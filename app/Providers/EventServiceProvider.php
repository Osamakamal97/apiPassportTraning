<?php

namespace App\Providers;

use App\Events\NewUserHasRegisterEvent;
use App\Listeners\AddNewCommentListener;
use App\Listeners\WelcomeNewUserRegisterListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewUserHasRegisterEvent::class => [
            WelcomeNewUserRegisterListener::class,
            AddNewCommentListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

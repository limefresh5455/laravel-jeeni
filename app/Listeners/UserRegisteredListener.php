<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Helpers\Jeeni;
use App\Jobs\SendWelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserRegisteredListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Handle the event.
     *
     * @param UserRegistered $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        dispatch(new SendWelcomeMail($event->user));
        Jeeni::createUserPlaylist($event->user);
    }
}

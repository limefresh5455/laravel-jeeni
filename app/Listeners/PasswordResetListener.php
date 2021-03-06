<?php

namespace App\Listeners;

use Illuminate\Auth\Events\PasswordReset;

class PasswordResetListener
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
     * @param PasswordReset $event
     * @return void
     */
    public function handle(PasswordReset $event)
    {
        $event->user->update([
            'is_password_updated' => true
        ]);
    }
}

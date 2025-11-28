<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\User;

class LogSuccessfulLogin
{
    public function handle(Login $event)
    {
        /** @var User $user */
        $user = $event->user;

        $user->last_login_at = now();
        $user->save();
    }
}

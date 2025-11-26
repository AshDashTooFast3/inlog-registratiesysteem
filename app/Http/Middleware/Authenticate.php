<?php

namespace App\Http\Middleware;

use Illuminate\auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    // als de gebruiker niet is ingelogd, doorverwijzen naar login pagina
    protected function redirectTo($request): ?string
    {
        // als het een API-call is, geen redirect maar een 401 error weergeven
        if ($request->expectsJson()) {
            return null;
        }

        // anders naar login pagina redirecten
        return route('login');
    }
}

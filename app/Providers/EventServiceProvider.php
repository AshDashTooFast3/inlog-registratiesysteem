<?php
namespace App\Providers;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use \App\Listeners\LogSuccessfulLogin;
use Illuminate\Auth\Events\Login;

class EventServiceProvider extends ServiceProvider
{
   protected $listen = [
    Login::class => [
        LogSuccessfulLogin::class,
    ],
];

}

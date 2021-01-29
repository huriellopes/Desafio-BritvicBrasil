<?php

namespace App\Architecture\Bookings\Providers;

use App\Architecture\Bookings\Events\ReservedEvent;
use App\Architecture\Bookings\Listeners\ReservedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class BookingsEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ReservedEvent::class => [
            ReservedListener::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

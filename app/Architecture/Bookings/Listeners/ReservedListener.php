<?php

namespace App\Architecture\Bookings\Listeners;

use App\Architecture\Bookings\Events\ReservedEvent;
use App\Traits\Utils;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ReservedListener
{
    use Utils;

    /**
     * ReservedListener constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param ReservedEvent $event
     */
    public function handle(ReservedEvent $event)
    {
        $log = $this->logReserved($event->getParams());
        Log::channel('reservedcar')->info($log);
    }
}

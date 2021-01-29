<?php

namespace App\Observers;

use App\Jobs\CarReservedJob;
use App\Architecture\Bookings\Models\Booking;

class CarReservedObserver
{
    /**
     * Handle the Booking "created" event.
     *
     * @param  Booking  $booking
     * @return void
     */
    public function created(Booking $booking)
    {
        CarReservedJob::dispatch();
    }
}

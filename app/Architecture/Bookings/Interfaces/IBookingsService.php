<?php

namespace App\Architecture\Bookings\Interfaces;

use App\Architecture\Bookings\Models\Booking;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface IBookingsService
{
    /**
     * @return Collection
     */
    public function listBookings() : Collection;

    /**
     * @param int $id
     * @return Booking
     */
    public function findBooking(int $id) : Booking;

    /**
     * @param stdClass $params
     * @return Booking
     */
    public function storeBookings(stdClass $params) : Booking;

    /**
     * @param Booking $booking
     * @return Booking|null
     */
    public function deleteBooking(Booking $booking) : ?Booking;
}

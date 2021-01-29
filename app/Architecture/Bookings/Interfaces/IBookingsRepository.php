<?php

namespace App\Architecture\Bookings\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Architecture\Bookings\Models\Booking;
use stdClass;

interface IBookingsRepository
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

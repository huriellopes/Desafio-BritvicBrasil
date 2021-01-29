<?php

namespace App\Architecture\Bookings\Repositories;

use App\Architecture\Bookings\Interfaces\IBookingsRepository;
use App\Architecture\Bookings\Models\Booking;
use App\Architecture\Cars\Models\Car;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class BookingsRepository implements IBookingsRepository
{
    /**
     * @return Collection
     */
    public function listBookings(): Collection
    {
        return Booking::whereNull('deleted_at')->get();
    }

    /**
     * @param int $id
     * @return Booking
     */
    public function findBooking(int $id): Booking
    {
        return Booking::whereNull('deleted_at')->where($id)->first();
    }

    /**
     * @param stdClass $params
     * @return Booking
     */
    public function storeBookings(stdClass $params): Booking
    {
        $booking = new Booking();
        $booking->client_id = $params->client_id;
        $booking->car_id = $params->car_id;
        $booking->reserved_at = Carbon::now();
        $booking->save();

        return $booking;
    }

    /**
     * @param Booking $booking
     * @return Booking|null
     */
    public function deleteBooking(Booking $booking): ?Booking
    {
        $booking->deleted_at = Carbon::now();
        $booking->save();

        return $booking;
    }
}

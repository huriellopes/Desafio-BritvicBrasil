<?php

namespace App\Architecture\Bookings\Services;

use App\Architecture\Bookings\Events\ReservedEvent;
use App\Architecture\Bookings\Interfaces\IBookingsRepository;
use App\Architecture\Bookings\Interfaces\IBookingsService;
use App\Architecture\Bookings\Models\Booking;
use App\Architecture\Bookings\Validates\BookingsValidate;
use Illuminate\Database\Eloquent\Collection;
use App\Exceptions\SystemException;
use stdClass;
use Throwable;

class BookingsService implements IBookingsService
{
    /**
     * @var IBookingsRepository
     * @var BookingsValidate
     */
    protected $IBookingsRepository;
    protected $BookingsValidate;

    /**
     * BookingsService constructor.
     * @param IBookingsRepository $IBookingsRepository
     * @param BookingsValidate $BookingsValidate
     */
    public function __construct(IBookingsRepository $IBookingsRepository,
                                BookingsValidate $BookingsValidate)
    {
        $this->IBookingsRepository = $IBookingsRepository;
        $this->BookingsValidate = $BookingsValidate;
    }

    /**
     * @return Collection
     */
    public function listBookings(): Collection
    {
        return $this->IBookingsRepository->listBookings();
    }

    /**
     * @param int $id
     * @return Booking
     * @throws SystemException
     */
    public function findBooking(int $id): Booking
    {
        $this->getBookingsValidate()->validateInt($id);
        return $this->IBookingsRepository->findBooking($id);
    }

    /**
     * @param stdClass $params
     * @return Booking
     * @throws Throwable
     */
    public function storeBookings(stdClass $params): Booking
    {
        $this->getBookingsValidate()->validaParametros($params);

        event(new ReservedEvent($params));

        return $this->IBookingsRepository->storeBookings($params);
    }

    /**
     * @param Booking $booking
     * @return Booking|null
     */
    public function deleteBooking(Booking $booking): ?Booking
    {
        return $this->IBookingsRepository->deleteBooking($booking);
    }

    /**
     * @return BookingsValidate
     */
    private function getBookingsValidate() : BookingsValidate
    {
        return $this->BookingsValidate;
    }
}

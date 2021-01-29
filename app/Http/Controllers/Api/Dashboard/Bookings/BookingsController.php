<?php

namespace App\Http\Controllers\Api\Dashboard\Bookings;

use App\Architecture\Bookings\Enum\BookingsEnum;
use App\Architecture\Bookings\Interfaces\IBookingsService;
use App\Architecture\Bookings\Models\Booking;
use App\Architecture\Cars\Interfaces\ICarsService;
use App\Architecture\Clients\Interfaces\IClientsService;
use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bookings\BookingsRequest;
use App\Http\Resources\Bookings\BookingsResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use stdClass;
use Exception;
use Throwable;

class BookingsController extends Controller
{
    /**
     * BookingsController constructor.
     * @param IBookingsService $IBookingService
     * @param ICarsService $ICarsService
     * @param IClientsService $IClientsService
     */
    public function __construct(IBookingsService $IBookingService,
                                ICarsService $ICarsService,
                                IClientsService $IClientsService)
    {
        parent::__construct($IBookingService, $ICarsService, $IClientsService);
        $this->middleware('auth.basic');
    }

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $bookings = $this->IBookingService->listBookings();

        return response()->json(new BookingsResourceCollection($bookings), StatusEnum::OK);
    }

    /**
     * @param BookingsRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(BookingsRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
                $params = new stdClass();
                $params->client_id = $this->limpa_tags($request->input('client_id'));
                $params->car_id = $this->limpa_tags($request->input('car_id'));

                $this->IBookingService->storeBookings($params);
            DB::commit();

            return $this->returnResponse(BookingsEnum::CREATED, StatusEnum::CREATED);
        } catch (Exception $err) {
            DB::rollBack();
            $this->shootExeception($err, BookingsEnum::NOT_CREATED);
        }
    }

    /**
     * @param Booking $booking
     * @return JsonResponse
     * @throws Throwable
     */
    public function delete(Booking $booking) : JsonResponse
    {
        try {
            DB::beginTransaction();
                $this->IBookingService->deleteBooking($booking);
            DB::commit();

            return $this->returnResponse(BookingsEnum::DELETE, StatusEnum::OK);
        } catch (Exception $err) {
            DB::rollBack();
            $this->shootExeception($err, BookingsEnum::NOT_DELETED);
        }
    }
}

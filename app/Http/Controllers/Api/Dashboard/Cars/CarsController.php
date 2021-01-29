<?php

namespace App\Http\Controllers\Api\Dashboard\Cars;

use App\Architecture\Bookings\Interfaces\IBookingsService;
use App\Architecture\Cars\Enum\CarsEnum;
use App\Architecture\Cars\Interfaces\ICarsService;
use App\Architecture\Cars\Models\Car;
use App\Architecture\Clients\Interfaces\IClientsService;
use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cars\CarsRequest;
use App\Http\Resources\Cars\CarsResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use stdClass;
use Exception;
use Throwable;

class CarsController extends Controller
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
        $clients = $this->ICarsService->listCars();

        return response()->json(new CarsResourceCollection($clients), StatusEnum::OK);
    }

    /**
     * @param CarsRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(CarsRequest $request) : JsonResponse
    {
        try {
            DB::beginTransaction();
                $params = new stdClass();
                $params->car_model = $this->limpa_tags($request->input('car_model'));
                $params->year = $this->limpa_tags($request->input('year'));
                $params->vehicle_plate = $this->limpa_tags($request->input('vehicle_plate'));

                $this->ICarsService->storeCars($params);
            DB::commit();
            return $this->returnResponse(CarsEnum::CREATED, StatusEnum::CREATED);
        } catch (Exception $err) {
            DB::rollBack();
            $this->shootExeception($err, CarsEnum::NOT_CREATED);
        }
    }

    /**
     * @param Car $car
     * @param CarsRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function update(Car $car, CarsRequest $request) : JsonResponse
    {
        try {
            DB::beginTransaction();
                $params = new stdClass();
                $params->car_model = $this->limpa_tags($request->input('car_model'));
                $params->year = $this->limpa_tags($request->input('year'));
                $params->vehicle_plate = $this->limpa_tags($request->input('vehicle_plate'));

                $this->ICarsService->updateCars($car, $params);
            DB::commit();

            return $this->returnResponse(CarsEnum::UPDATED, StatusEnum::OK);
        } catch (Exception $err) {
            DB::rollBack();
            $this->shootExeception($err, CarsEnum::NOT_UPDATED);
        }
    }

    /**
     * @param Car $car
     * @return JsonResponse
     * @throws Throwable
     */
    public function delete(Car $car) : JsonResponse
    {
        try {
            DB::beginTransaction();
                $this->ICarsService->deleteCars($car);
            DB::commit();
            return $this->returnResponse(CarsEnum::DELETE, StatusEnum::OK);
        } catch (Exception $err) {
            DB::rollBack();
            $this->shootExeception($err, CarsEnum::NOT_DELETED);
        }
    }
}

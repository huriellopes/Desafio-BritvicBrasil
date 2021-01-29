<?php

namespace App\Architecture\Cars\Repositories;

use App\Architecture\Cars\Interfaces\ICarsRepository;
use App\Architecture\Cars\Models\Car;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use stdClass;

class CarsRepository implements ICarsRepository
{
    /**
     * @return Collection
     */
    public function listCars(): Collection
    {
        return Car::whereNull('deleted_at')->get();
    }

    /**
     * @param stdClass $params
     * @return Car
     */
    public function storeCars(stdClass $params): Car
    {
        $car = new Car();
        $car->car_model = $params->car_model;
        $car->vehicle_plate = $params->vehicle_plate;
        $car->user_id = Auth::user()->id;
        $car->save();

        return $car;
    }

    /**
     * @param Car $car
     * @param stdClass $params
     * @return Car|null
     */
    public function updateCars(Car $car, stdClass $params): ?Car
    {
        $car->car_model = $params->car_model;
        $car->vehicle_plate = $params->vehicle_plate;
        $car->save();

        return $car;
    }

    /**
     * @param Car $car
     * @return Car|null
     */
    public function deleteCars(Car $car): ?Car
    {
        $car->deleted_at = Carbon::now();

        $car->save();

        return $car;
    }
}

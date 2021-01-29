<?php

namespace App\Architecture\Cars\Interfaces;

use App\Architecture\Cars\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface ICarsRepository
{
    /**
     * @return Collection
     */
    public function listCars() : Collection;

    /**
     * @param stdClass $params
     * @return Car
     */
    public function storeCars(stdClass $params) : Car;

    /**
     * @param Car $car
     * @param stdClass $params
     * @return Car|null
     */
    public function updateCars(Car $car, stdClass $params) : ?Car;

    /**
     * @param Car $car
     * @return Car|null
     */
    public function deleteCars(Car $car) : ?Car;
}

<?php

namespace App\Architecture\Cars\Services;

use App\Architecture\Cars\Interfaces\ICarsRepository;
use App\Architecture\Cars\Interfaces\ICarsService;
use App\Architecture\Cars\Models\Car;
use App\Architecture\Cars\Validates\CarsValidate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use App\Exceptions\SystemException;
use Throwable;

class CarsService implements ICarsService
{
    /**
     * @var ICarsRepository
     * @var CarsValidate
     */
    protected $ICarsRepository;
    protected $CarsValidate;

    /**
     * CarsService constructor.
     * @param ICarsRepository $ICarsRepository
     * @param CarsValidate $CarsValidate
     */
    public function __construct(ICarsRepository $ICarsRepository,
                                CarsValidate $CarsValidate)
    {
        $this->ICarsRepository = $ICarsRepository;
        $this->CarsValidate = $CarsValidate;
    }

    /**
     * @return Collection
     */
    public function listCars(): Collection
    {
        return $this->ICarsRepository->listCars();
    }

    /**
     * @param stdClass $params
     * @return Car
     * @throws Throwable
     */
    public function storeCars(stdClass $params): Car
    {
        $this->getCarsValidate()->validaParametros($params);
        return $this->ICarsRepository->storeCars($params);
    }

    /**
     * @param Car $car
     * @param stdClass $params
     * @return Car|null
     * @throws Throwable
     */
    public function updateCars(Car $car, stdClass $params): ?Car
    {
        $this->getCarsValidate()->validaParametros($params);
        return $this->ICarsRepository->updateCars($car, $params);
    }

    /**
     * @param Car $car
     * @return Car|null
     * @throws SystemException
     */
    public function deleteCars(Car $car): ?Car
    {
        $this->getCarsValidate()->validateInt($car->id);
        return $this->ICarsRepository->deleteCars($car);
    }

    /**
     * @return CarsValidate
     */
    private function getCarsValidate() : CarsValidate
    {
        return $this->CarsValidate;
    }
}

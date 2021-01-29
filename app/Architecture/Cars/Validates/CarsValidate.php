<?php

namespace App\Architecture\Cars\Validates;

use App\Architecture\Validate;

class CarsValidate extends Validate
{
    protected $rules = [
        'car_model' => 'required|string|max:200',
        'year' => 'required|string|max:4',
        'vehicle_plate' => 'required|string|max:10'
    ];
}

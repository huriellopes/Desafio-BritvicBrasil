<?php

namespace App\Architecture\Bookings\Validates;

use App\Architecture\Validate;

class BookingsValidate extends Validate
{
    protected $rules = [
        'client_id' => 'required',
        'car_id' => 'required',
    ];
}

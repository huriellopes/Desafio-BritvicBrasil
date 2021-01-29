<?php

namespace App\Architecture\Clients\Validates;

use App\Architecture\Validate;

class ClientsValidate extends Validate
{
    protected $rules = [
        'name' => 'required|string|max:200',
        'cpf' => 'required|string|max:11'
    ];
}

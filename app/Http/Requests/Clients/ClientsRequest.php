<?php

namespace App\Http\Requests\Clients;

use App\Architecture\Clients\Validates\ClientsValidate;
use Illuminate\Foundation\Http\FormRequest;

class ClientsRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return (new ClientsValidate())->getRules();
    }
}

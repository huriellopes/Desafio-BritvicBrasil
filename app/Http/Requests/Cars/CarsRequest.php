<?php

namespace App\Http\Requests\Cars;

use App\Architecture\Cars\Validates\CarsValidate;
use Illuminate\Foundation\Http\FormRequest;

class CarsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
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
        return (new CarsValidate())->getRules();
    }
}

<?php

namespace App\Http\Requests\Bookings;

use App\Architecture\Bookings\Validates\BookingsValidate;
use Illuminate\Foundation\Http\FormRequest;

class BookingsRequest extends FormRequest
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
        return (new BookingsValidate())->getRules();
    }
}

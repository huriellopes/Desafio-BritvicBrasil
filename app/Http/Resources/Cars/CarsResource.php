<?php

namespace App\Http\Resources\Cars;

use Illuminate\Http\Resources\Json\JsonResource;

class CarsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'car_model' => $this->car_model,
            'year' => $this->year,
            'vehicle_plate' => $this->vehicle_plate,
            'created_at' => $this->created_at,
        ];
    }
}

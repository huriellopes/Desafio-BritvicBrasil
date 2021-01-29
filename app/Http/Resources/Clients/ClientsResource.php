<?php

namespace App\Http\Resources\Clients;

use App\Traits\Utils;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientsResource extends JsonResource
{
    use Utils;

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
            'name' => $this->name,
            'cpf' => $this->pontuacao_cpf_cnpj($this->cpf),
            'created_at' => $this->created_at,
        ];
    }
}

<?php

namespace App\Architecture\Clients\Repositories;

use App\Architecture\Clients\Interfaces\IClientsRepository;
use App\Architecture\Clients\Models\Client;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ClientsRepository implements IClientsRepository
{
    /**
     * @return Collection
     */
    public function listClients(): Collection
    {
        return Client::whereNull('deleted_at')->get();
    }

    /**
     * @param stdClass $params
     * @return Client
     */
    public function storeClients(stdClass $params): Client
    {
        $client = new Client();
        $client->name = $params->name;
        $client->cpf = $params->cpf;
        $client->user_id = Auth::user()->id;
        $client->save();

        return $client;
    }

    /**
     * @param Client $client
     * @param stdClass $params
     * @return Client|null
     */
    public function updateClients(Client $client, stdClass $params): ?Client
    {
        $client->name = $params->name;
        $client->cpf = $params->cpf;
        $client->updated_at = Carbon::now();
        $client->save();

        return $client;
    }

    /**
     * @param Client $client
     * @return Client|null
     */
    public function deleteClients(Client $client): ?Client
    {
        $client->deleted_at = Carbon::now();
        $client->save();

        return $client;
    }
}

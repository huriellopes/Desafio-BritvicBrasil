<?php

namespace App\Architecture\Clients\Interfaces;

use App\Architecture\Clients\Models\Client;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface IClientsService
{
    /**
     * @return Collection
     */
    public function listClients() : Collection;

    /**
     * @param stdClass $params
     * @return Client
     */
    public function storeClients(stdClass $params) : Client;

    /**
     * @param Client $client
     * @param stdClass $params
     * @return Client|null
     */
    public function updateClients(Client $client, stdClass $params) : ?Client;

    /**
     * @param Client $client
     * @return Client|null
     */
    public function deleteClients(Client $client) : ?Client;
}

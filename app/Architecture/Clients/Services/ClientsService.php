<?php

namespace App\Architecture\Clients\Services;

use App\Architecture\Clients\Interfaces\IClientsRepository;
use App\Architecture\Clients\Interfaces\IClientsService;
use App\Architecture\Clients\Models\Client;
use App\Architecture\Clients\Validates\ClientsValidate;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use App\Exceptions\SystemException;
use Throwable;

class ClientsService implements IClientsService
{
    /**
     * @var IClientsRepository
     * @var ClientsValidate
     */
    protected $IClientsRepository;
    protected $ClientsValidate;

    /**
     * ClientsService constructor.
     * @param IClientsRepository $IClientsRepository
     * @param ClientsValidate $ClientsValidate
     */
    public function __construct(IClientsRepository $IClientsRepository,
                                ClientsValidate $ClientsValidate)
    {
        $this->IClientsRepository = $IClientsRepository;
        $this->ClientsValidate = $ClientsValidate;
    }

    /**
     * @return Collection
     */
    public function listClients(): Collection
    {
        return $this->IClientsRepository->listClients();
    }

    /**
     * @param stdClass $params
     * @return Client
     * @throws Throwable
     */
    public function storeClients(stdClass $params): Client
    {
        $this->getClientsValidate()->validaParametros($params);
        return $this->IClientsRepository->storeClients($params);
    }

    /**
     * @param Client $client
     * @param stdClass $params
     * @return Client|null
     * @throws Throwable
     */
    public function updateClients(Client $client, stdClass $params): ?Client
    {
        $this->getClientsValidate()->validaParametros($params);
        return $this->IClientsRepository->updateClients($client, $params);
    }

    /**
     * @param Client $client
     * @return Client|null
     * @throws SystemException
     */
    public function deleteClients(Client $client): ?Client
    {
        $this->getClientsValidate()->validateInt($client->id);
        return $this->IClientsRepository->deleteClients($client);
    }

    /**
     * @return ClientsValidate
     */
    private function getClientsValidate() : ClientsValidate
    {
        return $this->ClientsValidate;
    }
}

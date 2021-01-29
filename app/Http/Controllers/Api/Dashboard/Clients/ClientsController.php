<?php

namespace App\Http\Controllers\Api\Dashboard\Clients;

use App\Architecture\Bookings\Interfaces\IBookingsService;
use App\Architecture\Cars\Interfaces\ICarsService;
use App\Architecture\Clients\Enum\ClientsEnum;
use App\Architecture\Clients\Interfaces\IClientsService;
use App\Architecture\Clients\Models\Client;
use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\ClientsRequest;
use App\Http\Resources\Clients\ClientsResourceCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Exception;
use stdClass;
use Throwable;

class ClientsController extends Controller
{
    /**
     * BookingsController constructor.
     * @param IBookingsService $IBookingService
     * @param ICarsService $ICarsService
     * @param IClientsService $IClientsService
     */
    public function __construct(IBookingsService $IBookingService,
                                ICarsService $ICarsService,
                                IClientsService $IClientsService)
    {
        parent::__construct($IBookingService, $ICarsService, $IClientsService);
        $this->middleware('auth.basic');
    }

    /**
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $clients = $this->IClientsService->listClients();

        return response()->json(new ClientsResourceCollection($clients), StatusEnum::OK);
    }

    /**
     * @param ClientsRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(ClientsRequest $request) : JsonResponse
    {
        try {
            DB::beginTransaction();
                $params = new stdClass();
                $params->name = $this->limpa_tags($request->input('name'));
                $params->email = $this->limpa_tags($this->limpar_mascara($request->input('cpf')));

                $this->IClientsService->storeClients($params);
            DB::commit();

            return $this->returnResponse(ClientsEnum::CREATED, StatusEnum::CREATED);
        } catch (Exception $err) {
            DB::rollBack();
            $this->shootExeception($err, ClientsEnum::NOT_CREATED);
        }
    }

    /**
     * @param Client $client
     * @param ClientsRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function update(Client $client, ClientsRequest $request) : JsonResponse
    {
        try {
            DB::beginTransaction();
                $params = new stdClass();
                $params->name = $this->limpa_tags($request->input('name'));
                $params->email = $this->limpa_tags($this->limpar_mascara($request->input('cpf')));

                $this->IClientsService->updateClients($client, $params);
            DB::commit();

            return $this->returnResponse(ClientsEnum::UPDATED, StatusEnum::OK);
        } catch (Exception $err) {
            DB::rollBack();
            $this->shootExeception($err, ClientsEnum::NOT_UPDATED);
        }
    }

    /**
     * @param Client $client
     * @return JsonResponse
     * @throws Throwable
     */
    public function delete(Client $client) : JsonResponse
    {
        try {
            DB::beginTransaction();
                $this->IClientsService->deleteClients($client);
            DB::commit();
        } catch (Exception $err) {
            DB::rollBack();
            $this->shootExeception($err, ClientsEnum::NOT_DELETED);
        }
    }
}

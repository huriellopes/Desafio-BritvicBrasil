<?php

namespace App\Http\Controllers\Web\Dashboard\Clients;

use App\Architecture\Bookings\Interfaces\IBookingsService;
use App\Architecture\Cars\Interfaces\ICarsService;
use App\Architecture\Clients\Interfaces\IClientsService;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class ClientsController extends Controller
{
    /**
     * ClientsController constructor.
     * @param IBookingsService $IBookingService
     * @param ICarsService $ICarsService
     * @param IClientsService $IClientsService
     */
    public function __construct(IBookingsService $IBookingService,
                                ICarsService $ICarsService,
                                IClientsService $IClientsService)
    {
        parent::__construct($IBookingService, $ICarsService, $IClientsService);
        $this->middleware('auth:sanctum');
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Clients.index');
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Clients.index');
    }

    /**
     * @return Response
     */
    public function show(): Response
    {
        return Inertia::render('Clients.index');
    }
}

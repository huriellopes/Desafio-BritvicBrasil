<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Architecture\Bookings\Interfaces\IBookingsService;
use App\Architecture\Cars\Interfaces\ICarsService;
use App\Architecture\Clients\Interfaces\IClientsService;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    private $viewPath = '';

    /**
     * DashboardController constructor.
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

    public function index()
    {
        return view($this->viewPath);
    }
}

<?php

namespace App\Http\Controllers;

use App\Architecture\Bookings\Interfaces\IBookingsService;
use App\Architecture\Cars\Interfaces\ICarsService;
use App\Architecture\Clients\Interfaces\IClientsService;
use App\Traits\Requests;
use App\Traits\Utils;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Utils, Requests;

    /**
     * @var IBookingsService
     * @var ICarsService
     * @var IClientsService
     */
    protected $IBookingService;
    protected $ICarsService;
    protected $IClientsService;

    /**
     * BaseController constructor.
     * @param IBookingsService $IBookingService
     * @param ICarsService $ICarsService
     * @param IClientsService $IClientsService
     */
    public function __construct(IBookingsService $IBookingService,
                                ICarsService $ICarsService,
                                IClientsService $IClientsService)
    {
        $this->IBookingService = $IBookingService;
        $this->ICarsService = $ICarsService;
        $this->IClientsService = $IClientsService;
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Traits\Utils;
use App\Traits\Requests;

class BaseController extends Controller
{
    use Utils;
    use Requests;

    public function __construct()
    {
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Assign the request to a global that we can access
     * all the time
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {

    }

}

<?php

namespace ThreeOh\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    protected $request;
    protected $auth;

    public function __construct(Request $request, Guard $auth)
    {
        $this->request = $request;
        $this->auth    = $auth;
    }
}

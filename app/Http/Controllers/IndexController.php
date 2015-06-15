<?php

namespace ThreeOh\Http\Controllers;

use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Display the homepage
     *
     * @return View
     */
    public function index()
    {
        return view('index');
    }
}

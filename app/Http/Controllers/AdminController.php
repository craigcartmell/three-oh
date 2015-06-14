<?php

namespace ThreeOh\Http\Controllers;

use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('admin/index');
    }
}

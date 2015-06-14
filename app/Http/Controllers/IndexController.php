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

    /**
     * Display the about page
     *
     * @return View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the contact page
     *
     * @return View
     */
    public function contact()
    {
        return view('contact');
    }
}

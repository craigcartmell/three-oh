<?php

namespace ThreeOh\Http\Controllers;

use Illuminate\View\View;
use ThreeOh\Article;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $articles = Article::all();

        return view('admin/index', ['articles' => $articles]);
    }
}

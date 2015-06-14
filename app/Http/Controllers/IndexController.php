<?php

namespace ThreeOh\Http\Controllers;

use Illuminate\View\View;
use ThreeOh\Article;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $articles = Article::query()->where('is_published', true)->get();

        return view('index', ['articles' => $articles]);
    }
}

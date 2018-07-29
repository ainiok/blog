<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $article;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ArticleRepository $article)
    {
        $this->article = $article;
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }
}

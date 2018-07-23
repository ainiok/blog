<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $article;

    public function __construct(ArticleRepository $article)
    {
        $this->article = $article;
    }

    public function index()
    {
        $articles = $this->article->page(config('blog.article.number'), config('blog.article.sortColumn'), config('blog.article.sort'));
        return view('article.index', compact('articles'));
    }
}

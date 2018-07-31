<?php

namespace App\Http\Controllers\Api;

use App\Repositories\ArticleRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $user;
    protected $article;
    protected $comment;

    //
    public function __construct(
        UserRepository $user,
        ArticleRepository $article
    )
    {
        $this->user = $user;
        $this->article = $article;
    }

    public function statistics()
    {
        return 111;
    }
}

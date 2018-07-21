<?php
/**
 * Created by PhpStorm.
 * User: xiaojin
 * Email: job@ainiok.com
 * Date: 2018/7/21 23:09
 */
namespace App\Repositories;

use App\BaseRepositories\BaseRepository;
use App\Models\Article;

class ArticleRepository extends BaseRepository
{
    protected $model;

    public function __construct(Article $article)
    {
        $this->model = $article;
    }
}
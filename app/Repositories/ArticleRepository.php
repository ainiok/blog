<?php
/**
 * Created by PhpStorm.
 * User: xiaojin
 * Email: job@ainiok.com
 * Date: 2018/7/21 23:09
 */

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository extends BaseRepository
{
    protected $model;

    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    public function page($perPage = '15', $sortColumn = 'created_at', $sortOrder = 'desc')
    {
        return $this->model->orderBy($sortColumn, $sortOrder)->paginate($perPage);
    }


    /**
     * Sync the tags for the article.
     *
     * @param  int $number
     * @return Paginate
     */
    public function syncTag(array $tags)
    {
        $this->model->tags()->sync($tags);
    }
}
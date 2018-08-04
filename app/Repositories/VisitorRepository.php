<?php

namespace App\Repositories;

use App\Tools\IP;
use App\Models\Visitor;

class VisitorRepository
{
    use BaseRepository;

    /**
     * @var $model
     */
    protected $model;

    /**
     * @var IP
     */
    protected $ip;

    /**
     * VisitorRepository constructor.
     * @param Visitor $visitor
     * @param IP $ip
     */
    public function __construct(Visitor $visitor, IP $ip)
    {
        $this->model = $visitor->with('article');

        $this->ip = $ip;
    }

    /**
     * Update or create the record of visitors table
     *
     * @param $article_id
     */
    public function log($article_id)
    {
        $ip = $this->ip->get();

        if ($this->hasArticleIp($article_id, $ip)) {

            $this->model->where('article_id', $article_id)
                        ->where('ip', $ip)
                        ->increment('clicks');

        } else {
            $data = [
                'ip'		    => $ip,
                'article_id'    => $article_id,
                'clicks' 	    => 1
            ];
            $this->model->firstOrCreate( $data );
        }
    }

    /**
     * Check the record by article id and ip if it exists.
     *
     * @param $article_id
     * @param $ip
     * @return bool
     */
    public function hasArticleIp($article_id, $ip)
    {
        return $this->model
                    ->where('article_id', $article_id)
                    ->where('ip', $ip)
                    ->count() ? true : false;
    }

    /**
     * Get all the clicks.
     * 
     * @return int
     */
    public function getAllClicks()
    {
        return $this->model->sum('clicks');
    }

}

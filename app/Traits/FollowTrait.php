<?php
/**
 * Created by PhpStorm.
 * User: xiaojin
 * Email: job@ainiok.com
 * Date: 2018/7/29 19:32
 */

namespace App\Traits;

trait FollowTrait
{

    public function followings()
    {
        return $this->belongsToMany(__CLASS__, 'followers', 'user_id', 'follow_id')->withTimestamps();
    }
}
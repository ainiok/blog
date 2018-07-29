<?php
/**
 * Created by PhpStorm.
 * User: xiaojin
 * Email: job@ainiok.com
 * Date: 2018/7/29 18:25
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class DraftScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        return $builder->where('is_draft', 0);
    }
}
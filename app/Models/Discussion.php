<?php

namespace App\Models;

use App\Scopes\StatusScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discussion extends Model
{
    use SoftDeletes;
    //

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'last_user_id',
        'title',
        'content',
        'status'
    ];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new StatusScope());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }
}

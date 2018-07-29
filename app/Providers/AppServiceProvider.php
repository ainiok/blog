<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Discussion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $lang = config('app.locale') !== 'cn' ? config('app.locale') : 'zh';
        Carbon::setLocale($lang);
        // 自定义多态类型
        Relation::morphMap([
            'discussions' => Discussion::class,
            'articles' => Article::class
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

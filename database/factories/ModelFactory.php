<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->safeEmail,
        'status'         => true,
        'confirm_code'   => str_random(64),
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\Models\User::class, 'admin', function () use ($factory) {
    $user = $factory->raw(App\Models\User::class);

    return array_merge($user, ['is_admin' => 1, 'password' => bcrypt('admin')]);
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name'      => $faker->name,
        'parent_id' => 0,
        'path'      => $faker->url
    ];
});

$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
    $user_ids = \App\Models\User::pluck('id')->random();
    $category_ids = \App\Models\Category::pluck('id')->random();
    $title = $faker->sentence(mt_rand(3,10));
    return [
        'user_id'      => $user_ids,
        'category_id'  => $category_ids,
        'last_user_id' => $user_ids,
        'slug'     => str_slug($title),
        'title'    => $title,
        'subtitle' => strtolower($title),
        'content'  => $faker->paragraph,
        'page_image'       => $faker->imageUrl(),
        'meta_description' => $faker->sentence,
        'is_draft'         => false,
        'published_at'     => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now')
    ];
});

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'tag'              => $faker->word,
        'title'            => $faker->sentence,
        'meta_description' => $faker->sentence,
    ];
});

$factory->define(App\Models\Discussion::class, function (Faker\Generator $faker) {
    $user_ids = \App\Models\User::pluck('id')->random();
    return [
        'user_id'      => $user_ids,
        'last_user_id' => $user_ids,
        'title'        => $faker->sentence,
        'content'      => $faker->paragraph,
        'status'       => true,
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    $user_ids = \App\Models\User::pluck('id')->random();
    $discussion_ids = \App\Models\Discussion::pluck('id')->random();
    $type = ['discussions', 'articles'];
    return [
        'user_id'             => $user_ids,
        'commentable_type'    => $type[mt_rand(0, 1)],
        'commentable_id'      => $discussion_ids,
        'content'             => $faker->paragraph
    ];
});

$factory->define(App\Models\Link::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->name,
        'link'  => $faker->url,
        'image' => $faker->imageUrl()
    ];
});

$factory->define(App\Models\Visitor::class, function (Faker\Generator $faker) {
    $article_id = \App\Models\Article::pluck('id')->random();
    $num = $faker->numberBetween(1, 100);

    $article = App\Models\Article::find($article_id);
    $article->view_count = $num;
    $article->save();

    return [
        'article_id' => $article_id,
        'ip'         => $faker->ipv4,
        'country'    => 'CN',
        'clicks'     => $num
    ];
});

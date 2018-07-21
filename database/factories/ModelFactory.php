<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->define(\App\Models\User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'status' => true,
        'confirm_code' => str_random(64)
    ];
});


$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'parent_id' => 0,
        'path' => $faker->url
    ];
});

$factory->define(\App\Models\Article::class, function (Faker $faker) {
    $user_ids = \App\Models\User::pluck('id')->random();
    $category_ids = \App\Models\Category::pluck('id')->random();
    $title = $faker->sentence(mt_rand(3, 10));
    return [
        'user_id' => $user_ids,
        'category_id' => $category_ids,
        'last_user_id' => $user_ids,
        'slug' => str_slug($title),
        'title' => $title,
        'subtitle' => strtolower($title),
        'content' => $faker->paragraph,
        'page_image' => $faker->imageUrl(),
        'meta_description' => $faker->sentence,
        'is_draft' => false,
        'published_at' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now')
    ];
});

$factory->define(\App\Models\Tag::class, function (Faker $faker) {
    return [
        'tag' => $faker->word,
        'title' => $faker->sentence,
        'meta_description' => $faker->sentence,
    ];
});

$factory->define(\App\Models\Comment::class, function (Faker $faker) {
});


$factory->define(\App\Models\Link::class, function (Faker $faker) {
    return [
        'name'  => $faker->name,
        'link'  => $faker->url,
        'image' => $faker->imageUrl()
    ];
});
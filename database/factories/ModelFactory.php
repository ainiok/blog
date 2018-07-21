<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'name'      => $faker->name,
        'parent_id' => 0,
        'path'      => $faker->url
    ];
});

$factory->define(\App\Models\Article::class, function (Faker $faker) {
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


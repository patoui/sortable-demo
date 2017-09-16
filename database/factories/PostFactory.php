<?php

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'views' => mt_rand(0, 1000),
        'published_at' => $faker->dateTime(),
    ];
});

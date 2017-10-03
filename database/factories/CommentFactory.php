<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => function() { return factory(App\User::class)->create()->id; },
        'blog_id' => function() { return factory(App\Blog::class)->create()->id; },
        'body'  => $faker->sentence,
    ];
});

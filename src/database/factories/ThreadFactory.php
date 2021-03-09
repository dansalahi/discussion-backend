<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thread;
use Faker\Generator as Faker;

$factory->define(Thread::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
        'title' => $title,
        'slug' => \Illuminate\Support\Str::slug($title),
        'content' => $faker->realText(),
        'user_id' => factory(\App\User::class)->create()->id,
        'channel_id' => factory(\App\Channel::class)->create()->id
    ];
});

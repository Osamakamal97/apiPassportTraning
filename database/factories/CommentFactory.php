<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text(50),
        'user_id' => function () {
            return \App\User::randomId();
        }
        , 'post_id' => function () {
            return \App\Post::all()->pluck('id')->random();
        }
    ];
});

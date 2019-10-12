<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->text(20),
        'content'=>$faker->text(100),
        'user_id'=>function(){
                return \App\User::randomId();
        }
    ];
});

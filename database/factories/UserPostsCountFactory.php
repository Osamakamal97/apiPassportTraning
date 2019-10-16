<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\UserPostCount::class, function (Faker $faker) {
    $user_id = 0;
    return [
        'user_id' => function () {
            $this->user_id = \App\User::randomId();
        },
//        'post_max' => $faker->numberBetween(0, 10),
        'post_max' => function () {
        dd('dd');
        $post_max = \App\Post::where('user_id', $this->user_id)->get('post_max');
        dd($post_max);
            \App\UserPostCount::where('user_id', $this->user_id)->update(['post_max',]);
        }

    ];
});

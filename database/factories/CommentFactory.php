<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content'=> $faker->paragraphs(rand(1,3), true),
        'votes_count'=>rand(0,25),
        'user_id'=>App\User::pluck('id')->random(),
    ];
});

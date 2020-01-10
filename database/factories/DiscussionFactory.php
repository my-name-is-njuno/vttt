<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Discussion;
use Faker\Generator as Faker;

$factory->define(Discussion::class, function (Faker $faker) {
    return [
        'title'=>rtrim($faker->sentence(rand(5,10)),'.'),
        'content'=>$faker->paragraphs(rand(10,16), true),  
        'views'=>rand(0,400),  
        'comments'=>rand(0,20), 
        'votes'=>rand(-10,10)
    ];
});

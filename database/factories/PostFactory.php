<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id'=> $faker->numberBetween($min = 1, $max = 20),
        'message'  =>  $faker->paragraph,
});

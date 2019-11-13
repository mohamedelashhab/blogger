<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $im = $faker->image(public_path('uploads/images/'),100,50);
    $str_arr =  explode ("/", $im);
    $img = str_replace(['\\'], '', $str_arr[2]);
    
    return [
        'title'  => $faker->name,
        'image' => $img,
        'description' => $faker->paragraph,
    ];
});

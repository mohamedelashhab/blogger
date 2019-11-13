<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'title'  => $faker->name,
        'description' => $faker->paragraph,
        'slug' => $faker->slug
    ];
});

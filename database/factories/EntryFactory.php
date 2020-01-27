<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entry;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Entry::class, function (Faker $faker) {
    return [
        'title' => $faker->text(20),
        'content' => $faker->paragraphs(8, true),
        'created_at' => now(),
        'updated_at' => now()
    ];
});

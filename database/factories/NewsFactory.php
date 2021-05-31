<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

//часть функционала - из NewsSeeder
$factory->define(News::class, function (Faker $faker) {

    //$faker = Faker\Factory::create('ru_Ru');
    return [
            'title' => $faker->realText(rand(10, 20)),
            'text' => $faker->realText(rand(1000, 3000)),
            'isPrivate' => (bool)rand(0, 1)
    ];
});

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $title = $faker->realText(rand(10, 40));
        $short_title = Str::length($title)>30 ? mb_substr($title, 0, 30): $title;
        $created = $faker->dateTimeBetween('-30 days', '-1 days');

        return [
            'title' => $title,
            'short_title' => $short_title,
            'author_id' => rand(1, 4),
            'descr' => $faker->realText(rand(100, 200)),
            'created_at' => $created,
            'updated_at' => $created,
        ];
    }
}

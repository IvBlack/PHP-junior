<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('news')->insert($this->getData());
        factory(News::class, 5)->create();
    }

    /*public function getData(): array {

        $data = [];
        $faker = Faker\Factory::create('ru_Ru');

        for($i = 0; $i < 5; $i++)
        {
            $data[] =
        [
            'title' => $faker->realText(rand(10, 20)),
            'text' => $faker->realText(rand(1000, 3000)),
            'isPrivate' => (bool)rand(0, 1)
        ];
        }
        return $data;
    }*/
}

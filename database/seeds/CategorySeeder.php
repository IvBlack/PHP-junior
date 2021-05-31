<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'Спорт',
                'slug' => 'sport'
            ],

            [
                'name' => 'Политика',
                'slug' => 'politics'
            ]
        ];

        //в таблицу посеем эти данные через insert
        DB::table('categories')->insert($category);
    }
}

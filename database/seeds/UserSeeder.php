<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //добавим админа
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now()

        ]);


    //добавим несколько юзеров
    factory(User::class, 3)->create();
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //создание правил валидации данных при загрузке приложения
        \Validator::extend('jedi', function($attribute, $value, $parameters, $validator) {
            //dd($attribute, $value, $parameters, $validator);
            return false;
        });

        //при загрузке приложения метод криэйтит локализацию ru_Ru по умолчанию
        $this->app->singleton(\Faker\Generator::class, function() {
            return \Faker\Factory::create('ru_Ru');
        });
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index')->name('Home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'is_admin', 'auth'], function() {
    \Unisharp\LaravelFilemanager\Lfm::routes();
}]);

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function () {
    //отрисовывает всех юзеров
    Route::get('/users', 'UsersController@index')->name('updateUser');
    Route::get('users/toggleAdmin/{user}', 'UsersController@toggleAdmin')->name('toggleAdmin');
    //регистрация маршрута для парсера orchestral
    Route::get('/parser', 'ParserController@index')->name('parser');
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');

    /*//операция работы с новостями CRUD NEWS
    //в соответствии с соглашением об именовании в laravel
    Route::get('/news/', 'NewsController@index')->name('news.index');
    Route::get('/news/create', 'NewsController@create')->name('news.create');
    Route::post( '/news/', 'NewsController@store')->name('news.store');
    Route::get('/news//edit/{news}', 'NewsController@edit')->name('news.edit');
    Route::put('/news/update/{news}', 'NewsController@update')->name('news.update');
    Route::get('/news/destroy/{news}', 'NewsController@destroy')->name('news.destroy');*/

    Route::resource('/news', 'NewsController')->except(['show']);
});

Route::match(['post', 'get'], '/profile', 'ProfileController@update')->name('updateProfile');

//routes for work with vkAPI
Route::get('/auth/vk', 'LogSocController@loginVK')->name('vklogin');
Route::get('/auth/vk/response', 'LogSocController@responseVK')->name('vkResponse');


//wrapped news and categories
Route::group([
    'prefix' => 'news',
    'as' => 'news.'
], function () {
    Route::get('/', 'NewsController@index')->name('index');
    Route::get('/one/{news}', 'NewsController@show')->name('show');

    Route::group([
        'as' => 'category.'
    ], function () {
Route::get('/categories', 'CategoryController@index')->name('index');
Route::get('/category/{name}', 'CategoryController@show')->name('show');
    });
});

Route::view('/vue', 'vue')->name('vue');

/*Route::get('/about', function () {
    return view('about');
});*/

Auth::routes();
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');

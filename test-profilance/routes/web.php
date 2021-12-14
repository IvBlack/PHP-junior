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

Route::get('/', function () {
    return view('welcome');
});

//Route::match(['get', 'post'], '/cut-the-url', 'CutUrlController@index);
Route::get('cut-the-url', 'CutUrlController@index')->name('index');
Route::post('cut-the-url', 'CutUrlController@store')->name('abbreviated.link.post');

Route::get('{solt}', 'CutUrlController@shortenLink')->name('shorten.link');

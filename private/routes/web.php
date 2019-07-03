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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/user')->group(function () {
    Route::get('/home', 'UserController@index')->name('home');
    Route::get('/add', 'UserController@create')->name('add');
    Route::post('/add/user', 'UserController@store')->name('user.add');
    Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::put('/edit/{id}', 'UserController@update')->name('user.update');
    Route::get('/detail/{id}', 'UserController@show')->name('user.detail');
    Route::get('/home/delete/{id}', 'UserController@destroy')->name('user.destroy');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
    return redirect('/home');
});

Route::get('/cogs/index2', 'CogsController@index');
Route::get('/cogs/pages', 'CogsController@page');
Route::get('/cogs/tambahProject', 'CogsController@addNew');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

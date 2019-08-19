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

// route COGS
Route::group(['prefix' => 'cogs', 'as' => 'cogs.', 'middleware' => 'auth'], function () {
   Route::get('/', ['as' => 'project', 'uses' => 'CogsController@index']);
   Route::get('/{code}', ['as' => 'show', 'uses' => 'CogsController@show']);
});

// route Project Cost
Route::group(['prefix' => 'pc', 'as' => 'pc.', 'middleware' => 'auth'], function () {
   Route::get('/', ['as' => 'index', 'uses' => 'ProjectCostController@index']);
   Route::get('/{id}/est', ['as' => 'est', 'uses' => 'ProjectCostController@estimation']);
   Route::get('/{id}/real', ['as' => 'real', 'uses' => 'ProjectCostController@realization']);
});

Route::group(['prefix' => 'product', 'as' => 'product.', 'middleware' => 'auth'], function () {
   Route::get('/load', 'ProductController@load')->name('load');
   Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
   Route::post('/', ['as' => 'store', 'uses' => 'ProductController@store']);

   Route::delete('/{id}', ['as' => 'destroy', 'uses' => 'ProductController@destroy']);
   Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'ProductController@edit']);
});

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function () {
   Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
   Route::post('/', ['as' => 'store', 'uses' => 'UserController@store']);

   Route::delete('/{id}', ['as' => 'destroy', 'uses' => 'UserController@destroy']);
   Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'UserController@edit']);
});

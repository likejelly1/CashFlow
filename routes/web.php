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
Route::group(['prefix'=>'cogs', 'name'=>'cogs.'], function ()
{
   Route::get('/', ['as'=>'project', 'uses'=>'CogsController@index']);
   Route::get('/{code}', ['as'=>'show', 'uses'=>'CogsController@show']);
});

// route Project Cost
Route::group(['prefix'=>'pc', 'as'=>'pc.'], function ()
{
   Route::get('/', ['as'=>'index', 'uses'=>'ProjectCostController@index']);
   Route::get('/list', ['as'=>'show', 'uses'=>'ProjectCostController@list']);
});

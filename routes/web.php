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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// route COGS
Route::group(['prefix'=>'cogs', 'as'=>'cogs.', 'middleware'=>'auth'], function ()
{
   Route::get('/', ['as'=>'project', 'uses'=>'CogsController@index']);
   Route::get('/show/{id}', ['as'=>'show', 'uses'=>'CogsController@show']);
   Route::get('/addProject', ['as'=>'addProject', 'uses'=>'CogsController@addNew']);
   Route::post('/storeProject', ['as'=>'storeProject', 'uses'=>'CogsController@store']);
   Route::post('/storeProcart', ['as' => 'storeProcart', 'uses' => 'CogsController@storeProcart']);
});

// route Project Cost
Route::group(['prefix'=>'pc', 'as'=>'pc.', 'middleware'=>'auth'], function ()
{
   Route::get('/', ['as'=>'index', 'uses'=>'ProjectCostController@index']);
   Route::get('/list', ['as'=>'show', 'uses'=>'ProjectCostController@list']);
});

// route PnL
Route::group(['prefix' => 'pnl', 'as' => 'pnl.', 'middleware' => 'auth'], function () 
{
   Route::get('/', ['as' => 'index', 'uses' => 'PnlController@index']);
});

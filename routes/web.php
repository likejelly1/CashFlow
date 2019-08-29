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


// route Project Cost
Route::group(['prefix' => 'pc', 'as' => 'pc.','middleware' => 'auth'], function () {
   Route::get('/', ['as' => 'index', 'uses' => 'ProjectCostController@index']);
   Route::get('/{id}/est', ['as' => 'est', 'uses' => 'ProjectCostController@estimation']);
   Route::get('/{id}/real', ['as' => 'real', 'uses' => 'ProjectCostController@realization']);
   Route::post('/est', ['as' => 'store.estimation', 'uses' => 'ProjectCostController@storeEstimation']);
   Route::post('/real', ['as' => 'store.realization', 'uses' => 'ProjectCostController@storeRealization']);
   Route::delete('/{id}/real', ['as' => 'destroy.realization', 'uses' => 'ProjectCostController@destroyRealization']);
   Route::delete('/{id}/est', ['as' => 'destroy.estimation', 'uses' => 'ProjectCostController@destroyEstimation']);
   Route::get('/{id}/edit/est', ['as' => 'edit.estimation', 'uses' => 'ProjectCostController@editEstimation']);
   Route::get('/{id}/edit/real', ['as' => 'edit.realization', 'uses' => 'ProjectCostController@editRealization']);
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
   Route::post('/storeRole', ['as' => 'storeRole', 'uses' => 'UserController@storeRole']);
   Route::delete('/{id}', ['as' => 'destroy', 'uses' => 'UserController@destroy']);
   Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'UserController@edit']);
});


Route::group(['prefix' => 'cogs', 'as' => 'cogs.', 'middleware' => 'auth'], function () {
   Route::get('/', ['as' => 'project', 'uses' => 'CogsController@index']);
   Route::get('/show/{id}', ['as' => 'show', 'uses' => 'CogsController@show']);
   Route::get('/getdata/{id}', ['as'=>'getdata', 'uses'=>'CogsController@getData']);
   Route::get('/addProject', ['as' => 'addProject', 'uses' => 'CogsController@addNew']);
   Route::post('/storeProject', ['as' => 'storeProject', 'uses' => 'CogsController@store']);
   Route::post('/storeProcart', ['as' => 'storeProcart', 'uses' => 'CogsController@storeProcart']);
   Route::post('/storeCustomer', ['as' => 'storeCustomer', 'uses' => 'CogsController@storeCustomer']);
});


// route PnL
Route::group(['prefix' => 'pnl', 'as' => 'pnl.', 'middleware' => 'auth'], function () {
   Route::get('/', ['as' => 'index', 'uses' => 'PnlController@index']);
});

Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => 'auth'], function () {
   Route::get('/', ['as' => 'index', 'uses' => 'CustomerController@index']);
   Route::get('/add', ['as' => 'add', 'uses' => 'CustomerController@add']);
   Route::post('/store', ['as' => 'store', 'uses' => 'CustomerController@store']);
   Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'CustomerController@edit']);
   Route::put('/update/{id}', ['as' => 'update', 'uses' => 'CustomerController@update']);
   Route::delete('/{id}', ['as' => 'destroy', 'uses' => 'CustomerController@destroy']);

});

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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductController@index')->name('products');
Route::get('/customers', 'CustomerController@index')->name('customers');
Route::get('/orders', 'OrderController@index')->name('orders');


Route::get('/products/create', ['as' => 'products.create', 'uses' => 'ProductController@create']);
Route::get('/products/view/{id}', ['as' => 'products.view', 'uses' => 'ProductController@view']);
Route::post('/products/store', ['as' => 'products.store', 'uses' => 'ProductController@store']);
Route::patch('/products/update/store/{id}', ['as' => 'products.update.store', 'uses' => 'ProductController@updateStore']);
Route::get('/products/edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductController@update']);
Route::get('/products/delete/{id}', ['as' => 'products.delete', 'uses' => 'ProductController@delete']);

Route::get('/customers/view/{id}', ['as' => 'customers.view', 'uses' => 'CustomerController@view']);
Route::get('/customer/edit/{id}', ['as' => 'customer.edit', 'uses' => 'CustomerController@edit']);

Route::get('/orders/view/{id}', ['as' => 'orders.view', 'uses' => 'OrdersController@view']);
Route::get('/orders/edit/{id}', ['as' => 'orders.edit', 'uses' => 'OrdersController@edit']);
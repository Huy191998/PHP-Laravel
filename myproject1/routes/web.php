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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/','HomeController');
Route::post('/seach','HomeController@seach')->name('seach');
Route::resource('brand','brandsController')->middleware('login');
Route::resource('categorie','CategoriesController')->middleware('login');


Route::post('customer','CustomersController@store')->name('customer.store');
Route::get('customer/create','CustomersController@create')->name('customer.create');
Route::get('customer','CustomersController@index')->name('customer.index')->middleware('login');
Route::get('customer/{customer}','CustomersController@show')->name('customer.show')->middleware('login');
Route::delete('customer/{customer}','CustomersController@destroy')->name('customer.destroy')->middleware('login');
Route::get('customer/{customer}/edit','CustomersController@edit')->name('customer.edit')->middleware('userlogin');
Route::put('customer/{customer}','CustomersController@update')->name('customer.update')->middleware('userlogin');


Route::resource('product','ProductsController')->middleware('login');
Route::resource('order','OrdersController')->middleware('login');
Route::get('product/{id}/chitiet','ProductsController@chitiet')->name('product.chitiet');
Route::resource('cart','CartController')->middleware('userlogin');
Route::get('addCart/{id}','CartController@addCart')->name('addCart');
Route::get('indexcategories/{id}','HomeController@indexcategories')->name('indexcategories');
Route::get('checkout','CartController@checkout')->name('cart.ckeckout');
Route::post('/thanhtoan', 'CartController@thanhtoan')->middleware('userlogin');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login/checklogin', 'LoginController@checklogin')->name('checklogin');

Route::get('logout', 'LoginController@logout')->name('logout');


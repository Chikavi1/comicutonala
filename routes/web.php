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

Route::get('/','HomeController@welcome' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/vender','HomeController@vender')->name('vender');
Route::get('/random','HomeController@random')->name('random');
Route::get('/profile','HomeController@profile')->name('profile');
Route::get('/admin','HomeController@admin')->name('admin');

//Route::get('/{slug}','SellersController@show');
Route::resource('seller', 'SellersController');

Route::get('/edit/{id}','SellersController@filter')->name('filter');
Route::get('/create/','SellersController@filter2')->name('filter2');

Route::get('seller/{slug}', ['as' => 'seller', 'uses' => 'SellersController@show']);

Route::get('categorias',function(){
	return view('categorias');
})->name('categorias');


Route::resource('items','itemsController');
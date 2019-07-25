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
Route::get('/admin','AdminController@index')->name('admin');
Route::get('admin/categorias','CategoriesController@admin')->name('categorias');

//Route::get('/{slug}','SellersController@show');
Route::resource('seller', 'SellersController');

Route::get('/edit/{id}','SellersController@filter')->name('filter');
Route::get('/create/','SellersController@filter2')->name('filter2');

Route::get('/centro/{centro}','HomeController@centro')->name('centro');

Route::get('seller/{slug}', ['as' => 'seller', 'uses' => 'SellersController@show']);

Route::resource('categorias','CategoriesController');
Route::get('creando/{id}','itemsController@creandoConId')->name('items.creando');
Route::get('scraping','ScrapingController@example')->name('scraping');
Route::get('siiau','ScrapingController@prueba');
Route::get('busqueda','HomeController@busqueda')->name('busqueda');

Route::middleware(['auth'])->group(function () {	
	Route::resource('items','itemsController');
   
});

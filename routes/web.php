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

Route::get('/','HomeController@welcome' )->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/vender','HomeController@vender')->name('vender');
Route::get('/random','HomeController@random')->name('random');
Route::get('/profile','HomeController@profile')->name('profile');

//--------------------------Admin sources--------------------------------------
Route::get('/control','AdminController@index')->name('control');
Route::get('/admin','AdminController@admin')->name('admin');
Route::post('/admin/login','AdminController@login')->name('admin.login');

Route::get('/admin/vendedores','AdminController@vendedores')->name('admin.vendedores');
Route::get('/admin/solicitudes','AdminController@solicitudVendedores')->name('admin.solicitudes');
Route::get('/admin/bloqueados','AdminController@bloqueados')->name('admin.bloqueados');
Route::get('/admin/verificar','AdminController@verificar')->name('admin.verificar');

Route::get('/admin/categorias','AdminController@categorias')->name('categorias');

Route::get('/admin/usuarios','AdminController@usuarios')->name('admin.usuarios');
Route::get('/admin/estadisticas','AdminController@estadisticas')->name('admin.estadisticas');
Route::get('/admin/centros','AdminController@centros')->name('admin.centros');

Route::get('/admin/sellerup/{id}','SellersController@upSeller')->name('admin.upseller');
Route::get('/admin/sellerrejected/{id}','SellersController@rejectedSeller')->name('admin.rejectedseller');
Route::get('/admin/sellerban/{id}','SellersController@banSeller')->name('admin.banseller');

//-----------------------------------------------------------------------------

Route::get('/terminos','HomeController@terminos')->name('terminos');
Route::get('/bot','HomeController@bot')->name('bot');

//Route::get('/{slug}','SellersController@show');

// NECESARIO CAMBIAR Route::resource('seller', 'SellersController')->middleware('auth');
Route::get('profile/password','HomeController@password')->name('profile.password');
Route::post('profile/updatepassword','HomeController@updatepassword');


Route::resource('seller', 'SellersController');

Route::get('/edit/{id}','SellersController@filter')->name('filter');
Route::get('/create/','SellersController@filter2')->name('filter2');


Route::get('seller/{slug}', ['as' => 'seller', 'uses' => 'SellersController@show']);

Route::resource('categorias','CategoriesController');
Route::get('creando/{id}','ItemsController@creandoConId')->name('items.creando');
Route::get('scraping','ScrapingController@example')->name('scraping');
Route::get('siiau','ScrapingController@prueba');
Route::get('busqueda','HomeController@busqueda')->name('busqueda');
Route::middleware(['auth'])->group(function () {	
	Route::resource('items','ItemsController');
   
});

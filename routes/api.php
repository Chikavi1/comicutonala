<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/sellers','ApiController@getsellers');
Route::get('/seller','ApiController@getseller');
Route::get('/search_category/{category}','ApiController@getbyCategory');
Route::get('/search_name/{name}','ApiController@getbyName');
Route::get('/numberSellers','ApiController@allSellers');

Route::get('/getdata/','ApiController@getData');

Route::get('/getProducts','ApiController@getProductsbySeller');

Route::get('/authchikavi','ScrapingController@authchikavi');

Route::get('getbyId/{id}','ApiController@getSellerById');
Route::get('saluda','ApiController@saluda');
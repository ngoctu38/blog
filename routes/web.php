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


Auth::routes();


Route::match(['get', 'post'],'home', 'HomeController@index')->name('home');

Route::get('/product-type/{type}', 'HomeController@getType')->name('product.type');

Route::get('/product/detail/{id}', 'ProductDetailController@index')->name('product.detail');
Route::get('/product/detail', 'TestController@index')->name('product.detail');

Route::get('/shopping-cart','CartController@index')->name('shopping-cart');
Route::get('/add-cart/{id}', 'CartController@addCart')->name('add-cart');
Route::get('/delete-cart/{id}', 'CartController@DeleteCart')->name('delete.cart');
Route::get('/delete-list-cart/{id}', 'CartController@DeleteList')->name('delete.list-cart');

Route::get('/hi','Admin\ProductController@index')->name('product.index');

Route::group(['prefix'=>'admin'],function(){

    Route::get('/','AdminController@index');

    Route::group(['prefix'=>'product'],function(){
        Route::get('/','Admin\ProductController@index')->name('product.index');
        Route::match(['get', 'post'],'/create','Admin\ProductController@create')->name('product.create');
        Route::get('/update/{id}','Admin\ProductController@update')->name('product.update');
        Route::post('/update/{id}','Admin\ProductController@update')->name('product.update');

        Route::post('/details/{id}','Admin\ProductController@details')->name('product.details');
        Route::delete('/delete/{id}','Admin\ProductController@delete')->name('product.delete');
    });

});

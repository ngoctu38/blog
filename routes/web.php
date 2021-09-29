<?php
use App\Http\Controllers\Admin;
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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/type/{type}', 'HomeController@getType')->name('type');
Route::get('/type/detail/{id}', 'HomeController@detail')->name('detail');

Route::get('/hi','Admin\ProductController@index')->name('product.index');

Route::group(['prefix'=>'admin'],function(){

    Route::get('/','AdminController@index');

    Route::group(['prefix'=>'product'],function(){
        Route::get('/','Admin\ProductController@index')->name('product.index');
        Route::match(['get', 'post'],'/create','Admin\ProductController@create')->name('product.create');
        Route::match(['get', 'post'],'/update/{id}','Admin\ProductController@update')->name('product.update');
        Route::post('/update','Admin\ProductController@update')->name('product.update');

        Route::post('/details/{id}','Admin\ProductController@details')->name('product.details');
        Route::delete('/delete/{id}','Admin\ProductController@delete')->name('product.delete');
    });

});

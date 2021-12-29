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
Route::get('/', 'HomeController@index')->name('home');

Route::get('/demo', 'DemoControler@index')->name('demo.index');
//Route::get('/demo/auto-load', 'DemoControler@index')->name('demo.index');
Route::get('/demo/add', 'DemoControler@Add')->name('demo.add');
Route::get('/demo/list', 'DemoControler@list')->name('demo.list');
Route::match(['get', 'post'],'/demo/create', 'DemoControler@create')->name('demo.create');
Route::match(['get', 'post'],'/demo/update/{id}', 'DemoControler@update')->name('demo.update');

Route::match(['get', 'post'],'home/priceT', 'HomeController@priceT')->name('home.priceT');
Route::match(['get', 'post'],'home/priceC', 'HomeController@priceC')->name('home.priceC');
Route::match(['get', 'post'],'home/sale', 'HomeController@sale')->name('home.sale');
Route::match(['get', 'post'],'home', 'HomeController@index')->name('home');
Route::get('/home/add-cart/{id}', 'CartController@addCart')->name('add-cart');
Route::get('/home/delete-cart/{id}', 'CartController@DeleteCart')->name('delete.cart');


Route::get('/product-type/{type}', 'HomeController@getType')->name('product.type');
Route::get('/product-type/priceT/{type}', 'HomeController@typePriceT')->name('product.type.priceT');
Route::get('/product-type/priceG/{type}', 'HomeController@typePriceG')->name('product.type.priceG');
Route::get('/product-type/sale/{type}', 'HomeController@typeSale')->name('product.type.sale');
Route::get('/product-type/delete-cart/{id}', 'CartController@DeleteCart')->name('delete.cart');


Route::get('/introduce', 'IntroduceController@index')->name('introduce');


Route::get('/product/detail/{id}', 'ProductDetailController@index')->name('product.detail');
Route::get('/product/detail/add-cart/{id}', 'CartController@addCart')->name('add-cart');
Route::get('product/detail/select-image/{id}', 'ProductDetailController@selectImg')->name('product.select');
Route::get('/product/detail/delete-cart/{id}', 'CartController@DeleteCart')->name('delete.cart');


Route::get('/shopping-cart','CartController@index')->name('shopping-cart');
Route::get('/add-cart/{id}', 'CartController@addCart')->name('add-cart');
Route::get('/product-type/add-cart/{id}', 'CartController@addCart')->name('add-cart');
Route::get('/delete-cart/{id}', 'CartController@DeleteCart')->name('delete.cart');
Route::get('/delete-list-cart/{id}', 'CartController@DeleteList')->name('delete.list-cart');
Route::get('/save-list-cart/{id}/{quantity}', 'CartController@SaveList')->name('save.list-cart');

Route::post('/order', 'OrderController@index')->name('order');

Route::group(['prefix'=>'order'],function(){
    Route::post('/', 'OrderController@index')->name('order');
    Route::get('/index','OrderController@list')->name('customer-order.index');
    Route::get('/delete/{id}','OrderController@delete')->name('customer-order.delete');
    Route::get('/status/{id}','OrderController@status')->name('customer-order.status');
    Route::get('/detail/{id}','OrderController@detail')->name('customer-order.detail');
});

Route::group(['prefix'=>'admin'],function(){

    Route::get('/','Admin\ProductController@index')->name('product.index')
        ->middleware('auth');

    Route::group(['prefix'=>'product'],function(){
        Route::get('/','Admin\ProductController@index')->name('product.index')
            ->middleware('auth');
        Route::match(['get', 'post'],'/create','Admin\ProductController@create')->name('product.create')
            ->middleware('auth');
        Route::get('/update/{id}','Admin\ProductController@update')->name('product.update')
            ->middleware('auth');
        Route::post('/update/{id}','Admin\ProductController@update')->name('product.update')
            ->middleware('auth');

        Route::post('/details/{id}','Admin\ProductController@details')->name('product.details')
            ->middleware('auth');
        Route::get('/delete/{id}','Admin\ProductController@delete')->name('product.delete')
            ->middleware('auth');
    });
    Route::group(['prefix'=>'product-type'],function(){
        Route::get('/index','Admin\ProductTypeController@index')->name('product-type.index')
            ->middleware('auth');
        Route::get('/delete/{id}','Admin\ProductTypeController@delete')->name('product-type.delete')
            ->middleware('auth');
        Route::match(['get', 'post'],'/create','Admin\ProductTypeController@create')->name('product-type.create')
            ->middleware('auth');
    });
    Route::group(['prefix'=>'order'],function(){
        Route::get('/','Admin\OrderController@index')->name('order.index')
        ->middleware('auth');
        Route::get('/delete/{id}','Admin\OrderController@delete')->name('order.delete')
            ->middleware('auth');
        Route::get('/status/{id}','Admin\OrderController@status')->name('order.status')
            ->middleware('auth');
        Route::get('/detail/{id}','Admin\OrderController@detail')->name('order.detail')
            ->middleware('auth');
    });
});

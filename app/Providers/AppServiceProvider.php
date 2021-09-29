<?php

namespace App\Providers;

use App\ProductTypeDetail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
        public function register()
    {
        view()->composer('layouts.master', function ($view){
            $type_product = ProductTypeDetail::all();
            $view->with('type_product',$type_product);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

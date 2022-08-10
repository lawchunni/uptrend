<?php

namespace App\Providers;

use App\Models\Advertisement;
use App\Models\Gender;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services too all the views.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $view->with('count_cart', Session::get('cart'));
        });

        view()->composer('*', function ($view) {
            $view->with('genders', Gender::all());
        });

        view()->composer('home', function ($view) {
            $view->with(
                'ads',
                Advertisement::where('pages', '=', 'home')
                ->where('area', '=', 'slider')
                ->get()
            );
        });

        view()->composer('products.index', function ($view) {
            $view->with(
                'ad',
                Advertisement::where('pages', '=', 'product-list')
                ->where('area', '=', 'sidebar')
                ->inRandomOrder()
                    ->first()
            );
        });

        view()->composer('products.show', function ($view) {
            $view->with(
                'ad',
                Advertisement::where('pages', '=', 'product-detail')
                ->where('area', '=', 'top')
                ->inRandomOrder()
                    ->first()
            );
        });



    }
}
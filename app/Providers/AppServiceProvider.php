<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Share 'products' data with all views
        $products = Product::all();
        view()->share('products', $products);
    }
}

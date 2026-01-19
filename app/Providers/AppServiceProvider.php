<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        try {
            if (\Schema::hasTable('products')) {
                $products = Product::all();
                view()->share('products', $products);
            }
        } catch (\Exception $e) {
            // Table doesn't exist yet or connection failed
            view()->share('products', collect());
        }
    }
}

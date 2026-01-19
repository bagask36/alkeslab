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
            } else {
                $products = collect();
            }
        } catch (\Exception $e) {
            // Table doesn't exist yet or connection failed
            $products = collect();
        }
        
        // Always share products variable, even if empty
        view()->share('products', $products);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\Setting;

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
            if (Schema::hasTable('products')) {
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

        // Share contact settings with all views
        try {
            if (Schema::hasTable('settings')) {
                // Get WhatsApp data
                $whatsappRaw = json_decode(Setting::get('whatsapp', '[]'), true) ?: [];
                $whatsapp = [];
                foreach ($whatsappRaw as $item) {
                    if (is_array($item) && isset($item['name']) && isset($item['number'])) {
                        $whatsapp[] = $item;
                    } else {
                        $whatsapp[] = ['name' => '', 'number' => is_string($item) ? $item : ''];
                    }
                }

                // Get Phone data
                $phoneRaw = json_decode(Setting::get('phone', '[]'), true) ?: [];
                $phone = [];
                foreach ($phoneRaw as $item) {
                    if (is_array($item) && isset($item['name']) && isset($item['number'])) {
                        $phone[] = $item;
                    } else {
                        $phone[] = ['name' => '', 'number' => is_string($item) ? $item : ''];
                    }
                }

                // Get Email data
                $email = json_decode(Setting::get('email', '[]'), true) ?: [];

                // Get Social Media Links
                $contactSettings = [
                    'tokopedia' => Setting::get('tokopedia', ''),
                    'shopee' => Setting::get('shopee', ''),
                    'instagram' => Setting::get('instagram', ''),
                    'tiktok' => Setting::get('tiktok', ''),
                    'whatsapp' => $whatsapp,
                    'phone' => $phone,
                    'email' => $email,
                ];
            } else {
                $contactSettings = [
                    'tokopedia' => '',
                    'shopee' => '',
                    'instagram' => '',
                    'tiktok' => '',
                    'whatsapp' => [],
                    'phone' => [],
                    'email' => [],
                ];
            }
        } catch (\Exception $e) {
            $contactSettings = [
                'tokopedia' => '',
                'shopee' => '',
                'instagram' => '',
                'tiktok' => '',
                'whatsapp' => [],
                'phone' => [],
                'email' => [],
            ];
        }
        
        view()->share('contactSettings', $contactSettings);
    }
}

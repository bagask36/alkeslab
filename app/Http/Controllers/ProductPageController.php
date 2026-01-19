<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Teknis;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProductPageController extends Controller
{
    // Method to display products
    public function index()
    {
        try {
            $products = Schema::hasTable('products') ? Product::all() : collect();
        } catch (\Exception $e) {
            $products = collect();
        }

        try {
            $teknis = Schema::hasTable('teknis') ? Teknis::all() : collect();
        } catch (\Exception $e) {
            $teknis = collect();
        }

        try {
            $projects = Schema::hasTable('projects') ? Project::all() : collect();
        } catch (\Exception $e) {
            $projects = collect();
        }

        return view('produk-kami.index', compact('products', 'teknis', 'projects'));
    }
}


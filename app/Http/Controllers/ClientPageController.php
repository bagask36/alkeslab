<?php

namespace App\Http\Controllers;

use App\Models\Client; // Import your Client model
use App\Models\Legalitas;
use App\Models\Layanan;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ClientPageController extends Controller
{
    public function index()
    {
        // Fetch all clients from the database
        try {
            $clients = Schema::hasTable('clients') ? Client::all() : collect();
        } catch (\Exception $e) {
            $clients = collect();
        }

        try {
            $layanan = Schema::hasTable('layanans') ? Layanan::all() : collect();
        } catch (\Exception $e) {
            $layanan = collect();
        }

        try {
            $product = Schema::hasTable('products') ? Product::all() : collect();
        } catch (\Exception $e) {
            $product = collect();
        }

        // Return the home view with clients data
        return view('home.index', compact('clients', 'layanan', 'product'));
    }

    public function tentangKamiIndex()
    {
        // Fetch all clients from the database
        try {
            $clients = Schema::hasTable('clients') ? Client::all() : collect();
        } catch (\Exception $e) {
            $clients = collect();
        }

        // Fetch all legalitas documents from the database
        try {
            $legalitasDocuments = Schema::hasTable('legalitas') ? Legalitas::all() : collect();
        } catch (\Exception $e) {
            $legalitasDocuments = collect();
        }

        // Return the produk-kami view with clients and legalitas data
        return view('tentang-kami.index', compact('clients', 'legalitasDocuments'));
    }
}

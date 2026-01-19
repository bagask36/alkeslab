<?php

namespace App\Http\Controllers;

use App\Models\Client; // Import your Client model
use App\Models\Legalitas;
use App\Models\Layanan;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientPageController extends Controller
{
    public function index()
    {
        // Fetch all clients from the database
        $clients = Client::all();
        $layanan = Layanan::all();
        $product = Product::all();

        // Return the home view with clients data
        return view('home.index', compact('clients', 'layanan', 'product'));
    }

    public function tentangKamiIndex()
    {
        // Fetch all clients from the database
        $clients = Client::all();

        // Fetch all legalitas documents from the database
        $legalitasDocuments = Legalitas::all();

        // Return the produk-kami view with clients and legalitas data
        return view('tentang-kami.index', compact('clients', 'legalitasDocuments'));
    }
}

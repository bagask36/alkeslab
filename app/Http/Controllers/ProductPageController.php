<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Teknis;
use App\Models\Project; // Make sure to import the Project model
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    // Method to display products
    public function index()
    {
        $products = Product::all(); // Retrieve all products
        $teknis = Teknis::all(); // Retrieve all teknis
        $projects = Project::all(); // Retrieve all projects

        return view('produk-kami.index', compact('products', 'teknis', 'projects')); // Pass products, teknis, and projects to the view
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Display a listing of the products
    public function index()
    {
        $products = Product::all(); // Retrieve all products
        return view('back.products.index', compact('products')); // Return index view with products
    }

    // Show the form for creating a new product
    public function create()
    {
        return view('back.products.create'); // Return create view
    }

    // Store a newly created product in storage 
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Check if the photo was uploaded
        if (!$request->hasFile('photo')) {
            return back()->withErrors(['photo' => 'No image was uploaded.']);
        }

        if (!$request->hasFile('icon')) {
            return back()->withErrors(['icon' => 'No Icon was uploaded.']);
        }

        // Handle the image upload
        try {
            $imagePath = $request->file('photo')->store('photos', 'public');
            $iconPath = $request->file('icon')->store('icon', 'public');
        } catch (\Exception $e) {
            return back()->withErrors([
                'photo' => 'Error uploading image: ' . $e->getMessage(),
                'icon' => 'Error uploading icon: ' . $e->getMessage(),
            ]);
        }

        $whatsappLink = 'https://wa.me/6281905057723?text=Halo,%20saya%20ingin%20menanyakan%20tentang%20produk%20ini:%20' . urlencode($request->description);

        // Create the product
        Product::create([
            'image' => $imagePath,
            'icon' => $iconPath,
            'description' => $request->description,
            'whatsapp_link' => $whatsappLink,
            'slug' => Str::slug($request->description),
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


    // Display the specified product
    public function show(Product $product)
    {
        return view('products.show', compact('product')); // Return show view with product
    }

    public function edit(Product $product)
    {
        return view('back.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Validate the input
        $request->validate([
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        // Check if a new icon was uploaded
        if ($request->hasFile('icon')) {
            // Delete the old icon if it exists
            if ($product->icon) {
                Storage::disk('public')->delete($product->icon);
            }

            // Store the new icon
            $iconPath = $request->file('icon')->store('icons', 'public');
            $product->icon = $iconPath;
        }

        // Update the product description and other fields
        $product->description = $request->description;
        $product->slug = Str::slug($request->description); // Update the slug as well

        // Save the updated product
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    // Remove the specified product from storage
    public function destroy(Product $product)
    {
        // Delete the product image from storage
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Delete the product icon from storage
        if ($product->icon) {
            Storage::disk('public')->delete($product->icon);
        }

        // Delete the product
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }


}

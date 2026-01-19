<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    // Display a listing of the clients
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $clients = Client::select(['id', 'name', 'image', 'image_size']);
            return DataTables::of($clients)
                ->addIndexColumn()
                ->editColumn('image', function ($client) {
                    return '<img src="' . asset('storage/' . $client->image) . '" width="100" alt="Client Image"/>';
                })
                ->addColumn('action', function ($client) {
                    return '<a href="' . route('clients.edit', $client->id) . '" class="btn btn-warning btn-sm">Edit</a>
                            <form action="' . route('clients.destroy', $client->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm(\'Are you sure you want to delete this client?\');">Delete</button>
                            </form>';
                })
                ->rawColumns(['image', 'action']) // Enable HTML for image and action columns
                ->make(true);
        }

        return view('back.clients.index');
    }

    // Show the form for creating a new client
    public function create()
    {
        return view('back.clients.create');
    }

    // Store a newly created client in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|max:2048', // Maximum 2 MB
            'image_size' => 'required|in:small,large', // New validation for image size
        ]);

        // Create a new client
        $client = new Client();
        $client->name = $request->name;

        // Generate slug from the name
        $client->slug = $this->createSlug($request->name);

        // Handle image upload
        if ($request->hasFile('photo')) {
            $client->image = $request->file('photo')->store('clients', 'public');
        }

        $client->image_size = $request->image_size; // Save the image size option
        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    // Show the form for editing the specified client
    public function edit(Client $client)
    {
        return view('back.clients.edit', compact('client'));
    }

    // Update the specified client in storage
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048', // Maximum 2 MB
            'image_size' => 'required|in:small,large', // Ensure image size is provided
        ]);

        // Update the client
        $client->name = $request->name;
        $client->slug = $this->createSlug($request->name);
        $client->image_size = $request->image_size; // Update the image size option

        // Handle image upload if a new file is uploaded
        if ($request->hasFile('photo')) {
            // Optionally delete the old image if necessary
            // Storage::disk('public')->delete($client->image); // Uncomment to delete old image

            $client->image = $request->file('photo')->store('clients', 'public');
        }

        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    // Remove the specified client from storage
    public function destroy(Client $client)
    {
        // Optionally delete the client's image from storage
        // Storage::disk('public')->delete($client->image); // Uncomment if you want to delete the image

        $client->delete(); // Delete the client
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }

    // Generate a slug from the client's name
    private function createSlug($name)
    {
        return Str::slug($name, '-');
    }
}

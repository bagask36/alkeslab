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
                    $editUrl = route('clients.edit', $client->id);
                    $deleteUrl = route('clients.destroy', $client->id);
                    $csrf = csrf_field();
                    $method = method_field('DELETE');
                    
                    return '<div class="flex items-center justify-center gap-2">
                                <a href="'.$editUrl.'" class="action-btn action-btn-edit" data-tooltip="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="'.$deleteUrl.'" method="POST" style="display:inline;" class="action-btn-form">
                                    '.$csrf.'
                                    '.$method.'
                                    <button type="submit" class="action-btn action-btn-delete" data-tooltip="Hapus" onclick="event.preventDefault(); Swal.fire({title: \'Apakah Anda yakin?\', text: \'Apakah Anda yakin ingin menghapus klien ini?\', icon: \'warning\', showCancelButton: true, confirmButtonColor: \'#ef4444\', cancelButtonColor: \'#6b7280\', confirmButtonText: \'Ya, Hapus!\', cancelButtonText: \'Batal\', reverseButtons: true}).then((result) => { if (result.isConfirmed) { this.closest(\'form\').submit(); } });">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>';
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

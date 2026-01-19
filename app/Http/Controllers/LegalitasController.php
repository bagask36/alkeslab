<?php

namespace App\Http\Controllers;

use App\Models\Legalitas;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LegalitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $legalitas = Legalitas::select(['id', 'name', 'file', 'type']);
            return DataTables::of($legalitas)
                ->addIndexColumn()
                ->addColumn('action', function($legalitas) {
                    $viewButton = '<a href="' . asset('storage/' . $legalitas->file) . '" target="_blank" class="btn btn-info btn-sm">View</a>';
                    $deleteButton = '<a href="' . route('legalitas.edit', $legalitas->id) . '" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="' . route('legalitas.destroy', $legalitas->id) . '" method="POST" style="display:inline;">
                                        ' . csrf_field() . method_field('DELETE') . '
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this document?\');">Delete</button>
                                    </form>';

                    return $viewButton . ' ' . $deleteButton;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('back.legalitas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.legalitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'doc' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'type' => 'required|in:pdf,jpg,png', // Validate type as enum
        ]);

        // Create a new Legalitas instance
        $legalitas = new Legalitas();
        $legalitas->name = $request->name;
        $legalitas->type = $request->type; // Store the type

        // Check if the file is uploaded
        if ($request->hasFile('doc')) {
            // Store the file and assign the path to the model's file attribute
            $legalitas->file = $request->file('doc')->store('legalitas', 'public');
        }

        // Save the model
        $legalitas->save();

        // Redirect with success message
        return redirect()->route('legalitas.index')->with('success', 'Document uploaded successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $legalitas = Legalitas::findOrFail($id); // Find the Legalitas record by ID
        return view('back.legalitas.edit', compact('legalitas')); // Pass the record to the edit view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'doc' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Document is optional
            'type' => 'required|in:pdf,jpg,png', // Validate type as enum
        ]);

        // Find the Legalitas record to update
        $legalitas = Legalitas::findOrFail($id);
        $legalitas->name = $request->name;
        $legalitas->type = $request->type; // Update the type

        // Check if a new file is uploaded
        if ($request->hasFile('doc')) {
            // Store the new file and assign the path to the model's file attribute
            $legalitas->file = $request->file('doc')->store('legalitas', 'public');
        }

        // Save the updated model
        $legalitas->save();

        // Redirect with success message
        return redirect()->route('legalitas.index')->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $legalitas = Legalitas::findOrFail($id);
        // Delete the file from storage if it exists
        if ($legalitas->file) {
            Storage::disk('public')->delete($legalitas->file);
        }

        // Delete the Legalitas record
        $legalitas->delete();

        // Redirect with success message
        return redirect()->route('legalitas.index')->with('success', 'Document deleted successfully.');
    }
}

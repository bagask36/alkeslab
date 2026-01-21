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
                    $viewUrl = asset('storage/' . $legalitas->file);
                    $editUrl = route('legalitas.edit', $legalitas->id);
                    $deleteUrl = route('legalitas.destroy', $legalitas->id);
                    $csrf = csrf_field();
                    $method = method_field('DELETE');
                    
                    return '<div class="flex items-center justify-center gap-2">
                                <a href="'.$viewUrl.'" target="_blank" class="action-btn action-btn-view" data-tooltip="Lihat Dokumen">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="'.$editUrl.'" class="action-btn action-btn-edit" data-tooltip="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="'.$deleteUrl.'" method="POST" style="display:inline;" class="action-btn-form">
                                    '.$csrf.'
                                    '.$method.'
                                    <button type="submit" class="action-btn action-btn-delete" data-tooltip="Hapus" onclick="event.preventDefault(); Swal.fire({title: \'Apakah Anda yakin?\', text: \'Apakah Anda yakin ingin menghapus dokumen ini?\', icon: \'warning\', showCancelButton: true, confirmButtonColor: \'#ef4444\', cancelButtonColor: \'#6b7280\', confirmButtonText: \'Ya, Hapus!\', cancelButtonText: \'Batal\', reverseButtons: true}).then((result) => { if (result.isConfirmed) { this.closest(\'form\').submit(); } });">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>';
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

<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $layanan = Layanan::select(['id', 'name', 'image']);
            return DataTables::of($layanan)
                ->addIndexColumn()
                ->editColumn('image', function ($layanan) {
                    return '<img src="' . asset('storage/' . $layanan->image) . '" width="100" alt="Teknis Image"/>';
                })
                ->addColumn('action', function ($layanan) {
                    $editUrl = route('layanan.edit', $layanan->id);
                    $deleteUrl = route('layanan.destroy', $layanan->id);
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
                                    <button type="submit" class="action-btn action-btn-delete" data-tooltip="Hapus" onclick="return confirm(\'Apakah Anda yakin ingin menghapus layanan ini?\')">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('back.layanan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|max:2048',
        ]);

        $layanan = new Layanan();
        $layanan->name = $request->name;
        $layanan->slug = Str::slug($request->name);

        if ($request->hasFile('photo')) {
            $layanan->image = $request->file('photo')->store('layanan', 'public');
        }

        $layanan->save();

        return redirect()->route('layanan.index')->with('success', 'Teknis item created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layanan $layanan)
    {
        return view('back.layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $layanan->name = $request->name;
        $layanan->slug = Str::slug($request->name);

        if ($request->hasFile('photo')) {
            //Storage::disk('public')->delete($teknis->image);
            $layanan->image = $request->file('photo')->store('layanan', 'public');
        }

        $layanan->save();

        return redirect()->route('layanan.index')->with('success', 'Teknis item updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        if ($layanan->image) {
            Storage::disk('public')->delete($layanan->image);
        }
        $layanan->delete();
        return redirect()->route('layanan.index')->with('success', 'Teknis item deleted successfully.');

    }
}

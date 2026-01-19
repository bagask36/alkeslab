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
                    return '<a href="' . route('layanan.edit', $layanan->id) . '" class="btn btn-warning btn-sm">Edit</a>
                            <form action="' . route('layanan.destroy', $layanan->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</button>
                            </form>';
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
    public function edit(string $id)
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

<?php

namespace App\Http\Controllers;

use App\Models\Teknis;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class TeknisController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $teknis = Teknis::select(['id', 'name', 'image', 'image_size']);
            return DataTables::of($teknis)
                ->addIndexColumn()
                ->editColumn('image', function ($teknis) {
                    return '<img src="' . asset('storage/' . $teknis->image) . '" width="100" alt="Teknis Image"/>';
                })
                ->addColumn('action', function ($teknis) {
                    return '<a href="' . route('teknis.edit', $teknis->id) . '" class="btn btn-warning btn-sm">Edit</a>
                            <form action="' . route('teknis.destroy', $teknis->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</button>
                            </form>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('back.teknis.index');
    }

    public function create()
    {
        return view('back.teknis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|max:2048',
            'image_size' => 'required|in:small,large',
        ]);

        $teknis = new Teknis();
        $teknis->name = $request->name;
        $teknis->slug = Str::slug($request->name);

        if ($request->hasFile('photo')) {
            $teknis->image = $request->file('photo')->store('teknis', 'public');
        }

        $teknis->image_size = $request->image_size;
        $teknis->save();

        return redirect()->route('teknis.index')->with('success', 'Teknis item created successfully.');
    }

    public function edit(Teknis $tekni)
    {
        return view('back.teknis.edit', compact('tekni'));
    }


    public function update(Request $request, Teknis $teknis)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'image_size' => 'required|in:small,large',
        ]);

        $teknis->name = $request->name;
        $teknis->slug = Str::slug($request->name);
        $teknis->image_size = $request->image_size;

        if ($request->hasFile('photo')) {
            //Storage::disk('public')->delete($teknis->image);
            $teknis->image = $request->file('photo')->store('teknis', 'public');
        }

        $teknis->save();

        return redirect()->route('teknis.index')->with('success', 'Teknis item updated successfully.');
    }


    public function destroy(Teknis $tekni)
    {
        Storage::disk('public')->delete($tekni->image);
        $tekni->delete();
        return redirect()->route('teknis.index')->with('success', 'Teknis item deleted successfully.');
    }
}


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
                    $editUrl = route('teknis.edit', $teknis->id);
                    $deleteUrl = route('teknis.destroy', $teknis->id);
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
                                    <button type="submit" class="action-btn action-btn-delete" data-tooltip="Hapus" onclick="return confirm(\'Apakah Anda yakin ingin menghapus item ini?\')">
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


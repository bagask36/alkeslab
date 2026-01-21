<?php

namespace App\Http\Controllers;

use App\Models\Project; // Gantilah dengan nama model Anda
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    // Display a listing of the projects
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $projects = Project::select(['id', 'name', 'image', 'image_size']);
            return DataTables::of($projects)
                ->addIndexColumn()
                ->editColumn('image', function ($project) {
                    return '<img src="' . asset('storage/' . $project->image) . '" width="100" alt="Project Image"/>';
                })
                ->addColumn('action', function ($project) {
                    $editUrl = route('projects.edit', $project->id);
                    $deleteUrl = route('projects.destroy', $project->id);
                    $csrf = csrf_field();
                    $method = method_field('DELETE');
                    
                    return '<div class="flex items-center gap-2">
                                <a href="'.$editUrl.'" class="action-icon" data-tooltip="Edit">
                                    <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 hover:text-yellow-700 dark:hover:text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="'.$deleteUrl.'" method="POST" style="display:inline;" class="action-icon-form">
                                    '.$csrf.'
                                    '.$method.'
                                    <button type="submit" class="action-icon" data-tooltip="Hapus" onclick="return confirm(\'Apakah Anda yakin ingin menghapus proyek ini?\')">
                                        <svg class="w-5 h-5 text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>';
                })
                ->rawColumns(['image', 'action']) 
                ->make(true);
        }

        return view('back.projects.index');
    }

    // Show the form for creating a new project
    public function create()
    {
        return view('back.projects.create');
    }

    // Store a newly created project in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'required|image|max:2048', // Maximum 2 MB
            'image_size' => 'required|in:small,large', // Validation for image size
        ]);

        // Create a new project
        $project = new Project();
        $project->name = $request->name;

        // Generate slug from the name
        $project->slug = $this->createSlug($request->name);

        // Handle image upload
        if ($request->hasFile('photo')) {
            $project->image = $request->file('photo')->store('projects', 'public');
        }

        $project->image_size = $request->image_size; // Save the image size option
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    // Show the form for editing the specified project
    public function edit(Project $project)
    {
        return view('back.projects.edit', compact('project'));
    }

    // Update the specified project in storage
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048', // Maximum 2 MB
            'image_size' => 'required|in:small,large', // Ensure image size is provided
        ]);

        // Update the project
        $project->name = $request->name;
        $project->slug = $this->createSlug($request->name);
        $project->image_size = $request->image_size; // Update the image size option

        // Handle image upload if a new file is uploaded
        if ($request->hasFile('photo')) {
            // Optionally delete the old image if necessary
            Storage::disk('public')->delete($project->image); // Uncomment to delete old image

            $project->image = $request->file('photo')->store('projects', 'public');
        }

        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    // Remove the specified project from storage
    public function destroy(Project $project)
    {
        // Optionally delete the project's image from storage
        Storage::disk('public')->delete($project->image); // Uncomment if you want to delete the image

        $project->delete(); // Delete the project
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    private function createSlug($name)
    {
        return Str::slug($name, '-');
    }
}

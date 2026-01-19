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
                    return '<a href="' . route('projects.edit', $project->id) . '" class="btn btn-warning btn-sm">Edit</a>
                            <form action="' . route('projects.destroy', $project->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm(\'Are you sure you want to delete this project?\');">Delete</button>
                            </form>';
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

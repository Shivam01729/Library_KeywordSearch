<?php

namespace App\Http\Controllers;

use App\Models\LibraryResource;
use Illuminate\Http\Request;

class LibrarySearchController extends Controller
{
    // Display search form and results (public)
    public function index(Request $request)
    {
        $searchTerm = $request->input('query');
        $resources = LibraryResource::query();

        if ($searchTerm) {
            $resources->where(function($query) use ($searchTerm) {
                $query->where('title', 'like', '%'.$searchTerm.'%')
                      ->orWhere('author', 'like', '%'.$searchTerm.'%')
                      ->orWhere('description', 'like', '%'.$searchTerm.'%');
            });
        }

        $resources = $resources->select('id', 'title', 'author', 'description', 'shelf')
                      ->orderBy('title', 'asc') // <<< Ascending order by Title
                      ->paginate(10)
                      ->appends($request->query());

        return view('library.index', [
            'resources' => $resources,
            'searchTerm' => $searchTerm
        ]);
    }

    // Show single resource (public)
    public function show(LibraryResource $resource)
    {
        return view('library.show', [
            'resource' => $resource
        ]);
    }

    // Admin-only methods
    public function create()
    {
        return view('library.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'shelf' => 'nullable|string|max:255',
        ]);

        LibraryResource::create($validated);

        return redirect()->route('resources.index')
               ->with('success', 'Book added successfully!');
    }

    public function edit(LibraryResource $resource)
    {
        return view('library.edit', compact('resource'));
    }

    public function update(Request $request, LibraryResource $resource)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'shelf' => 'nullable|string|max:255',
        ]);

        $resource->update($validated);

        return redirect()->route('resources.index')
               ->with('success', 'Book updated!');
    }

    public function destroy(LibraryResource $resource)
    {
        $resource->delete();

        return redirect()->route('resources.index')
               ->with('success', 'Book deleted successfully!');
    }
}

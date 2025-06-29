<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $query = Tour::query();
        
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
        
        $tours = $query->latest()->paginate(10);
        
        return view('admin.tours.index', compact('tours'));
    }

    public function create()
    {
        return view('admin.tours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:nature,culinary,family',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string',
            'location' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'address' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'includes' => 'nullable|string',
            'excludes' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'max_participants' => 'nullable|integer|min:1',
            'difficulty_level' => 'nullable|in:easy,moderate,hard',
            'available_dates' => 'nullable|string',
            'published' => 'boolean',
        ]);

        $data = $request->all();
        
        // Generate slug
        $data['slug'] = Str::slug($request->name);
        
        // Handle published checkbox
        $data['published'] = $request->has('published');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('tours', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('tours/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        Tour::create($data);

        return redirect()->route('admin.tours.index')
            ->with('success', 'Tour created successfully.');
    }

    public function show(Tour $tour)
    {
        return view('admin.tours.show', compact('tour'));
    }

    public function edit(Tour $tour)
    {
        return view('admin.tours.edit', compact('tour'));
    }

    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:nature,culinary,family',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string',
            'location' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'address' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'includes' => 'nullable|string',
            'excludes' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'max_participants' => 'nullable|integer|min:1',
            'difficulty_level' => 'nullable|in:easy,moderate,hard',
            'available_dates' => 'nullable|string',
            'published' => 'boolean',
        ]);

        $data = $request->all();
        
        // Update slug if name changed
        if ($request->name !== $tour->name) {
            $data['slug'] = Str::slug($request->name);
        }
        
        // Handle published checkbox
        $data['published'] = $request->has('published');

        if ($request->hasFile('image')) {
            if ($tour->image) {
                Storage::disk('public')->delete($tour->image);
            }
            $data['image'] = $request->file('image')->store('tours', 'public');
        }

        if ($request->hasFile('gallery')) {
            if ($tour->gallery) {
                foreach ($tour->gallery as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('tours/gallery', 'public');
            }
            $data['gallery'] = $gallery;
        }

        $tour->update($data);

        return redirect()->route('admin.tours.index')
            ->with('success', 'Tour updated successfully.');
    }

    public function destroy(Tour $tour)
    {
        if ($tour->image) {
            Storage::disk('public')->delete($tour->image);
        }
        
        if ($tour->gallery) {
            foreach ($tour->gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        
        $tour->delete();

        return redirect()->route('admin.tours.index')
            ->with('success', 'Tour deleted successfully.');
    }
}
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

        // Filter by status if provided in the request
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
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
            'category' => 'required|in:nature,culinary,family,adventure,cultural', // Updated categories
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string',
            'location' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'address' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Made image required for creation
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'includes' => 'nullable|string',
            'excludes' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'max_participants' => 'nullable|integer|min:1',
            'difficulty_level' => 'nullable|in:easy,moderate,hard',
            'available_dates' => 'nullable|string',
            'status' => 'required|in:draft,published,archived', // Added status validation
            'is_featured' => 'boolean',
            'is_popular' => 'boolean',
            'meta_description' => 'nullable|string|max:160',
        ]);

        $data = $request->all();

        // Generate slug if not provided
        $data['slug'] = $request->input('slug') ? Str::slug($request->input('slug')) : Str::slug($request->name);

        // Handle checkboxes
        $data['is_featured'] = $request->has('is_featured');
        $data['is_popular'] = $request->has('is_popular');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('tours', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('tours/gallery', 'public');
            }
            $data['gallery'] = json_encode($gallery); // Store gallery as JSON string
        } else {
            $data['gallery'] = null;
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
            'category' => 'required|in:nature,culinary,family,adventure,cultural', // Updated categories
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
            'status' => 'required|in:draft,published,archived', // Added status validation
            'is_featured' => 'boolean',
            'is_popular' => 'boolean',
            'meta_description' => 'nullable|string|max:160',
        ]);

        $data = $request->all();

        // Update slug if name changed or slug is provided
        if ($request->name !== $tour->name || $request->input('slug')) {
            $data['slug'] = $request->input('slug') ? Str::slug($request->input('slug')) : Str::slug($request->name);
        }

        // Handle checkboxes
        $data['is_featured'] = $request->has('is_featured');
        $data['is_popular'] = $request->has('is_popular');

        if ($request->hasFile('image')) {
            if ($tour->image) {
                Storage::disk('public')->delete($tour->image);
            }
            $data['image'] = $request->file('image')->store('tours', 'public');
        }

        if ($request->hasFile('gallery')) {
            if ($tour->gallery) {
                // Decode JSON string to array before iterating
                $oldGallery = json_decode($tour->gallery, true);
                if (is_array($oldGallery)) {
                    foreach ($oldGallery as $oldImage) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }

            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('tours/gallery', 'public');
            }
            $data['gallery'] = json_encode($gallery); // Store gallery as JSON string
        } else {
            // If no new gallery files are uploaded, retain existing or set to null if cleared
            $data['gallery'] = $tour->gallery; // Keep existing gallery if no new files
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
            // Decode JSON string to array before iterating
            $galleryImages = json_decode($tour->gallery, true);
            if (is_array($galleryImages)) {
                foreach ($galleryImages as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $tour->delete();

        return redirect()->route('admin.tours.index')
            ->with('success', 'Tour deleted successfully.');
    }

    /**
     * Publish the specified tour.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function publish(Tour $tour)
    {
        $tour->update(['status' => 'published']);
        return back()->with('success', 'Tour published successfully!');
    }

    /**
     * Unpublish the specified tour.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function unpublish(Tour $tour)
    {
        $tour->update(['status' => 'draft']);
        return back()->with('success', 'Tour unpublished successfully!');
    }

    /**
     * Toggle the featured status of the specified tour.
     *
     * @param  \App\Models\Tour  $tour
     * @return \Illuminate\Http\Response
     */
    public function toggleFeatured(Tour $tour)
    {
        $tour->update(['is_featured' => !$tour->is_featured]);
        $status = $tour->is_featured ? 'featured' : 'unfeatured';
        return back()->with('success', "Tour {$status} successfully!");
    }
}

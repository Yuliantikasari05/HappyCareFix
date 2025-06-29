<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $query = Testimonial::with('user');
        
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('title', 'like', '%' . $request->search . '%')
                  ->orWhere('message', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('status') && $request->status !== '') {
            $query->where('approved', $request->status);
        }
        
        $testimonials = $query->latest()->paginate(10);
        
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'service_type' => 'nullable|string',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'approved' => 'boolean',
            'featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['approved'] = $request->has('approved');
        $data['featured'] = $request->has('featured');

        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    public function toggleApproval(Testimonial $testimonial)
    {
        $testimonial->update([
            'approved' => !$testimonial->approved
        ]);

        $status = $testimonial->approved ? 'approved' : 'rejected';
        
        return redirect()->route('admin.testimonials.index')
            ->with('success', "Testimonial has been {$status}.");
    }

    public function toggleFeatured(Testimonial $testimonial)
    {
        $testimonial->update([
            'featured' => !$testimonial->featured
        ]);

        $status = $testimonial->featured ? 'featured' : 'unfeatured';
        
        return redirect()->route('admin.testimonials.index')
            ->with('success', "Testimonial has been {$status}.");
    }
}
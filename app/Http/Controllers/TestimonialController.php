<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        // Ambil semua testimonial yang sudah disetujui
        $testimonials = Testimonial::approved()->latest()->paginate(6);
        
        // Ambil testimonial yang featured untuk ditampilkan di bagian atas
        $featuredTestimonials = Testimonial::approved()->featured()->latest()->take(3)->get();
        
        return view('testimonials.index', compact('testimonials', 'featuredTestimonials'));
    }

    public function create()
    {
        return view('testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'service_type' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'title' => $request->title,
            'message' => $request->message,
            'rating' => $request->rating,
            'service_type' => $request->service_type,
            'user_id' => auth()->id(),
            'approved' => false, // Menunggu persetujuan admin
            'featured' => false,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create($data);

        return redirect()->route('testimonials.index')
            ->with('success', 'Testimoni Anda telah dikirim dan menunggu persetujuan admin.');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HospitalController extends Controller
{
    public function index()
{
    $hospitals = Hospital::latest()->paginate(10); // atau sesuai kebutuhan
    return view('admin.hospitals.index', compact('hospitals'));
}

    public function create()
    {
        return view('admin.hospitals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:general_hospital,specialist_clinic,emergency_center',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'services' => 'nullable|array',
            'facilities' => 'nullable|array',
            'emergency_contact' => 'nullable|string|max:20',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'boolean',
            'active' => 'boolean'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('hospitals', 'public');
        }

        // Handle operating hours
        $operatingHours = [];
        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        foreach ($days as $day) {
            if ($request->has("operating_hours_{$day}")) {
                $operatingHours[$day] = $request->input("operating_hours_{$day}");
            }
        }
        $data['operating_hours'] = $operatingHours;

        Hospital::create($data);

        return redirect()->route('admin.hospitals.index')
                        ->with('success', 'Hospital berhasil ditambahkan.');
    }

    public function show(Hospital $hospital)
    {
        return view('admin.hospitals.show', compact('hospital'));
    }

    public function edit(Hospital $hospital)
    {
        return view('admin.hospitals.edit', compact('hospital'));
    }

    public function update(Request $request, Hospital $hospital)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:general_hospital,specialist_clinic,emergency_center',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string',
            'services' => 'nullable|array',
            'facilities' => 'nullable|array',
            'emergency_contact' => 'nullable|string|max:20',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'featured' => 'boolean',
            'active' => 'boolean'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($hospital->image) {
                Storage::disk('public')->delete($hospital->image);
            }
            $data['image'] = $request->file('image')->store('hospitals', 'public');
        }

        // Handle operating hours
        $operatingHours = [];
        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
        foreach ($days as $day) {
            if ($request->has("operating_hours_{$day}")) {
                $operatingHours[$day] = $request->input("operating_hours_{$day}");
            }
        }
        $data['operating_hours'] = $operatingHours;

        $hospital->update($data);

        return redirect()->route('admin.hospitals.index')
                        ->with('success', 'Hospital berhasil diperbarui.');
    }

    public function destroy(Hospital $hospital)
    {
        // Delete image
        if ($hospital->image) {
            Storage::disk('public')->delete($hospital->image);
        }

        $hospital->delete();

        return redirect()->route('admin.hospitals.index')
                        ->with('success', 'Hospital berhasil dihapus.');
    }
}
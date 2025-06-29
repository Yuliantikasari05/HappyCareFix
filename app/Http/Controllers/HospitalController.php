<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HospitalController extends Controller
{
    public function general(Request $request)
    {
        try {
            $query = Hospital::where('type', 'general_hospital')
                             ->where('active', true);
                             
            // Search functionality
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('address', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }
            
            // Get featured hospitals
            $featuredHospitals = Hospital::where('type', 'general_hospital')
                                        ->where('featured', true)
                                        ->where('active', true)
                                        ->take(3)
                                        ->get();
            
            // Get all hospitals with pagination
            $hospitals = $query->orderBy('name')->paginate(9);
            
            return view('hospital.general', compact('hospitals', 'featuredHospitals'));
            
        } catch (\Exception $e) {
            Log::error('Error in general hospital: ' . $e->getMessage());
            
            // Return empty collections to prevent undefined variable errors
            $hospitals = collect([])->paginate(9);
            $featuredHospitals = collect([]);
            
            return view('hospital.general', compact('hospitals', 'featuredHospitals'))
                   ->with('error', 'Terjadi kesalahan saat memuat data rumah sakit: ' . $e->getMessage());
        }
    }
    
    public function specialist_clinic(Request $request)
    {
        try {
            $query = Hospital::where('type', 'specialist_clinic')
                             ->where('active', true);
                             
            // Search functionality
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('address', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }
            
            // Get featured specialist clinics
            $featuredClinics = Hospital::where('type', 'specialist_clinic')
                                      ->where('featured', true)
                                      ->where('active', true)
                                      ->take(3)
                                      ->get();
            
            // Get all specialist clinics with pagination
            $clinics = $query->orderBy('name')->paginate(9);
            
            return view('hospital.specialist_clinic', compact('clinics', 'featuredClinics'));
            
        } catch (\Exception $e) {
            Log::error('Error in specialist clinic: ' . $e->getMessage());
            
            // Return empty collections to prevent undefined variable errors
            $clinics = collect([])->paginate(9);
            $featuredClinics = collect([]);
            
            return view('hospital.specialist_clinic', compact('clinics', 'featuredClinics'))
                   ->with('error', 'Terjadi kesalahan saat memuat data klinik spesialis: ' . $e->getMessage());
        }
    }
    
    public function emergency(Request $request)
    {
        try {
            $query = Hospital::where('type', 'emergency_center')
                             ->where('active', true);
                             
            // Search functionality
            if ($request->has('search') && !empty($request->search)) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('address', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            }
            
            // Get featured emergency centers
            $featuredCenters = Hospital::where('type', 'emergency_center')
                                      ->where('featured', true)
                                      ->where('active', true)
                                      ->take(3)
                                      ->get();
            
            // Get all emergency centers with pagination
            $emergencyCenters = $query->orderBy('name')->paginate(9);
            
            return view('hospital.emergency', compact('emergencyCenters', 'featuredCenters'));
            
        } catch (\Exception $e) {
            Log::error('Error in emergency center: ' . $e->getMessage());
            
            // Return empty collections to prevent undefined variable errors
            $emergencyCenters = collect([])->paginate(9);
            $featuredCenters = collect([]);
            
            return view('hospital.emergency', compact('emergencyCenters', 'featuredCenters'))
                   ->with('error', 'Terjadi kesalahan saat memuat data unit gawat darurat: ' . $e->getMessage());
        }
    }
    
    public function show($slug)
    {
        try {
            $hospital = Hospital::where('slug', $slug)
                               ->where('active', true)
                               ->firstOrFail();
            
            // Get related hospitals (same type, different hospital)
            $relatedHospitals = Hospital::where('type', $hospital->type)
                                       ->where('id', '!=', $hospital->id)
                                       ->where('active', true)
                                       ->take(3)
                                       ->get();
            
            return view('hospital.show', compact('hospital', 'relatedHospitals'));
            
        } catch (\Exception $e) {
            Log::error('Error in hospital show: ' . $e->getMessage());
            return redirect()->route('hospital.general')
                             ->with('error', 'Rumah sakit tidak ditemukan.');
        }
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class TourController extends Controller
{
    public function nature()
    {
        $tours = Tour::byCategory('nature')->published()->latest()->get();
        return view('tours.nature', compact('tours'));
    }

    public function culinary()
    {
        $tours = Tour::byCategory('culinary')->published()->latest()->get();
        return view('tours.culinary', compact('tours'));
    }

    public function family()
    {
        $tours = Tour::byCategory('family')->published()->latest()->get();
        return view('tours.family', compact('tours'));
    }

    public function show($slug)
    {
        $tour = Tour::where('slug', $slug)->published()->firstOrFail();
        
        // Get related tours from same category
        $relatedTours = Tour::byCategory($tour->category)
            ->published()
            ->where('id', '!=', $tour->id)
            ->take(3)
            ->get();
            
        return view('tours.show', compact('tour', 'relatedTours'));
    }
}
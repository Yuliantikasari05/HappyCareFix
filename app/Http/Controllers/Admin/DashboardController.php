<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Hospital;
use App\Models\Testimonial;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $stats = [
            'total_users' => User::count(),
            'total_articles' => Article::count(),
            'total_hospitals' => Hospital::count(),
            'total_tours' => Tour::count(),
            'total_testimonials' => Testimonial::count(),
            'published_articles' => Article::where('published', true)->count(),
            'pending_testimonials' => Testimonial::where('approved', false)->count(),
        ];

        // Recent data
        $recentArticles = Article::with('user')->latest()->take(5)->get();
        $recentTestimonials = Testimonial::with('user')->latest()->take(5)->get();
        $recentHospitals = Hospital::latest()->take(5)->get();
        $recentTours = Tour::latest()->take(5)->get();

        // Chart data for articles
        $articleChartData = Article::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Chart data for testimonials
        $testimonialChartData = Testimonial::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentArticles',
            'recentTestimonials',
            'recentHospitals',
            'recentTours',
            'articleChartData',
            'testimonialChartData'
        ));
    }
}
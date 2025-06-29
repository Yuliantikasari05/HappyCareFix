<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::published()->with(['user', 'category']);
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%');
        }
        
        // Category filter
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }
        
        $articles = $query->latest()->paginate(9);
        $featuredArticles = Article::published()->featured()->latest()->take(3)->get();
        $categories = Category::all();
        
        return view('articles.index', compact('articles', 'featuredArticles', 'categories'));
    }

    public function show($slug)
    {
        $article = Article::published()->where('slug', $slug)->firstOrFail();
        
        // Increment views
        $article->incrementViews();
        
        // Get related articles from same category if available
        $relatedQuery = Article::published()
            ->where('id', '!=', $article->id);
            
        if ($article->category_id) {
            $relatedQuery->where('category_id', $article->category_id);
        }
        
        $relatedArticles = $relatedQuery->latest()->take(4)->get();
        
        // If not enough related articles from same category, get other articles
        if ($relatedArticles->count() < 4) {
            $moreArticles = Article::published()
                ->where('id', '!=', $article->id)
                ->whereNotIn('id', $relatedArticles->pluck('id')->toArray())
                ->latest()
                ->take(4 - $relatedArticles->count())
                ->get();
                
            $relatedArticles = $relatedArticles->concat($moreArticles);
        }
        
        $categories = Category::all();
        
        return view('articles.show', compact('article', 'relatedArticles', 'categories'));
    }
    
    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $articles = Article::published()
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(9);
            
        $featuredArticles = Article::published()
            ->featured()
            ->where('category_id', $category->id)
            ->latest()
            ->take(3)
            ->get();
            
        $categories = Category::all();
        
        return view('articles.index', compact('articles', 'featuredArticles', 'categories', 'category'));
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with(['user', 'category']);
        
        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
        }
        
        if ($request->has('status') && $request->status !== '') {
            $query->where('published', $request->status);
        }
        
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }
        
        $articles = $query->latest()->paginate(10);
        $categories = Category::all();
        
        return view('admin.articles.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Log::info('Article store method called');
        Log::info($request->all());

        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'excerpt' => 'nullable|string|max:500',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'category_id' => 'nullable|exists:categories,id',
            ]);

            $data = $request->all();
            $data['slug'] = Str::slug($request->title);
            $data['user_id'] = auth()->id();
            $data['published'] = $request->has('published') ? true : false;
            $data['featured'] = $request->has('featured') ? true : false;
            $data['views_count'] = 0;

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('articles', 'public');
            }

            $article = Article::create($data);

            Log::info('Article created successfully', ['article_id' => $article->id]);

            return redirect()->route('admin.articles.index')
                ->with('success', 'Article created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating article: ' . $e->getMessage());
            return back()->with('error', 'Error creating article: ' . $e->getMessage())->withInput();
        }
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['published'] = $request->has('published') ? true : false;
        $data['featured'] = $request->has('featured') ? true : false;

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article deleted successfully.');
    }

    public function togglePublished(Article $article)
    {
        $article->update([
            'published' => !$article->published
        ]);

        $status = $article->published ? 'published' : 'unpublished';
        
        return redirect()->route('admin.articles.index')
            ->with('success', "Article has been {$status}.");
    }

    public function toggleFeatured(Article $article)
    {
        $article->update([
            'featured' => !$article->featured
        ]);

        $status = $article->featured ? 'featured' : 'unfeatured';
        
        return redirect()->route('admin.articles.index')
            ->with('success', "Article has been {$status}.");
    }
}

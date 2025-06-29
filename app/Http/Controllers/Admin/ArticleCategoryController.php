<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = ArticleCategory::withCount('articles')
            ->orderBy('name')
            ->paginate(10);
            
        return view('admin.articles.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.articles.categories.form');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:article_categories',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $category = new ArticleCategory();
        $category->name = $validated['name'];
        $category->slug = $validated['slug'] ?? Str::slug($validated['name']);
        $category->description = $validated['description'];
        $category->icon = $validated['icon'];
        $category->save();

        return redirect()->route('admin.article-categories.index')
            ->with('success', 'Kategori berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Models\ArticleCategory  $category
     * @return \Illuminate\View\View
     */
    public function edit(ArticleCategory $category)
    {
        return view('admin.articles.categories.form', compact('category'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleCategory  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ArticleCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:article_categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $category->name = $validated['name'];
        $category->slug = $validated['slug'] ?? Str::slug($validated['name']);
        $category->description = $validated['description'];
        $category->icon = $validated['icon'];
        $category->save();

        return redirect()->route('admin.article-categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Models\ArticleCategory  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ArticleCategory $category)
    {
        // Check if category has articles
        if ($category->articles()->count() > 0) {
            return redirect()->route('admin.article-categories.index')
                ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki artikel terkait.');
        }
        
        $category->delete();

        return redirect()->route('admin.article-categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
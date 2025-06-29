<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the content.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Get content with filtering
        $query = Content::query();
        
        // Apply search filter
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }
        
        // Apply type filter
        if ($request->has('type') && !empty($request->input('type'))) {
            $query->where('type', $request->input('type'));
        }
        
        // Get paginated results
        $contents = $query->orderBy('updated_at', 'desc')->paginate(10);
        
        return view('admin.content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new content.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.create');
    }

    /**
     * Store a newly created content in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:contents',
            'type' => 'required|string|in:page,post,service',
            'status' => 'required|string|in:published,draft,archived',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);
        
        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        
        // Handle featured image upload
        $featuredImagePath = null;
        if ($request->hasFile('featured_image')) {
            $featuredImagePath = $request->file('featured_image')->store('content/featured', 'public');
        }
        
        // Create the content
        $content = Content::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'type' => $validated['type'],
            'status' => $validated['status'],
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'featured_image' => $featuredImagePath,
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'meta_keywords' => $request->input('meta_keywords'),
            'user_id' => auth()->id(),
        ]);
        
        return redirect()->route('admin.content.index')
            ->with('success', 'Content created successfully.');
    }

    /**
     * Show the form for editing the specified content.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('admin.content.edit', compact('content'));
    }

    /**
     * Update the specified content in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);
        
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:contents,slug,' . $content->id,
            'type' => 'required|string|in:page,post,service',
            'status' => 'required|string|in:published,draft,archived',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);
        
        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($content->featured_image) {
                Storage::disk('public')->delete($content->featured_image);
            }
            
            $featuredImagePath = $request->file('featured_image')->store('content/featured', 'public');
            $content->featured_image = $featuredImagePath;
        }
        
        // Update content data
        $content->title = $validated['title'];
        $content->slug = $validated['slug'];
        $content->type = $validated['type'];
        $content->status = $validated['status'];
        $content->excerpt = $validated['excerpt'];
        $content->content = $validated['content'];
        $content->meta_title = $request->input('meta_title');
        $content->meta_description = $request->input('meta_description');
        $content->meta_keywords = $request->input('meta_keywords');
        
        $content->save();
        
        return redirect()->route('admin.content.index')
            ->with('success', 'Content updated successfully.');
    }

    /**
     * Remove the specified content from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        
        // Delete featured image if exists
        if ($content->featured_image) {
            Storage::disk('public')->delete($content->featured_image);
        }
        
        $content->delete();
        
        return redirect()->route('admin.content.index')
            ->with('success', 'Content deleted successfully.');
    }
}

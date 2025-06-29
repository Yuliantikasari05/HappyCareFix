@extends('layouts.app')

@section('title', 'Articles - HappyCare')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="relative py-20 overflow-hidden bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="relative container px-4 mx-auto">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-flex items-center px-4 py-2 mb-6 text-sm font-medium text-primary-100 bg-white/10 rounded-full backdrop-blur-sm">
                    <i data-lucide="newspaper" class="w-4 h-4 mr-2"></i>
                    Health & Wellness Articles
                </div>
                <h1 class="mb-6 text-4xl font-bold text-white md:text-6xl">
                    Latest Health 
                    <span class="text-transparent bg-gradient-to-r from-green-400 to-blue-400 bg-clip-text">Articles</span>
                </h1>
                <p class="mb-8 text-xl text-primary-100">
                    Stay informed with expert insights, health tips, and medical breakthroughs from our healthcare professionals.
                </p>
                
                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto">
                    <form action="{{ route('articles.index') }}" method="GET" class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Search articles, topics, or authors..." 
                               class="w-full px-6 py-4 pr-16 text-gray-900 bg-white border-0 rounded-2xl focus:ring-4 focus:ring-white/20 focus:outline-none">
                        <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 p-3 bg-primary-600 text-white rounded-xl hover:bg-primary-700 transition-colors">
                            <i data-lucide="search" class="w-5 h-5"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Articles -->
    @if($featuredArticles && $featuredArticles->count() > 0)
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">Featured Articles</h2>
                <p class="text-xl text-gray-600">Handpicked articles from our medical experts</p>
            </div>
            
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($featuredArticles as $article)
                <article class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
                    <div class="relative overflow-hidden">
                        @if($article->image)
                            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                                <i data-lucide="newspaper" class="w-12 h-12 text-white"></i>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 text-xs font-semibold text-white bg-red-500 rounded-full">Featured</span>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center mb-3 text-sm text-gray-500">
                            <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                            {{ $article->created_at->format('M d, Y') }}
                            @if($article->category)
                                <span class="mx-2">•</span>
                                <span class="px-2 py-1 text-xs bg-primary-100 text-primary-700 rounded-full">{{ $article->category->name }}</span>
                            @endif
                        </div>
                        
                        <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-primary-600 transition-colors">
                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                        </h3>
                        
                        <p class="mb-4 text-gray-600 line-clamp-3">{{ Str::limit($article->excerpt, 120) }}</p>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center mr-3">
                                    <i data-lucide="user" class="w-4 h-4 text-primary-600"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-700">{{ $article->author->name ?? 'HappyCare Team' }}</span>
                            </div>
                            
                            <a href="{{ route('articles.show', $article->slug) }}" 
                               class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                                Read More
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- All Articles -->
    <section class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-2xl font-bold text-gray-900">All Articles</h2>
                        
                        <!-- Filters -->
                        <div class="flex items-center space-x-4">
                            <select name="category" onchange="window.location.href=this.value" 
                                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                <option value="{{ route('articles.index') }}">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ route('articles.index', ['category' => $category->slug]) }}" 
                                            {{ request('category') == $category->slug ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    @if($articles->count() > 0)
                        <div class="space-y-8">
                            @foreach($articles as $article)
                            <article class="group bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-lg transition-all duration-300">
                                <div class="flex flex-col md:flex-row gap-6">
                                    <div class="md:w-1/3">
                                        @if($article->image)
                                            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" 
                                                 class="w-full h-48 md:h-32 object-cover rounded-xl group-hover:scale-105 transition-transform duration-300">
                                        @else
                                            <div class="w-full h-48 md:h-32 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center">
                                                <i data-lucide="newspaper" class="w-8 h-8 text-white"></i>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="md:w-2/3">
                                        <div class="flex items-center mb-3 text-sm text-gray-500">
                                            <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                                            {{ $article->created_at->format('M d, Y') }}
                                            @if($article->category)
                                                <span class="mx-2">•</span>
                                                <span class="px-2 py-1 text-xs bg-primary-100 text-primary-700 rounded-full">{{ $article->category->name }}</span>
                                            @endif
                                            <span class="mx-2">•</span>
                                            <span class="flex items-center">
                                                <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                                {{ $article->views_count ?? 0 }} views
                                            </span>
                                        </div>
                                        
                                        <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-primary-600 transition-colors">
                                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                                        </h3>
                                        
                                        <p class="mb-4 text-gray-600 line-clamp-2">{{ Str::limit($article->excerpt, 150) }}</p>
                                        
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center mr-3">
                                                    <i data-lucide="user" class="w-4 h-4 text-primary-600"></i>
                                                </div>
                                                <span class="text-sm font-medium text-gray-700">{{ $article->author->name ?? 'HappyCare Team' }}</span>
                                            </div>
                                            
                                            <a href="{{ route('articles.show', $article->slug) }}" 
                                               class="inline-flex items-center px-4 py-2 text-primary-600 hover:text-white hover:bg-primary-600 border border-primary-600 rounded-lg transition-all duration-300">
                                                Read Article
                                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-12 flex justify-center">
                            {{ $articles->links() }}
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i data-lucide="newspaper" class="w-12 h-12 text-gray-400"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">No Articles Found</h3>
                            <p class="text-gray-600">We couldn't find any articles matching your criteria.</p>
                        </div>
                    @endif
                </div>
                
                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <div class="sticky top-8 space-y-8">
                        <!-- Popular Articles -->
                        <div class="bg-white border border-gray-200 rounded-2xl p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center">
                                <i data-lucide="trending-up" class="w-5 h-5 mr-2 text-primary-600"></i>
                                Popular Articles
                            </h3>
                            <div class="space-y-4">
                                @forelse($popularArticles ?? [] as $popular)
                                <a href="{{ route('articles.show', $popular->slug) }}" class="block group">
                                    <div class="flex gap-4">
                                        @if($popular->image)
                                            <img src="{{ Storage::url($popular->image) }}" alt="{{ $popular->title }}" 
                                                 class="w-16 h-16 object-cover rounded-lg">
                                        @else
                                            <div class="w-16 h-16 bg-primary-100 rounded-lg flex items-center justify-center">
                                                <i data-lucide="newspaper" class="w-6 h-6 text-primary-600"></i>
                                            </div>
                                        @endif
                                        <div class="flex-1">
                                            <h4 class="font-medium text-gray-900 group-hover:text-primary-600 transition-colors line-clamp-2">
                                                {{ $popular->title }}
                                            </h4>
                                            <p class="text-sm text-gray-500 mt-1">{{ $popular->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                <p class="text-gray-500 text-center py-4">No popular articles yet.</p>
                                @endforelse
                            </div>
                        </div>
                        
                        <!-- Newsletter Signup -->
                        <div class="bg-gradient-to-br from-primary-600 to-primary-700 rounded-2xl p-6 text-white">
                            <h3 class="text-lg font-bold mb-3">Stay Updated</h3>
                            <p class="text-primary-100 mb-4">Get the latest health articles delivered to your inbox.</p>
                            {{-- <form action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-3">
                                @csrf
                                <input type="email" name="email" placeholder="Your email address" required
                                       class="w-full px-4 py-3 rounded-lg text-gray-900 focus:ring-2 focus:ring-white/20 focus:outline-none">
                                <button type="submit" class="w-full px-4 py-3 bg-white text-primary-600 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                                    Subscribe Now
                                </button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
@endsection

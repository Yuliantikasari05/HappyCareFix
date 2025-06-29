@extends('layouts.app')

@section('title', $article->meta_title ?: $article->title)
@section('meta_description', $article->meta_description ?: Str::limit($article->excerpt ?: $article->content, 160))

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Articles</a></li>
                    @if($article->category)
                        <li class="breadcrumb-item">
                            <a href="{{ route('articles.category', $article->category->slug) }}">
                                {{ $article->category->name }}
                            </a>
                        </li>
                    @endif
                    <li class="breadcrumb-item active">{{ $article->title }}</li>
                </ol>
            </nav>

            <!-- Article Content -->
            <article class="card shadow-sm">
                @if($article->image)
                    <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 400px; object-fit: cover;">
                @endif
                
                <div class="card-body">
                    <!-- Article Header -->
                    <div class="mb-4">
                        @if($article->category)
                            <a href="{{ route('articles.category', $article->category->slug) }}" class="badge bg-primary text-decoration-none mb-2">
                                {{ $article->category->name }}
                            </a>
                        @endif
                        
                        @if($article->featured)
                            <span class="badge bg-warning text-dark mb-2 ms-1">Featured</span>
                        @endif
                        
                        <h1 class="card-title h2 mb-3">{{ $article->title }}</h1>
                        
                        <div class="d-flex align-items-center text-muted mb-3">
                            <div class="me-4">
                                <i class="fas fa-user"></i> {{ $article->user->name }}
                            </div>
                            <div class="me-4">
                                <i class="fas fa-calendar"></i> {{ $article->created_at->format('F d, Y') }}
                            </div>
                            <div class="me-4">
                                <i class="fas fa-eye"></i> {{ $article->views_count }} views
                            </div>
                            <div>
                                <i class="fas fa-clock"></i> {{ ceil(str_word_count($article->content) / 200) }} min read
                            </div>
                        </div>
                        
                        @if($article->excerpt)
                            <p class="lead text-muted">{{ $article->excerpt }}</p>
                        @endif
                    </div>
                    
                    <!-- Article Content -->
                    <div class="article-content">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                    
                    <!-- Social Share -->
                    <div class="mt-5 pt-4 border-top">
                        <h6 class="mb-3">Share this article:</h6>
                        <div class="d-flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                               class="btn btn-outline-primary btn-sm" target="_blank">
                                <i class="fab fa-facebook-f"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}" 
                               class="btn btn-outline-info btn-sm" target="_blank">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . request()->fullUrl()) }}" 
                               class="btn btn-outline-success btn-sm" target="_blank">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Categories -->
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Categories</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        @foreach(App\Models\Category::all() as $cat)
                            <a href="{{ route('articles.category', $cat->slug) }}" class="badge bg-light text-dark text-decoration-none p-2">
                                {{ $cat->name }}
                                <span class="ms-1 badge bg-primary rounded-pill">
                                    {{ App\Models\Article::published()->where('category_id', $cat->id)->count() }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Related Articles -->
            @if($relatedArticles->count() > 0)
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Related Articles</h5>
                </div>
                <div class="card-body">
                    @foreach($relatedArticles as $related)
                    <div class="d-flex mb-3 {{ !$loop->last ? 'pb-3 border-bottom' : '' }}">
                        @if($related->image)
                            <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}" 
                                 class="me-3 rounded" style="width: 80px; height: 60px; object-fit: cover;">
                        @else
                            <div class="me-3 bg-secondary rounded d-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 60px;">
                                <i class="fas fa-newspaper text-white"></i>
                            </div>
                        @endif
                        <div class="flex-grow-1">
                            <h6 class="mb-1">
                                <a href="{{ route('articles.show', $related->slug) }}" class="text-decoration-none">
                                    {{ Str::limit($related->title, 60) }}
                                </a>
                            </h6>
                            <small class="text-muted">
                                {{ $related->created_at->format('M d, Y') }}
                            </small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Newsletter Signup -->
            <div class="card shadow-sm bg-primary text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Stay Updated</h5>
                    <p class="card-text">Get the latest health tips and articles delivered to your inbox.</p>
                    <form>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Your email address">
                        </div>
                        <button type="submit" class="btn btn-light">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.article-content {
    font-size: 1.1rem;
    line-height: 1.8;
}

.article-content p {
    margin-bottom: 1.5rem;
}

.article-content h2, .article-content h3 {
    margin-top: 2rem;
    margin-bottom: 1rem;
}
</style>
@endpush
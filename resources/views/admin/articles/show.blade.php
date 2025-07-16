@extends('layouts.app')

@section('title', $article->title . ' - HappyCare')

@section('content')
<div class="min-vh-100 bg-light">
    <!-- Article Header -->
    <section class="bg-primary bg-gradient text-white py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb breadcrumb-dark">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('articles.index') }}" class="text-white-50 text-decoration-none">Artikel</a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">
                                {{ Str::limit($article->title, 50) }}
                            </li>
                        </ol>
                    </nav>

                    <!-- Article Meta -->
                    <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
                        @if($article->category)
                            <span class="badge bg-white text-primary px-3 py-2 rounded-pill">
                                <i class="fas fa-tag me-1"></i>{{ $article->category->name }}
                            </span>
                        @endif
                        <div class="d-flex align-items-center text-white-50">
                            <i class="fas fa-calendar me-2"></i>
                            {{ $article->created_at->format('d M Y') }}
                        </div>
                        <div class="d-flex align-items-center text-white-50">
                            <i class="fas fa-user me-2"></i>
                            {{ $article->user->name ?? 'HappyCare Team' }}
                        </div>
                        <div class="d-flex align-items-center text-white-50">
                            <i class="fas fa-eye me-2"></i>
                            {{ $article->views_count ?? rand(100, 1000) }} views
                        </div>
                    </div>

                    <!-- Article Title -->
                    <h1 class="display-4 fw-bold text-white mb-0">
                        {{ $article->title }}
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Featured Image -->
                    @if($article->image)
                    <div class="mb-5">
                        <img src="{{ Storage::url($article->image) }}" 
                             alt="{{ $article->title }}" 
                             class="img-fluid rounded-4 shadow-lg w-100"
                             style="max-height: 500px; object-fit: cover;">
                    </div>
                    @endif

                    <!-- Article Body -->
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <!-- Excerpt -->
                            @if($article->excerpt)
                            <div class="alert alert-primary border-0 shadow-sm mb-5">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-quote-left text-primary me-3 mt-1"></i>
                                    <div class="fs-5 fw-medium text-primary mb-0">
                                        {{ $article->excerpt }}
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Content -->
                            <div class="article-content fs-6 lh-lg text-dark">
                                {!! nl2br(e($article->content)) !!}
                            </div>

                            <!-- Share Buttons -->
                            <div class="border-top pt-4 mt-5">
                                <h5 class="fw-bold mb-3">
                                    <i class="fas fa-share-alt text-primary me-2"></i>Bagikan Artikel
                                </h5>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" 
                                       class="btn btn-primary" target="_blank">
                                        <i class="fab fa-facebook-f me-2"></i>Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}" 
                                       class="btn btn-info" target="_blank">
                                        <i class="fab fa-twitter me-2"></i>Twitter
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . request()->fullUrl()) }}" 
                                       class="btn btn-success" target="_blank">
                                        <i class="fab fa-whatsapp me-2"></i>WhatsApp
                                    </a>
                                    <button class="btn btn-outline-secondary" onclick="copyToClipboard()">
                                        <i class="fas fa-copy me-2"></i>Copy Link
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Articles -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="text-center fw-bold mb-5">
                        <i class="fas fa-newspaper text-primary me-2"></i>Artikel Terkait
                    </h2>
                    
                    <div class="row g-4">
                        @for($i = 1; $i <= 3; $i++)
                        <div class="col-md-4">
                            <article class="card border-0 shadow-sm h-100 hover-lift">
                                <div class="position-relative overflow-hidden">
                                    <img src="https://via.placeholder.com/400x200/007bff/ffffff?text=Article+{{ $i }}" 
                                         alt="Related Article {{ $i }}" 
                                         class="card-img-top" style="height: 200px; object-fit: cover;">
                                    <div class="position-absolute top-0 start-0 m-3">
                                        <span class="badge bg-primary px-3 py-2">Kesehatan</span>
                                    </div>
                                </div>
                                
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex align-items-center mb-3 text-muted small">
                                        <i class="fas fa-calendar me-2"></i>
                                        {{ now()->subDays($i)->format('d M Y') }}
                                    </div>
                                    
                                    <h5 class="card-title fw-bold mb-3">
                                        <a href="#" class="text-decoration-none text-dark stretched-link">
                                            Tips Kesehatan Artikel {{ $i }}
                                        </a>
                                    </h5>
                                    
                                    <p class="card-text text-muted flex-grow-1">
                                        Deskripsi singkat artikel kesehatan yang memberikan informasi bermanfaat untuk pembaca.
                                    </p>
                                    
                                    <div class="d-flex align-items-center text-primary small fw-medium">
                                        Baca Selengkapnya
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function copyToClipboard() {
    navigator.clipboard.writeText(window.location.href).then(function() {
        // Show success message
        const btn = event.target.closest('button');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check me-2"></i>Copied!';
        btn.classList.remove('btn-outline-secondary');
        btn.classList.add('btn-success');
        
        setTimeout(function() {
            btn.innerHTML = originalText;
            btn.classList.remove('btn-success');
            btn.classList.add('btn-outline-secondary');
        }, 2000);
    });
}
</script>

<style>
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}
.article-content {
    line-height: 1.8;
}
.article-content p {
    margin-bottom: 1.5rem;
}
.breadcrumb-dark .breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.5);
}
</style>
@endsection
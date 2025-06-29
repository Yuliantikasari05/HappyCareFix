<div class="article-card {{ isset($featured) && $featured ? 'featured' : '' }}">
    <div class="article-image">
        @if($article->featured_image)
            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}">
        @else
            <img src="{{ asset('images/article-placeholder.jpg') }}" alt="{{ $article->title }}">
        @endif
        
        @if($article->category)
            <div class="article-category">
                <a href="{{ route('articles.category', $article->category->slug) }}">{{ $article->category->name }}</a>
            </div>
        @endif
    </div>
    
    <div class="article-details">
        <h3 class="article-title">
            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
        </h3>
        
        <div class="article-meta">
            <span class="date">
                <i class="far fa-calendar-alt"></i> {{ $article->formatted_published_date }}
            </span>
            <span class="reading-time">
                <i class="far fa-clock"></i> {{ $article->reading_time }}
            </span>
        </div>
        
        <div class="article-excerpt">
            <p>{{ $article->excerpt }}</p>
        </div>
        
        <a href="{{ route('articles.show', $article->slug) }}" class="read-more">
            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    
    @if (isset($featured) && $featured)
        <div class="featured-badge">
            <i class="fas fa-star"></i> Artikel Pilihan
        </div>
    @endif
</div>

<style>
    .article-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        height: 100%;
        position: relative;
        transition: all 0.3s ease;
    }
    
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .article-card.featured {
        border: 2px solid var(--bs-primary);
    }
    
    .article-image {
        position: relative;
        height: 200px;
        overflow: hidden;
    }
    
    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s ease;
    }
    
    .article-card:hover .article-image img {
        transform: scale(1.1);
    }
    
    .article-category {
        position: absolute;
        bottom: 15px;
        left: 15px;
    }
    
    .article-category a {
        background: var(--bs-primary);
        color: #fff;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .article-category a:hover {
        background: #2a5298;
    }
    
    .article-details {
        padding: 20px;
    }
    
    .article-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
        line-height: 1.4;
    }
    
    .article-title a {
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .article-title a:hover {
        color: var(--bs-primary);
    }
    
    .article-meta {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
        color: #6c757d;
        font-size: 13px;
    }
    
    .article-meta span i {
        margin-right: 5px;
    }
    
    .article-excerpt {
        color: #6c757d;
        margin-bottom: 15px;
        font-size: 14px;
        line-height: 1.6;
    }
    
    .read-more {
        color: var(--bs-primary);
        font-weight: 600;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    
    .read-more i {
        margin-left: 5px;
        transition: all 0.3s ease;
    }
    
    .read-more:hover {
        color: #2a5298;
    }
    
    .read-more:hover i {
        transform: translateX(5px);
    }
    
    .featured-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--bs-primary);
        color: #fff;
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 20px;
    }
    
    .featured-badge i {
        margin-right: 5px;
        color: #ffc107;
    }
</style>
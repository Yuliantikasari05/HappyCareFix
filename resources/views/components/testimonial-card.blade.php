<div class="testimonial-card {{ isset($featured) && $featured ? 'featured' : '' }}">
    <div class="testimonial-rating">
        @for ($i = 1; $i <= 5; $i++)
            <i class="fas fa-star {{ $i <= $testimonial->rating ? 'filled' : '' }}"></i>
        @endfor
    </div>
    
    <h3 class="testimonial-title">{{ $testimonial->title }}</h3>
    
    <div class="testimonial-content">
        <p>{{ Str::limit($testimonial->content, 150) }}</p>
    </div>
    
    <div class="testimonial-author">
        <div class="author-image">
            @if ($testimonial->photo)
                <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}">
            @else
                <img src="{{ asset('images/default-avatar.png') }}" alt="{{ $testimonial->name }}">
            @endif
        </div>
        <div class="author-info">
            <h4>{{ $testimonial->name }}</h4>
            @if ($testimonial->service_type)
                <p>{{ $testimonial->service_type == 'hospital' ? 'Pasien Rumah Sakit' : 'Peserta Wisata' }}</p>
            @endif
        </div>
    </div>
    
    @if (isset($featured) && $featured)
        <div class="featured-badge">
            <i class="fas fa-award"></i> Testimoni Pilihan
        </div>
    @endif
</div>

<style>
    .testimonial-card {
        background: #fff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        height: 100%;
        position: relative;
        transition: all 0.3s ease;
    }
    
    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .testimonial-card.featured {
        border: 2px solid var(--bs-primary);
    }
    
    .testimonial-rating {
        margin-bottom: 15px;
    }
    
    .testimonial-rating i {
        color: #ddd;
        font-size: 18px;
        margin-right: 2px;
    }
    
    .testimonial-rating i.filled {
        color: #ffc107;
    }
    
    .testimonial-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 15px;
        color: var(--bs-primary);
    }
    
    .testimonial-content {
        margin-bottom: 20px;
        color: #6c757d;
    }
    
    .testimonial-author {
        display: flex;
        align-items: center;
        margin-top: auto;
    }
    
    .author-image {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 15px;
    }
    
    .author-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .author-info h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 0;
    }
    
    .author-info p {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 0;
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
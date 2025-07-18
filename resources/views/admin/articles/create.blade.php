@extends('layouts.admin')

@section('title', 'Tambah Artikel')

@section('content')
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 rounded-3 p-3 me-3">
                        <i class="fas fa-plus-circle text-primary fs-4"></i>
                    </div>
                    <div>
                        <h1 class="h3 mb-1 fw-bold">Tambah Artikel Baru</h1>
                        <p class="text-muted mb-0 small">Buat artikel dan konten baru</p>
                    </div>
                </div>
                <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Error Alerts -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <div class="d-flex align-items-start">
                <i class="fas fa-exclamation-triangle me-2 mt-1"></i>
                <div>
                    <strong>Terdapat kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-circle me-2"></i>
                <strong>Error!</strong> {{ session('error') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Basic Information -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom">
                        <h5 class="mb-0 fw-semibold">
                            <i class="fas fa-info-circle text-primary me-2"></i>Informasi Dasar
                        </h5>
                        <small class="text-muted">Informasi utama tentang artikel</small>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-heading text-muted me-1"></i>Judul Artikel *
                            </label>
                            <input type="text" name="title" id="title" 
                                   class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                   placeholder="Masukkan judul artikel" 
                                   value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-link text-muted me-1"></i>Slug
                            </label>
                            <input type="text" name="slug" id="slug" 
                                   class="form-control @error('slug') is-invalid @enderror" 
                                   placeholder="Auto-generate dari judul" 
                                   value="{{ old('slug') }}" readonly>
                            <div class="form-text">Biarkan kosong untuk auto-generate dari judul</div>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-align-left text-muted me-1"></i>Excerpt
                            </label>
                            <textarea name="excerpt" rows="3" 
                                      class="form-control @error('excerpt') is-invalid @enderror" 
                                      placeholder="Ringkasan singkat artikel">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-semibold">
                                <i class="fas fa-file-alt text-muted me-1"></i>Konten Artikel *
                            </label>
                            <textarea name="content" rows="12" 
                                      class="form-control @error('content') is-invalid @enderror" 
                                      placeholder="Tulis konten artikel di sini..." required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Publish Settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom">
                        <h6 class="mb-0 fw-semibold">
                            <i class="fas fa-cog text-primary me-2"></i>Pengaturan Publikasi
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="published" value="1" 
                                       {{ old('published', true) ? 'checked' : '' }} id="published">
                                <label class="form-check-label fw-semibold" for="published">
                                    <i class="fas fa-globe text-success me-1"></i>Publikasikan Artikel
                                </label>
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="featured" value="1" 
                                       {{ old('featured') ? 'checked' : '' }} id="featured">
                                <label class="form-check-label fw-semibold" for="featured">
                                    <i class="fas fa-star text-warning me-1"></i>Artikel Unggulan
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Media -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom">
                        <h6 class="mb-0 fw-semibold">
                            <i class="fas fa-image text-primary me-2"></i>Media
                        </h6>
                    </div>
                    <div class="card-body">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-camera text-muted me-1"></i>Gambar Utama
                        </label>
                        <input type="file" name="image" accept="image/*" 
                               class="form-control @error('image') is-invalid @enderror">
                        <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- SEO Settings -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom">
                        <h6 class="mb-0 fw-semibold">
                            <i class="fas fa-search text-primary me-2"></i>SEO Settings
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Meta Title</label>
                            <input type="text" name="meta_title" 
                                   class="form-control @error('meta_title') is-invalid @enderror" 
                                   value="{{ old('meta_title') }}">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-semibold">Meta Description</label>
                            <textarea name="meta_description" rows="3" 
                                      class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description') }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                        <i class="fas fa-save me-2"></i>Simpan Artikel
                    </button>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i>Batal
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    
    titleInput.addEventListener('input', function() {
        const title = this.value;
        const slug = title.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        slugInput.value = slug;
    });
});
</script>

<style>
.form-control:focus, .form-select:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}
.card { transition: all 0.3s ease; }
.btn { transition: all 0.2s ease; }
</style>
@endsection
@extends('layouts.admin')

@section('title', 'Kelola Artikel')

@section('content')
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 rounded-3 p-3 me-3">
                        <i class="fas fa-newspaper text-primary fs-4"></i>
                    </div>
                    <div>
                        <h1 class="h3 mb-1 fw-bold">Kelola Artikel</h1>
                        <p class="text-muted mb-0 small">Kelola semua artikel dan konten</p>
                    </div>
                </div>
                <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-lg shadow-sm">
                    <i class="fas fa-plus me-2"></i>Tambah Artikel
                </a>
            </div>
        </div>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-2"></i>
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Filter & Search Card -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.articles.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-search text-muted me-1"></i>Cari Artikel
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-start-0" 
                                   placeholder="Cari berdasarkan judul..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-filter text-muted me-1"></i>Status
                        </label>
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Published</option>
                            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Draft</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">
                            <i class="fas fa-tags text-muted me-1"></i>Kategori
                        </label>
                        <select name="category" class="form-select">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <div class="d-grid gap-2 w-100">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search me-1"></i>Cari
                            </button>
                            @if(request('search') || request('status') || request('category'))
                                <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-1"></i>Reset
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Articles Table -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold">
                    <i class="fas fa-list text-primary me-2"></i>Daftar Artikel
                </h5>
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                    Total: {{ $articles->total() }} artikel
                </span>
            </div>
        </div>
        
        @if($articles->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="border-0 fw-semibold">No</th>
                            <th class="border-0 fw-semibold">Artikel</th>
                            <th class="border-0 fw-semibold">Kategori</th>
                            <th class="border-0 fw-semibold">Penulis</th>
                            <th class="border-0 fw-semibold">Status</th>
                            <th class="border-0 fw-semibold">Featured</th>
                            <th class="border-0 fw-semibold">Views</th>
                            <th class="border-0 fw-semibold">Tanggal</th>
                            <th class="border-0 fw-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $index => $article)
                        <tr class="border-bottom">
                            <td class="fw-medium">{{ $articles->firstItem() + $index }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($article->image)
                                        <img src="{{ Storage::url($article->image) }}" 
                                             class="rounded-3 border me-3" 
                                             width="60" height="60" 
                                             style="object-fit: cover;" 
                                             alt="{{ $article->title }}">
                                    @else
                                        <div class="bg-light rounded-3 border d-flex align-items-center justify-content-center me-3" 
                                             style="width: 60px; height: 60px;">
                                            <i class="fas fa-newspaper text-muted"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h6 class="mb-1 fw-semibold">{{ Str::limit($article->title, 40) }}</h6>
                                        @if($article->published)
                                            <a href="{{ route('articles.show', $article->slug) }}" 
                                               class="text-decoration-none small text-primary" target="_blank">
                                                <i class="fas fa-external-link-alt me-1"></i>Lihat Artikel
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($article->category)
                                    <span class="badge bg-purple bg-opacity-10 text-purple px-3 py-2">
                                        <i class="fas fa-tag me-1"></i>{{ $article->category->name }}
                                    </span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2">
                                        Uncategorized
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2" 
                                         style="width: 32px; height: 32px;">
                                        <span class="small fw-bold text-primary">{{ substr($article->user->name, 0, 1) }}</span>
                                    </div>
                                    <span class="small">{{ $article->user->name }}</span>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('admin.articles.toggle-published', $article) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $article->published ? 'btn-success' : 'btn-warning' }} px-3">
                                        <i class="fas fa-{{ $article->published ? 'check-circle' : 'clock' }} me-1"></i>
                                        {{ $article->published ? 'Published' : 'Draft' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.articles.toggle-featured', $article) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $article->featured ? 'btn-warning' : 'btn-outline-secondary' }} px-3">
                                        <i class="fas fa-{{ $article->featured ? 'star' : 'star-half-alt' }} me-1"></i>
                                        {{ $article->featured ? 'Featured' : 'Regular' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div class="d-flex align-items-center text-muted">
                                    <i class="fas fa-eye me-1"></i>
                                    <span class="small">{{ $article->views_count ?? 0 }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="small">
                                    <div class="fw-medium">{{ $article->created_at->format('d M Y') }}</div>
                                    <div class="text-muted">{{ $article->created_at->format('H:i') }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.articles.edit', $article) }}" 
                                       class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus artikel {{ $article->title }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($articles->hasPages())
                <div class="card-footer bg-light border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted small">
                            Menampilkan {{ $articles->firstItem() ?? 0 }} - {{ $articles->lastItem() ?? 0 }} 
                            dari {{ $articles->total() }} artikel
                        </div>
                        <div>
                            {{ $articles->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="card-body text-center py-5">
                <div class="mb-4">
                    <i class="fas fa-newspaper text-muted" style="font-size: 4rem;"></i>
                </div>
                <h4 class="text-muted mb-3">Belum ada artikel</h4>
                <p class="text-muted mb-4">Mulai dengan menambahkan artikel pertama Anda</p>
                <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Artikel Pertama
                </a>
            </div>
        @endif
    </div>
</div>

<style>
.text-purple { color: #6f42c1 !important; }
.bg-purple { background-color: #6f42c1 !important; }
.table-hover tbody tr:hover { background-color: rgba(0,0,0,.02); }
.card { transition: all 0.3s ease; }
.btn { transition: all 0.2s ease; }
</style>
@endsection
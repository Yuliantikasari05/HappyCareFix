@extends('layouts.admin')

@section('title', 'Kelola Tour')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-map-marked-alt"></i> Daftar Tour
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.tours.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Tour
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Filter dan Search -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <form action="{{ route('admin.tours.index') }}" method="GET" class="d-flex flex-wrap gap-2 align-items-end">
                                <div class="flex-fill">
                                    <label class="form-label small">Cari Tour</label>
                                    <input type="text" name="search" class="form-control form-control-sm" 
                                           placeholder="Cari berdasarkan nama atau lokasi..." 
                                           value="{{ request('search') }}">
                                </div>
                                <div style="min-width: 150px;">
                                    <label class="form-label small">Kategori</label>
                                    <select name="category" class="form-select form-select-sm">
                                        <option value="">Semua Kategori</option>
                                        <option value="nature" {{ request('category') == 'nature' ? 'selected' : '' }}>Wisata Alam</option>
                                        <option value="culinary" {{ request('category') == 'culinary' ? 'selected' : '' }}>Wisata Kuliner</option>
                                        <option value="family" {{ request('category') == 'family' ? 'selected' : '' }}>Wisata Keluarga</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-search"></i> Cari
                                    </button>
                                    @if(request('search') || request('category'))
                                        <a href="{{ route('admin.tours.index') }}" class="btn btn-outline-secondary btn-sm">
                                            <i class="fas fa-times"></i> Reset
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="25%">Tour</th>
                                    <th width="12%">Kategori</th>
                                    <th width="12%">Harga</th>
                                    <th width="10%">Durasi</th>
                                    <th width="15%">Lokasi</th>
                                    <th width="8%">Status</th>
                                    <th width="13%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tours as $index => $tour)
                                <tr>
                                    <td class="text-center">{{ $tours->firstItem() + $index }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($tour->image)
                                                <img src="{{ Storage::url($tour->image) }}" 
                                                     class="rounded border me-2" 
                                                     width="40" height="40" 
                                                     style="object-fit: cover;">
                                            @else
                                                <div class="bg-secondary rounded d-flex align-items-center justify-content-center me-2" 
                                                     style="width: 40px; height: 40px;">
                                                    <i class="fas fa-image text-white"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <strong class="d-block">{{ Str::limit($tour->name, 30) }}</strong>
                                                @if($tour->gallery && is_array($tour->gallery) && count($tour->gallery) > 0)
                                                    <small class="text-muted">
                                                        <i class="fas fa-images"></i> {{ count($tour->gallery) }} foto
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($tour->category == 'nature')
                                            <span class="badge bg-success">
                                                <i class="fas fa-leaf"></i> Alam
                                            </span>
                                        @elseif($tour->category == 'culinary')
                                            <span class="badge bg-warning text-dark">
                                                <i class="fas fa-utensils"></i> Kuliner
                                            </span>
                                        @elseif($tour->category == 'family')
                                            <span class="badge bg-info text-dark">
                                                <i class="fas fa-users"></i> Keluarga
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">Lainnya</span>
                                        @endif
                                    </td>
                                    <td>
                                        <strong class="text-success">
                                            Rp {{ number_format($tour->price, 0, ',', '.') }}
                                        </strong>
                                    </td>
                                    <td>
                                        <small>{{ $tour->duration ?: '-' }}</small>
                                    </td>
                                    <td>
                                        <small>
                                            <i class="fas fa-map-marker-alt text-danger"></i>
                                            {{ Str::limit($tour->location, 20) }}
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        @if($tour->published ?? true)
                                            <span class="badge bg-success">
                                                <i class="fas fa-check"></i> Aktif
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                <i class="fas fa-times"></i> Draft
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.tours.show', $tour) }}" 
                                               class="btn btn-outline-info btn-sm" 
                                               title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.tours.edit', $tour) }}" 
                                               class="btn btn-outline-warning btn-sm"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.tours.destroy', $tour) }}" 
                                                  method="POST" 
                                                  style="display: inline;"
                                                  onsubmit="return confirm('Yakin ingin menghapus tour {{ $tour->name }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-outline-danger btn-sm"
                                                        title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-map-marked-alt fa-3x mb-3"></i>
                                            <p>Belum ada data tour</p>
                                            <a href="{{ route('admin.tours.create') }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-plus"></i> Tambah Tour Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="text-muted">
                            Menampilkan {{ $tours->firstItem() ?? 0 }} - {{ $tours->lastItem() ?? 0 }} 
                            dari {{ $tours->total() }} tour
                        </div>
                        <div>
                            {{ $tours->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.btn-group-sm .btn {
    padding: 0.25rem 0.4rem;
    font-size: 0.75rem;
    border-radius: 0.2rem;
}

.table th {
    font-weight: 600;
    font-size: 0.85rem;
}

.table td {
    vertical-align: middle;
    font-size: 0.85rem;
}

.badge {
    font-size: 0.7rem;
}

.pagination .page-link {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
}

.alert {
    font-size: 0.9rem;
}

.form-control-sm, .form-select-sm {
    font-size: 0.875rem;
}
</style>
@endsection
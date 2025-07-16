@extends('layouts.admin')

@section('title', 'Kelola Hospital')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1" style="font-size: 2.2rem; color: #2c3e50;">
                <i class="fas fa-hospital me-2 text-primary"></i>Kelola Hospital
            </h1>
            <p class="text-muted mb-0">Manajemen data rumah sakit dan fasilitas kesehatan</p>
        </div>
        <a href="{{ route('admin.hospitals.create') }}" class="btn btn-primary btn-lg shadow-sm px-4">
            <i class="fas fa-plus me-2"></i>Tambah Hospital
        </a>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Main Content Card -->
    <div class="card shadow-sm border-0" style="border-radius: 0.75rem;">
        <div class="card-header bg-white border-bottom py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-0 fw-semibold text-dark">
                        <i class="fas fa-list me-2 text-primary"></i>Daftar Hospital 
                        <span class="badge bg-primary ms-2">{{ $hospitals->total() }}</span>
                    </h5>
                </div>
                <div class="col-md-6">
                    <!-- Search and Filter Form -->
                    <form action="{{ route('admin.hospitals.index') }}" method="GET" class="d-flex justify-content-md-end flex-wrap gap-2">
                        <div class="input-group input-group-sm" style="max-width: 200px;">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-filter text-muted"></i>
                            </span>
                            <select name="type" class="form-select border-start-0" onchange="this.form.submit()">
                                <option value="">Semua Tipe</option>
                                <option value="general_hospital" {{ request('type') == 'general_hospital' ? 'selected' : '' }}>RS Umum</option>
                                <option value="specialist_clinic" {{ request('type') == 'specialist_clinic' ? 'selected' : '' }}>Klinik Spesialis</option>
                                <option value="emergency_center" {{ request('type') == 'emergency_center' ? 'selected' : '' }}>UGD</option>
                            </select>
                        </div>
                        
                        <div class="input-group input-group-sm" style="max-width: 250px;">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-start-0" 
                                   placeholder="Cari hospital..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary px-3">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        
                        @if(request('search') || request('type'))
                            <a href="{{ route('admin.hospitals.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-times"></i> Clear
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3 fw-semibold">#</th>
                            <th class="py-3 fw-semibold">Hospital</th>
                            <th class="py-3 fw-semibold">Tipe</th>
                            <th class="py-3 fw-semibold">Kontak</th>
                            <th class="py-3 fw-semibold">Lokasi</th>
                            <th class="py-3 fw-semibold text-center">Status</th>
                            <th class="py-3 fw-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($hospitals as $index => $hospital)
                        <tr class="border-bottom">
                            <td class="px-4 py-3">
                                <span class="fw-bold text-muted">
                                    {{ ($hospitals->currentPage() - 1) * $hospitals->perPage() + $index + 1 }}
                                </span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        @if($hospital->image)
                                            <img src="{{ asset('storage/' . $hospital->image) }}" 
                                                 class="rounded border border-2 border-light shadow-sm" 
                                                 width="50" height="50" style="object-fit: cover;">
                                        @else
                                            <div class="bg-gradient rounded d-flex align-items-center justify-content-center shadow-sm
                                                        {{ $hospital->type === 'general_hospital' ? 'bg-primary' : ($hospital->type === 'specialist_clinic' ? 'bg-info' : 'bg-danger') }}" 
                                                 style="width: 50px; height: 50px;">
                                                <i class="fas fa-hospital text-white" style="font-size: 1.2rem;"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-dark">{{ $hospital->name }}</div>
                                        <div class="d-flex align-items-center gap-2 mt-1">
                                            @if($hospital->featured)
                                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-2 py-1">
                                                    <i class="fas fa-star me-1"></i>Featured
                                                </span>
                                            @endif
                                            @if($hospital->emergency_contact)
                                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-2 py-1">
                                                    <i class="fas fa-ambulance me-1"></i>Emergency
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                @if($hospital->type === 'general_hospital')
                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2">
                                        <i class="fas fa-hospital me-1"></i>RS Umum
                                    </span>
                                @elseif($hospital->type === 'specialist_clinic')
                                    <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-3 py-2">
                                        <i class="fas fa-user-md me-1"></i>Klinik Spesialis
                                    </span>
                                @elseif($hospital->type === 'emergency_center')
                                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-3 py-2">
                                        <i class="fas fa-ambulance me-1"></i>UGD
                                    </span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 px-3 py-2">-</span>
                                @endif
                            </td>
                            <td class="py-3">
                                <div>
                                    @if($hospital->phone)
                                        <div class="text-dark mb-1">
                                            <i class="fas fa-phone me-2 text-success"></i>{{ $hospital->phone }}
                                        </div>
                                    @endif
                                    @if($hospital->email)
                                        <div class="text-muted small">
                                            <i class="fas fa-envelope me-2"></i>{{ $hospital->email }}
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3">
                                <div class="text-dark">
                                    <i class="fas fa-map-marker-alt me-2 text-danger"></i>
                                    {{ Str::limit($hospital->address, 40) }}
                                </div>
                                @if($hospital->latitude && $hospital->longitude)
                                    <small class="text-muted">
                                        <i class="fas fa-map-pin me-1"></i>{{ $hospital->latitude }}, {{ $hospital->longitude }}
                                    </small>
                                @endif
                            </td>
                            <td class="py-3 text-center">
                                @if($hospital->active)
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2">
                                        <i class="fas fa-check-circle me-1"></i>Aktif
                                    </span>
                                @else
                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 px-3 py-2">
                                        <i class="fas fa-pause-circle me-1"></i>Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 text-center">
                                <div class="btn-group shadow-sm" role="group">
                                    <a href="{{ route('admin.hospitals.show', $hospital) }}" 
                                       class="btn btn-sm btn-outline-info" title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.hospitals.edit', $hospital) }}" 
                                       class="btn btn-sm btn-outline-success" title="Edit Hospital">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                                                data-bs-toggle="dropdown" aria-expanded="false" title="More Actions">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.hospitals.show', $hospital) }}">
                                                    <i class="fas fa-eye me-2 text-info"></i>Lihat Detail
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="{{ route('admin.hospitals.destroy', $hospital) }}" method="POST" 
                                                      onsubmit="return confirm('Yakin ingin menghapus hospital {{ $hospital->name }}? Tindakan ini tidak dapat dibatalkan.')" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="fas fa-trash me-2"></i>Hapus Hospital
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-hospital fa-3x mb-3 opacity-50"></i>
                                    <h5>Belum ada data hospital</h5>
                                    <p class="mb-0">
                                        @if(request('search') || request('type'))
                                            Tidak ada hospital yang sesuai dengan kriteria pencarian. 
                                            <a href="{{ route('admin.hospitals.index') }}" class="text-decoration-none">Hapus filter</a>
                                        @else
                                            <a href="{{ route('admin.hospitals.create') }}" class="btn btn-primary">
                                                <i class="fas fa-plus me-1"></i>Tambah Hospital Pertama
                                            </a>
                                        @endif
                                    </p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($hospitals->hasPages())
        <div class="card-footer bg-white border-top">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted">
                    Menampilkan {{ $hospitals->firstItem() }} sampai {{ $hospitals->lastItem() }} dari {{ $hospitals->total() }} hospital
                </div>
                <div>
                    {{ $hospitals->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
.table-hover tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05) !important;
}

.btn-group .btn {
    border-radius: 0.375rem !important;
}

.btn-group .btn:not(:last-child) {
    margin-right: 2px;
}

.badge {
    font-size: 0.75rem;
    letter-spacing: 0.5px;
}

.card {
    border-radius: 0.75rem;
}

.table th {
    border-bottom: 2px solid #dee2e6;
    font-weight: 600;
    color: #495057;
}

.input-group-text {
    border-right: none;
}

.input-group .form-control,
.input-group .form-select {
    border-left: none;
}

.input-group:focus-within .input-group-text {
    border-color: #86b7fe;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}
</style>
@endsection
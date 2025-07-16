@extends('layouts.admin')

@section('title', 'Detail Hospital')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1" style="font-size: 2rem; color: #2c3e50;">
                <i class="fas fa-hospital me-2 text-primary"></i>Detail Hospital
            </h1>
            <p class="text-muted mb-0">Informasi lengkap {{ $hospital->name }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.hospitals.edit', $hospital) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit Hospital
            </a>
            <a href="{{ route('admin.hospitals.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Hospital Profile Card -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 0.75rem;">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        @if($hospital->image)
                            <img src="{{ asset('storage/' . $hospital->image) }}" 
                                 class="rounded border border-3 border-light shadow" 
                                 width="150" height="150" style="object-fit: cover;">
                        @else
                            <div class="bg-gradient rounded d-flex align-items-center justify-content-center shadow mx-auto
                                        {{ $hospital->type === 'general_hospital' ? 'bg-primary' : ($hospital->type === 'specialist_clinic' ? 'bg-info' : 'bg-danger') }}" 
                                 style="width: 150px; height: 150px;">
                                <i class="fas fa-hospital text-white" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                    </div>
                    
                    <h4 class="fw-bold text-dark mb-1">{{ $hospital->name }}</h4>
                    
                    <div class="d-flex justify-content-center gap-2 mb-3">
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
                        @endif
                        
                        @if($hospital->active)
                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2">
                                <i class="fas fa-check-circle me-1"></i>Aktif
                            </span>
                        @else
                            <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25 px-3 py-2">
                                <i class="fas fa-pause-circle me-1"></i>Nonaktif
                            </span>
                        @endif
                    </div>
                    
                    @if($hospital->featured)
                        <div class="alert alert-warning border-0 bg-warning bg-opacity-10 py-2">
                            <i class="fas fa-star text-warning me-2"></i>
                            <strong>Hospital Unggulan</strong>
                        </div>
                    @endif
                    
                    <div class="row text-center mt-3">
                        <div class="col-6">
                            <div class="p-2">
                                <h6 class="fw-bold text-primary mb-0">
                                    @if($hospital->latitude && $hospital->longitude)
                                        <i class="fas fa-map-marker-alt"></i>
                                    @else
                                        <i class="fas fa-map-marker-alt text-muted"></i>
                                    @endif
                                </h6>
                                <small class="text-muted">Lokasi GPS</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2">
                                <h6 class="fw-bold text-success mb-0">
                                    @if($hospital->emergency_contact)
                                        <i class="fas fa-ambulance"></i>
                                    @else
                                        <i class="fas fa-ambulance text-muted"></i>
                                    @endif
                                </h6>
                                <small class="text-muted">Darurat</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="card shadow-sm border-0" style="border-radius: 0.75rem;">
                <div class="card-header bg-light border-bottom py-3">
                    <h6 class="mb-0 fw-semibold">
                        <i class="fas fa-bolt me-2 text-warning"></i>Aksi Cepat
                    </h6>
                </div>
                <div class="card-body p-3">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.hospitals.edit', $hospital) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-edit me-2"></i>Edit Hospital
                        </a>
                        
                        @if($hospital->website)
                        <a href="{{ $hospital->website }}" target="_blank" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-globe me-2"></i>Kunjungi Website
                        </a>
                        @endif
                        
                        @if($hospital->latitude && $hospital->longitude)
                        <a href="https://maps.google.com/?q={{ $hospital->latitude }},{{ $hospital->longitude }}" 
                           target="_blank" class="btn btn-outline-success btn-sm">
                            <i class="fas fa-map-marker-alt me-2"></i>Lihat di Maps
                        </a>
                        @endif
                        
                        <form action="{{ route('admin.hospitals.destroy', $hospital) }}" method="POST" 
                              onsubmit="return confirm('Yakin ingin menghapus hospital {{ $hospital->name }}? Tindakan ini tidak dapat dibatalkan.')" 
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                <i class="fas fa-trash me-2"></i>Hapus Hospital
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Card -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0" style="border-radius: 0.75rem;">
                <div class="card-header bg-primary bg-opacity-10 border-bottom py-3">
                    <h5 class="mb-0 text-primary fw-semibold">
                        <i class="fas fa-info-circle me-2"></i>Informasi Hospital
                    </h5>
                </div>
                
                <div class="card-body p-4">
                    <!-- Basic Information -->
                    <div class="mb-4">
                        <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                            <i class="fas fa-hospital me-2 text-primary"></i>Informasi Dasar
                        </h6>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-1">Nama Hospital</label>
                                    <div class="fw-bold text-dark">{{ $hospital->name }}</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-1">Tipe</label>
                                    <div class="fw-bold text-dark">
                                        @if($hospital->type === 'general_hospital')
                                            <i class="fas fa-hospital me-2 text-primary"></i>Rumah Sakit Umum
                                        @elseif($hospital->type === 'specialist_clinic')
                                            <i class="fas fa-user-md me-2 text-info"></i>Klinik Spesialis
                                        @elseif($hospital->type === 'emergency_center')
                                            <i class="fas fa-ambulance me-2 text-danger"></i>Pusat Gawat Darurat
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if($hospital->description)
                        <div class="mb-3">
                            <div class="p-3 bg-light rounded">
                                <label class="form-label fw-semibold text-muted mb-1">Deskripsi</label>
                                <div class="fw-bold text-dark">{{ $hospital->description }}</div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="mb-3">
                            <div class="p-3 bg-light rounded">
                                <label class="form-label fw-semibold text-muted mb-1">Alamat</label>
                                <div class="fw-bold text-dark">
                                    <i class="fas fa-map-marker-alt me-2 text-danger"></i>{{ $hospital->address }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="mb-4">
                        <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                            <i class="fas fa-address-book me-2 text-primary"></i>Informasi Kontak
                        </h6>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-1">Telepon</label>
                                    <div class="fw-bold text-dark">
                                        @if($hospital->phone)
                                            <i class="fas fa-phone me-2 text-success"></i>{{ $hospital->phone }}
                                        @else
                                            <span class="text-muted fst-italic">Tidak tersedia</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-1">Kontak Darurat</label>
                                    <div class="fw-bold text-dark">
                                        @if($hospital->emergency_contact)
                                            <i class="fas fa-ambulance me-2 text-danger"></i>{{ $hospital->emergency_contact }}
                                        @else
                                            <span class="text-muted fst-italic">Tidak tersedia</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-1">Email</label>
                                    <div class="fw-bold text-dark">
                                        @if($hospital->email)
                                            <i class="fas fa-envelope me-2 text-info"></i>{{ $hospital->email }}
                                        @else
                                            <span class="text-muted fst-italic">Tidak tersedia</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-1">Website</label>
                                    <div class="fw-bold text-dark">
                                        @if($hospital->website)
                                            <a href="{{ $hospital->website }}" target="_blank" class="text-decoration-none">
                                                <i class="fas fa-globe me-2 text-primary"></i>{{ $hospital->website }}
                                            </a>
                                        @else
                                            <span class="text-muted fst-italic">Tidak tersedia</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Location Information -->
                    @if($hospital->latitude && $hospital->longitude)
                    <div class="mb-4">
                        <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                            <i class="fas fa-map-pin me-2 text-primary"></i>Koordinat Lokasi
                        </h6>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-success bg-opacity-10 rounded border border-success border-opacity-25">
                                    <label class="form-label fw-semibold text-success mb-1">
                                        <i class="fas fa-map-pin me-1"></i>Latitude
                                    </label>
                                    <div class="fw-bold text-dark">{{ $hospital->latitude }}</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-success bg-opacity-10 rounded border border-success border-opacity-25">
                                    <label class="form-label fw-semibold text-success mb-1">
                                        <i class="fas fa-map-pin me-1"></i>Longitude
                                    </label>
                                    <div class="fw-bold text-dark">{{ $hospital->longitude }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Services and Facilities -->
                    @if((is_array($hospital->services) && count($hospital->services) > 0) || (is_array($hospital->facilities) && count($hospital->facilities) > 0))
                    <div class="mb-4">
                        <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                            <i class="fas fa-cogs me-2 text-primary"></i>Layanan & Fasilitas
                        </h6>
                        
                        <div class="row">
                            @if(is_array($hospital->services) && count($hospital->services) > 0)
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-2">
                                        <i class="fas fa-concierge-bell me-1 text-success"></i>Layanan
                                    </label>
                                    <div>
                                        @foreach($hospital->services as $service)
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 me-1 mb-1">
                                                {{ $service }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            @if(is_array($hospital->facilities) && count($hospital->facilities) > 0)
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-2">
                                        <i class="fas fa-building me-1 text-info"></i>Fasilitas
                                    </label>
                                    <div>
                                        @foreach($hospital->facilities as $facility)
                                            <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 me-1 mb-1">
                                                {{ $facility }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Operating Hours -->
                    @if(is_array($hospital->operating_hours) && count(array_filter($hospital->operating_hours)) > 0)
                    <div class="mb-0">
                        <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                            <i class="fas fa-clock me-2 text-primary"></i>Jam Operasional
                        </h6>
                        
                        <div class="row">
                            @foreach($hospital->operating_hours as $day => $hours)
                                @if($hours)
                                <div class="col-md-4 col-sm-6 mb-2">
                                    <div class="p-2 bg-light rounded d-flex justify-content-between align-items-center">
                                        <span class="fw-semibold text-dark">{{ ucfirst($day) }}</span>
                                        <span class="badge bg-primary">{{ $hours }}</span>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 0.75rem;
}

.border-bottom {
    border-color: #e9ecef !important;
}

.badge {
    font-size: 0.75rem;
    letter-spacing: 0.5px;
}
</style>
@endsection
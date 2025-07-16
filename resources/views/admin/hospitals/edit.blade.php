@extends('layouts.admin')

@section('title', 'Edit Hospital')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1" style="font-size: 2rem; color: #2c3e50;">
                <i class="fas fa-hospital-user me-2 text-primary"></i>Edit Hospital
            </h1>
            <p class="text-muted mb-0">Perbarui informasi hospital <strong>{{ $hospital->name }}</strong></p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.hospitals.show', $hospital) }}" class="btn btn-outline-info">
                <i class="fas fa-eye me-2"></i>Lihat Detail
            </a>
            <a href="{{ route('admin.hospitals.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card shadow-sm border-0" style="border-radius: 0.75rem;">
                <div class="card-header bg-warning bg-opacity-10 border-bottom py-3">
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
                            <h5 class="mb-0 text-warning fw-semibold">
                                <i class="fas fa-edit me-2"></i>Edit Hospital
                            </h5>
                            <small class="text-muted">Terakhir diperbarui: {{ $hospital->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <!-- Alert untuk error -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                            <h6 class="fw-bold mb-2">
                                <i class="fas fa-exclamation-triangle me-2"></i>Terdapat kesalahan:
                            </h6>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.hospitals.update', $hospital->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <!-- Basic Information Section -->
                        <div class="mb-4">
                            <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                                <i class="fas fa-info-circle me-2 text-primary"></i>Informasi Dasar
                            </h6>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-semibold">
                                            Nama Hospital <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-hospital text-muted"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control @error('name') is-invalid @enderror" 
                                                   id="name" name="name" value="{{ old('name', $hospital->name) }}" 
                                                   placeholder="Masukkan nama hospital" required>
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="type" class="form-label fw-semibold">
                                            Tipe Hospital <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-tags text-muted"></i>
                                            </span>
                                            <select class="form-select @error('type') is-invalid @enderror" 
                                                    id="type" name="type" required>
                                                <option value="">-- Pilih Tipe Hospital --</option>
                                                <option value="general_hospital" {{ old('type', $hospital->type) == 'general_hospital' ? 'selected' : '' }}>
                                                    Rumah Sakit Umum
                                                </option>
                                                <option value="specialist_clinic" {{ old('type', $hospital->type) == 'specialist_clinic' ? 'selected' : '' }}>
                                                    Klinik Spesialis
                                                </option>
                                                <option value="emergency_center" {{ old('type', $hospital->type) == 'emergency_center' ? 'selected' : '' }}>
                                                    Unit Gawat Darurat
                                                </option>
                                            </select>
                                        </div>
                                        @error('type')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="address" class="form-label fw-semibold">
                                    Alamat <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-map-marker-alt text-muted"></i>
                                    </span>
                                    <textarea class="form-control @error('address') is-invalid @enderror" 
                                              id="address" name="address" rows="3" required
                                              placeholder="Masukkan alamat lengkap hospital">{{ old('address', $hospital->address) }}</textarea>
                                </div>
                                @error('address')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">Deskripsi</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-file-alt text-muted"></i>
                                    </span>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="4"
                                              placeholder="Deskripsi singkat tentang hospital">{{ old('description', $hospital->description) }}</textarea>
                                </div>
                                @error('description')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="mb-4">
                            <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                                <i class="fas fa-address-book me-2 text-primary"></i>Informasi Kontak
                            </h6>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label fw-semibold">Telepon</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-phone text-muted"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control @error('phone') is-invalid @enderror" 
                                                   id="phone" name="phone" value="{{ old('phone', $hospital->phone) }}"
                                                   placeholder="Contoh: (021) 1234567">
                                        </div>
                                        @error('phone')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="emergency_contact" class="form-label fw-semibold">Kontak Darurat</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-ambulance text-muted"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control @error('emergency_contact') is-invalid @enderror" 
                                                   id="emergency_contact" name="emergency_contact" value="{{ old('emergency_contact', $hospital->emergency_contact) }}"
                                                   placeholder="Nomor kontak darurat">
                                        </div>
                                        @error('emergency_contact')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-semibold">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-envelope text-muted"></i>
                                            </span>
                                            <input type="email" 
                                                   class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" name="email" value="{{ old('email', $hospital->email) }}"
                                                   placeholder="hospital@example.com">
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="website" class="form-label fw-semibold">Website</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-globe text-muted"></i>
                                            </span>
                                            <input type="url" 
                                                   class="form-control @error('website') is-invalid @enderror" 
                                                   id="website" name="website" value="{{ old('website', $hospital->website) }}"
                                                   placeholder="https://hospital.com">
                                        </div>
                                        @error('website')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Location Information Section -->
                        <div class="mb-4">
                            <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                                <i class="fas fa-map-pin me-2 text-primary"></i>Informasi Lokasi
                            </h6>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="latitude" class="form-label fw-semibold">Latitude</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-map-pin text-muted"></i>
                                            </span>
                                            <input type="number" step="any" 
                                                   class="form-control @error('latitude') is-invalid @enderror" 
                                                   id="latitude" name="latitude" value="{{ old('latitude', $hospital->latitude) }}"
                                                   placeholder="-6.200000">
                                        </div>
                                        @error('latitude')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="longitude" class="form-label fw-semibold">Longitude</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-map-pin text-muted"></i>
                                            </span>
                                            <input type="number" step="any" 
                                                   class="form-control @error('longitude') is-invalid @enderror" 
                                                   id="longitude" name="longitude" value="{{ old('longitude', $hospital->longitude) }}"
                                                   placeholder="106.816666">
                                        </div>
                                        @error('longitude')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Services and Facilities Section -->
                        <div class="mb-4">
                            <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                                <i class="fas fa-cogs me-2 text-primary"></i>Layanan & Fasilitas
                            </h6>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="facilities_string" class="form-label fw-semibold">
                                            <i class="fas fa-building me-2 text-info"></i>Fasilitas
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-building text-muted"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control @error('facilities') is-invalid @enderror" 
                                                   id="facilities_string" name="facilities_string" 
                                                   value="{{ old('facilities_string', is_array($hospital->facilities) ? implode(',', $hospital->facilities) : $hospital->facilities) }}"
                                                   placeholder="Pisahkan dengan koma">
                                        </div>
                                        <small class="text-muted">Contoh: ICU, UGD, Laboratorium</small>
                                        @error('facilities')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="services_string" class="form-label fw-semibold">
                                            <i class="fas fa-concierge-bell me-2 text-success"></i>Layanan
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-concierge-bell text-muted"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control @error('services') is-invalid @enderror" 
                                                   id="services_string" name="services_string" 
                                                   value="{{ old('services_string', is_array($hospital->services) ? implode(',', $hospital->services) : $hospital->services) }}"
                                                   placeholder="Pisahkan dengan koma">
                                        </div>
                                        <small class="text-muted">Contoh: Rawat Inap, Rawat Jalan, Operasi</small>
                                        @error('services')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Operating Hours Section -->
                        <div class="mb-4">
                            <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                                <i class="fas fa-clock me-2 text-primary"></i>Jam Operasional
                            </h6>
                            
                            @php
                                $days = ['senin','selasa','rabu','kamis','jumat','sabtu','minggu'];
                                $operating_hours = is_array($hospital->operating_hours) ? $hospital->operating_hours : [];
                            @endphp
                            
                            <div class="row">
                                @foreach($days as $day)
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <label for="operating_hours_{{ $day }}" class="form-label fw-semibold small">
                                        {{ ucfirst($day) }}
                                    </label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-clock text-muted"></i>
                                        </span>
                                        <input type="text" class="form-control" 
                                               id="operating_hours_{{ $day }}" 
                                               name="operating_hours_{{ $day }}" 
                                               placeholder="08:00-17:00"
                                               value="{{ old('operating_hours_'.$day, $operating_hours[$day] ?? '') }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <small class="text-muted">
                                <i class="fas fa-info-circle me-1"></i>
                                Format: HH:MM-HH:MM (contoh: 08:00-17:00) atau "Tutup" untuk hari libur
                            </small>
                        </div>

                        <!-- Image and Settings Section -->
                        <div class="mb-4">
                            <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                                <i class="fas fa-image me-2 text-primary"></i>Gambar & Pengaturan
                            </h6>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="image" class="form-label fw-semibold">Gambar Hospital</label>
                                        @if($hospital->image)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $hospital->image) }}" 
                                                     alt="{{ $hospital->name }}" 
                                                     class="rounded border shadow-sm" 
                                                     style="max-width: 150px; height: 100px; object-fit: cover;">
                                            </div>
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-image text-muted"></i>
                                            </span>
                                            <input type="file" 
                                                   class="form-control @error('image') is-invalid @enderror" 
                                                   id="image" name="image" accept="image/*">
                                        </div>
                                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar. Format: JPG, PNG, GIF. Maksimal 2MB</small>
                                        @error('image')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Pengaturan</label>
                                        <div class="d-flex flex-column gap-2">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" 
                                                       id="featured" name="featured" value="1" 
                                                       {{ old('featured', $hospital->featured) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="featured">
                                                    <i class="fas fa-star text-warning me-1"></i>Hospital Unggulan
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" 
                                                       id="active" name="active" value="1" 
                                                       {{ old('active', $hospital->active) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="active">
                                                    <i class="fas fa-check-circle text-success me-1"></i>Status Aktif
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Account Information -->
                        <div class="mb-4">
                            <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                                <i class="fas fa-info me-2 text-primary"></i>Informasi Sistem
                            </h6>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block">Dibuat Pada</small>
                                        <strong>{{ $hospital->created_at->format('d M Y, H:i') }}</strong>
                                        <small class="text-muted d-block">{{ $hospital->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block">Terakhir Diperbarui</small>
                                        <strong>{{ $hospital->updated_at->format('d M Y, H:i') }}</strong>
                                        <small class="text-muted d-block">{{ $hospital->updated_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                            <a href="{{ route('admin.hospitals.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-times me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-warning px-4">
                                <i class="fas fa-save me-2"></i>Perbarui Hospital
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(e) {
        // Convert comma separated string to array for facilities
        const facilitiesInput = document.getElementById('facilities_string');
        if (facilitiesInput && facilitiesInput.value) {
            const facilitiesArray = facilitiesInput.value.split(',').map(item => item.trim()).filter(Boolean);
            
            // Create hidden inputs for facilities array
            facilitiesArray.forEach(facility => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'facilities[]';
                hiddenInput.value = facility;
                form.appendChild(hiddenInput);
            });
        }
        
        // Convert comma separated string to array for services
        const servicesInput = document.getElementById('services_string');
        if (servicesInput && servicesInput.value) {
            const servicesArray = servicesInput.value.split(',').map(item => item.trim()).filter(Boolean);
            
            // Create hidden inputs for services array
            servicesArray.forEach(service => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'services[]';
                hiddenInput.value = service;
                form.appendChild(hiddenInput);
            });
        }
    });
});
</script>

<style>
.card {
    border-radius: 0.75rem;
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

.form-control:focus,
.form-select:focus {
    box-shadow: none;
}

.border-bottom {
    border-color: #e9ecef !important;
}

.form-check-input:checked {
    background-color: #0d6efd;
    border-color: #0d6efd;
}
</style>
@endsection
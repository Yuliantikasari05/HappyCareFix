@extends('layouts.admin')

@section('title', 'Tambah Tour')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-map-marked-alt"></i> Tambah Tour Baru
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.tours.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- Alert untuk error -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <h6><i class="fas fa-exclamation-triangle"></i> Terdapat kesalahan:</h6>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">
                                        <i class="fas fa-map-marked-alt"></i> Nama Tour *
                                    </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required
                                           placeholder="Masukkan nama tour">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="category" class="form-label">
                                        <i class="fas fa-tags"></i> Kategori *
                                    </label>
                                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="nature" {{ old('category') == 'nature' ? 'selected' : '' }}>Wisata Alam</option>
                                        <option value="culinary" {{ old('category') == 'culinary' ? 'selected' : '' }}>Wisata Kuliner</option>
                                        <option value="family" {{ old('category') == 'family' ? 'selected' : '' }}>Wisata Keluarga</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="price" class="form-label">
                                                <i class="fas fa-money-bill-wave"></i> Harga (Rp) *
                                            </label>
                                            <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                                   id="price" name="price" value="{{ old('price') }}" required
                                                   placeholder="0">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="duration" class="form-label">
                                                <i class="fas fa-clock"></i> Durasi
                                            </label>
                                            <input type="text" class="form-control @error('duration') is-invalid @enderror" 
                                                   id="duration" name="duration" value="{{ old('duration') }}"
                                                   placeholder="Contoh: 2 hari 1 malam">
                                            @error('duration')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="location" class="form-label">
                                        <i class="fas fa-map-marker-alt"></i> Lokasi *
                                    </label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                           id="location" name="location" value="{{ old('location') }}" required
                                           placeholder="Nama lokasi tour">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="address" class="form-label">
                                        <i class="fas fa-map"></i> Alamat Lengkap
                                    </label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" 
                                              id="address" name="address" rows="2"
                                              placeholder="Alamat lengkap lokasi tour">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="max_participants" class="form-label">
                                                <i class="fas fa-users"></i> Maks Peserta
                                            </label>
                                            <input type="number" class="form-control @error('max_participants') is-invalid @enderror" 
                                                   id="max_participants" name="max_participants" value="{{ old('max_participants') }}"
                                                   placeholder="0">
                                            @error('max_participants')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="difficulty_level" class="form-label">
                                                <i class="fas fa-chart-line"></i> Tingkat Kesulitan
                                            </label>
                                            <select class="form-select @error('difficulty_level') is-invalid @enderror" 
                                                    id="difficulty_level" name="difficulty_level">
                                                <option value="">-- Pilih Tingkat --</option>
                                                <option value="easy" {{ old('difficulty_level') == 'easy' ? 'selected' : '' }}>Mudah</option>
                                                <option value="moderate" {{ old('difficulty_level') == 'moderate' ? 'selected' : '' }}>Sedang</option>
                                                <option value="hard" {{ old('difficulty_level') == 'hard' ? 'selected' : '' }}>Sulit</option>
                                            </select>
                                            @error('difficulty_level')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">
                                        <i class="fas fa-file-alt"></i> Deskripsi *
                                    </label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="4" required
                                              placeholder="Deskripsi lengkap tentang tour">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="latitude" class="form-label">
                                                <i class="fas fa-map-pin"></i> Latitude
                                            </label>
                                            <input type="number" step="any" class="form-control @error('latitude') is-invalid @enderror" 
                                                   id="latitude" name="latitude" value="{{ old('latitude') }}"
                                                   placeholder="-6.200000">
                                            @error('latitude')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="longitude" class="form-label">
                                                <i class="fas fa-map-pin"></i> Longitude
                                            </label>
                                            <input type="number" step="any" class="form-control @error('longitude') is-invalid @enderror" 
                                                   id="longitude" name="longitude" value="{{ old('longitude') }}"
                                                   placeholder="106.816666">
                                            @error('longitude')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="image" class="form-label">
                                        <i class="fas fa-image"></i> Gambar Utama
                                    </label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                           id="image" name="image" accept="image/*">
                                    <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="gallery" class="form-label">
                                        <i class="fas fa-images"></i> Gallery Foto
                                    </label>
                                    <input type="file" class="form-control @error('gallery') is-invalid @enderror" 
                                           id="gallery" name="gallery[]" accept="image/*" multiple>
                                    <small class="form-text text-muted">Bisa pilih beberapa foto sekaligus</small>
                                    @error('gallery')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="available_dates" class="form-label">
                                        <i class="fas fa-calendar-alt"></i> Tanggal Tersedia
                                    </label>
                                    <input type="text" class="form-control @error('available_dates') is-invalid @enderror" 
                                           id="available_dates" name="available_dates" value="{{ old('available_dates') }}"
                                           placeholder="Contoh: Setiap weekend, Desember 2024 - Maret 2025">
                                    @error('available_dates')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="published" name="published" value="1" {{ old('published', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="published">
                                        <i class="fas fa-check-circle text-success"></i> Publikasikan Tour
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="includes" class="form-label">
                                        <i class="fas fa-check-circle"></i> Yang Termasuk
                                    </label>
                                    <textarea class="form-control @error('includes') is-invalid @enderror" 
                                              id="includes" name="includes" rows="3"
                                              placeholder="Contoh: Transportasi, Akomodasi, Makan, Pemandu">{{ old('includes') }}</textarea>
                                    @error('includes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="excludes" class="form-label">
                                        <i class="fas fa-times-circle"></i> Yang Tidak Termasuk
                                    </label>
                                    <textarea class="form-control @error('excludes') is-invalid @enderror" 
                                              id="excludes" name="excludes" rows="3"
                                              placeholder="Contoh: Pengeluaran pribadi, Asuransi perjalanan">{{ old('excludes') }}</textarea>
                                    @error('excludes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="itinerary" class="form-label">
                                <i class="fas fa-route"></i> Itinerary
                            </label>
                            <textarea class="form-control @error('itinerary') is-invalid @enderror" 
                                      id="itinerary" name="itinerary" rows="5"
                                      placeholder="Hari 1: ..., Hari 2: ...">{{ old('itinerary') }}</textarea>
                            @error('itinerary')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Tour
                        </button>
                        <a href="{{ route('admin.tours.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.form-label {
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.form-label i {
    margin-right: 0.5rem;
    color: #6c757d;
}

.card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.alert {
    border-radius: 0.375rem;
}
</style>
@endsection
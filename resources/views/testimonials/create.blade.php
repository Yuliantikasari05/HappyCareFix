@extends('layouts.app')

@section('title', 'Tambahkan Testimoni')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('testimonials.index') }}">Testimoni</a></li>
                    <li class="breadcrumb-item active">Tambah Testimoni</li>
                </ol>
            </nav>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">Tambahkan Testimoni</h3>
                </div>
                <div class="card-body">
                    <h5 class="text-center mb-4">Bagikan Pengalaman Anda</h5>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Testimoni <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Isi Testimoni <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('message') is-invalid @enderror" 
                                      id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Rating <span class="text-danger">*</span></label>
                            <div class="rating-stars">
                                @for($i = 1; $i <= 5; $i++)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rating" id="rating{{ $i }}" 
                                           value="{{ $i }}" {{ old('rating', 5) == $i ? 'checked' : '' }}>
                                    <label class="form-check-label" for="rating{{ $i }}">{{ $i }}</label>
                                </div>
                                @endfor
                            </div>
                            @error('rating')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="service_type" class="form-label">Jenis Layanan</label>
                            <select class="form-select @error('service_type') is-invalid @enderror" 
                                    id="service_type" name="service_type">
                                <option value="">-- Pilih Jenis Layanan --</option>
                                <option value="konsultasi_online" {{ old('service_type') == 'konsultasi_online' ? 'selected' : '' }}>Konsultasi Online</option>
                                <option value="rumah_sakit" {{ old('service_type') == 'rumah_sakit' ? 'selected' : '' }}>Rumah Sakit</option>
                                <option value="klinik_spesialis" {{ old('service_type') == 'klinik_spesialis' ? 'selected' : '' }}>Klinik Spesialis</option>
                                <option value="layanan_darurat" {{ old('service_type') == 'layanan_darurat' ? 'selected' : '' }}>Layanan Darurat</option>
                                <option value="tour_kesehatan" {{ old('service_type') == 'tour_kesehatan' ? 'selected' : '' }}>Tour Kesehatan</option>
                                <option value="lainnya" {{ old('service_type') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('service_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Foto (Opsional)</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                   id="image" name="image" accept="image/*">
                            <small class="text-muted">Format yang didukung: JPG, PNG, GIF. Maksimal 2MB.</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('testimonials.index') }}" class="btn btn-outline-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Kirim Testimoni</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.rating-stars .form-check-input:checked + .form-check-label {
    color: #ffc107;
    font-weight: bold;
}
</style>
@endpush
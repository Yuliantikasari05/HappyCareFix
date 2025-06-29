@extends('layouts.admin')

@section('title', 'Edit Testimoni')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Testimoni</h1>
        <a href="{{ route('admin.testimonials.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Testimoni</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" value="{{ $testimonial->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{ $testimonial->email }}" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="title">Judul Testimoni</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $testimonial->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="content">Isi Testimoni</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" required>{{ old('content', $testimonial->content) }}</textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Rating</label>
                            <div class="rating-input">
                                @for ($i = 1; $i <= 5; $i++)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rating" id="rating{{ $i }}" value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'checked' : '' }}>
                                        <label class="form-check-label" for="rating{{ $i }}">{{ $i }}</label>
                                    </div>
                                @endfor
                            </div>
                            @error('rating')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="service_type">Jenis Layanan</label>
                            <select class="form-control @error('service_type') is-invalid @enderror" id="service_type" name="service_type">
                                <option value="">-- Pilih Jenis Layanan --</option>
                                <option value="hospital" {{ old('service_type', $testimonial->service_type) == 'hospital' ? 'selected' : '' }}>Rumah Sakit</option>
                                <option value="tour" {{ old('service_type', $testimonial->service_type) == 'tour' ? 'selected' : '' }}>Wisata</option>
                            </select>
                            @error('service_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="photo">Foto</label>
                            @if ($testimonial->photo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="img-thumbnail" style="max-height: 150px;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_approved" name="is_approved" {{ old('is_approved', $testimonial->is_approved) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_approved">Disetujui</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured" {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_featured">Tampilkan sebagai Unggulan</label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .rating-input {
        display: flex;
        gap: 10px;
    }
    
    .rating-input .form-check {
        margin-right: 10px;
    }
    
    .rating-input .form-check-input {
        width: 1.5em;
        height: 1.5em;
    }
    
    .rating-input .form-check-label {
        font-size: 1.2em;
        padding-left: 5px;
    }
</style>
@endsection
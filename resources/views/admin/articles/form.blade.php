@extends('layouts.admin')

@section('title', isset($article) ? 'Edit Artikel' : 'Tambah Artikel')

@section('content')
<div class="container">
    <h1>{{ isset($article) ? 'Edit Artikel' : 'Tambah Artikel' }}</h1>
    <form action="{{ isset($article) ? route('admin.articles.update', $article->id) : route('admin.articles.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($article))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $article->title ?? '') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug (Opsional)</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                value="{{ old('slug', $article->slug ?? '') }}">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $article->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="excerpt" class="form-label">Excerpt (Opsional)</label>
            <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
            @error('excerpt')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi Artikel</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="8" required>{{ old('content', $article->content ?? '') }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="featured_image" class="form-label">Gambar Utama (Opsional)</label>
            <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image" accept="image/*">
            @if(isset($article) && $article->featured_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="Featured Image" style="max-width:150px;">
                </div>
            @endif
            @error('featured_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published"
                        value="1" {{ old('is_published', $article->is_published ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_published">Publikasikan sekarang</label>
                </div>
            </div>

            <div class="col-md-4">
                <label for="published_at" class="form-label">Tanggal Publish (Opsional)</label>
                <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror"
                    id="published_at" name="published_at"
                    value="{{ old('published_at', isset($article) && $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '') }}">
                @error('published_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured"
                        value="1" {{ old('is_featured', $article->is_featured ?? false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_featured">Jadikan Artikel Pilihan</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($article) ? 'Update Artikel' : 'Simpan Artikel' }}
        </button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

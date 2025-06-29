@extends('layouts.admin')

@section('title', 'Create Tour')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Create New Tour</h1>
        <a href="{{ route('admin.tours.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Tours
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tour Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="nature" {{ old('category') == 'nature' ? 'selected' : '' }}>Nature</option>
                                <option value="culinary" {{ old('category') == 'culinary' ? 'selected' : '' }}>Culinary</option>
                                <option value="family" {{ old('category') == 'family' ? 'selected' : '' }}>Family</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price ($)</label>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                                   id="price" name="price" value="{{ old('price') }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control @error('duration') is-invalid @enderror" 
                                   id="duration" name="duration" value="{{ old('duration') }}" 
                                   placeholder="e.g., 2 days 1 night">
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="max_participants" class="form-label">Max Participants</label>
                            <input type="number" class="form-control @error('max_participants') is-invalid @enderror" 
                                   id="max_participants" name="max_participants" value="{{ old('max_participants') }}">
                            @error('max_participants')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                   id="location" name="location" value="{{ old('location') }}" required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="difficulty_level" class="form-label">Difficulty Level</label>
                            <select class="form-select @error('difficulty_level') is-invalid @enderror" 
                                    id="difficulty_level" name="difficulty_level">
                                <option value="">Select Difficulty</option>
                                <option value="easy" {{ old('difficulty_level') == 'easy' ? 'selected' : '' }}>Easy</option>
                                <option value="moderate" {{ old('difficulty_level') == 'moderate' ? 'selected' : '' }}>Moderate</option>
                                <option value="hard" {{ old('difficulty_level') == 'hard' ? 'selected' : '' }}>Hard</option>
                            </select>
                            @error('difficulty_level')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label">Main Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                           id="image" name="image" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="gallery" class="form-label">Gallery Images</label>
                    <input type="file" class="form-control @error('gallery') is-invalid @enderror" 
                           id="gallery" name="gallery[]" accept="image/*" multiple>
                    <small class="text-muted">You can select multiple images for the gallery</small>
                    @error('gallery')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="includes" class="form-label">What's Included</label>
                    <textarea class="form-control @error('includes') is-invalid @enderror" 
                              id="includes" name="includes" rows="3" 
                              placeholder="e.g., Transportation, Accommodation, Meals, Guide">{{ old('includes') }}</textarea>
                    @error('includes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="excludes" class="form-label">What's Excluded</label>
                    <textarea class="form-control @error('excludes') is-invalid @enderror" 
                              id="excludes" name="excludes" rows="3" 
                              placeholder="e.g., Personal Expenses, Travel Insurance">{{ old('excludes') }}</textarea>
                    @error('excludes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="itinerary" class="form-label">Itinerary</label>
                    <textarea class="form-control @error('itinerary') is-invalid @enderror" 
                              id="itinerary" name="itinerary" rows="5" 
                              placeholder="Day 1: ..., Day 2: ...">{{ old('itinerary') }}</textarea>
                    @error('itinerary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="available_dates" class="form-label">Available Dates</label>
                    <textarea class="form-control @error('available_dates') is-invalid @enderror" 
                              id="available_dates" name="available_dates" rows="2" 
                              placeholder="e.g., Every weekend, December 2024 - March 2025">{{ old('available_dates') }}</textarea>
                    @error('available_dates')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Create Tour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
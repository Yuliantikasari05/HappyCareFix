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
            <form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data" id="tourForm">
                @csrf
                
                <!-- Basic Information -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tour Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="slug" class="form-label">URL Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                   id="slug" name="slug" value="{{ old('slug') }}" 
                                   placeholder="auto-generated-from-name">
                            <small class="text-muted">Leave empty to auto-generate from name</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="nature" {{ old('category') == 'nature' ? 'selected' : '' }}>Nature & Wildlife</option>
                                <option value="culinary" {{ old('category') == 'culinary' ? 'selected' : '' }}>Culinary Experience</option>
                                <option value="family" {{ old('category') == 'family' ? 'selected' : '' }}>Family Friendly</option>
                                <option value="adventure" {{ old('category') == 'adventure' ? 'selected' : '' }}>Adventure</option>
                                <option value="cultural" {{ old('category') == 'cultural' ? 'selected' : '' }}>Cultural Heritage</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                <option value="draft" {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            <small class="text-muted">Only published tours will be visible to users</small>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" rows="4" required 
                              placeholder="Describe what makes this tour special...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Pricing and Details -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price ($) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" 
                                   id="price" name="price" value="{{ old('price') }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="max_participants" class="form-label">Max Participants</label>
                            <input type="number" min="1" class="form-control @error('max_participants') is-invalid @enderror" 
                                   id="max_participants" name="max_participants" value="{{ old('max_participants', 10) }}">
                            @error('max_participants')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
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
                    <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" 
                           id="location" name="location" value="{{ old('location') }}" required
                           placeholder="e.g., Yogyakarta, Indonesia">
                    @error('location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Features -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    <strong>Featured Tour</strong>
                                    <small class="text-muted d-block">Featured tours appear prominently on the homepage</small>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_popular" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_popular">
                                    <strong>Popular Tour</strong>
                                    <small class="text-muted d-block">Mark as popular to boost visibility</small>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Images -->
                <div class="mb-3">
                    <label for="image" class="form-label">Main Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                           id="image" name="image" accept="image/*" required>
                    <small class="text-muted">Recommended size: 1200x800px. Max size: 2MB</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="gallery" class="form-label">Gallery Images</label>
                    <input type="file" class="form-control @error('gallery') is-invalid @enderror" 
                           id="gallery" name="gallery[]" accept="image/*" multiple>
                    <small class="text-muted">You can select multiple images for the gallery. Max 5 images, 2MB each.</small>
                    @error('gallery')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Tour Details -->
                <div class="mb-3">
                    <label for="includes" class="form-label">What's Included</label>
                    <textarea class="form-control @error('includes') is-invalid @enderror" 
                              id="includes" name="includes" rows="3" 
                              placeholder="• Transportation&#10;• Professional guide&#10;• Entrance fees&#10;• Lunch">{{ old('includes') }}</textarea>
                    @error('includes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="excludes" class="form-label">What's Excluded</label>
                    <textarea class="form-control @error('excludes') is-invalid @enderror" 
                              id="excludes" name="excludes" rows="3" 
                              placeholder="• Personal expenses&#10;• Travel insurance&#10;• Tips for guide">{{ old('excludes') }}</textarea>
                    @error('excludes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="itinerary" class="form-label">Itinerary</label>
                    <textarea class="form-control @error('itinerary') is-invalid @enderror" 
                              id="itinerary" name="itinerary" rows="5" 
                              placeholder="Day 1: Arrival and city tour&#10;Day 2: Nature exploration&#10;Day 3: Cultural activities and departure">{{ old('itinerary') }}</textarea>
                    @error('itinerary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="available_dates" class="form-label">Available Dates</label>
                    <textarea class="form-control @error('available_dates') is-invalid @enderror" 
                              id="available_dates" name="available_dates" rows="2" 
                              placeholder="Every weekend, December 2024 - March 2025">{{ old('available_dates') }}</textarea>
                    @error('available_dates')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- SEO Fields -->
                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                              id="meta_description" name="meta_description" rows="2" maxlength="160"
                              placeholder="Brief description for search engines (max 160 characters)">{{ old('meta_description') }}</textarea>
                    <small class="text-muted">This helps with SEO and social media sharing</small>
                    @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" onclick="saveDraft()">Save as Draft</button>
                    <div>
                        <button type="submit" name="action" value="save" class="btn btn-primary me-2">Create Tour</button>
                        <button type="submit" name="action" value="save_and_publish" class="btn btn-success">Create & Publish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate slug from name
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    
    nameInput.addEventListener('input', function() {
        if (!slugInput.value || slugInput.dataset.autoGenerated) {
            const slug = this.value
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
            slugInput.value = slug;
            slugInput.dataset.autoGenerated = 'true';
        }
    });
    
    slugInput.addEventListener('input', function() {
        this.dataset.autoGenerated = 'false';
    });
    
    // Character counter for meta description
    const metaDesc = document.getElementById('meta_description');
    if (metaDesc) {
        const counter = document.createElement('small');
        counter.className = 'text-muted float-end';
        metaDesc.parentNode.appendChild(counter);
        
        function updateCounter() {
            const remaining = 160 - metaDesc.value.length;
            counter.textContent = `${remaining} characters remaining`;
            counter.className = remaining < 0 ? 'text-danger float-end' : 'text-muted float-end';
        }
        
        metaDesc.addEventListener('input', updateCounter);
        updateCounter();
    }
});

function saveDraft() {
    document.getElementById('status').value = 'draft';
    document.getElementById('tourForm').submit();
}
</script>
@endpush
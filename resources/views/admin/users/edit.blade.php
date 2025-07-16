@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1" style="font-size: 2rem; color: #2c3e50;">
                <i class="fas fa-user-edit me-2 text-primary"></i>Edit User
            </h1>
            <p class="text-muted mb-0">Update user information for <strong>{{ $user->name }}</strong></p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-outline-info">
                <i class="fas fa-eye me-2"></i>View Profile
            </a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Users
            </a>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0" style="border-radius: 0.75rem;">
                <div class="card-header bg-warning bg-opacity-10 border-bottom py-3">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            @if($user->avatar)
                                <img src="{{ Storage::url($user->avatar) }}" 
                                     class="rounded-circle border border-2 border-light shadow-sm" 
                                     width="50" height="50" style="object-fit: cover;">
                            @else
                                <div class="bg-gradient rounded-circle d-flex align-items-center justify-content-center shadow-sm
                                            {{ $user->role === 'admin' ? 'bg-danger' : 'bg-primary' }}" 
                                     style="width: 50px; height: 50px;">
                                    <span class="text-white fw-bold" style="font-size: 1.2rem;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h5 class="mb-0 text-warning fw-semibold">
                                <i class="fas fa-edit me-2"></i>Editing User Profile
                            </h5>
                            <small class="text-muted">Last updated: {{ $user->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <form action="{{ route('admin.users.update', $user) }}" method="POST" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <!-- Personal Information Section -->
                        <div class="mb-4">
                            <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                                <i class="fas fa-user me-2 text-primary"></i>Personal Information
                            </h6>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-semibold">
                                            Full Name <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-user text-muted"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control @error('name') is-invalid @enderror" 
                                                   id="name" name="name" value="{{ old('name', $user->name) }}" 
                                                   placeholder="Enter full name" required>
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
                                        <label for="email" class="form-label fw-semibold">
                                            Email Address <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-envelope text-muted"></i>
                                            </span>
                                            <input type="email" 
                                                   class="form-control @error('email') is-invalid @enderror" 
                                                   id="email" name="email" value="{{ old('email', $user->email) }}" 
                                                   placeholder="Enter email address" required>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Security Section -->
                        <div class="mb-4">
                            <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                                <i class="fas fa-lock me-2 text-primary"></i>Security & Access
                            </h6>
                            
                            <div class="alert alert-info border-0 bg-info bg-opacity-10">
                                <i class="fas fa-info-circle me-2"></i>
                                <strong>Password Update:</strong> Leave password fields empty to keep the current password.
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label fw-semibold">New Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-key text-muted"></i>
                                            </span>
                                            <input type="password" 
                                                   class="form-control @error('password') is-invalid @enderror" 
                                                   id="password" name="password" 
                                                   placeholder="Enter new password">
                                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password')">
                                                <i class="fas fa-eye" id="password-icon"></i>
                                            </button>
                                        </div>
                                        <small class="text-muted">Leave empty to keep current password</small>
                                        @error('password')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label fw-semibold">Confirm New Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-check text-muted"></i>
                                            </span>
                                            <input type="password" class="form-control" 
                                                   id="password_confirmation" name="password_confirmation" 
                                                   placeholder="Confirm new password">
                                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password_confirmation')">
                                                <i class="fas fa-eye" id="password_confirmation-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="role" class="form-label fw-semibold">
                                            User Role <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-user-tag text-muted"></i>
                                            </span>
                                            <select class="form-select @error('role') is-invalid @enderror" 
                                                    id="role" name="role" required>
                                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                                                    User - Regular access
                                                </option>
                                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                                    Admin - Full access
                                                </option>
                                            </select>
                                        </div>
                                        @error('role')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="status" class="form-label fw-semibold">
                                            Account Status <span class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-toggle-on text-muted"></i>
                                            </span>
                                            <select class="form-select @error('status') is-invalid @enderror" 
                                                    id="status" name="status" required>
                                                <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>
                                                    Active - Can access system
                                                </option>
                                                <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>
                                                    Inactive - Access suspended
                                                </option>
                                            </select>
                                        </div>
                                        @error('status')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label fw-semibold">Phone Number</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-phone text-muted"></i>
                                            </span>
                                            <input type="text" 
                                                   class="form-control @error('phone') is-invalid @enderror" 
                                                   id="phone" name="phone" value="{{ old('phone', $user->phone) }}" 
                                                   placeholder="Enter phone number">
                                        </div>
                                        @error('phone')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        <div class="mb-4">
                            <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                                <i class="fas fa-info me-2 text-primary"></i>Additional Information
                            </h6>
                            
                            <div class="mb-3">
                                <label for="address" class="form-label fw-semibold">Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-map-marker-alt text-muted"></i>
                                    </span>
                                    <textarea class="form-control @error('address') is-invalid @enderror" 
                                              id="address" name="address" rows="3" 
                                              placeholder="Enter full address">{{ old('address', $user->address) }}</textarea>
                                </div>
                                @error('address')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Account Information -->
                        <div class="mb-4">
                            <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                                <i class="fas fa-clock me-2 text-primary"></i>Account Information
                            </h6>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block">Account Created</small>
                                        <strong>{{ $user->created_at->format('M d, Y \a\t g:i A') }}</strong>
                                        <small class="text-muted d-block">{{ $user->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded">
                                        <small class="text-muted d-block">Last Updated</small>
                                        <strong>{{ $user->updated_at->format('M d, Y \a\t g:i A') }}</strong>
                                        <small class="text-muted d-block">{{ $user->updated_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Actions -->
                        <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-warning px-4">
                                <i class="fas fa-save me-2"></i>Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(fieldId + '-icon');
    
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
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
</style>
@endsection
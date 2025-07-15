@extends('layouts.admin')

@section('title', 'User Profile')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1" style="font-size: 2rem; color: #2c3e50;">
                <i class="fas fa-user me-2 text-primary"></i>User Profile
            </h1>
            <p class="text-muted mb-0">Detailed information for {{ $user->name }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning">
                <i class="fas fa-edit me-2"></i>Edit User
            </a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Users
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Profile Card -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 0.75rem;">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        @if($user->avatar)
                            <img src="{{ Storage::url($user->avatar) }}" 
                                 class="rounded-circle border border-3 border-light shadow" 
                                 width="120" height="120" style="object-fit: cover;">
                        @else
                            <div class="bg-gradient rounded-circle d-flex align-items-center justify-content-center shadow mx-auto
                                        {{ $user->role === 'admin' ? 'bg-danger' : 'bg-primary' }}" 
                                 style="width: 120px; height: 120px;">
                                <span class="text-white fw-bold" style="font-size: 2.5rem;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </span>
                            </div>
                        @endif
                    </div>
                    
                    <h4 class="fw-bold text-dark mb-1">{{ $user->name }}</h4>
                    <p class="text-muted mb-3">{{ $user->email }}</p>
                    
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <span class="badge rounded-pill px-3 py-2 fw-semibold
                                   {{ $user->role === 'admin' ? 'bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25' : 'bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25' }}">
                            <i class="fas fa-{{ $user->role === 'admin' ? 'user-shield' : 'user' }} me-1"></i>
                            {{ ucfirst($user->role) }}
                        </span>
                        
                        <span class="badge rounded-pill px-3 py-2 fw-semibold
                                   {{ $user->status === 'active' ? 'bg-success bg-opacity-10 text-success border border-success border-opacity-25' : 'bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25' }}">
                            <i class="fas fa-{{ $user->status === 'active' ? 'check-circle' : 'pause-circle' }} me-1"></i>
                            {{ ucfirst($user->status) }}
                        </span>
                    </div>
                    
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="p-2">
                                <h6 class="fw-bold text-primary mb-0">{{ $user->created_at->format('M Y') }}</h6>
                                <small class="text-muted">Joined</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2">
                                <h6 class="fw-bold text-success mb-0">{{ $user->updated_at->diffForHumans() }}</h6>
                                <small class="text-muted">Last Active</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="card shadow-sm border-0" style="border-radius: 0.75rem;">
                <div class="card-header bg-light border-bottom py-3">
                    <h6 class="mb-0 fw-semibold">
                        <i class="fas fa-bolt me-2 text-warning"></i>Quick Actions
                    </h6>
                </div>
                <div class="card-body p-3">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-edit me-2"></i>Edit Profile
                        </a>
                        
                        <form action="{{ route('admin.users.toggle-status', $user) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-outline-warning btn-sm w-100">
                                <i class="fas fa-{{ $user->status === 'active' ? 'pause' : 'play' }} me-2"></i>
                                {{ $user->status === 'active' ? 'Deactivate' : 'Activate' }} Account
                            </button>
                        </form>
                        
                        @if($user->id !== auth()->id())
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete {{ $user->name }}? This action cannot be undone.')" 
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                <i class="fas fa-trash me-2"></i>Delete User
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Details Card -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0" style="border-radius: 0.75rem;">
                <div class="card-header bg-primary bg-opacity-10 border-bottom py-3">
                    <h5 class="mb-0 text-primary fw-semibold">
                        <i class="fas fa-info-circle me-2"></i>User Information
                    </h5>
                </div>
                
                <div class="card-body p-4">
                    <!-- Personal Information -->
                    <div class="mb-4">
                        <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                            <i class="fas fa-user me-2 text-primary"></i>Personal Details
                        </h6>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-1">Full Name</label>
                                    <div class="fw-bold text-dark">{{ $user->name }}</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-1">Email Address</label>
                                    <div class="fw-bold text-dark">{{ $user->email }}</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-1">Phone Number</label>
                                    <div class="fw-bold text-dark">
                                        @if($user->phone)
                                            <i class="fas fa-phone me-2 text-success"></i>{{ $user->phone }}
                                        @else
                                            <span class="text-muted fst-italic">Not provided</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-1">User Role</label>
                                    <div>
                                        <span class="badge rounded-pill px-3 py-2 fw-semibold
                                                   {{ $user->role === 'admin' ? 'bg-danger' : 'bg-primary' }}">
                                            <i class="fas fa-{{ $user->role === 'admin' ? 'user-shield' : 'user' }} me-1"></i>
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if($user->address)
                        <div class="mb-3">
                            <div class="p-3 bg-light rounded">
                                <label class="form-label fw-semibold text-muted mb-1">Address</label>
                                <div class="fw-bold text-dark">
                                    <i class="fas fa-map-marker-alt me-2 text-danger"></i>{{ $user->address }}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Account Information -->
                    <div class="mb-4">
                        <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                            <i class="fas fa-cog me-2 text-primary"></i>Account Settings
                        </h6>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-1">Account Status</label>
                                    <div>
                                        <span class="badge rounded-pill px-3 py-2 fw-semibold
                                                   {{ $user->status === 'active' ? 'bg-success' : 'bg-warning text-dark' }}">
                                            <i class="fas fa-{{ $user->status === 'active' ? 'check-circle' : 'pause-circle' }} me-1"></i>
                                            {{ ucfirst($user->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-light rounded">
                                    <label class="form-label fw-semibold text-muted mb-1">User ID</label>
                                    <div class="fw-bold text-dark">#{{ str_pad($user->id, 6, '0', STR_PAD_LEFT) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Information -->
                    <div class="mb-0">
                        <h6 class="fw-semibold text-dark mb-3 pb-2 border-bottom">
                            <i class="fas fa-clock me-2 text-primary"></i>Account Timeline
                        </h6>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-success bg-opacity-10 rounded border border-success border-opacity-25">
                                    <label class="form-label fw-semibold text-success mb-1">
                                        <i class="fas fa-calendar-plus me-1"></i>Account Created
                                    </label>
                                    <div class="fw-bold text-dark">{{ $user->created_at->format('M d, Y \a\t g:i A') }}</div>
                                    <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="p-3 bg-info bg-opacity-10 rounded border border-info border-opacity-25">
                                    <label class="form-label fw-semibold text-info mb-1">
                                        <i class="fas fa-calendar-check me-1"></i>Last Updated
                                    </label>
                                    <div class="fw-bold text-dark">{{ $user->updated_at->format('M d, Y \a\t g:i A') }}</div>
                                    <small class="text-muted">{{ $user->updated_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
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
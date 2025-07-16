@extends('layouts.admin')

@section('title', 'Users Management')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1" style="font-size: 2.2rem; color: #2c3e50;">
                <i class="fas fa-users me-2 text-primary"></i>Users Management
            </h1>
            <p class="text-muted mb-0">Manage all system users and their permissions</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-lg shadow-sm px-4">
            <i class="fas fa-plus me-2"></i>Add New User
        </a>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Main Content Card -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-0 fw-semibold text-dark">
                        <i class="fas fa-list me-2 text-primary"></i>All Users 
                        <span class="badge bg-primary ms-2">{{ $users->total() }}</span>
                    </h5>
                </div>
                <div class="col-md-6">
                    <!-- Search and Filter Form -->
                    <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex justify-content-md-end flex-wrap gap-2">
                        <div class="input-group input-group-sm" style="max-width: 200px;">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-filter text-muted"></i>
                            </span>
                            <select name="role" class="form-select border-start-0" onchange="this.form.submit()">
                                <option value="">All Roles</option>
                                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                        </div>
                        
                        <div class="input-group input-group-sm" style="max-width: 250px;">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-start-0" 
                                   placeholder="Search users..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary px-3">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        
                        @if(request('search') || request('role'))
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-times"></i> Clear
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3 fw-semibold">#</th>
                            <th class="py-3 fw-semibold">User</th>
                            <th class="py-3 fw-semibold">Email</th>
                            <th class="py-3 fw-semibold">Role</th>
                            <th class="py-3 fw-semibold">Status</th>
                            <th class="py-3 fw-semibold">Phone</th>
                            <th class="py-3 fw-semibold">Joined</th>
                            <th class="py-3 fw-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $user)
                        <tr class="border-bottom">
                            <td class="px-4 py-3">
                                <span class="fw-bold text-muted">
                                    {{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}
                                </span>
                            </td>
                            <td class="py-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        @if($user->avatar)
                                            <img src="{{ Storage::url($user->avatar) }}" 
                                                 class="rounded-circle border border-2 border-light shadow-sm" 
                                                 width="40" height="40" style="object-fit: cover;">
                                        @else
                                            <div class="bg-gradient rounded-circle d-flex align-items-center justify-content-center shadow-sm
                                                        {{ $user->role === 'admin' ? 'bg-danger' : 'bg-primary' }}" 
                                                 style="width: 40px; height: 40px;">
                                                <span class="text-white fw-bold" style="font-size: 1.1rem;">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-dark">{{ $user->name }}</div>
                                        @if($user->address)
                                            <small class="text-muted">
                                                <i class="fas fa-map-marker-alt me-1"></i>
                                                {{ Str::limit($user->address, 30) }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <span class="text-dark">{{ $user->email }}</span>
                            </td>
                            <td class="py-3">
                                <span class="badge rounded-pill px-3 py-2 fw-semibold
                                           {{ $user->role === 'admin' ? 'bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25' : 'bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25' }}">
                                    <i class="fas fa-{{ $user->role === 'admin' ? 'user-shield' : 'user' }} me-1"></i>
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="py-3">
                                <span class="badge rounded-pill px-3 py-2 fw-semibold
                                           {{ $user->status === 'active' ? 'bg-success bg-opacity-10 text-success border border-success border-opacity-25' : 'bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25' }}">
                                    <i class="fas fa-{{ $user->status === 'active' ? 'check-circle' : 'pause-circle' }} me-1"></i>
                                    {{ ucfirst($user->status) }}
                                </span>
                            </td>
                            <td class="py-3">
                                @if($user->phone)
                                    <span class="text-dark">{{ $user->phone }}</span>
                                @else
                                    <span class="text-muted fst-italic">Not provided</span>
                                @endif
                            </td>
                            <td class="py-3">
                                <div class="text-dark">{{ $user->created_at->format('M d, Y') }}</div>
                                <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                            </td>
                            <td class="py-3 text-center">
                                <div class="btn-group shadow-sm" role="group">
                                    <a href="{{ route('admin.users.show', $user) }}" 
                                       class="btn btn-sm btn-outline-info" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user) }}" 
                                       class="btn btn-sm btn-outline-success" title="Edit User">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                                                data-bs-toggle="dropdown" aria-expanded="false" title="More Actions">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow">
                                            <li>
                                                <form action="{{ route('admin.users.toggle-status', $user) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fas fa-{{ $user->status === 'active' ? 'pause' : 'play' }} me-2 text-warning"></i>
                                                        {{ $user->status === 'active' ? 'Deactivate' : 'Activate' }}
                                                    </button>
                                                </form>
                                            </li>
                                            @if($user->id !== auth()->id())
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" 
                                                      onsubmit="return confirm('Are you sure you want to delete {{ $user->name }}? This action cannot be undone.')" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <i class="fas fa-trash me-2"></i>Delete User
                                                    </button>
                                                </form>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="fas fa-users fa-3x mb-3 opacity-50"></i>
                                    <h5>No users found</h5>
                                    <p class="mb-0">
                                        @if(request('search') || request('role'))
                                            Try adjusting your search criteria or 
                                            <a href="{{ route('admin.users.index') }}" class="text-decoration-none">clear filters</a>
                                        @else
                                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                                                <i class="fas fa-plus me-1"></i>Create your first user
                                            </a>
                                        @endif
                                    </p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($users->hasPages())
        <div class="card-footer bg-white border-top">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted">
                    Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} users
                </div>
                <div>
                    {{ $users->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
.table-hover tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05) !important;
}

.btn-group .btn {
    border-radius: 0.375rem !important;
}

.btn-group .btn:not(:last-child) {
    margin-right: 2px;
}

.badge {
    font-size: 0.75rem;
    letter-spacing: 0.5px;
}

.card {
    border-radius: 0.75rem;
}

.table th {
    border-bottom: 2px solid #dee2e6;
    font-weight: 600;
    color: #495057;
}
</style>
@endsection
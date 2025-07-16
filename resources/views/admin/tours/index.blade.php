@extends('layouts.admin')

@section('title', 'Tours Management')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Tours Management</h1>
        <a href="{{ route('admin.tours.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> New Tour
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-0">All Tours ({{ isset($tours) && method_exists($tours, 'total') ? $tours->total() : (isset($tours) ? count($tours) : 0) }})</h5>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('admin.tours.index') }}" method="GET" class="d-flex">
                        <select name="status" class="form-select form-select-sm me-2">
                            <option value="">All Status</option>
                            <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                        <select name="category" class="form-select form-select-sm me-2">
                            <option value="">All Categories</option>
                            <option value="nature" {{ request('category') == 'nature' ? 'selected' : '' }}>Nature</option>
                            <option value="culinary" {{ request('category') == 'culinary' ? 'selected' : '' }}>Culinary</option>
                            <option value="family" {{ request('category') == 'family' ? 'selected' : '' }}>Family</option>
                            <option value="adventure" {{ request('category') == 'adventure' ? 'selected' : '' }}>Adventure</option>
                            <option value="cultural" {{ request('category') == 'cultural' ? 'selected' : '' }}>Cultural</option>
                        </select>
                        <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Search tours..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-sm btn-primary">Search</button>
                        @if(request()->hasAny(['search', 'category', 'status']))
                            <a href="{{ route('admin.tours.index') }}" class="btn btn-sm btn-outline-secondary ms-2">Clear</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Duration</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tours ?? [] as $tour)
                        <tr>
                            <td>{{ $tour->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($tour->image)
                                        <img src="{{ Storage::url($tour->image) }}" class="rounded me-2" width="40" height="40" style="object-fit: cover;">
                                    @else
                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                            <i class="fas fa-map-marked-alt text-white"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-bold">{{ $tour->name }}</div>
                                        <small class="text-muted">{{ Str::limit($tour->description ?? '', 50) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info">
                                    {{ ucfirst($tour->category) }}
                                </span>
                            </td>
                            <td>
                                @if($tour->price)
                                    <strong>${{ number_format($tour->price, 0) }}</strong>
                                @else
                                    <span class="text-muted">Free</span>
                                @endif
                            </td>
                            <td>{{ $tour->duration ?? 'N/A' }}</td>
                            <td>
                                <i class="fas fa-map-marker-alt text-danger"></i>
                                {{ $tour->location }}
                            </td>
                            <td>
                                @switch($tour->status ?? 'draft')
                                    @case('published')
                                        <span class="badge bg-success">Published</span>
                                        @break
                                    @case('draft')
                                        <span class="badge bg-warning">Draft</span>
                                        @break
                                    @case('archived')
                                        <span class="badge bg-secondary">Archived</span>
                                        @break
                                    @default
                                        <span class="badge bg-warning">Draft</span>
                                @endswitch
                            </td>
                            <td>
                                @if($tour->is_featured ?? false)
                                    <span class="badge bg-primary">Featured</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $tour->created_at ? $tour->created_at->format('M d, Y') : 'N/A' }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('admin.tours.show', $tour) }}" class="dropdown-item">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.tours.edit', $tour) }}" class="dropdown-item">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        </li>
                                        @if(($tour->status ?? 'draft') !== 'published')
                                            <li>
                                                <form action="{{ route('admin.tours.publish', $tour) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="dropdown-item text-success">
                                                        <i class="fas fa-check"></i> Publish
                                                    </button>
                                                </form>
                                            </li>
                                        @else
                                            <li>
                                                <form action="{{ route('admin.tours.unpublish', $tour) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="dropdown-item text-warning">
                                                        <i class="fas fa-pause"></i> Unpublish
                                                    </button>
                                                </form>
                                            </li>
                                        @endif
                                        <li>
                                            <form action="{{ route('admin.tours.toggle-featured', $tour) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="dropdown-item">
                                                    <i class="fas fa-star"></i> 
                                                    {{ ($tour->is_featured ?? false) ? 'Remove Featured' : 'Make Featured' }}
                                                </button>
                                            </form>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('admin.tours.destroy', $tour) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tour? This action cannot be undone.')" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center py-4">
                                <div class="text-muted">
                                    <i class="fas fa-map-marked-alt fa-3x mb-3"></i>
                                    <p>No tours found.</p>
                                    <a href="{{ route('admin.tours.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Create Your First Tour
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if(isset($tours) && method_exists($tours, 'links'))
                <div class="mt-4">
                    {{ $tours->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            if (typeof bootstrap !== 'undefined' && bootstrap.Alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        });
    }, 5000);
});
</script>
@endpush
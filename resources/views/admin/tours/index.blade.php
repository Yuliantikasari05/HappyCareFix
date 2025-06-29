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

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-0">All Tours</h5>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('admin.tours.index') }}" method="GET" class="d-flex">
                        <select name="category" class="form-select form-select-sm me-2">
                            <option value="">All Categories</option>
                            <option value="nature" {{ request('category') == 'nature' ? 'selected' : '' }}>Nature</option>
                            <option value="culinary" {{ request('category') == 'culinary' ? 'selected' : '' }}>Culinary</option>
                            <option value="family" {{ request('category') == 'family' ? 'selected' : '' }}>Family</option>
                        </select>
                        <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Search tours..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-sm btn-primary">Search</button>
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
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tours as $tour)
                        <tr>
                            <td>{{ $tour->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($tour->image)
                                        <img src="{{ Storage::url($tour->image) }}" class="rounded me-2" width="40" height="40">
                                    @else
                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                            <i class="fas fa-map-marked-alt text-white"></i>
                                        </div>
                                    @endif
                                    {{ $tour->name }}
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-success">
                                    {{ ucfirst($tour->category) }}
                                </span>
                            </td>
                            <td>${{ number_format($tour->price, 2) }}</td>
                            <td>{{ $tour->duration ?? 'N/A' }}</td>
                            <td>{{ $tour->location }}</td>
                            <td>{{ $tour->created_at->format('M d, Y') }}</td>
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
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('admin.tours.destroy', $tour) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tour?')" style="display: inline;">
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
                            <td colspan="8" class="text-center">No tours found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $tours->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
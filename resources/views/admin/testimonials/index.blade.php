@extends('layouts.admin')

@section('title', 'Testimonials Management')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Testimonials Management</h1>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Filters -->
<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">All Testimonials</h6>
        <span class="badge bg-info">Total: {{ $testimonials->total() }}</span>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('admin.testimonials.index') }}">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search testimonials..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Approved</option>
                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Filter
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Clear
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Testimonials Table -->
<div class="card shadow mb-4">
    <div class="card-body">
        @if($testimonials->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Rating</th>
                            <th>Service</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonial->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($testimonial->image)
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" class="rounded-circle me-2" width="32" height="32">
                                    @else
                                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px; font-size: 12px;">
                                            {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-weight-bold">{{ $testimonial->name }}</div>
                                        <small class="text-muted">{{ $testimonial->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ Str::limit($testimonial->title, 30) }}</td>
                            <td>
                                <div class="text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $testimonial->rating)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                            </td>
                            <td>
                                @if($testimonial->service_type)
                                    <span class="badge badge-info">{{ ucfirst(str_replace('_', ' ', $testimonial->service_type)) }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge badge-{{ $testimonial->approved ? 'success' : 'warning' }}">
                                    {{ $testimonial->approved ? 'Approved' : 'Pending' }}
                                </span>
                            </td>
                            <td>
                                @if($testimonial->featured)
                                    <span class="badge badge-primary">Featured</span>
                                @else
                                    <span class="badge badge-secondary">Normal</span>
                                @endif
                            </td>
                            <td>{{ $testimonial->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.testimonials.show', $testimonial) }}" class="btn btn-info btn-sm" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.toggle-approval', $testimonial) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-{{ $testimonial->approved ? 'secondary' : 'success' }} btn-sm" 
                                                title="{{ $testimonial->approved ? 'Reject' : 'Approve' }}">
                                            <i class="fas fa-{{ $testimonial->approved ? 'times' : 'check' }}"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.testimonials.toggle-featured', $testimonial) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-{{ $testimonial->featured ? 'secondary' : 'primary' }} btn-sm" 
                                                title="{{ $testimonial->featured ? 'Unfeature' : 'Feature' }}">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Are you sure you want to delete this testimonial?')" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-center">
                {{ $testimonials->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-comments fa-3x text-gray-300 mb-3"></i>
                <p class="text-gray-500">No testimonials found.</p>
            </div>
        @endif
    </div>
</div>
@endsection
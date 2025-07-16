@extends('layouts.admin')

@section('title', 'Testimonials Management')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold mb-0" style="font-size:2rem;letter-spacing:1px;">Testimonials Management</h1>
    </div>
    <div class="data-table mb-4">
        <div class="data-table-header">
            <form class="row g-2 align-items-center w-100" method="GET" action="{{ route('admin.testimonials.index') }}">
                <div class="col-md-5 col-12">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search testimonials..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3 col-6">
                    <select name="status" class="form-select form-select-sm">
                        <option value="">All Status</option>
                        <option value="1" {{ request('status')==='1' ? 'selected' : '' }}>Approved</option>
                        <option value="0" {{ request('status')==='0' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>
                <div class="col-md-4 col-6 d-flex gap-2">
                    <button type="submit" class="btn btn-sm btn-outline-primary px-3">Filter</button>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-outline-secondary px-3">Clear</a>
                </div>
            </form>
        </div>
        <div class="data-table-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center mb-0">
                    <thead class="table-light">
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
                        @forelse($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonial->id }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2 justify-content-center">
                                    <span class="bg-primary bg-gradient rounded-circle d-flex align-items-center justify-content-center text-white fw-bold" style="width:36px;height:36px;font-size:1.1rem;">
                                        {{ strtoupper(substr($testimonial->name,0,1)) }}
                                    </span>
                                    <div class="text-start">
                                        <div class="fw-semibold">{{ $testimonial->name }}</div>
                                        <small class="text-muted">{{ $testimonial->email ?? '-' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $testimonial->title }}</td>
                            <td>
                                <span class="d-inline-block">
                                @for($i=1; $i<=5; $i++)
                                    <i class="fa{{ $i <= $testimonial->rating ? 's' : 'r' }} fa-star text-warning" style="font-size:1.1em;"></i>
                                @endfor
                                </span>
                            </td>
                            <td>
                                @if($testimonial->service_type === 'hospital')
                                    <span class="badge rounded-pill bg-info px-3 py-2">Rumah Sakit</span>
                                @elseif($testimonial->service_type === 'tour')
                                    <span class="badge rounded-pill bg-success px-3 py-2">Wisata</span>
                                @else
                                    <span class="badge rounded-pill bg-secondary px-3 py-2">-</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge rounded-pill {{ $testimonial->approved ? 'bg-success' : 'bg-warning text-dark' }} px-3 py-2">
                                    <i class="fas fa-{{ $testimonial->approved ? 'check-circle' : 'ban' }} me-1"></i>{{ $testimonial->approved ? 'Approved' : 'Pending' }}
                                </span>
                            </td>
                            <td>
                                @if($testimonial->featured)
                                    <span class="badge rounded-pill bg-warning text-dark px-3 py-2"><i class="fas fa-star me-1"></i>Yes</span>
                                @else
                                    <span class="badge rounded-pill bg-secondary px-3 py-2">No</span>
                                @endif
                            </td>
                            <td>{{ $testimonial->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('admin.testimonials.show', $testimonial->id) }}" class="btn btn-sm btn-outline-primary" title="View"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-outline-success" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-muted py-4">
                                <i class="fas fa-comment-dots fa-2x mb-2"></i><br>No testimonials found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $testimonials->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
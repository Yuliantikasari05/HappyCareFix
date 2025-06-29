@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_users'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Articles</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_articles'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Hospitals</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['total_hospitals'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hospital fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Testimonials</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['pending_testimonials'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-plus"></i> New Article
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.hospitals.create') }}" class="btn btn-success btn-block">
                                <i class="fas fa-plus"></i> New Hospital
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.tours.create') }}" class="btn btn-info btn-block">
                                <i class="fas fa-plus"></i> New Tour
                            </a>
                        </div>
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-warning btn-block">
                                <i class="fas fa-eye"></i> Review Testimonials
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Data Tables -->
    <div class="row">
        <!-- Recent Articles -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Articles</h6>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    @if($recentArticles->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentArticles as $article)
                                    <tr>
                                        <td>{{ Str::limit($article->title, 30) }}</td>
                                        <td>{{ $article->user->name ?? 'Unknown' }}</td>
                                        <td>
                                            <span class="badge badge-{{ $article->published ? 'success' : 'warning' }}">
                                                {{ $article->published ? 'Published' : 'Draft' }}
                                            </span>
                                        </td>
                                        <td>{{ $article->created_at->format('M d') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">No articles found.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Testimonials -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Testimonials</h6>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="card-body">
                    @if($recentTestimonials->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentTestimonials as $testimonial)
                                    <tr>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ Str::limit($testimonial->title, 20) }}</td>
                                        <td>
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $testimonial->rating)
                                                    <i class="fas fa-star text-warning"></i>
                                                @else
                                                    <i class="far fa-star text-warning"></i>
                                                @endif
                                            @endfor
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $testimonial->approved ? 'success' : 'warning' }}">
                                                {{ $testimonial->approved ? 'Approved' : 'Pending' }}
                                            </span>
                                        </td>
                                        <td>{{ $testimonial->created_at->format('M d') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">No testimonials found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Articles Created (Last 30 Days)</h6>
                </div>
                <div class="card-body">
                    <canvas id="articlesChart"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Testimonials Received (Last 30 Days)</h6>
                </div>
                <div class="card-body">
                    <canvas id="testimonialsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Articles Chart
const articlesCtx = document.getElementById('articlesChart').getContext('2d');
const articlesChart = new Chart(articlesCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode($articleChartData->pluck('date')) !!},
        datasets: [{
            label: 'Articles Created',
            data: {!! json_encode($articleChartData->pluck('count')) !!},
            borderColor: 'rgb(75, 192, 192)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Testimonials Chart
const testimonialsCtx = document.getElementById('testimonialsChart').getContext('2d');
const testimonialsChart = new Chart(testimonialsCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode($testimonialChartData->pluck('date')) !!},
        datasets: [{
            label: 'Testimonials Received',
            data: {!! json_encode($testimonialChartData->pluck('count')) !!},
            borderColor: 'rgb(255, 99, 132)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endpush
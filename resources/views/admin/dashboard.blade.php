@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="fw-bold mb-0" style="font-size:2rem;letter-spacing:1px;">Dashboard</h1>
    </div>
    <!-- Statistics Cards -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="dashboard-card bg-blue shadow-sm d-flex align-items-center">
                <div class="icon me-3"><i class="fas fa-users"></i></div>
                <div>
                    <div class="title">Total Users</div>
                    <div class="value">{{ $stats['total_users'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="dashboard-card bg-green shadow-sm d-flex align-items-center">
                <div class="icon me-3"><i class="fas fa-newspaper"></i></div>
                <div>
                    <div class="title">Total Articles</div>
                    <div class="value">{{ $stats['total_articles'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="dashboard-card bg-cyan shadow-sm d-flex align-items-center">
                <div class="icon me-3"><i class="fas fa-hospital"></i></div>
                <div>
                    <div class="title">Total Hospitals</div>
                    <div class="value">{{ $stats['total_hospitals'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="dashboard-card bg-yellow shadow-sm d-flex align-items-center">
                <div class="icon me-3"><i class="fas fa-comments"></i></div>
                <div>
                    <div class="title">Pending Testimonials</div>
                    <div class="value">{{ $stats['pending_testimonials'] }}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="data-table">
                <div class="data-table-header">
                    <h5 class="mb-0">Quick Actions</h5>
                </div>
                <div class="data-table-body py-3">
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary w-100 py-2 fw-semibold shadow-sm">
                                <i class="fas fa-plus me-1"></i> New Article
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('admin.hospitals.create') }}" class="btn btn-success w-100 py-2 fw-semibold shadow-sm">
                                <i class="fas fa-plus me-1"></i> New Hospital
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('admin.tours.create') }}" class="btn btn-info w-100 py-2 fw-semibold shadow-sm">
                                <i class="fas fa-plus me-1"></i> New Tour
                            </a>
                        </div>
                        <div class="col-md-3 col-6">
                            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-warning w-100 py-2 fw-semibold shadow-sm">
                                <i class="fas fa-eye me-1"></i> Review Testimonials
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
            <div class="data-table">
                <div class="data-table-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Articles</h5>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="data-table-body">
                    @if($recentArticles->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm align-middle mb-0">
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
                                            <span class="badge rounded-pill bg-{{ $article->published ? 'success' : 'warning' }}">
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
                        <p class="text-muted py-3">No articles found.</p>
                    @endif
                </div>
            </div>
        </div>
        <!-- Recent Testimonials -->
        <div class="col-lg-6 mb-4">
            <div class="data-table">
                <div class="data-table-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Testimonials</h5>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="data-table-body">
                    @if($recentTestimonials->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm align-middle mb-0">
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
                                            <span class="badge rounded-pill bg-{{ $testimonial->approved ? 'success' : 'warning' }}">
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
                        <p class="text-muted py-3">No testimonials found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Charts Row -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="data-table">
                <div class="data-table-header">
                    <h5 class="mb-0">Articles Created (Last 30 Days)</h5>
                </div>
                <div class="data-table-body">
                    <canvas id="articlesChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="data-table">
                <div class="data-table-header">
                    <h5 class="mb-0">Testimonials Received (Last 30 Days)</h5>
                </div>
                <div class="data-table-body">
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
            tension: 0.4,
            pointRadius: 4,
            pointBackgroundColor: 'rgb(75, 192, 192)'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
// Testimonials Chart
const testimonialsCtx = document.getElementById('testimonialsChart').getContext('2d');
const testimonialsChart = new Chart(testimonialsCtx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($testimonialChartData->pluck('date')) !!},
        datasets: [{
            label: 'Testimonials',
            data: {!! json_encode($testimonialChartData->pluck('count')) !!},
            backgroundColor: 'rgba(255, 193, 7, 0.7)',
            borderColor: 'rgb(255, 193, 7)',
            borderWidth: 1,
            borderRadius: 6
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
@endpush
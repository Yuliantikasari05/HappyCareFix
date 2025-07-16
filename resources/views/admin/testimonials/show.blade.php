@extends('layouts.admin')

@section('title', 'Testimonial Detail')

@section('content')
<div class="container">
    <h1>Testimonial Detail</h1>
    <table class="table">
        <tr>
            <th>Name</th>
            <td>{{ $testimonial->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $testimonial->email ?? '-' }}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{ $testimonial->title }}</td>
        </tr>
        <tr>
            <th>Message</th>
            <td>{{ $testimonial->message }}</td>
        </tr>
        <tr>
            <th>Rating</th>
            <td>
                @for($i=1; $i<=5; $i++)
                    <i class="fa{{ $i <= $testimonial->rating ? 's' : 'r' }} fa-star text-warning"></i>
                @endfor
            </td>
        </tr>
        <tr>
            <th>Service</th>
            <td>{{ $testimonial->service_type ?? '-' }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <span class="badge {{ $testimonial->approved ? 'bg-success' : 'bg-warning' }}">
                    {{ $testimonial->approved ? 'Approved' : 'Pending' }}
                </span>
            </td>
        </tr>
        <tr>
            <th>Featured</th>
            <td>
                @if($testimonial->featured)
                    <span class="badge bg-info">Yes</span>
                @else
                    <span class="badge bg-secondary">No</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{ $testimonial->created_at->format('M d, Y') }}</td>
        </tr>
    </table>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Back to Testimonials</a>
</div>
@endsection 
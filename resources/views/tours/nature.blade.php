@extends('layouts.app')

@section('title', 'Nature Tours - HappyCare')

@section('content')
<!-- Hero Section -->
<section class="relative py-24 bg-gradient-to-br from-emerald-600 via-green -600 to-teal-600 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.3&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    </div>
    
    <div class="container px-4 mx-auto relative">
        <div class="max-w-4xl mx-auto text-center">
            <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-white/20 backdrop-blur-sm" data-aos="zoom-in">
                <i data-lucide="trees" class="w-10 h-10 text-white"></i>
            </div>
            
            <h1 class="mb-6 text-4xl font-bold text-white md:text-5xl" data-aos="fade-up">
                Nature Tours
            </h1>
            <p class="mb-8 text-xl text-white/90 leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                Explore the beauty of nature with our guided tours. Reconnect with the natural world and find peace in stunning landscapes.
            </p>
            
            <!-- Breadcrumb -->
            <nav class="flex justify-center" aria-label="Breadcrumb" data-aos="fade-up" data-aos-delay="400">
                <ol class="flex items-center space-x-2 text-white/80">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-white transition-colors">
                            <i data-lucide="home" class="w-4 h-4"></i>
                        </a>
                    </li>
                    <li>
                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </li>
                    <li>
                        <a href="#" class="hover:text-white transition-colors">Tours</a>
                    </li>
                    <li>
                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </li>
                    <li class="text-white font-medium">Nature</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Tour Categories Navigation -->
<section class="py-8 bg-white border-b border-gray-100">
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up">
            <a href="{{ route('tour.nature') }}" 
               class="inline-flex items-center px-6 py-3 text-white bg-emerald-600 rounded-full hover:bg-emerald-700 transition-colors">
                <i data-lucide="trees" class="w-5 h-5 mr-2"></i>
                Nature Tours
            </a>
            <a href="{{ route('tour.culinary') }}" 
               class="inline-flex items-center px-6 py-3 text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200 transition-colors">
                <i data-lucide="utensils" class="w-5 h-5 mr-2"></i>
                Culinary Tours
            </a>
            <a href="{{ route('tour.family') }}" 
               class="inline-flex items-center px-6 py-3 text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200 transition-colors">
                <i data-lucide="users" class="w-5 h-5 mr-2"></i>
                Family Tours
            </a>
        </div>
    </div>
</section>

<!-- Tours Grid -->
<section class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="container px-4 mx-auto">
        @if($tours->count() > 0)
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($tours as $index => $tour)
                <div class="group" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2">
                        <!-- Image -->
                        <div class="relative h-64 overflow-hidden">
                            @if($tour->image)
                                <img src="{{ asset('storage/' . $tour->image) }}" 
                                     alt="{{ $tour->name }}" 
                                     class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="flex items-center justify-center w-full h-full bg-gradient-to-br from-emerald-100 to-green-100">
                                    <i data-lucide="trees" class="w-16 h-16 text-emerald-600"></i>
                                </div>
                            @endif
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <!-- Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-emerald-600 rounded-full">
                                    <i data-lucide="trees" class="w-4 h-4 mr-1"></i>
                                    Nature
                                </span>
                            </div>
                            
                            <!-- Duration -->
                            @if($tour->duration)
                            <div class="absolute top-4 right-4">
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-black/50 backdrop-blur-sm rounded-full">
                                    <i data-lucide="clock" class="w-4 h-4 mr-1"></i>
                                    {{ $tour->duration }}
                                </span>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">
                                {{ $tour->name }}
                            </h3>
                            
                            <p class="mb-4 text-gray-600 leading-relaxed">
                                {{ Str::limit($tour->description, 120) }}
                            </p>
                            
                            <!-- Features -->
                            @if($tour->features)
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach(array_slice($tour->features, 0, 3) as $feature)
                                <span class="px-2 py-1 text-xs font-medium text-emerald-700 bg-emerald-50 rounded-full">
                                    {{ $feature }}
                                </span>
                                @endforeach
                            </div>
                            @endif
                            
                            <!-- Price & Action -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div>
                                    <span class="text-2xl font-bold text-gray-900">
                                        Rp {{ number_format($tour->price, 0, ',', '.') }}
                                    </span>
                                    <span class="text-sm text-gray-500">/person</span>
                                </div>
                                
                                <a href="{{ route('tour.show', $tour->slug) }}" 
                                   class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-emerald-600 rounded-lg hover:bg-emerald-700 transition-colors">
                                    View Details
                                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16" data-aos="fade-up">
                <div class="flex items-center justify-center w-24 h-24 mx-auto mb-6 rounded-full bg-emerald-100">
                    <i data-lucide="trees" class="w-12 h-12 text-emerald-600"></i>
                </div>
                <h3 class="mb-4 text-2xl font-bold text-gray-900">No Nature Tours Available</h3>
                <p class="mb-8 text-gray-600 max-w-md mx-auto">
                    We're currently preparing amazing nature tours for you. Please check back later!
                </p>
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center px-6 py-3 text-white bg-emerald-600 rounded-lg hover:bg-emerald-700 transition-colors">
                    <i data-lucide="arrow-left" class="w-5 h-5 mr-2"></i>
                    Back to Home
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Why Choose Nature Tours -->
<section class="py-24 bg-gradient-to-br from-emerald-50 via-white to-green-50">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Why Choose <span class="text-emerald-600">Nature Tours</span>?
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-emerald-500 to-green-500 rounded-full"></div>
            <p class="text-lg text-gray-600">
                Discover the healing power of nature and create unforgettable memories in pristine natural environments.
            </p>
        </div>
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Benefit 1 -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-emerald-100">
                    <i data-lucide="heart" class="w-8 h-8 text-emerald-600"></i>
                </div>
                <h3 class="mb-4 text-xl font-bold text-gray-900">Health Benefits</h3>
                <p class="text-gray-600 leading-relaxed">
                    Reduce stress, improve mental health, and boost your immune system through nature therapy.
                </p>
            </div>
            
            <!-- Benefit 2 -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-green-100">
                    <i data-lucide="camera" class="w-8 h-8 text-green-600"></i>
                </div>
                <h3 class="mb-4 text-xl font-bold text-gray-900">Photography</h3>
                <p class="text-gray-600 leading-relaxed">
                    Capture stunning landscapes and wildlife moments with guidance from professional photographers.
                </p>
            </div>
            
            <!-- Benefit 3 -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-teal-100">
                    <i data-lucide="users" class="w-8 h-8 text-teal-600"></i>
                </div>
                <h3 class="mb-4 text-xl font-bold text-gray-900">Expert Guides</h3>
                <p class="text-gray-600 leading-relaxed">
                    Learn from experienced naturalists and local guides who know the best spots and stories.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide Icons
        lucide.createIcons();
    });
</script>
@endpush

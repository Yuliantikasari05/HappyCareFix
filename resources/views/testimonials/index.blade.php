@extends('layouts.app')

@section('title', 'Testimonials - HappyCare')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="relative py-20 overflow-hidden bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="relative container px-4 mx-auto">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-flex items-center px-4 py-2 mb-6 text-sm font-medium text-primary-100 bg-white/10 rounded-full backdrop-blur-sm">
                    <i data-lucide="star" class="w-4 h-4 mr-2"></i>
                    Patient Stories
                </div>
                <h1 class="mb-6 text-4xl font-bold text-white md:text-6xl">
                    What Our 
                    <span class="text-transparent bg-gradient-to-r from-yellow-400 to-orange-400 bg-clip-text">Patients Say</span>
                </h1>
                <p class="mb-8 text-xl text-primary-100">
                    Real stories from real patients who have experienced exceptional care with HappyCare.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('testimonials.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-white text-primary-600 rounded-xl font-semibold hover:bg-gray-100 transition-colors">
                        <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
                        Share Your Story
                    </a>
                    <a href="#testimonials" 
                       class="inline-flex items-center px-6 py-3 border-2 border-white text-white rounded-xl font-semibold hover:bg-white hover:text-primary-600 transition-colors">
                        <i data-lucide="arrow-down" class="w-5 h-5 mr-2"></i>
                        Read Stories
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="users" class="w-8 h-8 text-primary-600"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">{{ $totalTestimonials ?? '500+' }}</div>
                    <div class="text-gray-600">Happy Patients</div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="star" class="w-8 h-8 text-yellow-600"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">4.9/5</div>
                    <div class="text-gray-600">Average Rating</div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="heart" class="w-8 h-8 text-green-600"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">98%</div>
                    <div class="text-gray-600">Satisfaction Rate</div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="award" class="w-8 h-8 text-blue-600"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">15+</div>
                    <div class="text-gray-600">Years Experience</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Testimonials -->
    @if($featuredTestimonials && $featuredTestimonials->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-white">
        <div class="container px-4 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">Featured Stories</h2>
                <p class="text-xl text-gray-600">Exceptional experiences that inspire us every day</p>
            </div>
            
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($featuredTestimonials as $testimonial)
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-yellow-400 to-orange-400 rounded-bl-full opacity-10"></div>
                    
                    <!-- Rating Stars -->
                    <div class="flex items-center mb-4">
                        @for($i = 1; $i <= 5; $i++)
                            <i data-lucide="star" class="w-5 h-5 {{ $i <= ($testimonial->rating ?? 5) ? 'text-yellow-400 fill-current' : 'text-gray-300' }}"></i>
                        @endfor
                        <span class="ml-2 text-sm font-medium text-gray-600">({{ $testimonial->rating ?? 5 }}/5)</span>
                    </div>
                    
                    <!-- Quote -->
                    <blockquote class="mb-6 text-gray-700 italic leading-relaxed">
                        "{{ Str::limit($testimonial->message, 150) }}"
                    </blockquote>
                    
                    <!-- Patient Info -->
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mr-4">
                            <i data-lucide="user" class="w-6 h-6 text-primary-600"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">{{ $testimonial->patient_name }}</div>
                            <div class="text-sm text-gray-500">{{ $testimonial->service_type ?? 'General Care' }}</div>
                        </div>
                    </div>
                    
                    <!-- Featured Badge -->
                    <div class="absolute top-4 right-4">
                        <span class="px-2 py-1 text-xs font-semibold text-white bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full">
                            Featured
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- All Testimonials -->
    <section id="testimonials" class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-2xl font-bold text-gray-900">All Patient Stories</h2>
                        
                        <!-- Filter -->
                        <div class="flex items-center space-x-4">
                            <select name="service" onchange="window.location.href=this.value" 
                                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                <option value="{{ route('testimonials.index') }}">All Services</option>
                                <option value="{{ route('testimonials.index', ['service' => 'general']) }}" 
                                        {{ request('service') == 'general' ? 'selected' : '' }}>General Care</option>
                                <option value="{{ route('testimonials.index', ['service' => 'specialist']) }}" 
                                        {{ request('service') == 'specialist' ? 'selected' : '' }}>Specialist Care</option>
                                <option value="{{ route('testimonials.index', ['service' => 'emergency']) }}" 
                                        {{ request('service') == 'emergency' ? 'selected' : '' }}>Emergency Care</option>
                            </select>
                        </div>
                    </div>
                    
                    @if($testimonials && $testimonials->count() > 0)
                        <div class="space-y-6">
                            @foreach($testimonials as $testimonial)
                            <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-lg transition-all duration-300">
                                <div class="flex flex-col md:flex-row gap-6">
                                    <div class="md:w-1/4 text-center md:text-left">
                                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto md:mx-0 mb-4">
                                            <i data-lucide="user" class="w-8 h-8 text-primary-600"></i>
                                        </div>
                                        <h4 class="font-semibold text-gray-900">{{ $testimonial->patient_name }}</h4>
                                        <p class="text-sm text-gray-500 mb-2">{{ $testimonial->service_type ?? 'General Care' }}</p>
                                        <div class="flex items-center justify-center md:justify-start">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i data-lucide="star" class="w-4 h-4 {{ $i <= ($testimonial->rating ?? 5) ? 'text-yellow-400 fill-current' : 'text-gray-300' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    
                                    <div class="md:w-3/4">
                                        <blockquote class="text-gray-700 italic leading-relaxed mb-4">
                                            "{{ $testimonial->message }}"
                                        </blockquote>
                                        
                                        <div class="flex items-center justify-between text-sm text-gray-500">
                                            <span class="flex items-center">
                                                <i data-lucide="calendar" class="w-4 h-4 mr-1"></i>
                                                {{ $testimonial->created_at->format('M d, Y') }}
                                            </span>
                                            @if($testimonial->verified)
                                                <span class="flex items-center text-green-600">
                                                    <i data-lucide="check-circle" class="w-4 h-4 mr-1"></i>
                                                    Verified Patient
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <!-- Pagination -->
                        <div class="mt-12 flex justify-center">
                            {{ $testimonials->links() }}
                        </div>
                    @else
                        <div class="text-center py-16">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i data-lucide="star" class="w-12 h-12 text-gray-400"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">No Testimonials Found</h3>
                            <p class="text-gray-600 mb-6">Be the first to share your experience with HappyCare.</p>
                            <a href="{{ route('testimonials.create') }}" 
                               class="inline-flex items-center px-6 py-3 bg-primary-600 text-white rounded-lg font-semibold hover:bg-primary-700 transition-colors">
                                <i data-lucide="plus" class="w-5 h-5 mr-2"></i>
                                Share Your Story
                            </a>
                        </div>
                    @endif
                </div>
                
                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <div class="sticky top-8 space-y-8">
                        <!-- Share Your Story CTA -->
                        <div class="bg-gradient-to-br from-primary-600 to-primary-700 rounded-2xl p-6 text-white">
                            <h3 class="text-lg font-bold mb-3">Share Your Experience</h3>
                            <p class="text-primary-100 mb-4">Help others by sharing your healthcare journey with HappyCare.</p>
                            <a href="{{ route('testimonials.create') }}" 
                               class="inline-flex items-center w-full justify-center px-4 py-3 bg-white text-primary-600 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                                <i data-lucide="edit" class="w-5 h-5 mr-2"></i>
                                Write Testimonial
                            </a>
                        </div>
                        
                        <!-- Quick Stats -->
                        <div class="bg-white border border-gray-200 rounded-2xl p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-6">Patient Satisfaction</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">5 Stars</span>
                                    <div class="flex items-center">
                                        <div class="w-24 h-2 bg-gray-200 rounded-full mr-3">
                                            <div class="w-20 h-2 bg-yellow-400 rounded-full"></div>
                                        </div>
                                        <span class="text-sm font-medium">85%</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">4 Stars</span>
                                    <div class="flex items-center">
                                        <div class="w-24 h-2 bg-gray-200 rounded-full mr-3">
                                            <div class="w-3 h-2 bg-yellow-400 rounded-full"></div>
                                        </div>
                                        <span class="text-sm font-medium">12%</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">3 Stars</span>
                                    <div class="flex items-center">
                                        <div class="w-24 h-2 bg-gray-200 rounded-full mr-3">
                                            <div class="w-1 h-2 bg-yellow-400 rounded-full"></div>
                                        </div>
                                        <span class="text-sm font-medium">2%</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">2 Stars</span>
                                    <div class="flex items-center">
                                        <div class="w-24 h-2 bg-gray-200 rounded-full mr-3">
                                            <div class="w-0.5 h-2 bg-yellow-400 rounded-full"></div>
                                        </div>
                                        <span class="text-sm font-medium">1%</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">1 Star</span>
                                    <div class="flex items-center">
                                        <div class="w-24 h-2 bg-gray-200 rounded-full mr-3">
                                            <div class="w-0 h-2 bg-yellow-400 rounded-full"></div>
                                        </div>
                                        <span class="text-sm font-medium">0%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
@endsection

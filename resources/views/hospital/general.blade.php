@extends('layouts.app')

@section('title', 'General Hospitals - HappyCare')

@section('content')
<!-- Hero Section -->
<section class="relative py-24 bg-gradient-to-br from-cyan-600 via-blue-600 to-indigo-600 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.3&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    </div>
    
    <div class="container px-4 mx-auto relative">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 items-center">
            <div data-aos="fade-right">
                <div class="flex items-center justify-center w-20 h-20 mb-6 rounded-full bg-white/20 backdrop-blur-sm lg:justify-start">
                    <i data-lucide="hospital" class="w-10 h-10 text-white"></i>
                </div>
                
                <h1 class="mb-6 text-4xl font-bold text-white md:text-5xl">
                    General Hospitals
                </h1>
                <p class="mb-8 text-xl text-white/90 leading-relaxed">
                    Find the best general hospitals in Yogyakarta with comprehensive healthcare services and professional medical staff.
                </p>
                
                <!-- Quick Stats -->
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-bold text-white">{{ $hospitals->total() ?? 0 }}</div>
                        <div class="text-white/80">Hospitals</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-bold text-white">24/7</div>
                        <div class="text-white/80">Emergency Care</div>
                    </div>
                </div>
                
                <!-- Breadcrumb -->
                <nav class="flex justify-center lg:justify-start" aria-label="Breadcrumb">
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
                            <a href="#" class="hover:text-white transition-colors">Healthcare</a>
                        </li>
                        <li>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                        </li>
                        <li class="text-white font-medium">General Hospitals</li>
                    </ol>
                </nav>
            </div>
            
            <div class="text-center" data-aos="fade-left">
                <div class="relative">
                    <div class="w-64 h-64 mx-auto rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center">
                        <i data-lucide="hospital" class="w-32 h-32 text-white/80"></i>
                    </div>
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-white/20 rounded-full flex items-center justify-center animate-pulse">
                        <i data-lucide="heart-pulse" class="w-8 h-8 text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search & Filter Section -->
<section class="py-8 bg-white border-b border-gray-100">
    <div class="container px-4 mx-auto">
        <form method="GET" action="{{ route('hospital.general') }}" 
              x-data="{ showFilters: false }"
              class="space-y-4">
            
            <!-- Main Search -->
            <div class="flex flex-col gap-4 md:flex-row" data-aos="fade-up">
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Search hospitals by name, address, or services..." 
                               class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-colors">
                        <i data-lucide="search" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                    </div>
                </div>
                
                <div class="flex gap-2">
                    <button type="submit" 
                            class="px-6 py-3 text-white bg-cyan-600 rounded-lg hover:bg-cyan-700 transition-colors">
                        <i data-lucide="search" class="w-5 h-5 mr-2 inline"></i>
                        Search
                    </button>
                    
                    <button type="button" 
                            @click="getLocation()"
                            class="px-6 py-3 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <i data-lucide="map-pin" class="w-5 h-5 mr-2 inline"></i>
                        Near Me
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Featured Hospitals -->
@if(isset($featuredHospitals) && $featuredHospitals->count() > 0)
<section class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Featured <span class="text-cyan-600">Hospitals</span>
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full"></div>
            <p class="text-lg text-gray-600">
                Top-rated hospitals with excellent facilities and experienced medical professionals.
            </p>
        </div>
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($featuredHospitals as $index => $hospital)
            <div class="group" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-cyan-100">
                    <!-- Featured Badge -->
                    <div class="relative">
                        <div class="absolute top-4 left-4 z-10">
                            <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-amber-500 rounded-full">
                                <i data-lucide="star" class="w-4 h-4 mr-1"></i>
                                Featured
                            </span>
                        </div>
                        
                        <!-- Image -->
                        <div class="relative h-64 overflow-hidden">
                            @if($hospital->image)
                                <img src="{{ Storage::url($hospital->image) }}" 
                                     alt="{{ $hospital->name }}" 
                                     class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="flex items-center justify-center w-full h-full bg-gradient-to-br from-cyan-100 to-blue-100">
                                    <i data-lucide="hospital" class="w-16 h-16 text-cyan-600"></i>
                                </div>
                            @endif
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-cyan-600 transition-colors">
                            {{ $hospital->name }}
                        </h3>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-start text-gray-600">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-2 mt-1 text-cyan-500 flex-shrink-0"></i>
                                <span class="text-sm">{{ $hospital->address }}</span>
                            </div>
                            
                            <div class="flex items-center text-gray-600">
                                <i data-lucide="phone" class="w-4 h-4 mr-2 text-cyan-500 flex-shrink-0"></i>
                                <a href="tel:{{ $hospital->phone }}" class="text-sm hover:text-cyan-600 transition-colors">
                                    {{ $hospital->phone }}
                                </a>
                            </div>
                        </div>
                        
                        <p class="mb-4 text-gray-600 leading-relaxed">
                            {{ Str::limit($hospital->description, 120) }}
                        </p>
                        
                        <!-- Rating -->
                        @if($hospital->rating > 0)
                        <div class="flex items-center mb-4">
                            <div class="flex text-amber-400 mr-2">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $hospital->rating)
                                        <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                    @elseif($i - 0.5 <= $hospital->rating)
                                        <i data-lucide="star-half" class="w-4 h-4 fill-current"></i>
                                    @else
                                        <i data-lucide="star" class="w-4 h-4"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="text-sm text-gray-600">{{ $hospital->rating }}/5</span>
                        </div>
                        @endif
                        
                        <!-- Action Button -->
                        <a href="{{ route('hospital.show', $hospital->slug) }}" 
                           class="inline-flex items-center justify-center w-full px-4 py-3 text-white bg-cyan-600 rounded-lg hover:bg-cyan-700 transition-colors">
                            View Details
                            <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- All Hospitals -->
<section class="py-24 bg-white">
    <div class="container px-4 mx-auto">
        <div class="flex flex-col items-center justify-between mb-8 md:flex-row" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:mb-0">
                All General Hospitals
            </h2>
            <span class="text-gray-600">
                {{ $hospitals->total() ?? 0 }} hospitals found
            </span>
        </div>
        
        @if(isset($hospitals) && $hospitals->count() > 0)
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($hospitals as $index => $hospital)
                <div class="group" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                        <!-- Image -->
                        <div class="relative h-64 overflow-hidden">
                            @if($hospital->image)
                                <img src="{{ Storage::url($hospital->image) }}" 
                                     alt="{{ $hospital->name }}" 
                                     class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="flex items-center justify-center w-full h-full bg-gradient-to-br from-gray-100 to-gray-200">
                                    <i data-lucide="hospital" class="w-16 h-16 text-gray-400"></i>
                                </div>
                            @endif
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-cyan-600 transition-colors">
                                {{ $hospital->name }}
                            </h3>
                            
                            <div class="space-y-2 mb-4">
                                <div class="flex items-start text-gray-600">
                                    <i data-lucide="map-pin" class="w-4 h-4 mr-2 mt-1 text-cyan-500 flex-shrink-0"></i>
                                    <span class="text-sm">{{ $hospital->address }}</span>
                                </div>
                                
                                <div class="flex items-center text-gray-600">
                                    <i data-lucide="phone" class="w-4 h-4 mr-2 text-cyan-500 flex-shrink-0"></i>
                                    <a href="tel:{{ $hospital->phone }}" class="text-sm hover:text-cyan-600 transition-colors">
                                        {{ $hospital->phone }}
                                    </a>
                                </div>
                            </div>
                            
                            <p class="mb-4 text-gray-600 leading-relaxed">
                                {{ Str::limit($hospital->description, 100) }}
                            </p>
                            
                            <!-- Services -->
                            @if($hospital->services && count($hospital->services) > 0)
                            <div class="mb-4">
                                <div class="flex flex-wrap gap-2">
                                    @foreach(array_slice($hospital->services, 0, 3) as $service)
                                    <span class="px-2 py-1 text-xs font-medium text-cyan-700 bg-cyan-50 rounded-full">
                                        {{ $service }}
                                    </span>
                                    @endforeach
                                    @if(count($hospital->services) > 3)
                                    <span class="px-2 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full">
                                        +{{ count($hospital->services) - 3 }} more
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @endif
                            
                            <!-- Rating -->
                            @if($hospital->rating > 0)
                            <div class="flex items-center mb-4">
                                <div class="flex text-amber-400 mr-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $hospital->rating)
                                            <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                        @elseif($i - 0.5 <= $hospital->rating)
                                            <i data-lucide="star-half" class="w-4 h-4 fill-current"></i>
                                        @else
                                            <i data-lucide="star" class="w-4 h-4"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-sm text-gray-600">{{ $hospital->rating }}/5</span>
                            </div>
                            @endif
                            
                            <!-- Action Button -->
                            <a href="{{ route('hospital.show', $hospital->slug) }}" 
                               class="inline-flex items-center justify-center w-full px-4 py-3 text-cyan-600 border border-cyan-200 rounded-lg hover:bg-cyan-50 transition-colors">
                                View Details
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($hospitals->hasPages())
            <div class="flex justify-center mt-12" data-aos="fade-up">
                {{ $hospitals->links() }}
            </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-16" data-aos="fade-up">
                <div class="flex items-center justify-center w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100">
                    <i data-lucide="hospital" class="w-12 h-12 text-gray-400"></i>
                </div>
                <h3 class="mb-4 text-2xl font-bold text-gray-900">No Hospitals Found</h3>
                <p class="mb-8 text-gray-600 max-w-md mx-auto">
                    Try adjusting your search criteria or check back later for new listings.
                </p>
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center px-6 py-3 text-white bg-cyan-600 rounded-lg hover:bg-cyan-700 transition-colors">
                    <i data-lucide="arrow-left" class="w-5 h-5 mr-2"></i>
                    Back to Home
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Map Section -->
<section class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Hospital <span class="text-cyan-600">Locations</span>
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full"></div>
            <p class="text-lg text-gray-600">
                Find hospitals near you with our interactive map.
            </p>
        </div>
        
        <div class="overflow-hidden rounded-2xl shadow-xl" data-aos="fade-up" data-aos-delay="200">
            <div id="map" class="w-full h-96 bg-gray-200 flex items-center justify-center">
                <div class="text-center">
                    <i data-lucide="map" class="w-12 h-12 text-gray-400 mx-auto mb-4"></i>
                    <p class="text-gray-600">Interactive map will be loaded here</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;
        
        // You can implement location-based search here
        console.log("User location:", lat, lng);
        
        // Show success message
        const alertDiv = document.createElement('div');
        alertDiv.className = 'fixed top-20 right-4 z-50 max-w-sm p-4 bg-green-50 border border-green-200 rounded-lg shadow-lg';
        alertDiv.innerHTML = `
            <div class="flex items-center">
                <i data-lucide="check-circle" class="w-5 h-5 mr-3 text-green-600"></i>
                <p class="text-green-800 font-medium">Location detected! Showing nearby hospitals.</p>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-green-600 hover:text-green-800">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        `;
        
        document.body.appendChild(alertDiv);
        lucide.createIcons();
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }

    function showError(error) {
        let message = "An error occurred while getting your location.";
        
        switch(error.code) {
            case error.PERMISSION_DENIED:
                message = "Location access denied by user.";
                break;
            case error.POSITION_UNAVAILABLE:
                message = "Location information is unavailable.";
                break;
            case error.TIMEOUT:
                message = "Location request timed out.";
                break;
        }
        
        const alertDiv = document.createElement('div');
        alertDiv.className = 'fixed top-20 right-4 z-50 max-w-sm p-4 bg-red-50 border border-red-200 rounded-lg shadow-lg';
        alertDiv.innerHTML = `
            <div class="flex items-center">
                <i data-lucide="alert-circle" class="w-5 h-5 mr-3 text-red-600"></i>
                <p class="text-red-800 font-medium">${message}</p>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-red-600 hover:text-red-800">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        `;
        
        document.body.appendChild(alertDiv);
        lucide.createIcons();
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide Icons
        lucide.createIcons();
    });
</script>
@endpush

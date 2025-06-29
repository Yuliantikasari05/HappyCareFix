@extends('layouts.app')

@section('title', 'Klinik Spesialis - HappyCare')

@section('content')
<!-- Hero Section -->
<section class="relative py-24 bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-600 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.3&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    </div>
    
    <div class="container px-4 mx-auto relative">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 items-center">
            <div data-aos="fade-right">
                <div class="flex items-center justify-center w-20 h-20 mb-6 rounded-full bg-white/20 backdrop-blur-sm lg:justify-start">
                    <i data-lucide="stethoscope" class="w-10 h-10 text-white"></i>
                </div>
                
                <h1 class="mb-6 text-4xl font-bold text-white md:text-5xl">
                    Klinik Spesialis
                </h1>
                <p class="mb-8 text-xl text-white/90 leading-relaxed">
                    Temukan klinik spesialis terbaik di Yogyakarta dengan berbagai layanan medis spesialis dan teknologi terdepan.
                </p>
                
                <!-- Quick Stats -->
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-bold text-white">{{ $clinics->total() ?? 0 }}</div>
                        <div class="text-white/80">Klinik</div>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="text-3xl font-bold text-white">15+</div>
                        <div class="text-white/80">Spesialisasi</div>
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
                        <li class="text-white font-medium">Klinik Spesialis</li>
                    </ol>
                </nav>
            </div>
            
            <div class="text-center" data-aos="fade-left">
                <div class="relative">
                    <div class="w-64 h-64 mx-auto rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center">
                        <i data-lucide="stethoscope" class="w-32 h-32 text-white/80"></i>
                    </div>
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-white/20 rounded-full flex items-center justify-center animate-pulse">
                        <i data-lucide="heart-pulse" class="w-8 h-8 text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search Section -->
<section class="py-8 bg-white border-b border-gray-100">
    <div class="container px-4 mx-auto">
        <form method="GET" action="{{ route('hospital.specialist_clinic') }}" class="space-y-4">
            <div class="flex flex-col gap-4 md:flex-row" data-aos="fade-up">
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari klinik spesialis..." 
                               class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-colors">
                        <i data-lucide="search" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                    </div>
                </div>
                
                <button type="submit" 
                        class="px-6 py-3 text-white bg-emerald-600 rounded-lg hover:bg-emerald-700 transition-colors">
                    <i data-lucide="search" class="w-5 h-5 mr-2 inline"></i>
                    Cari
                </button>
            </div>
        </form>
    </div>
</section>

<!-- Featured Clinics -->
@if(isset($featuredClinics) && $featuredClinics->count() > 0)
<section class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Klinik Spesialis <span class="text-emerald-600">Unggulan</span>
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full"></div>
            <p class="text-lg text-gray-600">
                Klinik spesialis terpilih dengan fasilitas terbaik dan dokter berpengalaman.
            </p>
        </div>
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($featuredClinics as $index => $clinic)
            <div class="group" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-emerald-100">
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
                            @if($clinic->image)
                                <img src="{{ $clinic->image_url }}" 
                                     alt="{{ $clinic->name }}" 
                                     class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="flex items-center justify-center w-full h-full bg-gradient-to-br from-emerald-100 to-teal-100">
                                    <i data-lucide="stethoscope" class="w-16 h-16 text-emerald-600"></i>
                                </div>
                            @endif
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">
                            {{ $clinic->name }}
                        </h3>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-start text-gray-600">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-2 mt-1 text-emerald-500 flex-shrink-0"></i>
                                <span class="text-sm">{{ Str::limit($clinic->address, 100) }}</span>
                            </div>
                            
                            @if($clinic->phone)
                            <div class="flex items-center text-gray-600">
                                <i data-lucide="phone" class="w-4 h-4 mr-2 text-emerald-500 flex-shrink-0"></i>
                                <a href="tel:{{ $clinic->phone }}" class="text-sm hover:text-emerald-600 transition-colors">
                                    {{ $clinic->phone }}
                                </a>
                            </div>
                            @endif
                        </div>
                        
                        <p class="mb-4 text-gray-600 leading-relaxed">
                            {{ Str::limit($clinic->description, 120) }}
                        </p>
                        
                        <!-- Action Buttons -->
                        <div class="grid grid-cols-3 gap-2">
                            <a href="{{ route('hospital.show', $clinic->slug) }}" 
                               class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-white bg-emerald-600 rounded-lg hover:bg-emerald-700 transition-colors">
                                <i data-lucide="info" class="w-3 h-3 mr-1"></i>
                                Detail
                            </a>
                            
                            <a href="https://www.google.com/maps/search/?api=1&query={{ $clinic->latitude }},{{ $clinic->longitude }}" 
                               target="_blank"
                               class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                                <i data-lucide="map" class="w-3 h-3 mr-1"></i>
                                Maps
                            </a>
                            
                            @if($clinic->phone)
                            <a href="tel:{{ $clinic->phone }}" 
                               class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">
                                <i data-lucide="phone" class="w-3 h-3 mr-1"></i>
                                Call
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- All Specialist Clinics -->
<section class="py-24 bg-white">
    <div class="container px-4 mx-auto">
        <div class="flex flex-col items-center justify-between mb-8 md:flex-row" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:mb-0">
                Semua Klinik Spesialis
            </h2>
            <span class="text-gray-600">
                {{ $clinics->total() ?? 0 }} klinik ditemukan
            </span>
        </div>
        
        @if($clinics->count() > 0)
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($clinics as $index => $clinic)
                <div class="group" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                        <!-- Image -->
                        <div class="relative h-64 overflow-hidden">
                            @if($clinic->image)
                                <img src="{{ $clinic->image_url }}" 
                                     alt="{{ $clinic->name }}" 
                                     class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="flex items-center justify-center w-full h-full bg-gradient-to-br from-gray-100 to-gray-200">
                                    <i data-lucide="stethoscope" class="w-16 h-16 text-gray-400"></i>
                                </div>
                            @endif
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">
                                {{ $clinic->name }}
                            </h3>
                            
                            <div class="space-y-2 mb-4">
                                <div class="flex items-start text-gray-600">
                                    <i data-lucide="map-pin" class="w-4 h-4 mr-2 mt-1 text-emerald-500 flex-shrink-0"></i>
                                    <span class="text-sm">{{ Str::limit($clinic->address, 80) }}</span>
                                </div>
                                
                                @if($clinic->phone)
                                <div class="flex items-center text-gray-600">
                                    <i data-lucide="phone" class="w-4 h-4 mr-2 text-emerald-500 flex-shrink-0"></i>
                                    <a href="tel:{{ $clinic->phone }}" class="text-sm hover:text-emerald-600 transition-colors">
                                        {{ $clinic->phone }}
                                    </a>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Services -->
                            @if($clinic->services && count($clinic->services) > 0)
                            <div class="mb-4">
                                <div class="text-sm text-gray-500 mb-2">Spesialisasi:</div>
                                <div class="flex flex-wrap gap-2">
                                    @foreach(array_slice($clinic->services, 0, 2) as $service)
                                    <span class="px-2 py-1 text-xs font-medium text-emerald-700 bg-emerald-50 rounded-full">
                                        {{ $service }}
                                    </span>
                                    @endforeach
                                    @if(count($clinic->services) > 2)
                                    <span class="px-2 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full">
                                        +{{ count($clinic->services) - 2 }} lainnya
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @endif
                            
                            <!-- Operating Hours -->
                            @if($clinic->operating_hours && isset($clinic->operating_hours['senin']))
                            <div class="flex items-center mb-4 text-gray-600">
                                <i data-lucide="clock" class="w-4 h-4 mr-2 text-blue-500"></i>
                                <span class="text-sm">{{ $clinic->operating_hours['senin'] ?? 'Lihat detail' }}</span>
                            </div>
                            @endif
                            
                            <!-- Action Buttons -->
                            <div class="grid grid-cols-3 gap-2">
                                <a href="{{ route('hospital.show', $clinic->slug) }}" 
                                   class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-white bg-emerald-600 rounded-lg hover:bg-emerald-700 transition-colors">
                                    <i data-lucide="info" class="w-3 h-3 mr-1"></i>
                                    Detail
                                </a>
                                
                                <a href="https://www.google.com/maps/search/?api=1&query={{ $clinic->latitude }},{{ $clinic->longitude }}" 
                                   target="_blank"
                                   class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                                    <i data-lucide="map" class="w-3 h-3 mr-1"></i>
                                    Maps
                                </a>
                                
                                @if($clinic->phone)
                                <a href="tel:{{ $clinic->phone }}" 
                                   class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">
                                    <i data-lucide="phone" class="w-3 h-3 mr-1"></i>
                                    Call
                                </a>
                                @else
                                <button class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed" disabled>
                                    <i data-lucide="phone" class="w-3 h-3 mr-1"></i>
                                    Call
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($clinics->hasPages())
            <div class="flex justify-center mt-12" data-aos="fade-up">
                {{ $clinics->appends(request()->query())->links() }}
            </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-16" data-aos="fade-up">
                <div class="flex items-center justify-center w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100">
                    <i data-lucide="stethoscope" class="w-12 h-12 text-gray-400"></i>
                </div>
                <h3 class="mb-4 text-2xl font-bold text-gray-900">
                    @if(request('search'))
                        Tidak ada klinik spesialis yang ditemukan
                    @else
                        Belum ada data klinik spesialis
                    @endif
                </h3>
                <p class="mb-8 text-gray-600 max-w-md mx-auto">
                    @if(request('search'))
                        Tidak ada klinik spesialis yang ditemukan untuk pencarian "{{ request('search') }}".
                    @else
                        Belum ada data klinik spesialis.
                    @endif
                </p>
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center px-6 py-3 text-white bg-emerald-600 rounded-lg hover:bg-emerald-700 transition-colors">
                    <i data-lucide="arrow-left" class="w-5 h-5 mr-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Info Section -->
<section class="py-24 bg-gradient-to-br from-emerald-50 via-white to-teal-50">
    <div class="container px-4 mx-auto">
        <div class="max-w-4xl mx-auto">
            <div class="p-8 bg-white/80 backdrop-blur-sm rounded-2xl shadow-sm border border-white/50" data-aos="fade-up">
                <div class="flex items-center mb-6">
                    <div class="flex items-center justify-center w-12 h-12 mr-4 rounded-full bg-blue-100">
                        <i data-lucide="info" class="w-6 h-6 text-blue-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Informasi Penting</h3>
                </div>
                
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <div class="text-center md:text-left">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 rounded-full bg-emerald-100 md:mx-0">
                            <i data-lucide="calendar-check" class="w-6 h-6 text-emerald-600"></i>
                        </div>
                        <h4 class="mb-2 text-lg font-semibold text-gray-900">Jadwal Praktik</h4>
                        <p class="text-gray-600">Pastikan untuk mengecek jadwal praktik dokter sebelum berkunjung.</p>
                    </div>
                    
                    <div class="text-center md:text-left">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 rounded-full bg-blue-100 md:mx-0">
                            <i data-lucide="id-card" class="w-6 h-6 text-blue-600"></i>
                        </div>
                        <h4 class="mb-2 text-lg font-semibold text-gray-900">Persiapan Kunjungan</h4>
                        <p class="text-gray-600">Bawa kartu identitas, kartu BPJS/asuransi, dan hasil pemeriksaan sebelumnya.</p>
                    </div>
                    
                    <div class="text-center md:text-left">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 rounded-full bg-amber-100 md:mx-0">
                            <i data-lucide="phone" class="w-6 h-6 text-amber-600"></i>
                        </div>
                        <h4 class="mb-2 text-lg font-semibold text-gray-900">Reservasi</h4>
                        <p class="text-gray-600">Disarankan untuk melakukan reservasi terlebih dahulu melalui telepon.</p>
                    </div>
                </div>
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

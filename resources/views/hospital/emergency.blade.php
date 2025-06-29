@extends('layouts.app')

@section('title', 'Unit Gawat Darurat - HappyCare')

@section('content')
<!-- Hero Section -->
<section class="relative py-24 bg-gradient-to-br from-red-600 via-orange-600 to-pink-600 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.3&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    </div>
    
    <div class="container px-4 mx-auto relative">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 items-center">
            <div data-aos="fade-right">
                <div class="flex items-center justify-center w-20 h-20 mb-6 rounded-full bg-white/20 backdrop-blur-sm lg:justify-start">
                    <i data-lucide="siren" class="w-10 h-10 text-white"></i>
                </div>
                
                <h1 class="mb-6 text-4xl font-bold text-white md:text-5xl">
                    <i data-lucide="ambulance" class="w-12 h-12 mr-4 inline"></i>
                    Unit Gawat Darurat
                </h1>
                <p class="mb-8 text-xl text-white/90 leading-relaxed">
                    Temukan Unit Gawat Darurat terdekat di Yogyakarta yang melayani 24 jam untuk kondisi darurat medis.
                </p>
                
                <!-- Emergency Numbers -->
                <div class="grid grid-cols-3 gap-4 mb-8">
                    <a href="tel:118" class="text-center p-4 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition-colors">
                        <div class="text-2xl font-bold text-white">118</div>
                        <div class="text-white/80 text-sm">Ambulans</div>
                    </a>
                    <a href="tel:110" class="text-center p-4 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition-colors">
                        <div class="text-2xl font-bold text-white">110</div>
                        <div class="text-white/80 text-sm">Polisi</div>
                    </a>
                    <a href="tel:113" class="text-center p-4 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition-colors">
                        <div class="text-2xl font-bold text-white">113</div>
                        <div class="text-white/80 text-sm">Pemadam</div>
                    </a>
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
                        <li class="text-white font-medium">Unit Gawat Darurat</li>
                    </ol>
                </nav>
            </div>
            
            <div class="text-center" data-aos="fade-left">
                <div class="relative">
                    <div class="w-64 h-64 mx-auto rounded-full bg-white/10 backdrop-blur-sm flex items-center justify-center">
                        <i data-lucide="ambulance" class="w-32 h-32 text-white/80"></i>
                    </div>
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-red-500/30 rounded-full flex items-center justify-center animate-pulse">
                        <i data-lucide="siren" class="w-8 h-8 text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Emergency Alert -->
<section class="py-8 bg-amber-50 border-b border-amber-200">
    <div class="container px-4 mx-auto">
        <div class="p-6 bg-amber-100 border border-amber-300 rounded-2xl" data-aos="fade-up">
            <div class="flex items-start">
                <div class="flex items-center justify-center w-12 h-12 mr-4 rounded-full bg-amber-500 flex-shrink-0">
                    <i data-lucide="alert-triangle" class="w-6 h-6 text-white"></i>
                </div>
                <div class="flex-1">
                    <h3 class="mb-2 text-xl font-bold text-amber-900">Kondisi Darurat?</h3>
                    <p class="mb-4 text-amber-800">
                        Jika mengalami kondisi darurat medis, segera hubungi nomor emergency atau datang langsung ke IGD terdekat!
                    </p>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                        <div class="flex items-center">
                            <strong class="text-amber-900 mr-2">Ambulans:</strong>
                            <a href="tel:118" class="text-red-600 font-bold hover:text-red-700 transition-colors">118</a>
                        </div>
                        <div class="flex items-center">
                            <strong class="text-amber-900 mr-2">Polisi:</strong>
                            <a href="tel:110" class="text-red-600 font-bold hover:text-red-700 transition-colors">110</a>
                        </div>
                        <div class="flex items-center">
                            <strong class="text-amber-900 mr-2">Pemadam:</strong>
                            <a href="tel:113" class="text-red-600 font-bold hover:text-red-700 transition-colors">113</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search Section -->
<section class="py-8 bg-white border-b border-gray-100">
    <div class="container px-4 mx-auto">
        <form method="GET" action="{{ route('hospital.emergency') }}" class="space-y-4">
            <div class="flex flex-col gap-4 md:flex-row" data-aos="fade-up">
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari IGD terdekat..." 
                               class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors">
                        <i data-lucide="search" class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                    </div>
                </div>
                
                <button type="submit" 
                        class="px-6 py-3 text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors">
                    <i data-lucide="search" class="w-5 h-5 mr-2 inline"></i>
                    Cari
                </button>
            </div>
        </form>
    </div>
</section>

<!-- Featured Emergency Centers -->
@if(isset($featuredCenters) && $featuredCenters->count() > 0)
<section class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                IGD <span class="text-red-600">Unggulan</span>
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-red-500 to-orange-500 rounded-full"></div>
            <p class="text-lg text-gray-600">
                Unit Gawat Darurat terpilih dengan fasilitas terbaik dan pelayanan 24 jam.
            </p>
        </div>
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($featuredCenters as $index => $center)
            <div class="group" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-red-100">
                    <!-- Featured Badge -->
                    <div class="relative">
                        <div class="absolute top-4 left-4 z-10">
                            <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-amber-500 rounded-full">
                                <i data-lucide="star" class="w-4 h-4 mr-1"></i>
                                Featured
                            </span>
                        </div>
                        
                        <!-- 24 Hour Badge -->
                        <div class="absolute top-4 right-4 z-10">
                            <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-green-600 rounded-full">
                                <i data-lucide="clock" class="w-4 h-4 mr-1"></i>
                                24 JAM
                            </span>
                        </div>
                        
                        <!-- Image -->
                        <div class="relative h-64 overflow-hidden">
                            @if($center->image)
                                <img src="{{ $center->image_url }}" 
                                     alt="{{ $center->name }}" 
                                     class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="flex items-center justify-center w-full h-full bg-gradient-to-br from-red-100 to-orange-100">
                                    <i data-lucide="ambulance" class="w-16 h-16 text-red-600"></i>
                                </div>
                            @endif
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-red-600 transition-colors">
                            {{ $center->name }}
                        </h3>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-start text-gray-600">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-2 mt-1 text-red-500 flex-shrink-0"></i>
                                <span class="text-sm">{{ Str::limit($center->address, 100) }}</span>
                            </div>
                            
                            @if($center->emergency_contact)
                            <div class="flex items-center text-gray-600">
                                <i data-lucide="phone" class="w-4 h-4 mr-2 text-red-500 flex-shrink-0"></i>
                                <a href="tel:{{ $center->emergency_contact }}" class="text-sm font-bold text-red-600 hover:text-red-700 transition-colors">
                                    {{ $center->emergency_contact }}
                                </a>
                            </div>
                            @endif
                        </div>
                        
                        @if($center->description)
                        <p class="mb-4 text-gray-600 leading-relaxed">
                            {{ Str::limit($center->description, 120) }}
                        </p>
                        @endif
                        
                        <!-- Action Buttons -->
                        <div class="grid grid-cols-3 gap-2">
                            <a href="{{ route('hospital.show', $center->slug) }}" 
                               class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                                <i data-lucide="info" class="w-3 h-3 mr-1"></i>
                                Detail
                            </a>
                            
                            @if($center->latitude && $center->longitude)
                            <a href="https://www.google.com/maps/search/?api=1&query={{ $center->latitude }},{{ $center->longitude }}" 
                               target="_blank"
                               class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">
                                <i data-lucide="map" class="w-3 h-3 mr-1"></i>
                                Maps
                            </a>
                            @else
                            <button class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed" disabled>
                                <i data-lucide="map" class="w-3 h-3 mr-1"></i>
                                Maps
                            </button>
                            @endif
                            
                            @if($center->emergency_contact)
                            <a href="tel:{{ $center->emergency_contact }}" 
                               class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors">
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
    </div>
</section>
@endif

<!-- All Emergency Centers -->
<section class="py-24 bg-white">
    <div class="container px-4 mx-auto">
        <div class="flex flex-col items-center justify-between mb-8 md:flex-row" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:mb-0">
                Semua Unit Gawat Darurat
            </h2>
            <span class="text-gray-600">
                {{ isset($emergencyCenters) ? $emergencyCenters->total() : 0 }} IGD ditemukan
            </span>
        </div>
        
        @if(isset($emergencyCenters) && $emergencyCenters->count() > 0)
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($emergencyCenters as $index => $center)
                <div class="group" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                    <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border-l-4 border-red-500">
                        <!-- Image -->
                        <div class="relative h-64 overflow-hidden">
                            @if($center->image)
                                <img src="{{ $center->image_url }}" 
                                     alt="{{ $center->name }}" 
                                     class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="flex items-center justify-center w-full h-full bg-gradient-to-br from-gray-100 to-gray-200">
                                    <i data-lucide="ambulance" class="w-16 h-16 text-gray-400"></i>
                                </div>
                            @endif
                            
                            <!-- 24 Hour Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-green-600 rounded-full">
                                    <i data-lucide="clock" class="w-4 h-4 mr-1"></i>
                                    BUKA 24 JAM
                                </span>
                            </div>
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-red-600 transition-colors">
                                {{ $center->name }}
                            </h3>
                            
                            <div class="space-y-2 mb-4">
                                <div class="flex items-start text-gray-600">
                                    <i data-lucide="map-pin" class="w-4 h-4 mr-2 mt-1 text-red-500 flex-shrink-0"></i>
                                    <span class="text-sm">{{ Str::limit($center->address, 80) }}</span>
                                </div>
                                
                                @if($center->emergency_contact)
                                <div class="flex items-center text-gray-600">
                                    <i data-lucide="phone" class="w-4 h-4 mr-2 text-red-500 flex-shrink-0"></i>
                                    <a href="tel:{{ $center->emergency_contact }}" class="text-sm font-bold text-red-600 hover:text-red-700 transition-colors">
                                        {{ $center->emergency_contact }}
                                    </a>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Services -->
                            @if($center->services && is_array($center->services) && count($center->services) > 0)
                            <div class="mb-4">
                                <div class="text-sm text-gray-500 mb-2">Layanan Darurat:</div>
                                <div class="flex flex-wrap gap-2">
                                    @foreach(array_slice($center->services, 0, 2) as $service)
                                    <span class="px-2 py-1 text-xs font-medium text-red-700 bg-red-50 rounded-full">
                                        {{ $service }}
                                    </span>
                                    @endforeach
                                    @if(count($center->services) > 2)
                                    <span class="px-2 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full">
                                        +{{ count($center->services) - 2 }} lainnya
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @endif
                            
                            <!-- Action Buttons -->
                            <div class="grid grid-cols-3 gap-2">
                                <a href="{{ route('hospital.show', $center->slug) }}" 
                                   class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                                    <i data-lucide="info" class="w-3 h-3 mr-1"></i>
                                    Detail
                                </a>
                                
                                @if($center->latitude && $center->longitude)
                                <a href="https://www.google.com/maps/search/?api=1&query={{ $center->latitude }},{{ $center->longitude }}" 
                                   target="_blank"
                                   class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors">
                                    <i data-lucide="map" class="w-3 h-3 mr-1"></i>
                                    Maps
                                </a>
                                @else
                                <button class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed" disabled>
                                    <i data-lucide="map" class="w-3 h-3 mr-1"></i>
                                    Maps
                                </button>
                                @endif
                                
                                @if($center->emergency_contact)
                                <a href="tel:{{ $center->emergency_contact }}" 
                                   class="inline-flex items-center justify-center px-3 py-2 text-xs font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors">
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
            @if($emergencyCenters->hasPages())
            <div class="flex justify-center mt-12" data-aos="fade-up">
                {{ $emergencyCenters->appends(request()->query())->links() }}
            </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-16" data-aos="fade-up">
                <div class="flex items-center justify-center w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100">
                    <i data-lucide="ambulance" class="w-12 h-12 text-gray-400"></i>
                </div>
                <h3 class="mb-4 text-2xl font-bold text-gray-900">
                    @if(request('search'))
                        Tidak ada IGD yang ditemukan
                    @else
                        Belum ada data Unit Gawat Darurat
                    @endif
                </h3>
                <p class="mb-8 text-gray-600 max-w-md mx-auto">
                    @if(request('search'))
                        Tidak ada IGD yang ditemukan untuk pencarian "{{ request('search') }}".
                    @else
                        Belum ada data Unit Gawat Darurat.
                    @endif
                </p>
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center px-6 py-3 text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors">
                    <i data-lucide="arrow-left" class="w-5 h-5 mr-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Emergency Guidelines -->
<section class="py-24 bg-gradient-to-br from-red-50 via-white to-orange-50">
    <div class="container px-4 mx-auto">
        <div class="max-w-6xl mx-auto">
            <div class="p-8 bg-white/80 backdrop-blur-sm rounded-2xl shadow-sm border border-red-100" data-aos="fade-up">
                <div class="flex items-center mb-8">
                    <div class="flex items-center justify-center w-16 h-16 mr-6 rounded-full bg-red-100">
                        <i data-lucide="alert-triangle" class="w-8 h-8 text-red-600"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900">Panduan Kondisi Darurat</h3>
                </div>
                
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                    <!-- Emergency Conditions -->
                    <div>
                        <div class="flex items-center mb-4">
                            <i data-lucide="heart-pulse" class="w-6 h-6 mr-2 text-red-600"></i>
                            <h4 class="text-lg font-semibold text-gray-900">Kondisi Darurat</h4>
                        </div>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-red-500 flex-shrink-0"></i>
                                Serangan jantung
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-red-500 flex-shrink-0"></i>
                                Stroke
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-red-500 flex-shrink-0"></i>
                                Kesulitan bernapas
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-red-500 flex-shrink-0"></i>
                                Pendarahan hebat
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-red-500 flex-shrink-0"></i>
                                Kecelakaan berat
                            </li>
                        </ul>
                    </div>
                    
                    <!-- What to Do -->
                    <div>
                        <div class="flex items-center mb-4">
                            <i data-lucide="phone" class="w-6 h-6 mr-2 text-green-600"></i>
                            <h4 class="text-lg font-semibold text-gray-900">Yang Harus Dilakukan</h4>
                        </div>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-green-500 flex-shrink-0"></i>
                                Tetap tenang
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-green-500 flex-shrink-0"></i>
                                Hubungi 118 (Ambulans)
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-green-500 flex-shrink-0"></i>
                                Berikan pertolongan pertama
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-green-500 flex-shrink-0"></i>
                                Jangan memindahkan korban
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-green-500 flex-shrink-0"></i>
                                Tunggu bantuan medis
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Preparation -->
                    <div>
                        <div class="flex items-center mb-4">
                            <i data-lucide="briefcase-medical" class="w-6 h-6 mr-2 text-blue-600"></i>
                            <h4 class="text-lg font-semibold text-gray-900">Persiapan ke IGD</h4>
                        </div>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-blue-500 flex-shrink-0"></i>
                                Bawa kartu identitas
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-blue-500 flex-shrink-0"></i>
                                Kartu BPJS/asuransi
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-blue-500 flex-shrink-0"></i>
                                Daftar obat yang dikonsumsi
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-blue-500 flex-shrink-0"></i>
                                Riwayat penyakit
                            </li>
                            <li class="flex items-start">
                                <i data-lucide="dot" class="w-4 h-4 mr-2 mt-1 text-blue-500 flex-shrink-0"></i>
                                Kontak keluarga
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Emergency Numbers -->
                    <div>
                        <div class="flex items-center mb-4">
                            <i data-lucide="phone-call" class="w-6 h-6 mr-2 text-amber-600"></i>
                            <h4 class="text-lg font-semibold text-gray-900">Nomor Darurat</h4>
                        </div>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center justify-between">
                                <span>Ambulans:</span>
                                <a href="tel:118" class="font-bold text-red-600 hover:text-red-700 transition-colors">118</a>
                            </li>
                            <li class="flex items-center justify-between">
                                <span>Polisi:</span>
                                <a href="tel:110" class="font-bold text-red-600 hover:text-red-700 transition-colors">110</a>
                            </li>
                            <li class="flex items-center justify-between">
                                <span>Pemadam:</span>
                                <a href="tel:113" class="font-bold text-red-600 hover:text-red-700 transition-colors">113</a>
                            </li>
                            <li class="flex items-center justify-between">
                                <span>SAR:</span>
                                <a href="tel:115" class="font-bold text-red-600 hover:text-red-700 transition-colors">115</a>
                            </li>
                            <li class="flex items-center justify-between">
                                <span>PLN:</span>
                                <a href="tel:123" class="font-bold text-red-600 hover:text-red-700 transition-colors">123</a>
                            </li>
                        </ul>
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

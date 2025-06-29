@extends('layouts.app')

@section('title', $hospital->name . ' - HappyCare')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hospital Header -->
    <section class="relative py-16 bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="relative container px-4 mx-auto">
            <div class="max-w-6xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="mb-6">
                    <ol class="flex items-center space-x-2 text-primary-100">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                        <li><i data-lucide="chevron-right" class="w-4 h-4"></i></li>
                        <li><a href="{{ route('hospital.general') }}" class="hover:text-white transition-colors">Hospitals</a></li>
                        <li><i data-lucide="chevron-right" class="w-4 h-4"></i></li>
                        <li class="text-white">{{ $hospital->name }}</li>
                    </ol>
                </nav>

                <div class="flex flex-col lg:flex-row gap-8 items-start">
                    <!-- Hospital Info -->
                    <div class="flex-1">
                        <div class="flex items-center gap-4 mb-4">
                            <h1 class="text-3xl md:text-5xl font-bold text-white">{{ $hospital->name }}</h1>
                            <span class="px-3 py-1 text-sm font-semibold text-white bg-green-500 rounded-full">
                                <i data-lucide="star" class="w-4 h-4 inline mr-1"></i>
                                Featured
                            </span>
                        </div>
                        
                        <p class="text-xl text-primary-100 mb-6">{{ $hospital->description }}</p>
                        
                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center text-primary-100">
                                <i data-lucide="map-pin" class="w-5 h-5 mr-2"></i>
                                {{ $hospital->address ?? 'Jl. Kesehatan No. 1, Yogyakarta' }}
                            </div>
                            <div class="flex items-center text-primary-100">
                                <i data-lucide="phone" class="w-5 h-5 mr-2"></i>
                                {{ $hospital->phone ?? '(0274) 123456' }}
                            </div>
                            <div class="flex items-center text-primary-100">
                                <i data-lucide="star" class="w-5 h-5 mr-2"></i>
                                {{ $hospital->rating }}/5.0 Rating
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="flex flex-col sm:flex-row lg:flex-col gap-3">
                        <a href="tel:{{ $hospital->phone ?? '(0274) 123456' }}" 
                           class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-colors">
                            <i data-lucide="phone" class="w-5 h-5 mr-2"></i>
                            Hubungi Sekarang
                        </a>
                        <a href="#" 
                           class="inline-flex items-center px-6 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-colors">
                            <i data-lucide="ambulance" class="w-5 h-5 mr-2"></i>
                            Kontak Darurat
                        </a>
                        <a href="#" 
                           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                            <i data-lucide="calendar" class="w-5 h-5 mr-2"></i>
                            Buat Janji
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hospital Details -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="max-w-6xl mx-auto">
                <div class="grid gap-8 lg:grid-cols-3">
                    <!-- Main Content -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Hospital Image -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <img src="/placeholder.svg?height=400&width=800" alt="{{ $hospital->name }}" 
                                 class="w-full h-96 object-cover">
                        </div>

                        <!-- About Hospital -->
                        <div class="bg-white rounded-2xl shadow-lg p-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Tentang {{ $hospital->name }}</h2>
                            <div class="prose prose-lg max-w-none text-gray-700">
                                <p>{{ $hospital->description }} Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                        </div>

                        <!-- Services -->
                        <div class="bg-white rounded-2xl shadow-lg p-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Layanan Medis</h2>
                            <div class="grid gap-4 md:grid-cols-2">
                                @foreach($hospital->services ?? ['IGD 24 Jam', 'Rawat Inap', 'Rawat Jalan', 'Laboratorium', 'Radiologi', 'Farmasi'] as $service)
                                <div class="flex items-center p-4 bg-green-50 rounded-xl">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                        <i data-lucide="check-circle" class="w-5 h-5 text-green-600"></i>
                                    </div>
                                    <span class="font-medium text-gray-900">{{ $service }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Facilities -->
                        <div class="bg-white rounded-2xl shadow-lg p-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Fasilitas</h2>
                            <div class="grid gap-4 md:grid-cols-2">
                                @foreach($hospital->facilities ?? ['Parkir Luas', 'Kantin', 'Mushola', 'ATM', 'WiFi Gratis', 'Ruang Tunggu AC'] as $facility)
                                <div class="flex items-center p-4 bg-blue-50 rounded-xl">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                        <i data-lucide="building" class="w-5 h-5 text-blue-600"></i>
                                    </div>
                                    <span class="font-medium text-gray-900">{{ $facility }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Operating Hours -->
                        <div class="bg-white rounded-2xl shadow-lg p-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Jam Operasional</h2>
                            <div class="space-y-3">
                                @php
                                $hours = [
                                    'Senin' => '08:00 - 20:00',
                                    'Selasa' => '08:00 - 20:00',
                                    'Rabu' => '08:00 - 20:00',
                                    'Kamis' => '08:00 - 20:00',
                                    'Jumat' => '08:00 - 20:00',
                                    'Sabtu' => '08:00 - 16:00',
                                    'Minggu' => '08:00 - 16:00'
                                ];
                                @endphp
                                @foreach($hours as $day => $time)
                                <div class="flex justify-between items-center py-3 border-b border-gray-100 last:border-b-0">
                                    <span class="font-medium text-gray-900">{{ $day }}</span>
                                    <span class="text-gray-600">{{ $time }}</span>
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-6 p-4 bg-red-50 rounded-xl">
                                <div class="flex items-center">
                                    <i data-lucide="clock" class="w-5 h-5 text-red-600 mr-3"></i>
                                    <span class="font-medium text-red-900">IGD 24 Jam - Selalu Siap Melayani</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Contact Card -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Kontak Informasi</h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <i data-lucide="map-pin" class="w-5 h-5 text-gray-400 mr-3 mt-0.5"></i>
                                    <div>
                                        <p class="font-medium text-gray-900">Alamat</p>
                                        <p class="text-gray-600">{{ $hospital->address ?? 'Jl. Kesehatan No. 1, Yogyakarta' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <i data-lucide="phone" class="w-5 h-5 text-gray-400 mr-3 mt-0.5"></i>
                                    <div>
                                        <p class="font-medium text-gray-900">Telepon</p>
                                        <a href="tel:{{ $hospital->phone ?? '(0274) 123456' }}" class="text-primary-600 hover:text-primary-700">
                                            {{ $hospital->phone ?? '(0274) 123456' }}
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <i data-lucide="mail" class="w-5 h-5 text-gray-400 mr-3 mt-0.5"></i>
                                    <div>
                                        <p class="font-medium text-gray-900">Email</p>
                                        <a href="mailto:info@{{ strtolower(str_replace(' ', '', $hospital->name)) }}.com" class="text-primary-600 hover:text-primary-700">
                                            info@{{ strtolower(str_replace(' ', '', $hospital->name)) }}.com
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Emergency Contact -->
                        <div class="bg-red-50 border border-red-200 rounded-2xl p-6">
                            <h3 class="text-lg font-bold text-red-900 mb-4 flex items-center">
                                <i data-lucide="ambulance" class="w-5 h-5 mr-2"></i>
                                Kontak Darurat
                            </h3>
                            <p class="text-red-800 mb-4">Untuk situasi darurat, hubungi:</p>
                            <a href="tel:119" class="inline-flex items-center w-full px-4 py-3 bg-red-600 text-white rounded-xl hover:bg-red-700 transition-colors justify-center">
                                <i data-lucide="phone" class="w-5 h-5 mr-2"></i>
                                119 - Ambulans
                            </a>
                        </div>

                        <!-- Map -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Lokasi</h3>
                            <div class="aspect-square bg-gray-100 rounded-xl flex items-center justify-center">
                                <div class="text-center">
                                    <i data-lucide="map" class="w-12 h-12 text-gray-400 mx-auto mb-2"></i>
                                    <p class="text-gray-500">Peta Lokasi</p>
                                </div>
                            </div>
                            <a href="#" class="inline-flex items-center w-full px-4 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors justify-center mt-4">
                                <i data-lucide="navigation" class="w-5 h-5 mr-2"></i>
                                Buka di Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Hospitals -->
    <section class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Rumah Sakit Lainnya</h2>
                
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @for($i = 1; $i <= 3; $i++)
                    <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
                        <div class="relative">
                            <img src="/placeholder.svg?height=200&width=400" alt="Hospital {{ $i }}" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">Featured</span>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-primary-600 transition-colors">
                                RS Example {{ $i }}
                            </h3>
                            <p class="text-gray-600 mb-4">Rumah sakit dengan pelayanan kesehatan terpercaya di Yogyakarta.</p>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 mr-1"></i>
                                    4.{{ $i }}/5.0
                                </div>
                                <a href="#" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                                    Lihat Detail
                                    <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endfor
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

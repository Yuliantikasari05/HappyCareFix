@extends('layouts.app')

@section('title', $tour->name . ' - HappyCare')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Tour Header -->
    <section class="relative py-16 bg-gradient-to-br from-green-600 via-green-700 to-green-800">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="relative container px-4 mx-auto">
            <div class="max-w-6xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="mb-6">
                    <ol class="flex items-center space-x-2 text-green-100">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                        <li><i data-lucide="chevron-right" class="w-4 h-4"></i></li>
                        <li><a href="{{ route('tour.nature') }}" class="hover:text-white transition-colors">Tours</a></li>
                        <li><i data-lucide="chevron-right" class="w-4 h-4"></i></li>
                        <li class="text-white">{{ $tour->name }}</li>
                    </ol>
                </nav>

                <div class="flex flex-col lg:flex-row gap-8 items-start">
                    <!-- Tour Info -->
                    <div class="flex-1">
                        <div class="flex items-center gap-4 mb-4">
                            <h1 class="text-3xl md:text-5xl font-bold text-white">{{ $tour->name }}</h1>
                            <span class="px-3 py-1 text-sm font-semibold text-white bg-yellow-500 rounded-full">
                                <i data-lucide="star" class="w-4 h-4 inline mr-1"></i>
                                Popular
                            </span>
                        </div>
                        
                        <p class="text-xl text-green-100 mb-6">{{ $tour->description }}</p>
                        
                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center text-green-100">
                                <i data-lucide="map-pin" class="w-5 h-5 mr-2"></i>
                                {{ $tour->location ?? 'Yogyakarta' }}
                            </div>
                            <div class="flex items-center text-green-100">
                                <i data-lucide="clock" class="w-5 h-5 mr-2"></i>
                                {{ $tour->duration ?? '1 Hari' }}
                            </div>
                            <div class="flex items-center text-green-100">
                                <i data-lucide="star" class="w-5 h-5 mr-2"></i>
                                {{ $tour->rating ?? '4.5' }}/5.0 Rating
                            </div>
                            <div class="flex items-center text-green-100">
                                <i data-lucide="users" class="w-5 h-5 mr-2"></i>
                                Max {{ $tour->max_participants ?? '20' }} orang
                            </div>
                        </div>
                    </div>

                    <!-- Price & Booking -->
                    <div class="bg-white rounded-2xl p-6 shadow-lg">
                        <div class="text-center mb-6">
                            <div class="text-3xl font-bold text-gray-900">{{ $tour->price ?? 'Rp 150.000' }}</div>
                            <div class="text-gray-600">per orang</div>
                        </div>
                        
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Tour</label>
                                <input type="date" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent" min="{{ date('Y-m-d') }}">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Peserta</label>
                                <select class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }} orang</option>
                                    @endfor
                                </select>
                            </div>
                            
                            <button type="submit" class="w-full px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-colors font-medium">
                                Pesan Sekarang
                            </button>
                        </form>
                        
                        <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                            <p class="text-sm text-gray-600 mb-3">Butuh bantuan?</p>
                            <a href="#" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
                                <i data-lucide="phone" class="w-4 h-4 mr-2"></i>
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tour Details -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="max-w-6xl mx-auto">
                <div class="grid gap-8 lg:grid-cols-3">
                    <!-- Main Content -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Tour Images -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <img src="/placeholder.svg?height=400&width=800" alt="{{ $tour->name }}" 
                                 class="w-full h-96 object-cover">
                        </div>

                        <!-- About Tour -->
                        <div class="bg-white rounded-2xl shadow-lg p-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Tentang {{ $tour->name }}</h2>
                            <div class="prose prose-lg max-w-none text-gray-700">
                                <p>{{ $tour->description }} Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                        </div>

                        <!-- Itinerary -->
                        <div class="bg-white rounded-2xl shadow-lg p-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Itinerary</h2>
                            <div class="space-y-6">
                                @php
                                $itinerary = [
                                    ['time' => '08:00', 'activity' => 'Berkumpul di titik meeting point'],
                                    ['time' => '08:30', 'activity' => 'Perjalanan menuju lokasi wisata'],
                                    ['time' => '10:00', 'activity' => 'Tiba di lokasi dan mulai eksplorasi'],
                                    ['time' => '12:00', 'activity' => 'Istirahat dan makan siang'],
                                    ['time' => '14:00', 'activity' => 'Melanjutkan aktivitas wisata'],
                                    ['time' => '16:00', 'activity' => 'Perjalanan kembali'],
                                    ['time' => '17:30', 'activity' => 'Tiba di titik awal']
                                ];
                                @endphp
                                @foreach($itinerary as $item)
                                <div class="flex items-start">
                                    <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                        <span class="text-green-600 font-bold">{{ $item['time'] }}</span>
                                    </div>
                                    <div class="flex-1 pt-3">
                                        <p class="text-gray-900 font-medium">{{ $item['activity'] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- What's Included -->
                        <div class="grid gap-8 md:grid-cols-2">
                            <div class="bg-white rounded-2xl shadow-lg p-8">
                                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                    <i data-lucide="check-circle" class="w-6 h-6 text-green-600 mr-3"></i>
                                    Yang Termasuk
                                </h3>
                                <ul class="space-y-3">
                                    @foreach(['Transportasi AC', 'Tiket masuk wisata', 'Makan siang', 'Guide berpengalaman', 'Asuransi perjalanan'] as $include)
                                    <li class="flex items-center">
                                        <i data-lucide="check" class="w-5 h-5 text-green-600 mr-3"></i>
                                        <span class="text-gray-700">{{ $include }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="bg-white rounded-2xl shadow-lg p-8">
                                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                    <i data-lucide="x-circle" class="w-6 h-6 text-red-600 mr-3"></i>
                                    Yang Tidak Termasuk
                                </h3>
                                <ul class="space-y-3">
                                    @foreach(['Pengeluaran pribadi', 'Tip untuk guide', 'Makanan di luar program', 'Aktivitas tambahan'] as $exclude)
                                    <li class="flex items-center">
                                        <i data-lucide="x" class="w-5 h-5 text-red-600 mr-3"></i>
                                        <span class="text-gray-700">{{ $exclude }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Tour Details -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Detail Tour</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Kategori</span>
                                    <span class="font-medium text-gray-900">{{ ucfirst($tour->category ?? 'Nature') }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Durasi</span>
                                    <span class="font-medium text-gray-900">{{ $tour->duration ?? '1 Hari' }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Tingkat Kesulitan</span>
                                    <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Mudah</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Max Peserta</span>
                                    <span class="font-medium text-gray-900">{{ $tour->max_participants ?? '20' }} orang</span>
                                </div>
                            </div>
                        </div>

                        <!-- Meeting Point -->
                        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6">
                            <h3 class="text-lg font-bold text-blue-900 mb-4 flex items-center">
                                <i data-lucide="map-pin" class="w-5 h-5 mr-2"></i>
                                Meeting Point
                            </h3>
                            <p class="text-blue-800 mb-4">Jl. Malioboro No. 123, Yogyakarta</p>
                            <a href="#" class="inline-flex items-center w-full px-4 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors justify-center">
                                <i data-lucide="navigation" class="w-5 h-5 mr-2"></i>
                                Lihat di Maps
                            </a>
                        </div>

                        <!-- Contact Guide -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Hubungi Guide</h3>
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                    <i data-lucide="user" class="w-6 h-6 text-green-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Budi Santoso</p>
                                    <p class="text-sm text-gray-600">Tour Guide Berpengalaman</p>
                                </div>
                            </div>
                            <a href="tel:+6281234567890" class="inline-flex items-center w-full px-4 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-colors justify-center">
                                <i data-lucide="phone" class="w-5 h-5 mr-2"></i>
                                Hubungi Guide
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Tours -->
    <section class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Tour Lainnya</h2>
                
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @for($i = 1; $i <= 3; $i++)
                    <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
                        <div class="relative">
                            <img src="/placeholder.svg?height=200&width=400" alt="Tour {{ $i }}" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 text-xs font-semibold text-white bg-yellow-500 rounded-full">Popular</span>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-green-600 transition-colors">
                                Tour Example {{ $i }}
                            </h3>
                            <p class="text-gray-600 mb-4">Nikmati pengalaman wisata yang tak terlupakan di Yogyakarta.</p>
                            
                            <div class="flex items-center justify-between">
                                <div class="text-lg font-bold text-green-600">Rp {{ number_format(150000 + ($i * 50000), 0, ',', '.') }}</div>
                                <a href="#" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium">
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
    </section>  `
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
@endsection

@extends('layouts.app')

@section('title', 'HappyCare - Kesehatan dan Pariwisata di Yogyakarta')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-primary-600 to-primary-800 text-white">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.3&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    </div>

    <div class="container px-4 py-24 mx-auto">
        <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
            <div data-aos="fade-right">
                <span class="inline-block px-4 py-2 mb-6 text-sm font-semibold rounded-full bg-white/20 backdrop-blur-sm">
                    Platform Kesehatan & Pariwisata di Yogyakarta
                </span>
                <h1 class="mb-6 text-4xl font-bold md:text-5xl lg:text-6xl">
                    Temukan <span class="text-secondary-400">Kesehatan</span> & <span class="text-secondary-400">Pariwisata</span> Terbaik
                </h1>
                <p class="mb-8 text-xl text-white/90 leading-relaxed">
                    Jelajahi layanan kesehatan terbaik dan destinasi wisata menarik di Yogyakarta dalam satu platform terpadu ini.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('hospital.general') }}" class="px-6 py-3 font-semibold text-primary-700 transition-colors bg-white rounded-lg hover:bg-gray-100">
                        <i data-lucide="stethoscope" class="inline w-5 h-5 mr-2"></i>
                        Layanan Kesehatan
                    </a>
                    <a href="{{ route('tour.nature') }}" class="px-6 py-3 font-semibold transition-colors border rounded-lg text-white/90 border-white/30 hover:bg-white/10">
                        <i data-lucide="map" class="inline w-5 h-5 mr-2"></i>
                        Destinasi Wisata
                    </a>
                </div>
            </div>
            <div class="relative" data-aos="fade-left">
                <div class="relative z-10 overflow-hidden rounded-2xl shadow-2xl">
                    {{-- <img src="{{ asset('images/hero-image.jpg') }}" alt="HappyCare Hero" class="w-full h-auto" 
                         onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1584982751601-97dcc096659c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2072&q=80';">
                </div> --}}
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-secondary-500/20 rounded-full -z-10 blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary-700/20 rounded-full -z-10 blur-3xl"></div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-white">
    <div class="container px-4 mx-auto">
        <div class="grid grid-cols-2 gap-8 md:grid-cols-4" data-aos="fade-up">
            <div class="text-center">
                <div class="text-4xl font-bold text-primary-600">48+</div>
                <div class="mt-2 text-gray-600">Kesehatan</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-primary-600">45+</div>
                <div class="mt-2 text-gray-600">Wisata</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-primary-600">8+</div>
                <div class="mt-2 text-gray-600">Pengguna Aktif</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-primary-600">24/7</div>
                <div class="mt-2 text-gray-600">Dukungan</div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-24 bg-gray-50">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <span class="inline-block px-4 py-2 mb-4 text-sm font-semibold rounded-full text-primary-700 bg-primary-100">Layanan Kami</span>
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Solusi Terpadu untuk Kesehatan dan Pariwisata
            </h2>
            <p class="text-lg text-gray-600">
                Kami menyediakan berbagai layanan untuk memenuhi kebutuhan kesehatan dan pariwisata Anda di Yogyakarta.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Service 1 -->
            <div class="p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-primary-100">
                    <i data-lucide="building-hospital" class="w-8 h-8 text-primary-600"></i>
                </div>
                <h3 class="mb-4 text-xl font-bold text-gray-900">Informasi Rumah Sakit</h3>
                <p class="mb-6 text-gray-600">
                    Akses informasi lengkap tentang rumah sakit, klinik, dan fasilitas kesehatan lainnya di Yogyakarta.
                </p>
                <a href="{{ route('hospital.general') }}" class="inline-flex items-center text-primary-600 hover:text-primary-700">
                    Lihat Rumah Sakit
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Service 2 -->
            <div class="p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-primary-100">
                    <i data-lucide="stethoscope" class="w-8 h-8 text-primary-600"></i>
                </div>
                <h3 class="mb-4 text-xl font-bold text-gray-900">Klinik Spesialis</h3>
                <p class="mb-6 text-gray-600">
                    Temukan klinik spesialis terbaik dengan dokter berpengalaman untuk kebutuhan kesehatan spesifik Anda.
                </p>
                <a href="{{ route('hospital.specialist_clinic') }}" class="inline-flex items-center text-primary-600 hover:text-primary-700">
                    Lihat Klinik Spesialis
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Service 3 -->
            <div class="p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-primary-100">
                    <i data-lucide="siren" class="w-8 h-8 text-primary-600"></i>
                </div>
                <h3 class="mb-4 text-xl font-bold text-gray-900">Unit Gawat Darurat</h3>
                <p class="mb-6 text-gray-600">
                    Akses cepat ke informasi Unit Gawat Darurat terdekat untuk situasi darurat medis.
                </p>
                <a href="{{ route('hospital.emergency') }}" class="inline-flex items-center text-primary-600 hover:text-primary-700">
                    Lihat UGD
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Service 4 -->
            <div class="p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="400">
                <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-primary-100">
                    <i data-lucide="trees" class="w-8 h-8 text-primary-600"></i>
                </div>
                <h3 class="mb-4 text-xl font-bold text-gray-900">Wisata Alam</h3>
                <p class="mb-6 text-gray-600">
                    Jelajahi keindahan alam Yogyakarta dengan panduan wisata alam yang lengkap dan informatif.
                </p>
                <a href="{{ route('tour.nature') }}" class="inline-flex items-center text-primary-600 hover:text-primary-700">
                    Lihat Wisata Alam
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Service 5 -->
            <div class="p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="500">
                <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-primary-100">
                    <i data-lucide="utensils" class="w-8 h-8 text-primary-600"></i>
                </div>
                <h3 class="mb-4 text-xl font-bold text-gray-900">Wisata Kuliner</h3>
                <p class="mb-6 text-gray-600">
                    Temukan kuliner khas Yogyakarta dan pengalaman gastronomi yang tak terlupakan.
                </p>
                <a href="{{ route('tour.culinary') }}" class="inline-flex items-center text-primary-600 hover:text-primary-700">
                    Lihat Wisata Kuliner
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>

            <!-- Service 6 -->
            <div class="p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="600">
                <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-primary-100">
                    <i data-lucide="users" class="w-8 h-8 text-primary-600"></i>
                </div>
                <h3 class="mb-4 text-xl font-bold text-gray-900">Wisata Keluarga</h3>
                <p class="mb-6 text-gray-600">
                    Rencanakan liburan keluarga yang menyenangkan dengan destinasi ramah keluarga di Yogyakarta.
                </p>
                <a href="{{ route('tour.family') }}" class="inline-flex items-center text-primary-600 hover:text-primary-700">
                    Lihat Wisata Keluarga
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Section -->
<section class="py-24 bg-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <span class="inline-block px-4 py-2 mb-4 text-sm font-semibold rounded-full text-primary-700 bg-primary-100">Rekomendasi</span>
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Rekomendasi Terbaik untuk Anda
            </h2>
            <p class="text-lg text-gray-600">
                Temukan destinasi wisata dan fasilitas kesehatan terbaik yang direkomendasikan untuk Anda.
            </p>
        </div>

        <!-- Tabs -->
        <div class="mb-12" x-data="{ activeTab: 'hospitals' }">
            <div class="flex flex-wrap justify-center gap-4 mb-8" data-aos="fade-up">
                <button @click="activeTab = 'hospitals'" 
                        :class="{ 'bg-primary-600 text-white': activeTab === 'hospitals', 'bg-gray-100 text-gray-700': activeTab !== 'hospitals' }"
                        class="px-6 py-3 font-semibold rounded-full transition-colors">
                    <i data-lucide="building-hospital" class="inline w-5 h-5 mr-2"></i>
                    Rumah Sakit
                </button>
                <button @click="activeTab = 'tours'" 
                        :class="{ 'bg-primary-600 text-white': activeTab === 'tours', 'bg-gray-100 text-gray-700': activeTab !== 'tours' }"
                        class="px-6 py-3 font-semibold rounded-full transition-colors">
                    <i data-lucide="map" class="inline w-5 h-5 mr-2"></i>
                    Wisata
                </button>
            </div>

            <!-- Hospitals Tab -->
            <div x-show="activeTab === 'hospitals'" x-transition>
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Hospital 1 -->
                    <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/hospital-1.jpg') }}" alt="Hospital" class="object-cover w-full h-full"
                                 onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2073&q=80';">
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-primary-600 rounded-full">
                                    <i data-lucide="star" class="w-4 h-4 mr-1"></i>
                                    Unggulan
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-bold text-gray-900">RS Sardjito</h3>
                            <div class="flex items-center mb-3 text-amber-400">
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4"></i>
                                <span class="ml-2 text-sm text-gray-600">4.0/5.0</span>
                            </div>
                            <p class="mb-4 text-gray-600">
                                Rumah sakit umum terbesar di Yogyakarta dengan fasilitas lengkap dan dokter spesialis terbaik.
                            </p>
                            <div class="flex items-center mb-4 text-gray-600">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-2 text-primary-600"></i>
                                <span class="text-sm">Jl. Kesehatan No. 1, Yogyakarta</span>
                            </div>
                            <a href="{{ route('hospital.general') }}" class="inline-flex items-center justify-center w-full px-4 py-3 font-semibold text-white transition-colors bg-primary-600 rounded-lg hover:bg-primary-700">
                                Lihat Detail
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Hospital 2 -->
                    <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/hospital-2.jpg') }}" alt="Hospital" class="object-cover w-full h-full"
                                 onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2053&q=80';">
                        </div>
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-bold text-gray-900">RS Panti Rapih</h3>
                            <div class="flex items-center mb-3 text-amber-400">
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star-half" class="w-4 h-4 fill-current"></i>
                                <span class="ml-2 text-sm text-gray-600">4.5/5.0</span>
                            </div>
                            <p class="mb-4 text-gray-600">
                                Rumah sakit dengan pelayanan prima dan fasilitas modern di pusat kota Yogyakarta.
                            </p>
                            <div class="flex items-center mb-4 text-gray-600">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-2 text-primary-600"></i>
                                <span class="text-sm">Jl. Cik Di Tiro No. 30, Yogyakarta</span>
                            </div>
                            <a href="{{ route('hospital.general') }}" class="inline-flex items-center justify-center w-full px-4 py-3 font-semibold text-white transition-colors bg-primary-600 rounded-lg hover:bg-primary-700">
                                Lihat Detail
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Hospital 3 -->
                    <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/hospital-3.jpg') }}" alt="Hospital" class="object-cover w-full h-full"
                                 onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1538108149393-fbbd81895907?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2128&q=80';">
                        </div>
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-bold text-gray-900">RS Bethesda</h3>
                            <div class="flex items-center mb-3 text-amber-400">
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4"></i>
                                <span class="ml-2 text-sm text-gray-600">4.0/5.0</span>
                            </div>
                            <p class="mb-4 text-gray-600">
                                Rumah sakit dengan sejarah panjang dan pelayanan kesehatan terpercaya di Yogyakarta.
                            </p>
                            <div class="flex items-center mb-4 text-gray-600">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-2 text-primary-600"></i>
                                <span class="text-sm">Jl. Jendral Sudirman No. 70, Yogyakarta</span>
                            </div>
                            <a href="{{ route('hospital.general') }}" class="inline-flex items-center justify-center w-full px-4 py-3 font-semibold text-white transition-colors bg-primary-600 rounded-lg hover:bg-primary-700">
                                Lihat Detail
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tours Tab -->
            <div x-show="activeTab === 'tours'" x-transition>
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Tour 1 -->
                    <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/tour-1.jpg') }}" alt="Tour" class="object-cover w-full h-full"
                                 onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80';">
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-emerald-600 rounded-full">
                                    <i data-lucide="trees" class="w-4 h-4 mr-1"></i>
                                    Wisata Alam
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Candi Borobudur</h3>
                            <div class="flex items-center mb-3 text-amber-400">
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <span class="ml-2 text-sm text-gray-600">5.0/5.0</span>
                            </div>
                            <p class="mb-4 text-gray-600">
                                Candi Buddha terbesar di dunia yang merupakan warisan budaya dunia UNESCO.
                            </p>
                            <div class="flex items-center mb-4 text-gray-600">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-2 text-emerald-600"></i>
                                <span class="text-sm">Magelang, Jawa Tengah</span>
                            </div>
                            <a href="{{ route('tour.nature') }}" class="inline-flex items-center justify-center w-full px-4 py-3 font-semibold text-white transition-colors bg-emerald-600 rounded-lg hover:bg-emerald-700">
                                Lihat Detail
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Tour 2 -->
                    <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/tour-2.jpg') }}" alt="Tour" class="object-cover w-full h-full"
                                 onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1584810359583-96fc3448beaa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80';">
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-orange-600 rounded-full">
                                    <i data-lucide="utensils" class="w-4 h-4 mr-1"></i>
                                    Wisata Kuliner
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Malioboro</h3>
                            <div class="flex items-center mb-3 text-amber-400">
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star-half" class="w-4 h-4 fill-current"></i>
                                <span class="ml-2 text-sm text-gray-600">4.5/5.0</span>
                            </div>
                            <p class="mb-4 text-gray-600">
                                Jalan ikonik di Yogyakarta dengan berbagai kuliner khas dan pusat oleh-oleh.
                            </p>
                            <div class="flex items-center mb-4 text-gray-600">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-2 text-orange-600"></i>
                                <span class="text-sm">Jl. Malioboro, Yogyakarta</span>
                            </div>
                            <a href="{{ route('tour.culinary') }}" class="inline-flex items-center justify-center w-full px-4 py-3 font-semibold text-white transition-colors bg-orange-600 rounded-lg hover:bg-orange-700">
                                Lihat Detail
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Tour 3 -->
                    <div class="overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/tour-3.jpg') }}" alt="Tour" class="object-cover w-full h-full"
                                 onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1584999734482-0361aecad844?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2080&q=80';">
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-purple-600 rounded-full">
                                    <i data-lucide="users" class="w-4 h-4 mr-1"></i>
                                    Wisata Keluarga
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-bold text-gray-900">Taman Pintar</h3>
                            <div class="flex items-center mb-3 text-amber-400">
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                                <i data-lucide="star" class="w-4 h-4"></i>
                                <span class="ml-2 text-sm text-gray-600">4.0/5.0</span>
                            </div>
                            <p class="mb-4 text-gray-600">
                                Taman edukasi interaktif yang cocok untuk liburan keluarga dengan anak-anak.
                            </p>
                            <div class="flex items-center mb-4 text-gray-600">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-2 text-purple-600"></i>
                                <span class="text-sm">Jl. Panembahan Senopati No. 1-3, Yogyakarta</span>
                            </div>
                            <a href="{{ route('tour.family') }}" class="inline-flex items-center justify-center w-full px-4 py-3 font-semibold text-white transition-colors bg-purple-600 rounded-lg hover:bg-purple-700">
                                Lihat Detail
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center" data-aos="fade-up">
            <a href="{{ route('hospital.general') }}" class="inline-flex items-center px-6 py-3 font-semibold transition-colors border rounded-lg text-primary-600 border-primary-200 hover:bg-primary-50">
                Lihat Semua Rekomendasi
                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 bg-gradient-to-br from-primary-50 via-white to-primary-50">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <span class="inline-block px-4 py-2 mb-4 text-sm font-semibold rounded-full text-primary-700 bg-primary-100">Testimonial</span>
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Apa Kata Mereka?
            </h2>
            <p class="text-lg text-gray-600">
                Pengalaman pengguna HappyCare dalam mengakses layanan kesehatan dan pariwisata di Yogyakarta.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Testimonial 1 -->
            <div class="p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 mr-4 overflow-hidden rounded-full">
                        <img src="{{ asset('images/testimonial-1.jpg') }}" alt="Testimonial" class="object-cover w-full h-full"
                             onerror="this.onerror=null; this.src='https://randomuser.me/api/portraits/men/32.jpg';">
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900">Budi Santoso</h4>
                        <p class="text-sm text-gray-600">Yogyakarta</p>
                    </div>
                </div>
                <div class="flex items-center mb-4 text-amber-400">
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                </div>
                <p class="text-gray-600">
                    "HappyCare sangat membantu saya menemukan rumah sakit dengan dokter spesialis terbaik untuk pengobatan orang tua saya. Informasinya lengkap dan akurat!"
                </p>
            </div>

            <!-- Testimonial 2 -->
            <div class="p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 mr-4 overflow-hidden rounded-full">
                        <img src="{{ asset('images/testimonial-2.jpg') }}" alt="Testimonial" class="object-cover w-full h-full"
                             onerror="this.onerror=null; this.src='https://randomuser.me/api/portraits/women/44.jpg';">
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900">Siti Rahayu</h4>
                        <p class="text-sm text-gray-600">Jakarta</p>
                    </div>
                </div>
                <div class="flex items-center mb-4 text-amber-400">
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star-half" class="w-4 h-4 fill-current"></i>
                </div>
                <p class="text-gray-600">
                    "Berkat HappyCare, liburan keluarga kami di Yogyakarta jadi lebih terencana. Rekomendasi wisata keluarganya sangat cocok untuk anak-anak!"
                </p>
            </div>

            <!-- Testimonial 3 -->
            <div class="p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 mr-4 overflow-hidden rounded-full">
                        <img src="{{ asset('images/testimonial-3.jpg') }}" alt="Testimonial" class="object-cover w-full h-full"
                             onerror="this.onerror=null; this.src='https://randomuser.me/api/portraits/men/67.jpg';">
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900">Agus Wijaya</h4>
                        <p class="text-sm text-gray-600">Surabaya</p>
                    </div>
                </div>
                <div class="flex items-center mb-4 text-amber-400">
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                    <i data-lucide="star" class="w-4 h-4"></i>
                </div>
                <p class="text-gray-600">
                    "Saat mengalami kecelakaan di Yogyakarta, HappyCare membantu saya menemukan UGD terdekat dengan cepat. Sangat membantu dalam situasi darurat!"
                </p>
            </div>
        </div>
        <div class="mt-12 text-center" data-aos="fade-up">
            <a href="{{ route('testimonials.index') }}" class="inline-flex items-center px-8 py-4 font-semibold text-white transition-all duration-300 transform rounded-lg bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 hover:scale-105 shadow-lg hover:shadow-xl">
                <i data-lucide="star" class="w-5 h-5 mr-2"></i>
                Lihat Semua Testimonial
                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
            </a>
        </div>
    </div>
</section>



<!-- CTA Section -->
<section class="py-24 bg-primary-600 text-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
            <h2 class="mb-6 text-3xl font-bold md:text-4xl">
                Jelajahi Yogyakarta dengan HappyCare
            </h2>
            <p class="mb-8 text-xl text-white/90">
                Temukan layanan kesehatan terbaik dan destinasi wisata menarik dalam satu platform.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('hospital.general') }}" class="px-6 py-3 font-semibold text-primary-700 transition-colors bg-white rounded-lg hover:bg-gray-100">
                    <i data-lucide="stethoscope" class="inline w-5 h-5 mr-2"></i>
                    Layanan Kesehatan
                </a>
                <a href="{{ route('tour.nature') }}" class="px-6 py-3 font-semibold transition-colors border rounded-lg text-white/90 border-white/30 hover:bg-white/10">
                    <i data-lucide="map" class="inline w-5 h-5 mr-2"></i>
                    Destinasi Wisata
                </a>
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

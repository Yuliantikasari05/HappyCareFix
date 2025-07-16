@extends('layouts.app')

@section('title', 'HappyCare - Health and Tourism in Yogyakarta')

@section('content')
<!-- Enhanced Hero Section with Professional Colors -->
<section class="relative overflow-hidden text-white py-32 md:py-40 lg:py-48">
  <!-- Video Background -->
  <div class="absolute inset-0 z-0">
    <video autoplay muted loop playsinline class="w-full h-full object-cover">
      <source src="{{ asset('video/hero-bg.mp4') }}" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
    <!-- Optional: Dark overlay for better text contrast -->
    <div class="absolute inset-0" style="background-color: rgba(20, 211, 243, 0.2); backdrop-filter: blur(5px);"></div>


  </div>

  <!-- Main Content -->
  <div class="container mx-auto px-6 relative z-10">
  <div class="max-w-4xl mx-auto text-center" data-aos="zoom-in" data-aos-duration="1000">
    
    <!-- Badge -->
    <span class="inline-flex items-center gap-2 px-6 py-2 mb-6 text-sm font-medium rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white shadow-md ring-1 ring-white/10 animate-fade-in-up">
      <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
      <span class="tracking-wide">Health & Tourism Platform in Yogyakarta</span>
    </span>

    <!-- Title -->
    <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight mb-6 text-white drop-shadow-lg">
      <span class="block animate-slide-in-up">Discover the Best</span>
      <span class="block bg-gradient-to-r from-cyan-400 to-blue-400 text-transparent bg-clip-text animate-gradient">Health & Tourism</span>
    </h1>

    <!-- Description -->
    <p class="text-lg md:text-xl font-light text-white/90 mb-10 max-w-3xl mx-auto animate-fade-in delay-200">
      Explore top health services and unforgettable destinations in Yogyakarta — all in one powerful, elegant platform.
    </p>

    <!-- CTA Buttons -->
    <div class="flex justify-center flex-wrap gap-6 animate-fade-in delay-300">
      @guest
      <a href="{{ route('login') }}"
        class="group relative px-8 py-4 bg-white text-emerald-800 font-semibold rounded-xl shadow-lg transition-transform duration-300 hover:-translate-y-1 hover:scale-105 overflow-hidden">
        <span class="absolute inset-0 rounded-xl bg-gradient-to-br from-cyan-300/20 to-blue-400/20 opacity-0 group-hover:opacity-100 blur transition duration-300"></span>
        <span class="relative flex items-center gap-2 z-10">
          <i data-lucide="stethoscope" class="w-6 h-6"></i>
          Health Services
        </span>
      </a>
      <a href="{{ route('login') }}"
        class="group relative px-8 py-4 border border-white/30 text-white font-semibold rounded-xl backdrop-blur-md transition-all duration-300 hover:bg-white/10 hover:border-white/50 shadow-lg hover:-translate-y-1 hover:scale-105">
        <span class="relative flex items-center gap-2">
          <i data-lucide="map" class="w-6 h-6"></i>
          Tourist Destinations
        </span>
      </a>
      @else
      <a href="{{ route('hospital.general') }}"
        class="group relative px-8 py-4 bg-white text-emerald-800 font-semibold rounded-xl shadow-lg transition-transform duration-300 hover:-translate-y-1 hover:scale-105 overflow-hidden">
        <span class="absolute inset-0 rounded-xl bg-gradient-to-br from-cyan-300/20 to-blue-400/20 opacity-0 group-hover:opacity-100 blur transition duration-300"></span>
        <span class="relative flex items-center gap-2 z-10">
          <i data-lucide="stethoscope" class="w-6 h-6"></i>
          Health Services
        </span>
      </a>
      <a href="{{ route('tour.nature') }}"
        class="group relative px-8 py-4 border border-white/30 text-white font-semibold rounded-xl backdrop-blur-md transition-all duration-300 hover:bg-white/10 hover:border-white/50 shadow-lg hover:-translate-y-1 hover:scale-105">
        <span class="relative flex items-center gap-2">
          <i data-lucide="map" class="w-6 h-6"></i>
          Tourist Destinations
        </span>
      </a>
      @endguest
    </div>
  </div>
</div>
</section>


<!-- Enhanced Stats Section with Professional Glassmorphism -->
<section class="py-20 bg-gradient-to-b from-[#f0fffd] to-[#e8fefc] relative overflow-hidden">



    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25px 25px, #000 2px, transparent 0), radial-gradient(circle at 75px 75px, #000 2px, transparent 0); background-size: 100px 100px;"></div>
    </div>
<<<<<<< HEAD
    
    <div class="container px-4 mx-auto relative z-10">
        <div class="grid grid-cols-2 gap-8 md:grid-cols-4" data-aos="fade-up" data-aos-duration="800">
            <!-- Stat 1 -->
            <div class="group text-center p-8 rounded-3xl bg-white/60 backdrop-blur-lg border border-white/20 shadow-xl hover:shadow-2xl hover:bg-white/80 transition-all duration-500 transform hover:-translate-y-2">
                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-r from-primary-400 to-primary-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="building-hospital" class="w-8 h-8 text-white"></i>
=======

    <div class="container px-4 py-24 mx-auto">
        <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
            <div data-aos="fade-right">
                <span class="inline-block px-4 py-2 mb-6 text-sm font-semibold rounded-full bg-white/20 backdrop-blur-sm">
                    Platform Kesehatan & Pariwisata di Yogyakarta Istimewa
                </span>
                <h1 class="mb-6 text-4xl font-bold md:text-5xl lg:text-6xl">
                    Temukan <span class="text-secondary-400">Kesehatan</span> & <span class="text-secondary-400">Pariwisata</span> Terbaik
                </h1>
                <p class="mb-8 text-xl text-white/90 leading-relaxed">
                    Jelajahi layanan kesehatan terbaik dan destinasi wisata menarik di Yogyakarta dalam satu platform terpadu HappyCare.
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
>>>>>>> 845f0578cc58d8cf3780eb09eb67934f6047b73e
                </div>
                <div class="text-5xl font-black text-primary-600 mb-2">48+</div>
                <div class="text-gray-600 font-semibold">Health Facilities</div>
            </div>

            <!-- Stat 2 -->
            <div class="group text-center p-8 rounded-3xl bg-white/60 backdrop-blur-lg border border-white/20 shadow-xl hover:shadow-2xl hover:bg-white/80 transition-all duration-500 transform hover:-translate-y-2">
                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-r from-primary-400 to-primary-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="map" class="w-8 h-8 text-white"></i>
                </div>
                <div class="text-5xl font-black text-primary-600 mb-2">45+</div>
                <div class="text-gray-600 font-semibold">Tourist Spots</div>
            </div>

            <!-- Stat 3 -->
            <div class="group text-center p-8 rounded-3xl bg-white/60 backdrop-blur-lg border border-white/20 shadow-xl hover:shadow-2xl hover:bg-white/80 transition-all duration-500 transform hover:-translate-y-2">
                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-r from-primary-400 to-primary-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="users" class="w-8 h-8 text-white"></i>
                </div>
                <div class="text-5xl font-black text-primary-600 mb-2">8K+</div>
                <div class="text-gray-600 font-semibold">Active Users</div>
            </div>

            <!-- Stat 4 -->
            <div class="group text-center p-8 rounded-3xl bg-white/60 backdrop-blur-lg border border-white/20 shadow-xl hover:shadow-2xl hover:bg-white/80 transition-all duration-500 transform hover:-translate-y-2">
                <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-r from-primary-400 to-primary-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <i data-lucide="clock" class="w-8 h-8 text-white"></i>
                </div>
                <div class="text-5xl font-black text-primary-600 mb-2">24/7</div>
                <div class="text-gray-600 font-semibold">Support</div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Services Section with Professional Dark Theme -->
<section class="py-32 bg-gradient-to-br from-[#13363e] to-[#303d40] relative overflow-hidden">    <!-- Subtle Animated Background -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-teal-300/10 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-cyan-400/10 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-emerald-400/10 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-4000"></div>
    </div>

    <div class="container px-4 mx-auto relative z-10">
        <!-- Section Header -->
        <div class="max-w-4xl mx-auto mb-20 text-center" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center px-6 py-3 mb-6 text-sm font-bold rounded-full bg-teal-500/20 backdrop-blur-md border border-cyan-400/20 text-white">
                <div class="w-2 h-2 bg-cyan-400 rounded-full mr-3 animate-pulse"></div>
                Our Premium Services
            </div>
            <h2 class="mb-6 text-5xl font-black text-white md:text-6xl">
                Integrated Solutions for
                <span class="block text-cyan-400">Health and Tourism</span>
            </h2>
            <p class="text-xl text-gray-300 leading-relaxed">
                Experience next-generation services with cutting-edge technology and premium features
            </p>
        </div>

        <!-- Grid Services -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
    <!-- Service 1 -->
    <div class="group relative p-8 bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 hover:border-teal-400 shadow-2xl hover:shadow-cyan-500/25 transition-all duration-500 transform hover:-translate-y-4 hover:rotate-1" data-aos="fade-up" data-aos-delay="100">
        <div class="absolute inset-0 bg-gradient-to-br from-teal-500/10 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
            <div class="w-20 h-20 mb-6 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                <i data-lucide="building-hospital" class="w-10 h-10 text-white"></i>
            </div>
            <h3 class="mb-4 text-2xl font-bold text-white group-hover:text-cyan-300 transition-colors">Hospital Information</h3>
            <p class="mb-6 text-gray-300 leading-relaxed">Access comprehensive information about hospitals, clinics, and other health facilities with real-time availability.</p>
            @guest
                <a href="{{ route('login') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-semibold group-hover:translate-x-2 transition-all duration-300">
                    Explore Hospitals 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                    <span class="ml-2 text-sm opacity-70"></span>
                </a>
            @else
                <a href="{{ route('hospital.general') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-semibold group-hover:translate-x-2 transition-all duration-300">
                    Explore Hospitals 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            @endguest
        </div>
    </div>

    <!-- Service 2 -->
    <div class="group relative p-8 bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 hover:border-teal-400 shadow-2xl hover:shadow-cyan-500/25 transition-all duration-500 transform hover:-translate-y-4 hover:rotate-1" data-aos="fade-up" data-aos-delay="200">
        <div class="absolute inset-0 bg-gradient-to-br from-teal-500/10 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
            <div class="w-20 h-20 mb-6 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                <i data-lucide="stethoscope" class="w-10 h-10 text-white"></i>
            </div>
            <h3 class="mb-4 text-2xl font-bold text-white group-hover:text-cyan-300 transition-colors">Specialist Clinics</h3>
            <p class="mb-6 text-gray-300 leading-relaxed">Find the best specialist clinics with experienced doctors and advanced medical equipment.</p>
            @guest
                <a href="{{ route('login') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-semibold group-hover:translate-x-2 transition-all duration-300">
                    Find Specialists 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                    <span class="ml-2 text-sm opacity-70"></span>
                </a>
            @else
                <a href="{{ route('hospital.specialist_clinic') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-semibold group-hover:translate-x-2 transition-all duration-300">
                    Find Specialists 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            @endguest
        </div>
    </div>

    <!-- Service 3 -->
    <div class="group relative p-8 bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 hover:border-teal-400 shadow-2xl hover:shadow-cyan-500/25 transition-all duration-500 transform hover:-translate-y-4 hover:rotate-1" data-aos="fade-up" data-aos-delay="300">
        <div class="absolute inset-0 bg-gradient-to-br from-teal-500/10 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
            <div class="w-20 h-20 mb-6 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                <i data-lucide="siren" class="w-10 h-10 text-white"></i>
            </div>
            <h3 class="mb-4 text-2xl font-bold text-white group-hover:text-cyan-300 transition-colors">Emergency Units</h3>
            <p class="mb-6 text-gray-300 leading-relaxed">Quick access to emergency services with real-time location tracking and instant alerts.</p>
            @guest
                <a href="{{ route('login') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-semibold group-hover:translate-x-2 transition-all duration-300">
                    Emergency Access 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                    <span class="ml-2 text-sm opacity-70"></span>
                </a>
            @else
                <a href="{{ route('hospital.emergency') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-semibold group-hover:translate-x-2 transition-all duration-300">
                    Emergency Access 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            @endguest
        </div>
    </div>

    <!-- Service 4 -->
    <div class="group relative p-8 bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 hover:border-teal-400 shadow-2xl hover:shadow-cyan-500/25 transition-all duration-500 transform hover:-translate-y-4 hover:rotate-1" data-aos="fade-up" data-aos-delay="400">
        <div class="absolute inset-0 bg-gradient-to-br from-teal-500/10 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
            <div class="w-20 h-20 mb-6 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                <i data-lucide="trees" class="w-10 h-10 text-white"></i>
            </div>
            <h3 class="mb-4 text-2xl font-bold text-white group-hover:text-cyan-300 transition-colors">Nature Tourism</h3>
            <p class="mb-6 text-gray-300 leading-relaxed">Explore breathtaking natural destinations with interactive maps and AR experiences.</p>
            @guest
                <a href="{{ route('login') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-semibold group-hover:translate-x-2 transition-all duration-300">
                    Explore Nature 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                    <span class="ml-2 text-sm opacity-70"></span>
                </a>
            @else
                <a href="{{ route('tour.nature') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-semibold group-hover:translate-x-2 transition-all duration-300">
                    Explore Nature 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            @endguest
        </div>
    </div>

    <!-- Service 5 -->
    <div class="group relative p-8 bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 hover:border-teal-400 shadow-2xl hover:shadow-cyan-500/25 transition-all duration-500 transform hover:-translate-y-4 hover:rotate-1" data-aos="fade-up" data-aos-delay="500">
        <div class="absolute inset-0 bg-gradient-to-br from-teal-500/10 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
            <div class="w-20 h-20 mb-6 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                <i data-lucide="utensils" class="w-10 h-10 text-white"></i>
            </div>
            <h3 class="mb-4 text-2xl font-bold text-white group-hover:text-cyan-300 transition-colors">Culinary Tourism</h3>
            <p class="mb-6 text-gray-300 leading-relaxed">Discover authentic local cuisine with chef recommendations and food delivery integration.</p>
            @guest
                <a href="{{ route('login') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-semibold group-hover:translate-x-2 transition-all duration-300">
                    Taste Local Food 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                    <span class="ml-2 text-sm opacity-70"></span>
                </a>
            @else
                <a href="{{ route('tour.culinary') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-semibold group-hover:translate-x-2 transition-all duration-300">
                    Taste Local Food 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            @endguest
        </div>
    </div>

    <!-- Service 6 -->
    <div class="group relative p-8 bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 hover:border-teal-400 shadow-2xl hover:shadow-cyan-500/25 transition-all duration-500 transform hover:-translate-y-4 hover:rotate-1" data-aos="fade-up" data-aos-delay="600">
        <div class="absolute inset-0 bg-gradient-to-br from-teal-500/10 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10">
            <div class="w-20 h-20 mb-6 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                <i data-lucide="users" class="w-10 h-10 text-white"></i>
            </div>
            <h3 class="mb-4 text-2xl font-bold text-white group-hover:text-cyan-300 transition-colors">Family Tourism</h3>
            <p class="mb-6 text-gray-300 leading-relaxed">Plan perfect family adventures with kid-friendly activities and safety features.</p>
            @guest
                <a href="{{ route('login') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-semibold group-hover:translate-x-2 transition-all duration-300">
                    Family Adventures 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                    <span class="ml-2 text-sm opacity-70"></span>
                </a>
            @else
                <a href="{{ route('tour.family') }}" class="inline-flex items-center text-cyan-400 hover:text-cyan-300 font-semibold group-hover:translate-x-2 transition-all duration-300">
                    Family Adventures 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            @endguest
        </div>
    </div>
</div>

    </div>
</section>

<!-- Enhanced Featured Section with Professional Design -->
<section class="py-24 bg-gradient-to-br from-teal-500 via-white to-teal-300 relative overflow-hidden">
    <!-- Background Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-teal-200/30 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-teal-300/20 rounded-full blur-3xl animate-pulse animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-teal-100/40 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <!-- Header Section -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center px-6 py-3 mb-6 bg-teal-100/80 backdrop-blur-sm rounded-full border border-teal-200/50">
                <div class="w-2 h-2 bg-teal-500 rounded-full mr-3 animate-pulse"></div>
                <span class="text-teal-700 font-semibold text-sm">Recommendations</span>
            </div>
            
            <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Top Recommendations
                <span class="block text-teal-600 mt-2">for You</span>
            </h2>
            
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Discover handpicked destinations and facilities curated by our expert team
            </p>
        </div>

        <!-- Enhanced Tab Navigation -->
        <div class="mb-16" x-data="{ activeTab: 'hospitals' }">
            <div class="flex justify-center mb-12" data-aos="fade-up">
                <div class="bg-white/80 backdrop-blur-md rounded-2xl p-2 shadow-xl border border-teal-100/50">
                    <div class="flex gap-2">
                        <button @click="activeTab = 'hospitals'"
                                :class="{ 'bg-gradient-to-r from-teal-500 to-teal-600 text-white shadow-lg shadow-teal-500/25 scale-105': activeTab === 'hospitals', 'text-gray-600 hover:text-teal-600 hover:bg-teal-50/50': activeTab !== 'hospitals' }"
                                class="flex items-center px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform">
                            <i data-lucide="building-2" class="w-5 h-5 mr-3"></i>
                            Hospitals
                        </button>
                        <button @click="activeTab = 'tours'"
                                :class="{ 'bg-gradient-to-r from-teal-500 to-teal-600 text-white shadow-lg shadow-teal-500/25 scale-105': activeTab === 'tours', 'text-gray-600 hover:text-teal-600 hover:bg-teal-50/50': activeTab !== 'tours' }"
                                class="flex items-center px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform">
                            <i data-lucide="map" class="w-5 h-5 mr-3"></i>
                            Tours
                        </button>
                    </div>
                </div>
            </div>

            <!-- Enhanced Hospitals Tab -->
            <div x-show="activeTab === 'hospitals'" 
                 x-transition:enter="transition ease-out duration-500" 
                 x-transition:enter-start="opacity-0 transform scale-95" 
                 x-transition:enter-end="opacity-100 transform scale-100">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- RS Sardjito -->
                    <div class="group overflow-hidden bg-white/90 backdrop-blur-sm border-0 shadow-xl hover:shadow-2xl hover:shadow-teal-500/10 transition-all duration-700 transform hover:-translate-y-4 hover:rotate-1 rounded-3xl" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/rs-panti-rapih.jpg') }}" 
     alt="RS Panti Rapih" 
     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            
                            <!-- Floating Rating Badge -->
                            <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm rounded-full px-3 py-2 shadow-lg">
                                <div class="flex items-center gap-1">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <span class="text-sm font-bold text-gray-900">4.0</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-teal-700 transition-colors">RS Sardjito</h3>
                            
                            <div class="flex items-center mb-4">
                                <div class="flex gap-1 mr-3">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-gray-300"></i>
                                </div>
                                <span class="text-lg font-semibold text-gray-700">4.0/5.0</span>
                            </div>
                            
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                Yogyakarta's largest general hospital with complete facilities and top specialist doctors.
                            </p>
                            
                            <div class="flex items-center mb-8 text-gray-600">
                                <i data-lucide="map-pin" class="w-5 h-5 mr-3 text-teal-600 flex-shrink-0"></i>
                                <span class="text-sm">Jl. Kesehatan No. 1, Yogyakarta</span>
                            </div>
                            
                            @guest
                                <a href="{{ route('login') }}" class="group/btn inline-flex items-center justify-center w-full px-6 py-4 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-xl shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:scale-105">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                                    <span class="ml-2 text-sm opacity-80"></span>
                                </a>
                            @else
                                <a href="{{ route('hospital.general') }}" class="group/btn inline-flex items-center justify-center w-full px-6 py-4 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-xl shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:scale-105">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                                </a>
                            @endguest
                        </div>
                    </div>

                    <!-- RS Panti Rapih -->
                    <div class="group overflow-hidden bg-white/90 backdrop-blur-sm border-0 shadow-xl hover:shadow-2xl hover:shadow-teal-500/10 transition-all duration-700 transform hover:-translate-y-4 hover:rotate-1 rounded-3xl" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/RS Sardjito.jpg') }}" 
     alt="RS Panti Rapih" 
     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            
                            <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm rounded-full px-3 py-2 shadow-lg">
                                <div class="flex items-center gap-1">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <span class="text-sm font-bold text-gray-900">4.5</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-teal-700 transition-colors">RS Panti Rapih</h3>
                            
                            <div class="flex items-center mb-4">
                                <div class="flex gap-1 mr-3">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current opacity-50"></i>
                                </div>
                                <span class="text-lg font-semibold text-gray-700">4.5/5.0</span>
                            </div>
                            
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                Hospital with excellent service and modern facilities in the heart of Yogyakarta.
                            </p>
                            
                            <div class="flex items-center mb-8 text-gray-600">
                                <i data-lucide="map-pin" class="w-5 h-5 mr-3 text-teal-600 flex-shrink-0"></i>
                                <span class="text-sm">Jl. Cik Di Tiro No. 30, Yogyakarta</span>
                            </div>
                            
                            @guest
                                <a href="{{ route('login') }}" class="group/btn inline-flex items-center justify-center w-full px-6 py-4 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-xl shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:scale-105">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                                    <span class="ml-2 text-sm opacity-80"></span>
                                </a>
                            @else
                                <a href="{{ route('hospital.general') }}" class="group/btn inline-flex items-center justify-center w-full px-6 py-4 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-xl shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:scale-105">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                                </a>
                            @endguest
                        </div>
                    </div>

                    <!-- RS Bethesda -->
                    <div class="group overflow-hidden bg-white/90 backdrop-blur-sm border-0 shadow-xl hover:shadow-2xl hover:shadow-teal-500/10 transition-all duration-700 transform hover:-translate-y-4 hover:rotate-1 rounded-3xl" data-aos="fade-up" data-aos-delay="300">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/RS_Bethesda.jpg') }}" 
     alt="RS Panti Rapih" 
     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            
                            <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm rounded-full px-3 py-2 shadow-lg">
                                <div class="flex items-center gap-1">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <span class="text-sm font-bold text-gray-900">4.0</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-teal-700 transition-colors">RS Bethesda</h3>
                            
                            <div class="flex items-center mb-4">
                                <div class="flex gap-1 mr-3">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-gray-300"></i>
                                </div>
                                <span class="text-lg font-semibold text-gray-700">4.0/5.0</span>
                            </div>
                            
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                Hospital with a long history and trusted health services in Yogyakarta.
                            </p>
                            
                            <div class="flex items-center mb-8 text-gray-600">
                                <i data-lucide="map-pin" class="w-5 h-5 mr-3 text-teal-600 flex-shrink-0"></i>
                                <span class="text-sm">Jl. Jendral Sudirman No. 70, Yogyakarta</span>
                            </div>
                            
                            @guest
                                <a href="{{ route('login') }}" class="group/btn inline-flex items-center justify-center w-full px-6 py-4 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-xl shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:scale-105">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                                    <span class="ml-2 text-sm opacity-80"></span>
                                </a>
                            @else
                                <a href="{{ route('hospital.general') }}" class="group/btn inline-flex items-center justify-center w-full px-6 py-4 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-xl shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:scale-105">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Tours Tab -->
            <div x-show="activeTab === 'tours'" 
                 x-transition:enter="transition ease-out duration-500" 
                 x-transition:enter-start="opacity-0 transform scale-95" 
                 x-transition:enter-end="opacity-100 transform scale-100">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <!-- Borobudur Temple -->
                    <div class="group overflow-hidden bg-white/90 backdrop-blur-sm border-0 shadow-xl hover:shadow-2xl hover:shadow-teal-500/10 transition-all duration-700 transform hover:-translate-y-4 hover:rotate-1 rounded-3xl" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/Borobudur Temple.jpg') }}" 
     alt="RS Panti Rapih" 
     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            
                            <div class="absolute top-4 left-4">
                                <div class="flex items-center px-4 py-2 bg-teal-600/90 backdrop-blur-sm text-white rounded-full text-sm font-semibold shadow-lg">
                                    <i data-lucide="trees" class="w-4 h-4 mr-2"></i>
                                    Nature Tourism
                                </div>
                            </div>
                            
                            <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm rounded-full px-3 py-2 shadow-lg">
                                <div class="flex items-center gap-1">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <span class="text-sm font-bold text-gray-900">5.0</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-teal-700 transition-colors">Borobudur Temple</h3>
                            
                            <div class="flex items-center mb-4">
                                <div class="flex gap-1 mr-3">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                </div>
                                <span class="text-lg font-semibold text-gray-700">5.0/5.0</span>
                            </div>
                            
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                The world's largest Buddhist temple, a UNESCO World Heritage site.
                            </p>
                            
                            <div class="flex items-center mb-8 text-gray-600">
                                <i data-lucide="map-pin" class="w-5 h-5 mr-3 text-teal-600 flex-shrink-0"></i>
                                <span class="text-sm">Magelang, Central Java</span>
                            </div>
                            
                            @guest
                                <a href="{{ route('login') }}" class="group/btn inline-flex items-center justify-center w-full px-6 py-4 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-xl shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:scale-105">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                                    <span class="ml-2 text-sm opacity-80"></span>
                                </a>
                            @else
                                <a href="{{ route('tour.nature') }}" class="group/btn inline-flex items-center justify-center w-full px-6 py-4 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-xl shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:scale-105">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                                </a>
                            @endguest
                        </div>
                    </div>

                    <!-- Malioboro -->
                    <div class="group overflow-hidden bg-white/90 backdrop-blur-sm border-0 shadow-xl hover:shadow-2xl hover:shadow-teal-500/10 transition-all duration-700 transform hover:-translate-y-4 hover:rotate-1 rounded-3xl" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/Malioboro.jpg') }}" 
     alt="RS Panti Rapih" 
     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            
                            <div class="absolute top-4 left-4">
                                <div class="flex items-center px-4 py-2 bg-teal-600/90 backdrop-blur-sm text-white rounded-full text-sm font-semibold shadow-lg">
                                    <i data-lucide="utensils" class="w-4 h-4 mr-2"></i>
                                    Culinary Tourism
                                </div>
                            </div>
                            
                            <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm rounded-full px-3 py-2 shadow-lg">
                                <div class="flex items-center gap-1">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <span class="text-sm font-bold text-gray-900">4.5</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-teal-700 transition-colors">Malioboro</h3>
                            
                            <div class="flex items-center mb-4">
                                <div class="flex gap-1 mr-3">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current opacity-50"></i>
                                </div>
                                <span class="text-lg font-semibold text-gray-700">4.5/5.0</span>
                            </div>
                            
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                Iconic street in Yogyakarta with various local culinary delights and souvenir centers.
                            </p>
                            
                            <div class="flex items-center mb-8 text-gray-600">
                                <i data-lucide="map-pin" class="w-5 h-5 mr-3 text-teal-600 flex-shrink-0"></i>
                                <span class="text-sm">Jl. Malioboro, Yogyakarta</span>
                            </div>
                            
                            @guest
                                <a href="{{ route('login') }}" class="group/btn inline-flex items-center justify-center w-full px-6 py-4 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-xl shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:scale-105">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                                    <span class="ml-2 text-sm opacity-80"></span>
                                </a>
                            @else
                                <a href="{{ route('tour.culinary') }}" class="group/btn inline-flex items-center justify-center w-full px-6 py-4 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-xl shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:scale-105">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                                </a>
                            @endguest
                        </div>
                    </div>

                    <!-- Taman Pintar -->
                    <div class="group overflow-hidden bg-white/90 backdrop-blur-sm border-0 shadow-xl hover:shadow-2xl hover:shadow-teal-500/10 transition-all duration-700 transform hover:-translate-y-4 hover:rotate-1 rounded-3xl" data-aos="fade-up" data-aos-delay="200">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('images/RS Sardjito.jpg') }}" 
     alt="RS Panti Rapih" 
     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                            
                            <div class="absolute top-4 left-4">
                                <div class="flex items-center px-4 py-2 bg-teal-600/90 backdrop-blur-sm text-white rounded-full text-sm font-semibold shadow-lg">
                                    <i data-lucide="users" class="w-4 h-4 mr-2"></i>
                                    Family Tourism
                                </div>
                            </div>
                            
                            <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm rounded-full px-3 py-2 shadow-lg">
                                <div class="flex items-center gap-1">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <span class="text-sm font-bold text-gray-900">4.0</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-teal-700 transition-colors">Taman Pintar</h3>
                            
                            <div class="flex items-center mb-4">
                                <div class="flex gap-1 mr-3">
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-yellow-400 fill-current"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-gray-300"></i>
                                </div>
                                <span class="text-lg font-semibold text-gray-700">4.0/5.0</span>
                            </div>
                            
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                Interactive educational park suitable for family vacations with children.
                            </p>
                            
                            <div class="flex items-center mb-8 text-gray-600">
                                <i data-lucide="map-pin" class="w-5 h-5 mr-3 text-teal-600 flex-shrink-0"></i>
                                <span class="text-sm">Jl. Panembahan Senopati No. 1-3, Yogyakarta</span>
                            </div>
                            
                            @guest
                                <a href="{{ route('login') }}" class="group/btn inline-flex items-center justify-center w-full px-6 py-4 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-xl shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:scale-105">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                                    <span class="ml-2 text-sm opacity-80"></span>
                                </a>
                            @else
                                <a href="{{ route('tour.family') }}" class="group/btn inline-flex items-center justify-center w-full px-6 py-4 font-semibold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 hover:from-teal-600 hover:to-teal-700 rounded-xl shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:scale-105">
                                    <span>View Details</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover/btn:translate-x-1 transition-transform"></i>
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center mt-16" data-aos="fade-up">
            @guest
                <a href="{{ route('login') }}" class="inline-flex items-center px-8 py-4 font-semibold text-teal-600 border-2 border-teal-200 hover:bg-teal-50 hover:border-teal-300 rounded-xl transition-all duration-300 group backdrop-blur-sm bg-white/80">
                    View All Recommendations 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                    <span class="ml-2 text-sm opacity-80"></span>
                </a>
            @else
                <a href="{{ route('hospital.general') }}" class="inline-flex items-center px-8 py-4 font-semibold text-teal-600 border-2 border-teal-200 hover:bg-teal-50 hover:border-teal-300 rounded-xl transition-all duration-300 group backdrop-blur-sm bg-white/80">
                    View All Recommendations 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            @endguest
        </div>
    </div>
</section>

<!-- Enhanced Testimonials Section with Professional Design -->
<section class="py-32 bg-gradient-to-br from-[#13363e] to-[#303d40] relative overflow-hidden"> 
    <!-- Subtle Animated Background -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.1"%3E%3Cpath d="m36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        <div class="absolute top-20 left-20 w-96 h-96 bg-gradient-to-r from-primary-500/10 to-primary-600/10 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-gradient-to-r from-primary-400/10 to-primary-500/10 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-2000"></div>
    </div>

    <div class="container px-4 mx-auto relative z-10">
        <!-- Professional Section Header -->
        <div class="max-w-4xl mx-auto mb-20 text-center" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center px-6 py-3 mb-6 text-sm font-bold rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white">
                <div class="w-2 h-2 bg-primary-400 rounded-full mr-3 animate-pulse"></div>
                User Testimonials
            </div>
            <h2 class="mb-6 text-5xl font-black text-white md:text-6xl">
                What Our Users
                <span class="block text-primary-400">Are Saying</span>
            </h2>
            <p class="text-xl text-gray-300 leading-relaxed">
                Real experiences from thousands of satisfied users across Indonesia
            </p>
        </div>

        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3">
            <!-- Enhanced Testimonial Cards -->
            <div class="group relative p-8 bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 hover:border-primary-500/50 shadow-2xl hover:shadow-primary-500/25 transition-all duration-500 transform hover:-translate-y-4" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute inset-0 bg-gradient-to-br from-primary-500/10 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative z-10">
                    <!-- User Profile -->
                    <div class="flex items-center mb-6">
                        <div class="relative w-16 h-16 mr-4">
                            <img src="{{ asset('images/testimonial-1.jpg') }}" alt="Testimonial" 
                                 class="object-cover w-full h-full rounded-2xl shadow-lg"
                                 onerror="this.onerror=null; this.src='https://randomuser.me/api/portraits/men/32.jpg';">
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 rounded-full border-2 border-white flex items-center justify-center">
                                <i data-lucide="check" class="w-3 h-3 text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white">Budi Santoso</h4>
                            <p class="text-primary-300">Yogyakarta • Verified User</p>
                        </div>
                    </div>
                    
                    <!-- Enhanced Rating -->
                    <div class="flex items-center mb-6">
                        <div class="flex text-yellow-400 mr-3">
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                        </div>
                        <span class="text-white font-bold">5.0</span>
                    </div>
                    
                    <blockquote class="text-gray-300 text-lg leading-relaxed italic">
                        "HappyCare greatly helped me find a hospital with the best specialist doctors for my parents' treatment. The information is complete and accurate!"
                    </blockquote>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="group relative p-8 bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 hover:border-primary-500/50 shadow-2xl hover:shadow-primary-500/25 transition-all duration-500 transform hover:-translate-y-4" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute inset-0 bg-gradient-to-br from-primary-500/10 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center mb-6">
                        <div class="relative w-16 h-16 mr-4">
                            <img src="{{ asset('images/testimonial-2.jpg') }}" alt="Testimonial" 
                                 class="object-cover w-full h-full rounded-2xl shadow-lg"
                                 onerror="this.onerror=null; this.src='https://randomuser.me/api/portraits/women/44.jpg';">
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 rounded-full border-2 border-white flex items-center justify-center">
                                <i data-lucide="check" class="w-3 h-3 text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white">Siti Rahayu</h4>
                            <p class="text-primary-300">Jakarta • Verified User</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center mb-6">
                        <div class="flex text-yellow-400 mr-3">
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star-half" class="w-5 h-5 fill-current"></i>
                        </div>
                        <span class="text-white font-bold">4.5</span>
                    </div>
                    
                    <blockquote class="text-gray-300 text-lg leading-relaxed italic">
                        "Thanks to HappyCare, our family vacation in Yogyakarta was better planned. The family tourism recommendations are perfect for children!"
                    </blockquote>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="group relative p-8 bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 hover:border-primary-500/50 shadow-2xl hover:shadow-primary-500/25 transition-all duration-500 transform hover:-translate-y-4" data-aos="fade-up" data-aos-delay="300">
                <div class="absolute inset-0 bg-gradient-to-br from-primary-500/10 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center mb-6">
                        <div class="relative w-16 h-16 mr-4">
                            <img src="{{ asset('images/testimonial-3.jpg') }}" alt="Testimonial" 
                                 class="object-cover w-full h-full rounded-2xl shadow-lg"
                                 onerror="this.onerror=null; this.src='https://randomuser.me/api/portraits/men/67.jpg';">
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 rounded-full border-2 border-white flex items-center justify-center">
                                <i data-lucide="check" class="w-3 h-3 text-white"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-white">Agus Wijaya</h4>
                            <p class="text-primary-300">Surabaya • Verified User</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center mb-6">
                        <div class="flex text-yellow-400 mr-3">
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <i data-lucide="star" class="w-5 h-5"></i>
                        </div>
                        <span class="text-white font-bold">4.0</span>
                    </div>
                    
                    <blockquote class="text-gray-300 text-lg leading-relaxed italic">
                        "When I had an accident in Yogyakarta, HappyCare helped me quickly find the nearest ER. Very helpful in an emergency!"
                    </blockquote>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center" data-aos="fade-up">
            @guest
                <a href="{{ route('login') }}" class="inline-flex items-center px-8 py-4 font-semibold text-white transition-all duration-300 transform rounded-lg bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 hover:scale-105 shadow-lg hover:shadow-xl group">
                    <i data-lucide="star" class="w-5 h-5 mr-2"></i>
                    View All Testimonials <i data-lucide="arrow-right" class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1"></i>
                </a>
            @else
                <a href="{{ route('testimonials.index') }}" class="inline-flex items-center px-8 py-4 font-semibold text-white transition-all duration-300 transform rounded-lg bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 hover:scale-105 shadow-lg hover:shadow-xl group">
                    <i data-lucide="star" class="w-5 h-5 mr-2"></i>
                    View All Testimonials <i data-lucide="arrow-right" class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1"></i>
                </a>
            @endguest
        </div>
    </div>
</section>

<!-- Enhanced CTA Section with Professional Design -->
<section class="py-24 bg-gradient-to-br from-teal-500 via-white to-teal-300 relative overflow-hidden">    <!-- Professional Animated Background -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-full h-full opacity-20">
            <div class="absolute top-20 left-20 w-72 h-72 bg-white rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
            <div class="absolute bottom-20 right-20 w-72 h-72 bg-secondary-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-primary-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
        </div>
    </div>

    <div class="container px-4 mx-auto relative z-10">
        <div class="max-w-5xl mx-auto text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="mb-8 text-6xl font-black text-black md:text-7xl leading-tight">
                Explore Yogyakarta with
                <span class="block text-blue-400">HappyCare</span>
            </h2>
            
            <p class="mb-12 text-2xl text-blue/90 leading-relaxed font-light max-w-3xl mx-auto">
                Discover the best health services and exciting tourist destinations on one platform
            </p>
            
            <div class="flex flex-wrap justify-center gap-8">
                @guest
                    <a href="{{ route('login') }}" class="group relative px-10 py-6 font-black text-2xl text-primary-900 transition-all duration-300 bg-white rounded-3xl hover:shadow-2xl hover:shadow-white/25 transform hover:-translate-y-2 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-400/20 to-primary-500/20 rounded-3xl blur opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative flex items-center">
                            <i data-lucide="stethoscope" class="w-8 h-8 mr-4"></i>
                            Health Services
                        </div>
                    </a>
                    <a href="{{ route('login') }}" class="group relative px-10 py-6 font-black text-2xl transition-all duration-300 border-4 border-white/30 rounded-3xl text-white backdrop-blur-sm hover:bg-white/10 hover:border-white/50 transform hover:-translate-y-2 hover:scale-105">
                        <div class="flex items-center">
                            <i data-lucide="map" class="w-8 h-8 mr-4"></i>
                            Tourist Destinations
                        </div>
                    </a>
                @else
                    <a href="{{ route('hospital.general') }}" class="group relative px-10 py-6 font-black text-2xl text-primary-900 transition-all duration-300 bg-white rounded-3xl hover:shadow-2xl hover:shadow-white/25 transform hover:-translate-y-2 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-400/20 to-primary-500/20 rounded-3xl blur opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative flex items-center">
                            <i data-lucide="stethoscope" class="w-8 h-8 mr-4"></i>
                            Health Services
                        </div>
                    </a>
                    <a href="{{ route('tour.nature') }}" class="group relative px-10 py-6 font-black text-2xl transition-all duration-300 border-4 border-white/30 rounded-3xl text-white backdrop-blur-sm hover:bg-white/10 hover:border-white/50 transform hover:-translate-y-2 hover:scale-105">
                        <div class="flex items-center">
                            <i data-lucide="map" class="w-8 h-8 mr-4"></i>
                            Tourist Destinations
                        </div>
                    </a>
                @endguest
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    
    @keyframes fade-in {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .animate-blob { animation: blob 7s infinite; }
    .animate-fade-in { animation: fade-in 1s ease-out; }
    .animate-float { animation: float 3s ease-in-out infinite; }
    .animate-bounce-slow { animation: bounce-slow 2s ease-in-out infinite; }
    .animate-spin-slow { animation: spin-slow 3s linear infinite; }
    
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }
    .animation-delay-500 { animation-delay: 0.5s; }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide Icons
        lucide.createIcons();
        
        // Add parallax effect to floating elements
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelectorAll('.parallax');
            const speed = 0.5;
            
            parallax.forEach(element => {
                const yPos = -(scrolled * speed);
                element.style.transform = `translateY(${yPos}px)`;
            });
        });
    });
</script>
@endpush
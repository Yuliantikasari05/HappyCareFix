@extends('layouts.app')

@section('title', 'Tentang Kami - HappyCare')

@section('content')
<!-- Hero Section -->
<section class="relative h-96 overflow-hidden">
    <!-- Background Image with Parallax Effect -->
    <div class="absolute inset-0 bg-gradient-to-r from-cyan-900/90 to-slate-900/80">
        <div class="absolute inset-0 bg-cover bg-center bg-fixed" style="background-image: url('{{ asset('images/about-hero.jpg') }}')"></div>
    </div>
    
    <!-- Hero Content -->
    <div class="relative z-10 flex items-center justify-center h-full">
        <div class="container px-4 mx-auto text-center">
            <div class="max-w-3xl mx-auto" data-aos="fade-up">
                <h1 class="mb-6 text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white to-cyan-100 md:text-5xl">
                    Tentang HappyCare
                </h1>
                <p class="text-xl text-white/90 md:text-2xl" data-aos="fade-up" data-aos-delay="200">
                    Menggabungkan kesehatan dan kebahagiaan melalui layanan terpadu
                </p>
                
                <!-- Breadcrumb -->
                <nav class="flex justify-center mt-8" aria-label="Breadcrumb" data-aos="fade-up" data-aos-delay="400">
                    <ol class="flex items-center space-x-2 text-white/80">
                        <li>
                            <a href="{{ route('home') }}" class="hover:text-white transition-colors">
                                <i data-lucide="home" class="w-4 h-4"></i>
                            </a>
                        </li>
                        <li>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                        </li>
                        <li class="text-cyan-300 font-medium">Tentang Kami</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- About Introduction -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50">
    <div class="container px-4 mx-auto">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
            <h2 class="mb-6 text-3xl font-bold text-gray-900 md:text-4xl">
                Tentang <span class="text-cyan-600">HappyCare</span>
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-cyan-500 to-emerald-500 rounded-full"></div>
            
            <div class="space-y-6 text-lg text-gray-600 leading-relaxed">
                <p data-aos="fade-up" data-aos-delay="100">
                    HappyCare adalah platform yang menggabungkan dua hal penting dalam hidup: <strong class="text-gray-900">kesehatan dan kebahagiaan</strong> melalui wisata.
                </p>
                <p data-aos="fade-up" data-aos-delay="200">
                    Kami percaya bahwa gaya hidup sehat tidak hanya datang dari perawatan medis, tetapi juga dari pikiran yang bahagia dan hati yang tenang. Melalui HappyCare, kami menghadirkan informasi terpercaya tentang layanan kesehatan serta rekomendasi destinasi wisata untuk Anda dan keluarga.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- What We Offer -->
<section class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Apa yang Kami <span class="text-cyan-600">Tawarkan</span>?
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-cyan-500 to-emerald-500 rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
            <!-- Health Services -->
            <div class="group" data-aos="fade-right" data-aos-delay="100">
                <div class="relative p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 border border-cyan-100 hover:border-cyan-200 overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute top-0 right-0 w-32 h-32 opacity-5 transform rotate-12 translate-x-8 -translate-y-8">
                        <i data-lucide="heart-pulse" class="w-full h-full text-cyan-600"></i>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-gradient-to-br from-cyan-500 to-cyan-600 group-hover:scale-110 transition-transform duration-300">
                            <i data-lucide="hospital" class="w-8 h-8 text-white"></i>
                        </div>
                        
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Layanan Kesehatan</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-4 p-3 rounded-lg hover:bg-cyan-50 transition-colors">
                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-cyan-100 flex-shrink-0">
                                    <span class="text-lg">🏥</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">General Hospital</h4>
                                    <p class="text-gray-600">Rumah sakit umum terdekat dengan pelayanan terbaik.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 p-3 rounded-lg hover:bg-cyan-50 transition-colors">
                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-cyan-100 flex-shrink-0">
                                    <span class="text-lg">🏥</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Specialist Clinic</h4>
                                    <p class="text-gray-600">Klinik spesialis dengan tenaga medis profesional.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 p-3 rounded-lg hover:bg-cyan-50 transition-colors">
                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-cyan-100 flex-shrink-0">
                                    <span class="text-lg">🚑</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Emergency</h4>
                                    <p class="text-gray-600">Kontak darurat dan panduan penanganan medis cepat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tour Services -->
            <div class="group" data-aos="fade-left" data-aos-delay="200">
                <div class="relative p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 border border-emerald-100 hover:border-emerald-200 overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute top-0 right-0 w-32 h-32 opacity-5 transform rotate-12 translate-x-8 -translate-y-8">
                        <i data-lucide="map" class="w-full h-full text-emerald-600"></i>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 group-hover:scale-110 transition-transform duration-300">
                            <i data-lucide="map-pin" class="w-8 h-8 text-white"></i>
                        </div>
                        
                        <h3 class="mb-6 text-2xl font-bold text-gray-900">Panduan Wisata</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-4 p-3 rounded-lg hover:bg-emerald-50 transition-colors">
                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-emerald-100 flex-shrink-0">
                                    <span class="text-lg">🌿</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Nature</h4>
                                    <p class="text-gray-600">Wisata alam yang menenangkan seperti pantai, gunung, dan hutan.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 p-3 rounded-lg hover:bg-emerald-50 transition-colors">
                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-emerald-100 flex-shrink-0">
                                    <span class="text-lg">🍴</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Culinary</h4>
                                    <p class="text-gray-600">Jelajahi kuliner khas dari berbagai daerah.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 p-3 rounded-lg hover:bg-emerald-50 transition-colors">
                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-emerald-100 flex-shrink-0">
                                    <span class="text-lg">👨‍👩‍👧‍👦</span>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Family</h4>
                                    <p class="text-gray-600">Destinasi liburan yang ramah anak dan keluarga.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="py-24 bg-gradient-to-br from-cyan-50 via-white to-emerald-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%2300bcd4&quot; fill-opacity=&quot;0.3&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    </div>
    
    <div class="container px-4 mx-auto relative">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
            <h2 class="mb-6 text-3xl font-bold text-gray-900 md:text-4xl">
                Misi <span class="text-cyan-600">Kami</span>
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-cyan-500 to-emerald-500 rounded-full"></div>
            
            <div class="p-12 bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-white/50" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-8 rounded-full bg-gradient-to-br from-cyan-500 to-emerald-500">
                    <i data-lucide="target" class="w-10 h-10 text-white"></i>
                </div>
                
                <p class="text-xl text-gray-700 leading-relaxed">
                    Menjadi sumber informasi terpercaya dan inspiratif dalam bidang kesehatan dan wisata, serta mendorong masyarakat untuk menjalani hidup yang seimbang antara <strong class="text-cyan-600">fisik</strong>, <strong class="text-emerald-600">mental</strong>, dan <strong class="text-purple-600">sosial</strong>.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Tim Pengembang <span class="text-cyan-600">HappyCare</span>
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-cyan-500 to-emerald-500 rounded-full"></div>
            <p class="text-lg text-gray-600">
                Berikut adalah anggota <strong class="text-gray-900">Kelompok 8</strong> yang mengembangkan proyek ini sebagai bagian dari tugas kuliah:
            </p>
        </div>
        
        @php
            $team = [
                ['name' => 'Yuli Antika Sari', 'npm' => '2311501063', 'photo' => 'yuli.jpg', 'role' => 'Project Manager'],
                ['name' => 'Dentri Seviana', 'npm' => '2311501045', 'photo' => 'dentri.jpg', 'role' => 'System Analyst'],
                ['name' => 'Hanna Usyaroh N', 'npm' => '2311501023', 'photo' => 'hanna.jpg', 'role' => 'System Analyst'],
                ['name' => 'Arif Rahman', 'npm' => '2311501003', 'photo' => 'arif.jpg', 'role' => 'Programmer'],
                ['name' => 'Sindi Setiawati', 'npm' => '2311501055', 'photo' => 'sindi.jpg', 'role' => 'Programmer'],
                ['name' => 'Dzunnuroit Bahrun', 'npm' => '2311501004', 'photo' => 'dzun.jpg', 'role' => 'Programmer & Testing'],
            ];
        @endphp
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach($team as $index => $member)
            <div class="group" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2">
                    <!-- Image Container -->
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/team/' . $member['photo']) }}" 
                             alt="{{ $member['name'] }}" 
                             class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                        
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- Social Links -->
                        <div class="absolute bottom-4 left-4 right-4 flex justify-center space-x-3 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                            <a href="#" class="flex items-center justify-center w-8 h-8 bg-white/20 backdrop-blur-sm rounded-full hover:bg-white/30 transition-colors">
                                <i data-lucide="linkedin" class="w-4 h-4 text-white"></i>
                            </a>
                            <a href="#" class="flex items-center justify-center w-8 h-8 bg-white/20 backdrop-blur-sm rounded-full hover:bg-white/30 transition-colors">
                                <i data-lucide="github" class="w-4 h-4 text-white"></i>
                            </a>
                            <a href="#" class="flex items-center justify-center w-8 h-8 bg-white/20 backdrop-blur-sm rounded-full hover:bg-white/30 transition-colors">
                                <i data-lucide="mail" class="w-4 h-4 text-white"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6 text-center">
                        <h3 class="mb-2 text-xl font-bold text-gray-900">{{ $member['name'] }}</h3>
                        <p class="mb-2 text-sm font-medium text-cyan-600">{{ $member['role'] }}</p>
                        <p class="text-sm text-gray-500">NIM: {{ $member['npm'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Nilai-Nilai <span class="text-cyan-600">Kami</span>
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-cyan-500 to-emerald-500 rounded-full"></div>
            <p class="text-lg text-gray-600">
                Apa yang menjadi fondasi dalam setiap layanan dan informasi yang kami berikan:
            </p>
        </div>
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Integrity -->
            <div class="group text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="relative p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-cyan-100 hover:border-cyan-200">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-gradient-to-br from-cyan-500 to-cyan-600 group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="heart-pulse" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Integritas</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Transparan dan dapat dipercaya dalam menyajikan informasi kesehatan dan wisata.
                    </p>
                </div>
            </div>
            
            <!-- Happiness -->
            <div class="group text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="relative p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-amber-100 hover:border-amber-200">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-gradient-to-br from-amber-500 to-amber-600 group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="smile" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Kebahagiaan</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Mengutamakan kesejahteraan fisik dan mental pengguna melalui gaya hidup seimbang.
                    </p>
                </div>
            </div>
            
            <!-- Care -->
            <div class="group text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="relative p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-emerald-100 hover:border-emerald-200">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-6 rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="hands-helping" class="w-10 h-10 text-white"></i>
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Kepedulian</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Memberi solusi dan dukungan nyata untuk hidup yang lebih sehat dan bermakna.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 bg-gradient-to-br from-cyan-50 via-white to-emerald-50">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Testimoni <span class="text-cyan-600">Pengguna</span>
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-cyan-500 to-emerald-500 rounded-full"></div>
            <p class="text-lg text-gray-600">
                Apa kata mereka tentang HappyCare
            </p>
        </div>
        
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <!-- Testimonial 1 -->
            <div class="group" data-aos="fade-up" data-aos-delay="100">
                <div class="relative p-8 bg-white/80 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 border border-white/50">
                    <div class="flex items-center justify-center w-12 h-12 mb-6 rounded-full bg-cyan-100">
                        <i data-lucide="quote" class="w-6 h-6 text-cyan-600"></i>
                    </div>
                    
                    <p class="mb-6 text-gray-700 italic leading-relaxed">
                        "HappyCare membantu saya merencanakan liburan sekaligus menjaga kesehatan keluarga. Informasinya lengkap dan sangat bermanfaat!"
                    </p>
                    
                    <div class="flex items-center">
                        <div class="w-12 h-12 mr-4 overflow-hidden rounded-full">
                            <img src="{{ asset('images/testimonial-1.jpg') }}" alt="Rina" class="object-cover w-full h-full">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Rina</h4>
                            <p class="text-sm text-gray-500">Ibu Rumah Tangga</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="group" data-aos="fade-up" data-aos-delay="200">
                <div class="relative p-8 bg-white/80 backdrop-blur-sm rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 border border-white/50">
                    <div class="flex items-center justify-center w-12 h-12 mb-6 rounded-full bg-emerald-100">
                        <i data-lucide="quote" class="w-6 h-6 text-emerald-600"></i>
                    </div>
                    
                    <p class="mb-6 text-gray-700 italic leading-relaxed">
                        "Informasi kesehatannya lengkap dan mudah dipahami. Sangat membantu untuk mahasiswa seperti saya yang sering bepergian!"
                    </p>
                    
                    <div class="flex items-center">
                        <div class="w-12 h-12 mr-4 overflow-hidden rounded-full">
                            <img src="{{ asset('images/testimonial-2.jpg') }}" alt="Andi" class="object-cover w-full h-full">
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">Andi</h4>
                            <p class="text-sm text-gray-500">Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-r from-cyan-600 to-emerald-600 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.3&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    </div>
    
    <div class="container px-4 mx-auto relative">
        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">
            <h3 class="mb-6 text-3xl font-bold text-white md:text-4xl">
                Ingin tahu lebih banyak tentang layanan kami?
            </h3>
            <p class="mb-8 text-xl text-white/90 leading-relaxed">
                Hubungi kami atau telusuri fitur-fitur lengkap HappyCare!
            </p>
            
            <div class="flex flex-col items-center justify-center space-y-4 sm:flex-row sm:space-y-0 sm:space-x-6" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 text-lg font-semibold text-cyan-600 bg-white rounded-full hover:bg-gray-50 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                    <i data-lucide="phone" class="w-5 h-5 mr-2"></i>
                    Hubungi Kami
                </a>
                <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-4 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-cyan-600 transition-all duration-300 hover:scale-105">
                    <i data-lucide="user-plus" class="w-5 h-5 mr-2"></i>
                    Daftar Sekarang
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
        
        // Parallax effect for hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.bg-fixed');
            if (parallax) {
                const speed = scrolled * 0.5;
                parallax.style.transform = `translateY(${speed}px)`;
            }
        });
        
        // Counter animation for stats (if needed)
        const observerOptions = {
            threshold: 0.7
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Add any counter animations here
                }
            });
        }, observerOptions);
        
        // Smooth reveal animations
        const revealElements = document.querySelectorAll('[data-aos]');
        revealElements.forEach(el => {
            observer.observe(el);
        });
    });
</script>
@endpush
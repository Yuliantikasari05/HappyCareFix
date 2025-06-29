<header x-data="{ mobileMenuOpen: false, searchOpen: false, userMenuOpen: false }" class="sticky top-0 z-40 w-full bg-white border-b border-gray-200">
    <div class="container px-4 mx-auto">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="HappyCare Logo" class="w-auto h-8" 
                         onerror="this.onerror=null; this.src='data:image/svg+xml;charset=utf-8,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' width=\'36\' height=\'36\' fill=\'none\' stroke=\'%2306b6d4\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'%3E%3Cpath d=\'M22 12h-4l-3 9L9 3l-3 9H2\'/%3E%3C/svg%3E';">
                    <span class="ml-2 text-xl font-bold text-gray-900">HappyCare</span>
                </a>
            </div> 

            <!-- Desktop Navigation -->
            <nav class="hidden space-x-8 md:flex">
                <a href="{{ route('home') }}" class="flex items-center text-sm font-medium transition-colors text-primary-600 hover:text-primary-700">
                    <i data-lucide="home" class="w-4 h-4 mr-1"></i>
                    Beranda
                </a>
                
                <!-- Healthcare Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false" class="flex items-center text-sm font-medium transition-colors text-gray-600 hover:text-primary-600">
                        <i data-lucide="stethoscope" class="w-4 h-4 mr-1"></i>
                        Layanan Kesehatan
                        <i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>
                    </button>
                    <div x-show="open" x-transition class="absolute left-0 z-10 w-56 mt-2 bg-white rounded-lg shadow-lg">
                        <div class="p-2">
                            <a href="{{ route('hospital.general') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                                <i data-lucide="building-hospital" class="w-4 h-4 mr-3 text-primary-600"></i>
                                Rumah Sakit Umum
                            </a>
                            <a href="{{ route('hospital.specialist_clinic') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                                <i data-lucide="stethoscope" class="w-4 h-4 mr-3 text-primary-600"></i>
                                Klinik Spesialis
                            </a>
                            <a href="{{ route('hospital.emergency') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                                <i data-lucide="siren" class="w-4 h-4 mr-3 text-primary-600"></i>
                                Unit Gawat Darurat
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Tourism Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false" class="flex items-center text-sm font-medium transition-colors text-gray-600 hover:text-primary-600">
                        <i data-lucide="map" class="w-4 h-4 mr-1"></i>
                        Wisata
                        <i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>
                    </button>
                    <div x-show="open" x-transition class="absolute left-0 z-10 w-56 mt-2 bg-white rounded-lg shadow-lg">
                        <div class="p-2">
                            <a href="{{ route('tour.nature') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                                <i data-lucide="trees" class="w-4 h-4 mr-3 text-primary-600"></i>
                                Wisata Alam
                            </a>
                            <a href="{{ route('tour.culinary') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                                <i data-lucide="utensils" class="w-4 h-4 mr-3 text-primary-600"></i>
                                Wisata Kuliner
                            </a>
                            <a href="{{ route('tour.family') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                                <i data-lucide="users" class="w-4 h-4 mr-3 text-primary-600"></i>
                                Wisata Keluarga
                            </a>
                        </div>
                    </div>
                </div>
                
                <a href="{{ route('about') }}" class="flex items-center text-sm font-medium transition-colors text-gray-600 hover:text-primary-600">
                    <i data-lucide="info" class="w-4 h-4 mr-1"></i>
                    Tentang Kami
                </a>
                
                <a href="{{ route('contact') }}" class="flex items-center text-sm font-medium transition-colors text-gray-600 hover:text-primary-600">
                    <i data-lucide="phone" class="w-4 h-4 mr-1"></i>
                    Kontak
                </a>

                <a href="{{ route('articles.index') }}" class="flex items-center text-sm font-medium transition-colors text-gray-600 hover:text-primary-600">
                    <i data-lucide="newspaper" class="w-4 h-4 mr-1"></i>
                    Article
                </a>

                <a href="{{ route('testimonials.index') }}" class="flex items-center text-sm font-medium transition-colors text-gray-600 hover:text-primary-600">
                    <i data-lucide="star" class="w-4 h-4 mr-1"></i>
                    Testimonial
                </a>
            </nav>

            <!-- Right Side Actions -->
            <div class="flex items-center space-x-4">
                {{-- <!-- Search Button -->
                <button @click="searchOpen = !searchOpen" class="p-2 text-gray-600 transition-colors rounded-lg hover:text-primary-600 hover:bg-gray-100">
                    <i data-lucide="search" class="w-5 h-5"></i>
                </button> --}}

                <!-- Emergency Button -->
                <a href="{{ route('hospital.emergency') }}" class="hidden px-4 py-2 text-sm font-semibold text-white transition-colors rounded-lg bg-red-600 hover:bg-red-700 md:inline-flex">
                    <i data-lucide="siren" class="w-4 h-4 mr-2"></i>
                    Darurat
                </a>

                <!-- Auth Buttons -->
                @auth
                    <!-- User Menu for Desktop -->
                    <div x-data="{ userMenuOpen: false }" class="relative hidden md:block">
                        <button @click="userMenuOpen = !userMenuOpen" @click.away="userMenuOpen = false" 
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors rounded-lg hover:bg-gray-100">
                            <div class="w-8 h-8 mr-2 overflow-hidden rounded-full bg-primary-100">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0ea5e9&color=fff" 
                                     alt="{{ Auth::user()->name }}" class="object-cover w-full h-full">
                            </div>
                            <span class="mr-2">{{ Auth::user()->name }}</span>
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </button>
                        
                        <div x-show="userMenuOpen" x-transition class="absolute right-0 z-10 w-56 mt-2 bg-white rounded-lg shadow-lg">
                            <div class="p-2">
                                <div class="px-4 py-2 border-b border-gray-100">
                                    <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                                </div>
                                <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                                    <i data-lucide="user" class="w-4 h-4 mr-3 text-primary-600"></i>
                                    Profil Saya
                                {{-- </a>
                                <a href="#" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                                    <i data-lucide="heart" class="w-4 h-4 mr-3 text-primary-600"></i>
                                    Favorit
                                </a>
                                <a href="#" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                                    <i data-lucide="settings" class="w-4 h-4 mr-3 text-primary-600"></i>
                                    Pengaturan
                                </a> --}}
                                <div class="border-t border-gray-100 mt-2 pt-2">
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                       class="flex items-center w-full px-4 py-2 text-sm text-red-600 rounded-lg hover:bg-red-50">
                                        <i data-lucide="log-out" class="w-4 h-4 mr-3"></i>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Login/Register Buttons for Guest -->
                    <div class="hidden space-x-2 md:flex">
                        <a href="{{ route('login') }}" class="flex items-center px-4 py-2 text-sm font-medium text-primary-600 transition-colors border border-primary-600 rounded-lg hover:bg-primary-50">
                            <i data-lucide="log-in" class="w-4 h-4 mr-2"></i>
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center px-4 py-2 text-sm font-medium text-white transition-colors rounded-lg bg-primary-600 hover:bg-primary-700">
                            <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i>
                            Register
                        </a>
                    </div>
                @endauth

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 text-gray-600 transition-colors rounded-lg md:hidden hover:text-primary-600 hover:bg-gray-100">
                    <i data-lucide="menu" class="w-5 h-5"></i>
                </button>
            </div>
        </div>

        <!-- Search Bar -->
        <div x-show="searchOpen" x-transition class="py-4 border-t border-gray-200">
            <div class="relative">
                <input type="text" placeholder="Cari rumah sakit, klinik, atau destinasi wisata..." 
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400"></i>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition class="py-4 border-t border-gray-200 md:hidden">
            <nav class="space-y-2">
                <a href="{{ route('home') }}" class="flex items-center px-4 py-2 text-sm font-medium rounded-lg text-primary-600 bg-primary-50">
                    <i data-lucide="home" class="w-4 h-4 mr-3"></i>
                    Beranda
                </a>
                
                <!-- Healthcare Section -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium text-left text-gray-600 rounded-lg hover:bg-gray-100">
                        <div class="flex items-center">
                            <i data-lucide="stethoscope" class="w-4 h-4 mr-3"></i>
                            Layanan Kesehatan
                        </div>
                        <i data-lucide="chevron-down" class="w-4 h-4"></i>
                    </button>
                    <div x-show="open" x-transition class="ml-4 space-y-1">
                        <a href="{{ route('hospital.general') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                            <i data-lucide="building-hospital" class="w-4 h-4 mr-3 text-primary-600"></i>
                            Rumah Sakit Umum
                        </a>
                        <a href="{{ route('hospital.specialist_clinic') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                            <i data-lucide="stethoscope" class="w-4 h-4 mr-3 text-primary-600"></i>
                            Klinik Spesialis
                        </a>
                        <a href="{{ route('hospital.emergency') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                            <i data-lucide="siren" class="w-4 h-4 mr-3 text-primary-600"></i>
                            Unit Gawat Darurat
                        </a>
                    </div>
                </div>
                
                <!-- Tourism Section -->
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium text-left text-gray-600 rounded-lg hover:bg-gray-100">
                        <div class="flex items-center">
                            <i data-lucide="map" class="w-4 h-4 mr-3"></i>
                            Wisata
                        </div>
                        <i data-lucide="chevron-down" class="w-4 h-4"></i>
                    </button>
                    <div x-show="open" x-transition class="ml-4 space-y-1">
                        <a href="{{ route('tour.nature') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                            <i data-lucide="trees" class="w-4 h-4 mr-3 text-primary-600"></i>
                            Wisata Alam
                        </a>
                        <a href="{{ route('tour.culinary') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                            <i data-lucide="utensils" class="w-4 h-4 mr-3 text-primary-600"></i>
                            Wisata Kuliner
                        </a>
                        <a href="{{ route('tour.family') }}" class="flex items-center px-4 py-2 text-sm rounded-lg hover:bg-gray-100">
                            <i data-lucide="users" class="w-4 h-4 mr-3 text-primary-600"></i>
                            Wisata Keluarga
                        </a>
                    </div>
                </div>
                
                <a href="{{ route('about') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100">
                    <i data-lucide="info" class="w-4 h-4 mr-3"></i>
                    Tentang Kami
                </a>
                
                <a href="{{ route('contact') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100">
                    <i data-lucide="phone" class="w-4 h-4 mr-3"></i>
                    Kontak
                </a>

                <a href="{{ route('articles.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100">
                    <i data-lucide="newspaper" class="w-4 h-4 mr-3"></i>
                    Article
                </a>

                <a href="{{ route('testimonials.index') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100">
                    <i data-lucide="star" class="w-4 h-4 mr-3"></i>
                    Testimonial
                </a>

                <!-- Auth Section for Mobile -->
                @auth
                    <div class="pt-4 mt-4 border-t border-gray-200">
                        <div class="flex items-center px-4 py-3 mb-3 bg-gray-50 rounded-lg">
                            <div class="w-10 h-10 mr-3 overflow-hidden rounded-full bg-primary-100">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0ea5e9&color=fff" 
                                     alt="{{ Auth::user()->name }}" class="object-cover w-full h-full">
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        
                        <a href="{{ route('profile') }}" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100">
                            <i data-lucide="user" class="w-4 h-4 mr-3"></i>
                            Profil Saya
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100">
                            <i data-lucide="heart" class="w-4 h-4 mr-3"></i>
                            Favorit
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100">
                            <i data-lucide="settings" class="w-4 h-4 mr-3"></i>
                            Pengaturan
                        </a>
                        
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" 
                           class="flex items-center w-full px-4 py-2 text-sm font-medium text-red-600 rounded-lg hover:bg-red-50">
                            <i data-lucide="log-out" class="w-4 h-4 mr-3"></i>
                            Logout
                        </a>
                    </div>
                @else
                    <div class="pt-4 mt-4 border-t border-gray-200">
                        <a href="{{ route('login') }}" class="flex items-center px-4 py-2 text-sm font-medium text-primary-600 rounded-lg hover:bg-primary-50">
                            <i data-lucide="log-in" class="w-4 h-4 mr-3"></i>
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-600">
                            <i data-lucide="user-plus" class="w-4 h-4 mr-3"></i>
                            Register
                        </a>
                    </div>
                @endauth
                
                <!-- Emergency Button for Mobile -->
                <a href="{{ route('hospital.emergency') }}" class="flex items-center px-4 py-2 text-sm font-semibold text-white rounded-lg bg-red-600">
                    <i data-lucide="siren" class="w-4 h-4 mr-3"></i>
                    Darurat
                </a>
            </nav>
        </div>

        <!-- Hidden Logout Forms -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide Icons
        lucide.createIcons();
    });
</script>

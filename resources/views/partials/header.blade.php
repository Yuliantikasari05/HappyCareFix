<header x-data="{ 
    mobileMenuOpen: false, 
    darkMode: localStorage.getItem('darkMode') === 'true' || false,
    scrolled: false
}" 
x-init="
    $watch('darkMode', value => {
        localStorage.setItem('darkMode', value);
        if (value) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    });
    if (darkMode) {
        document.documentElement.classList.add('dark');
    }
    window.addEventListener('scroll', () => {
        scrolled = window.scrollY > 20;
    });
"
:class="scrolled ? 'bg-white/80 backdrop-blur-md shadow-lg dark:bg-gray-900/80' : 'bg-white dark:bg-gray-900'"
class="sticky top-0 z-50 w-full transition-all duration-300 ease-in-out border-b border-gray-100 dark:border-gray-800">

    <div class="container mx-auto px-4 lg:px-6">
        <div class="flex items-center justify-between h-16 lg:h-18">
            
            <!-- Logo Section -->
            <div class="flex items-center flex-shrink-0">
                <a href="{{ route('home') }}" 
                   class="flex items-center group transition-all duration-300 ease-in-out hover:scale-105">
                    <div class="relative">
                        <div class="w-10 h-10 bg-gradient-to-br from-sky-400 to-sky-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-xl lg:text-2xl font-bold bg-gradient-to-r from-sky-600 to-sky-800 bg-clip-text text-transparent dark:from-sky-400 dark:to-sky-600">
                            HappyCare
                        </h1>
                        <p class="text-xs text-gray-500 dark:text-gray-400 -mt-1">Healthcare & Tourism</p>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-1">
                
                <!-- Home -->
                <a href="{{ route('home') }}" 
                   class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-xl transition-all duration-300 ease-in-out hover:text-sky-600 hover:bg-sky-50 dark:hover:bg-sky-900/20 dark:hover:text-sky-400 group">
                    <svg class="w-4 h-4 mr-2 transition-all duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Beranda
                </a>

                <!-- Health Services Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false"
                            class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-xl transition-all duration-300 ease-in-out hover:text-sky-600 hover:bg-sky-50 dark:hover:bg-sky-900/20 dark:hover:text-sky-400 group">
                        <svg class="w-4 h-4 mr-2 transition-all duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        Layanan Kesehatan
                        <svg class="w-4 h-4 ml-2 transition-all duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-1"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 translate-y-1"
                         class="absolute left-0 z-20 w-80 mt-2 bg-white/95 dark:bg-gray-800/95 backdrop-blur-md rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                        
                        <div class="p-2">
                            @auth
                                <a href="{{ route('hospital.general') }}" 
                                   class="flex items-center p-4 rounded-xl transition-all duration-300 ease-in-out hover:bg-sky-50 dark:hover:bg-sky-900/20 group">
                                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-sky-600 dark:group-hover:text-sky-400 transition-colors duration-300">
                                            Rumah Sakit Umum
                                        </h3>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Pelayanan kesehatan lengkap 24/7</p>
                                    </div>
                                </a>
                                
                                <a href="{{ route('hospital.specialist_clinic') }}" 
                                   class="flex items-center p-4 rounded-xl transition-all duration-300 ease-in-out hover:bg-sky-50 dark:hover:bg-sky-900/20 group">
                                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-sky-600 dark:group-hover:text-sky-400 transition-colors duration-300">
                                            Klinik Spesialis
                                        </h3>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Konsultasi dengan dokter ahli</p>
                                    </div>
                                </a>
                            @else
                                <div class="p-4 text-center">
                                    <div class="w-16 h-16 bg-gradient-to-br from-sky-400 to-sky-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Login Required</h3>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-4">Please login to access health services</p>
                                    <a href="{{ route('login') }}" 
                                       class="inline-flex items-center px-4 py-2 bg-sky-600 text-white text-xs font-medium rounded-lg hover:bg-sky-700 transition-colors duration-300">
                                        Login Now
                                    </a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Tourism Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.away="open = false"
                            class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-xl transition-all duration-300 ease-in-out hover:text-sky-600 hover:bg-sky-50 dark:hover:bg-sky-900/20 dark:hover:text-sky-400 group">
                        <svg class="w-4 h-4 mr-2 transition-all duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                        Wisata
                        <svg class="w-4 h-4 ml-2 transition-all duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95 translate-y-1"
                         x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                         x-transition:leave-end="opacity-0 transform scale-95 translate-y-1"
                         class="absolute left-0 z-20 w-80 mt-2 bg-white/95 dark:bg-gray-800/95 backdrop-blur-md rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                        
                        <div class="p-2">
                            @auth
                                <a href="{{ route('tour.nature') }}" 
                                   class="flex items-center p-4 rounded-xl transition-all duration-300 ease-in-out hover:bg-sky-50 dark:hover:bg-sky-900/20 group">
                                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-sky-600 dark:group-hover:text-sky-400 transition-colors duration-300">
                                            Wisata Alam
                                        </h3>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Jelajahi keindahan alam Indonesia</p>
                                    </div>
                                </a>
                                
                                <a href="{{ route('tour.culinary') }}" 
                                   class="flex items-center p-4 rounded-xl transition-all duration-300 ease-in-out hover:bg-sky-50 dark:hover:bg-sky-900/20 group">
                                    <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-sky-600 dark:group-hover:text-sky-400 transition-colors duration-300">
                                            Wisata Kuliner
                                        </h3>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Nikmati cita rasa nusantara</p>
                                    </div>
                                </a>
                            @else
                                <div class="p-4 text-center">
                                    <div class="w-16 h-16 bg-gradient-to-br from-sky-400 to-sky-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-2">Login Required</h3>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-4">Please login to access tourism services</p>
                                    <a href="{{ route('login') }}" 
                                       class="inline-flex items-center px-4 py-2 bg-sky-600 text-white text-xs font-medium rounded-lg hover:bg-sky-700 transition-colors duration-300">
                                        Login Now
                                    </a>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Other Menu Items -->
                @php
                    $menuItems = [
                        ['route' => 'about', 'label' => 'Tentang Kami', 'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['route' => 'contact', 'label' => 'Kontak', 'icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z'],
                        ['route' => 'articles.index', 'label' => 'Artikel', 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z'],
                        ['route' => 'testimonials.index', 'label' => 'Testimonial', 'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z']
                    ];
                @endphp

                @foreach($menuItems as $item)
                    @if(auth()->check())
                        <a href="{{ route($item['route']) }}" 
                           class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-xl transition-all duration-300 ease-in-out hover:text-sky-600 hover:bg-sky-50 dark:hover:bg-sky-900/20 dark:hover:text-sky-400 group">
                            <svg class="w-4 h-4 mr-2 transition-all duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                            </svg>
                            {{ $item['label'] }}
                        </a>
                    @else
                        <button onclick="window.location.href='{{ route('login') }}'" 
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-xl transition-all duration-300 ease-in-out hover:text-sky-600 hover:bg-sky-50 dark:hover:bg-sky-900/20 dark:hover:text-sky-400 group">
                            <svg class="w-4 h-4 mr-2 transition-all duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                            </svg>
                            {{ $item['label'] }}
                        </button>
                    @endif
                @endforeach
            </nav>

            <!-- Right Side Actions -->
            <div class="flex items-center space-x-3">
                
                <!-- Dark Mode Toggle -->
                <button @click="darkMode = !darkMode" 
                        class="hidden lg:flex items-center justify-center w-10 h-10 text-gray-500 dark:text-gray-400 rounded-xl transition-all duration-300 ease-in-out hover:text-sky-600 hover:bg-sky-50 dark:hover:bg-sky-900/20 dark:hover:text-sky-400">
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                    <svg x-show="darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </button>

                <!-- Emergency Button -->
                <a href="{{ route('hospital.emergency') }}" 
                   class="hidden lg:inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-red-500 to-red-600 rounded-xl shadow-lg transition-all duration-300 ease-in-out hover:from-red-600 hover:to-red-700 hover:shadow-xl hover:scale-105 animate-pulse">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    🚨 Darurat
                </a>

                @guest
                    <!-- Login/Register Buttons -->
                    <div class="hidden lg:flex items-center space-x-2">
                        <a href="{{ route('login') }}" 
                           class="flex items-center px-4 py-2 text-sm font-medium text-sky-600 dark:text-sky-400 border border-sky-200 dark:border-sky-800 rounded-xl transition-all duration-300 ease-in-out hover:bg-sky-50 dark:hover:bg-sky-900/20 hover:border-sky-300 dark:hover:border-sky-700 hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            🔐 Login
                        </a>
                        <a href="{{ route('register') }}" 
                           class="flex items-center px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-sky-500 to-sky-600 rounded-xl shadow-lg transition-all duration-300 ease-in-out hover:from-sky-600 hover:to-sky-700 hover:shadow-xl hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            👤 Sign Up
                        </a>
                    </div>
                @else
                    <!-- User Menu -->
                    <div x-data="{ userMenuOpen: false }" class="relative hidden lg:block">
                        <button @click="userMenuOpen = !userMenuOpen" @click.away="userMenuOpen = false" 
                                class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-xl transition-all duration-300 ease-in-out hover:bg-gray-50 dark:hover:bg-gray-800 group">
                            <div class="w-8 h-8 mr-3 overflow-hidden rounded-full bg-gradient-to-br from-sky-400 to-sky-600 ring-2 ring-sky-200 dark:ring-sky-800 group-hover:ring-sky-300 dark:group-hover:ring-sky-700 transition-all duration-300">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0284c7&color=fff&size=32" 
                                     alt="{{ Auth::user()->name }}" class="object-cover w-full h-full">
                            </div>
                            <span class="mr-2 font-medium">{{ Str::limit(Auth::user()->name, 12) }}</span>
                            <svg class="w-4 h-4 transition-all duration-300" :class="{ 'rotate-180': userMenuOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        
                        <div x-show="userMenuOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform scale-95 translate-y-1"
                             x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                             x-transition:leave-end="opacity-0 transform scale-95 translate-y-1"
                             class="absolute right-0 z-20 w-64 mt-2 bg-white/95 dark:bg-gray-800/95 backdrop-blur-md rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                            
                            <div class="p-2">
                                <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-700">
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                                </div>
                                
                                <a href="{{ route('profile') }}" 
                                   class="flex items-center px-4 py-3 text-sm text-gray-700 dark:text-gray-300 rounded-xl transition-all duration-300 ease-in-out hover:bg-sky-50 dark:hover:bg-sky-900/20 hover:text-sky-600 dark:hover:text-sky-400">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Profil Saya
                                </a>
                                
                                <div class="border-t border-gray-100 dark:border-gray-700 mt-2 pt-2">
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                       class="flex items-center w-full px-4 py-3 text-sm text-red-600 dark:text-red-400 rounded-xl transition-all duration-300 ease-in-out hover:bg-red-50 dark:hover:bg-red-900/20">
                                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endguest

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="lg:hidden flex items-center justify-center w-10 h-10 text-gray-500 dark:text-gray-400 rounded-xl transition-all duration-300 ease-in-out hover:text-sky-600 hover:bg-sky-50 dark:hover:bg-sky-900/20 dark:hover:text-sky-400">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform -translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-4"
             class="lg:hidden py-4 border-t border-gray-100 dark:border-gray-800 bg-white/95 dark:bg-gray-900/95 backdrop-blur-md">
            
            <nav class="space-y-2 px-4">
                <!-- Mobile Menu Items -->
                <a href="{{ route('home') }}" 
                   class="flex items-center px-4 py-3 text-sm font-medium text-sky-600 dark:text-sky-400 bg-sky-50 dark:bg-sky-900/20 rounded-xl">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Beranda
                </a>

                @foreach($menuItems as $item)
                    @if(auth()->check())
                        <a href="{{ route($item['route']) }}" 
                           class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-xl transition-all duration-300 ease-in-out hover:bg-sky-50 dark:hover:bg-sky-900/20 hover:text-sky-600 dark:hover:text-sky-400">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                            </svg>
                            {{ $item['label'] }}
                        </a>
                    @else
                        <button onclick="window.location.href='{{ route('login') }}'" 
                                class="flex items-center w-full px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-xl transition-all duration-300 ease-in-out hover:bg-sky-50 dark:hover:bg-sky-900/20 hover:text-sky-600 dark:hover:text-sky-400">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                            </svg>
                            {{ $item['label'] }}
                        </button>
                    @endif
                @endforeach

                <!-- Mobile Auth Section -->
                @guest
                    <div class="pt-4 mt-4 space-y-2 border-t border-gray-100 dark:border-gray-800">
                        <a href="{{ route('login') }}" 
                           class="flex items-center px-4 py-3 text-sm font-medium text-sky-600 dark:text-sky-400 border border-sky-200 dark:border-sky-800 rounded-xl transition-all duration-300 ease-in-out hover:bg-sky-50 dark:hover:bg-sky-900/20">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            🔐 Login
                        </a>
                        <a href="{{ route('register') }}" 
                           class="flex items-center px-4 py-3 text-sm font-medium text-white bg-gradient-to-r from-sky-500 to-sky-600 rounded-xl shadow-lg transition-all duration-300 ease-in-out hover:from-sky-600 hover:to-sky-700">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                            👤 Sign Up
                        </a>
                    </div>
                @else
                    <div class="pt-4 mt-4 border-t border-gray-100 dark:border-gray-800">
                        <div class="flex items-center px-4 py-4 mb-3 bg-gray-50 dark:bg-gray-800 rounded-xl">
                            <div class="w-12 h-12 mr-4 overflow-hidden rounded-full bg-gradient-to-br from-sky-400 to-sky-600 ring-2 ring-sky-200 dark:ring-sky-800">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0284c7&color=fff&size=48" 
                                     alt="{{ Auth::user()->name }}" class="object-cover w-full h-full">
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        
                        <a href="{{ route('profile') }}" 
                           class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-xl transition-all duration-300 ease-in-out hover:bg-sky-50 dark:hover:bg-sky-900/20 hover:text-sky-600 dark:hover:text-sky-400">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Profil Saya
                        </a>
                        
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" 
                           class="flex items-center w-full px-4 py-3 text-sm font-medium text-red-600 dark:text-red-400 rounded-xl transition-all duration-300 ease-in-out hover:bg-red-50 dark:hover:bg-red-900/20">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Logout
                        </a>
                    </div>
                @endauth
                
                <!-- Mobile Emergency Button -->
                <a href="{{ route('hospital.emergency') }}" 
                   class="flex items-center px-4 py-3 text-sm font-semibold text-white bg-gradient-to-r from-red-500 to-red-600 rounded-xl shadow-lg transition-all duration-300 ease-in-out hover:from-red-600 hover:to-red-700 animate-pulse">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    🚨 Darurat
                </a>

                <!-- Dark Mode Toggle Mobile -->
                <button @click="darkMode = !darkMode" 
                        class="flex items-center w-full px-4 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 rounded-xl transition-all duration-300 ease-in-out hover:bg-gray-50 dark:hover:bg-gray-800">
                    <svg x-show="!darkMode" class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                    <svg x-show="darkMode" class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span x-text="darkMode ? 'Light Mode' : 'Dark Mode'"></span>
                </button>
            </nav>
        </div>

        <!-- Hidden Logout Forms -->
        @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </div>
</header>

<!-- Add this to your main layout file in the <head> section -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
    
    * {
        font-family: 'Inter', sans-serif;
    }
    
    .font-inter {
        font-family: 'Inter', sans-serif;
    }
</style>
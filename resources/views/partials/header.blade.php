<header x-data="{ mobileMenuOpen: false, searchOpen: false, userMenuOpen: false }" 
        class="sticky top-0 z-50 w-full bg-white/95 backdrop-blur-md border-b border-teal-200/50 shadow-lg">
    <div class="container px-4 mx-auto">
        <div class="flex items-center justify-between h-20">
            <!-- Enhanced Logo -->
            <div class="flex items-center flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center group">
                    <div class="relative p-2 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl shadow-lg group-hover:shadow-xl transition-all duration-300 transform group-hover:scale-105">
                        <img src="{{ asset('images/logo.png') }}" alt="HappyCare Logo" class="w-8 h-8 filter brightness-0 invert"
                              onerror="this.onerror=null; this.src='data:image/svg+xml;charset=utf-8,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 24 24\' width=\'32\' height=\'32\' fill=\'none\' stroke=\'white\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-linejoin=\'round\'%3E%3Cpath d=\'M22 12h-4l-3 9L9 3l-3 9H2\'/%3E%3C/svg%3E';">
                        <!-- Pulse Animation -->
                        <div class="absolute inset-0 bg-teal-400 rounded-xl animate-ping opacity-20"></div>
                    </div>
                    <div class="ml-3">
                        <span class="text-2xl font-black bg-gradient-to-r from-teal-600 to-teal-800 bg-clip-text text-transparent">HappyCare</span>
                        <div class="text-xs text-gray-500 font-medium"></div>
                    </div>
                </a>
            </div>

            <!-- Enhanced Desktop Navigation -->
            <nav class="hidden space-x-2 lg:flex">
                <a href="{{ route('home') }}" class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-teal-600 bg-teal-50 rounded-xl hover:bg-teal-100 hover:shadow-md">
                    <div class="p-1 bg-teal-100 rounded-lg mr-2 group-hover:bg-teal-200 transition-colors">
                        <i data-lucide="home" class="w-4 h-4 text-teal-600"></i>
                    </div>
                    Home
                </a>

                <!-- Healthcare Dropdown with Auth Check -->
                <div x-data="{ open: false }" class="relative">
                    @auth
                        <button @click="open = !open" @click.away="open = false" 
                                class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-xl">
                            <div class="p-1 bg-gray-100 rounded-lg mr-2 group-hover:bg-teal-100 transition-colors">
                                <i data-lucide="stethoscope" class="w-4 h-4 group-hover:text-teal-600"></i>
                            </div>
                            Health
                            <i data-lucide="chevron-down" class="w-4 h-4 ml-1 group-hover:text-teal-600 transition-transform" :class="{ 'rotate-180': open }"></i>
                        </button>
                    @else
                        <a href="{{ route('login') }}" 
                           class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-xl relative">
                            <div class="p-1 bg-gray-100 rounded-lg mr-2 group-hover:bg-teal-100 transition-colors">
                                <i data-lucide="stethoscope" class="w-4 h-4 group-hover:text-teal-600"></i>
                            </div>
                            Health
                            <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 text-xs text-red-500 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap"></span>
                        </a>
                    @endauth
                    
                    @auth
                        <div x-show="open" x-transition class="absolute left-0 z-20 w-64 mt-2 bg-white rounded-2xl shadow-2xl border border-teal-100">
                            <div class="p-3">
                                <a href="{{ route('hospital.general') }}" class="flex items-center px-4 py-3 text-sm rounded-xl hover:bg-teal-50 transition-all duration-200 group">
                                    <div class="p-2 bg-teal-100 rounded-lg mr-3 group-hover:bg-teal-200">
                                        <i data-lucide="building-hospital" class="w-4 h-4 text-teal-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">General Hospital</div>
                                        <div class="text-xs text-gray-500">General health services</div>
                                    </div>
                                </a>
                                <a href="{{ route('hospital.specialist_clinic') }}" class="flex items-center px-4 py-3 text-sm rounded-xl hover:bg-teal-50 transition-all duration-200 group">
                                    <div class="p-2 bg-blue-100 rounded-lg mr-3 group-hover:bg-blue-200">
                                        <i data-lucide="stethoscope" class="w-4 h-4 text-blue-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">Specialist Clinic</div>
                                        <div class="text-xs text-gray-500">Specialist consultation</div>
                                    </div>
                                </a>
                                <a href="{{ route('hospital.emergency') }}" class="flex items-center px-4 py-3 text-sm rounded-xl hover:bg-red-50 transition-all duration-200 group">
                                    <div class="p-2 bg-red-100 rounded-lg mr-3 group-hover:bg-red-200">
                                        <i data-lucide="siren" class="w-4 h-4 text-red-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">Emergency Unit</div>
                                        <div class="text-xs text-gray-500">24/7 emergency services</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Tourism Dropdown with Auth Check -->
                <div x-data="{ open: false }" class="relative">
                    @auth
                        <button @click="open = !open" @click.away="open = false" 
                                class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-xl">
                            <div class="p-1 bg-gray-100 rounded-lg mr-2 group-hover:bg-teal-100 transition-colors">
                                <i data-lucide="map" class="w-4 h-4 group-hover:text-teal-600"></i>
                            </div>
                            Tourism
                            <i data-lucide="chevron-down" class="w-4 h-4 ml-1 group-hover:text-teal-600 transition-transform" :class="{ 'rotate-180': open }"></i>
                        </button>
                    @else
                        <a href="{{ route('login') }}" 
                           class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-xl relative">
                            <div class="p-1 bg-gray-100 rounded-lg mr-2 group-hover:bg-teal-100 transition-colors">
                                <i data-lucide="map" class="w-4 h-4 group-hover:text-teal-600"></i>
                            </div>
                            Tourism
                            <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 text-xs text-red-500 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap"></span>
                        </a>
                    @endauth

                    @auth
                        <div x-show="open" x-transition class="absolute left-0 z-20 w-64 mt-2 bg-white rounded-2xl shadow-2xl border border-teal-100">
                            <div class="p-3">
                                <a href="{{ route('tour.nature') }}" class="flex items-center px-4 py-3 text-sm rounded-xl hover:bg-green-50 transition-all duration-200 group">
                                    <div class="p-2 bg-green-100 rounded-lg mr-3 group-hover:bg-green-200">
                                        <i data-lucide="trees" class="w-4 h-4 text-green-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">Nature Tourism</div>
                                        <div class="text-xs text-gray-500">Explore natural beauty</div>
                                    </div>
                                </a>
                                <a href="{{ route('tour.culinary') }}" class="flex items-center px-4 py-3 text-sm rounded-xl hover:bg-orange-50 transition-all duration-200 group">
                                    <div class="p-2 bg-orange-100 rounded-lg mr-3 group-hover:bg-orange-200">
                                        <i data-lucide="utensils" class="w-4 h-4 text-orange-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">Culinary Tourism</div>
                                        <div class="text-xs text-gray-500">Taste local delicacies</div>
                                    </div>
                                </a>
                                <a href="{{ route('tour.family') }}" class="flex items-center px-4 py-3 text-sm rounded-xl hover:bg-purple-50 transition-all duration-200 group">
                                    <div class="p-2 bg-purple-100 rounded-lg mr-3 group-hover:bg-purple-200">
                                        <i data-lucide="users" class="w-4 h-4 text-purple-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">Family Tourism</div>
                                        <div class="text-xs text-gray-500">Family vacation spots</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Other Menu Items with Auth Check -->
                @auth
                    <a href="{{ route('about') }}" class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-xl">
                        <div class="p-1 bg-gray-100 rounded-lg mr-2 group-hover:bg-teal-100 transition-colors">
                            <i data-lucide="info" class="w-4 h-4 group-hover:text-teal-600"></i>
                        </div>
                        About
                    </a>
                @else
                    <a href="{{ route('login') }}" class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-xl relative">
                        <div class="p-1 bg-gray-100 rounded-lg mr-2 group-hover:bg-teal-100 transition-colors">
                            <i data-lucide="info" class="w-4 h-4 group-hover:text-teal-600"></i>
                        </div>
                        About
                        <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 text-xs text-red-500 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap"></span>
                    </a>
                @endauth

                @auth
                    <a href="{{ route('contact') }}" class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-xl">
                        <div class="p-1 bg-gray-100 rounded-lg mr-2 group-hover:bg-teal-100 transition-colors">
                            <i data-lucide="phone" class="w-4 h-4 group-hover:text-teal-600"></i>
                        </div>
                        Contact
                    </a>
                @else
                    <a href="{{ route('login') }}" class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-xl relative">
                        <div class="p-1 bg-gray-100 rounded-lg mr-2 group-hover:bg-teal-100 transition-colors">
                            <i data-lucide="phone" class="w-4 h-4 group-hover:text-teal-600"></i>
                        </div>
                        Contact
                        <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 text-xs text-red-500 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap"></span>
                    </a>
                @endauth

                @auth
                    <a href="{{ route('articles.index') }}" class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-xl">
                        <div class="p-1 bg-gray-100 rounded-lg mr-2 group-hover:bg-teal-100 transition-colors">
                            <i data-lucide="newspaper" class="w-4 h-4 group-hover:text-teal-600"></i>
                        </div>
                        Articles
                    </a>
                @else
                    <a href="{{ route('login') }}" class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-xl relative">
                        <div class="p-1 bg-gray-100 rounded-lg mr-2 group-hover:bg-teal-100 transition-colors">
                            <i data-lucide="newspaper" class="w-4 h-4 group-hover:text-teal-600"></i>
                        </div>
                        Articles
                        <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 text-xs text-red-500 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap"></span>
                    </a>
                @endauth

                @auth
                    <a href="{{ route('testimonials.index') }}" class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-xl">
                        <div class="p-1 bg-gray-100 rounded-lg mr-2 group-hover:bg-teal-100 transition-colors">
                            <i data-lucide="star" class="w-4 h-4 group-hover:text-teal-600"></i>
                        </div>
                        Testimonials
                    </a>
                @else
                    <a href="{{ route('login') }}" class="group flex items-center px-4 py-2 text-sm font-semibold transition-all duration-300 text-gray-700 hover:text-teal-600 hover:bg-teal-50 rounded-xl relative">
                        <div class="p-1 bg-gray-100 rounded-lg mr-2 group-hover:bg-teal-100 transition-colors">
                            <i data-lucide="star" class="w-4 h-4 group-hover:text-teal-600"></i>
                        </div>
                        Testimonials
                        <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 text-xs text-red-500 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap"></span>
                    </a>
                @endauth
            </nav>

            <!-- Right Side Actions -->
            <div class="flex items-center space-x-3">
                <!-- Enhanced Emergency Button -->
                <a href="{{ route('hospital.emergency') }}" class="group hidden px-6 py-3 text-sm font-bold text-white transition-all duration-300 bg-gradient-to-r from-red-500 to-red-600 rounded-xl hover:from-red-600 hover:to-red-700 shadow-lg hover:shadow-xl hover:shadow-red-500/25 transform hover:-translate-y-1 lg:inline-flex">
                    <div class="flex items-center">
                        <div class="p-1 bg-white/20 rounded-lg mr-2 group-hover:bg-white/30">
                            <i data-lucide="siren" class="w-4 h-4 animate-pulse"></i>
                        </div>
                        Emergency
                    </div>
                </a>

                <!-- Enhanced Auth Buttons -->
                @auth
                    <!-- Enhanced User Menu -->
                    <div x-data="{ userMenuOpen: false }" class="relative hidden lg:block">
                        <button @click="userMenuOpen = !userMenuOpen" @click.away="userMenuOpen = false"
                                 class="group flex items-center px-4 py-3 text-sm font-semibold text-gray-700 transition-all duration-300 bg-white border-2 border-teal-200 rounded-xl hover:border-teal-300 hover:shadow-lg">
                            <div class="w-10 h-10 mr-3 overflow-hidden rounded-xl bg-gradient-to-br from-teal-400 to-teal-600 shadow-lg">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0d9488&color=fff&bold=true"
                                      alt="{{ Auth::user()->name }}" class="object-cover w-full h-full">
                            </div>
                            <div class="text-left">
                                <div class="font-bold text-gray-900">{{ Str::limit(Auth::user()->name, 15) }}</div>
                                <div class="text-xs text-teal-600">Premium Member</div>
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 ml-2 text-gray-400 group-hover:text-teal-600 transition-transform" :class="{ 'rotate-180': userMenuOpen }"></i>
                        </button>

                        <div x-show="userMenuOpen" x-transition class="absolute right-0 z-20 w-72 mt-2 bg-white rounded-2xl shadow-2xl border border-teal-100">
                            <div class="p-4">
                                <!-- User Info Header -->
                                <div class="flex items-center px-4 py-4 mb-3 bg-gradient-to-r from-teal-50 to-teal-100 rounded-xl">
                                    <div class="w-12 h-12 mr-4 overflow-hidden rounded-xl bg-gradient-to-br from-teal-400 to-teal-600 shadow-lg">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0d9488&color=fff&bold=true"
                                              alt="{{ Auth::user()->name }}" class="object-cover w-full h-full">
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900">{{ Auth::user()->name }}</p>
                                        <p class="text-sm text-teal-600">{{ Auth::user()->email }}</p>
                                        <div class="flex items-center mt-1">
                                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                            <span class="text-xs text-gray-500">Online</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Menu Items -->
                                <a href="{{ route('profile') }}" class="flex items-center px-4 py-3 text-sm rounded-xl hover:bg-teal-50 transition-all duration-200 group">
                                    <div class="p-2 bg-teal-100 rounded-lg mr-3 group-hover:bg-teal-200">
                                        <i data-lucide="user" class="w-4 h-4 text-teal-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">My Profile</div>
                                        <div class="text-xs text-gray-500">Manage personal information</div>
                                    </div>
                                </a>

                                <div class="border-t border-gray-100 mt-3 pt-3">
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="flex items-center w-full px-4 py-3 text-sm text-red-600 rounded-xl hover:bg-red-50 transition-all duration-200 group">
                                        <div class="p-2 bg-red-100 rounded-lg mr-3 group-hover:bg-red-200">
                                            <i data-lucide="log-out" class="w-4 h-4"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold">Logout</div>
                                            <div class="text-xs text-gray-500">Sign out from account</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Enhanced Login/Register Buttons -->
                    <div class="hidden space-x-3 lg:flex">
                        <a href="{{ route('login') }}" class="group flex items-center px-6 py-3 text-sm font-bold text-teal-600 transition-all duration-300 border-2 border-teal-200 rounded-xl hover:border-teal-300 hover:bg-teal-50 hover:shadow-lg transform hover:-translate-y-1">
                            <div class="p-1 bg-teal-100 rounded-lg mr-2 group-hover:bg-teal-200">
                                <i data-lucide="log-in" class="w-4 h-4"></i>
                            </div>
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="group flex items-center px-6 py-3 text-sm font-bold text-white transition-all duration-300 bg-gradient-to-r from-teal-500 to-teal-600 rounded-xl hover:from-teal-600 hover:to-teal-700 shadow-lg hover:shadow-xl hover:shadow-teal-500/25 transform hover:-translate-y-1">
                            <div class="p-1 bg-white/20 rounded-lg mr-2 group-hover:bg-white/30">
                                <i data-lucide="user-plus" class="w-4 h-4"></i>
                            </div>
                            Register
                        </a>
                    </div>
                @endauth

                <!-- Enhanced Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-3 text-gray-600 transition-all duration-300 bg-gray-100 rounded-xl lg:hidden hover:text-teal-600 hover:bg-teal-50 hover:shadow-lg transform hover:scale-105">
                    <i data-lucide="menu" class="w-5 h-5" x-show="!mobileMenuOpen"></i>
                    <i data-lucide="x" class="w-5 h-5" x-show="mobileMenuOpen"></i>
                </button>
            </div>
        </div>

        <!-- Enhanced Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition class="py-6 border-t border-teal-200/50 lg:hidden bg-white/95 backdrop-blur-md">
            <nav class="space-y-2">
                <a href="{{ route('home') }}" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-teal-600 bg-teal-50 shadow-sm">
                    <div class="p-2 bg-teal-100 rounded-lg mr-3">
                        <i data-lucide="home" class="w-4 h-4 text-teal-600"></i>
                    </div>
                    Home
                </a>

                <!-- Mobile Menu Items with Auth Check -->
                @guest
                    <a href="{{ route('login') }}" class="flex items-center justify-between px-4 py-3 text-sm font-semibold text-gray-700 rounded-xl hover:bg-teal-50">
                        <div class="flex items-center">
                            <div class="p-2 bg-gray-100 rounded-lg mr-3">
                                <i data-lucide="stethoscope" class="w-4 h-4"></i>
                            </div>
                            Health Services
                        </div>
                        <span class="text-xs text-red-500">Login Required</span>
                    </a>

                    <a href="{{ route('login') }}" class="flex items-center justify-between px-4 py-3 text-sm font-semibold text-gray-700 rounded-xl hover:bg-teal-50">
                        <div class="flex items-center">
                            <div class="p-2 bg-gray-100 rounded-lg mr-3">
                                <i data-lucide="map" class="w-4 h-4"></i>
                            </div>
                            Tourism
                        </div>
                        <span class="text-xs text-red-500">Login Required</span>
                    </a>

                    <a href="{{ route('login') }}" class="flex items-center justify-between px-4 py-3 text-sm font-semibold text-gray-700 rounded-xl hover:bg-teal-50">
                        <div class="flex items-center">
                            <div class="p-2 bg-gray-100 rounded-lg mr-3">
                                <i data-lucide="info" class="w-4 h-4"></i>
                            </div>
                            About Us
                        </div>
                        <span class="text-xs text-red-500">Login Required</span>
                    </a>

                    <a href="{{ route('login') }}" class="flex items-center justify-between px-4 py-3 text-sm font-semibold text-gray-700 rounded-xl hover:bg-teal-50">
                        <div class="flex items-center">
                            <div class="p-2 bg-gray-100 rounded-lg mr-3">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                            </div>
                            Contact
                        </div>
                        <span class="text-xs text-red-500">Login Required</span>
                    </a>

                    <a href="{{ route('login') }}" class="flex items-center justify-between px-4 py-3 text-sm font-semibold text-gray-700 rounded-xl hover:bg-teal-50">
                        <div class="flex items-center">
                            <div class="p-2 bg-gray-100 rounded-lg mr-3">
                                <i data-lucide="newspaper" class="w-4 h-4"></i>
                            </div>
                            Articles
                        </div>
                        <span class="text-xs text-red-500">Login Required</span>
                    </a>

                    <a href="{{ route('login') }}" class="flex items-center justify-between px-4 py-3 text-sm font-semibold text-gray-700 rounded-xl hover:bg-teal-50">
                        <div class="flex items-center">
                            <div class="p-2 bg-gray-100 rounded-lg mr-3">
                                <i data-lucide="star" class="w-4 h-4"></i>
                            </div>
                            Testimonials
                        </div>
                        <span class="text-xs text-red-500">Login Required</span>
                    </a>
                @else
                    <!-- Authenticated Mobile Menu Items -->
                    <div x-data="{ healthOpen: false }">
                        <button @click="healthOpen = !healthOpen" class="flex items-center justify-between w-full px-4 py-3 text-sm font-semibold text-left text-gray-700 rounded-xl hover:bg-teal-50">
                            <div class="flex items-center">
                                <div class="p-2 bg-gray-100 rounded-lg mr-3">
                                    <i data-lucide="stethoscope" class="w-4 h-4"></i>
                                </div>
                                Health Services
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 transition-transform" :class="{ 'rotate-180': healthOpen }"></i>
                        </button>
                        <div x-show="healthOpen" x-transition class="ml-6 mt-2 space-y-1">
                            <a href="{{ route('hospital.general') }}" class="flex items-center px-4 py-2 text-sm rounded-xl hover:bg-teal-50">
                                <i data-lucide="building-hospital" class="w-4 h-4 mr-3 text-teal-600"></i>
                                General Hospital
                            </a>
                            <a href="{{ route('hospital.specialist_clinic') }}" class="flex items-center px-4 py-2 text-sm rounded-xl hover:bg-teal-50">
                                <i data-lucide="stethoscope" class="w-4 h-4 mr-3 text-blue-600"></i>
                                Specialist Clinic
                            </a>
                            <a href="{{ route('hospital.emergency') }}" class="flex items-center px-4 py-2 text-sm rounded-xl hover:bg-red-50">
                                <i data-lucide="siren" class="w-4 h-4 mr-3 text-red-600"></i>
                                Emergency Unit
                            </a>
                        </div>
                    </div>

                    <div x-data="{ tourOpen: false }">
                        <button @click="tourOpen = !tourOpen" class="flex items-center justify-between w-full px-4 py-3 text-sm font-semibold text-left text-gray-700 rounded-xl hover:bg-teal-50">
                            <div class="flex items-center">
                                <div class="p-2 bg-gray-100 rounded-lg mr-3">
                                    <i data-lucide="map" class="w-4 h-4"></i>
                                </div>
                                Tourism
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 transition-transform" :class="{ 'rotate-180': tourOpen }"></i>
                        </button>
                        <div x-show="tourOpen" x-transition class="ml-6 mt-2 space-y-1">
                            <a href="{{ route('tour.nature') }}" class="flex items-center px-4 py-2 text-sm rounded-xl hover:bg-green-50">
                                <i data-lucide="trees" class="w-4 h-4 mr-3 text-green-600"></i>
                                Nature Tourism
                            </a>
                            <a href="{{ route('tour.culinary') }}" class="flex items-center px-4 py-2 text-sm rounded-xl hover:bg-orange-50">
                                <i data-lucide="utensils" class="w-4 h-4 mr-3 text-orange-600"></i>
                                Culinary Tourism
                            </a>
                            <a href="{{ route('tour.family') }}" class="flex items-center px-4 py-2 text-sm rounded-xl hover:bg-purple-50">
                                <i data-lucide="users" class="w-4 h-4 mr-3 text-purple-600"></i>
                                Family Tourism
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('about') }}" class="flex items-center px-4 py-3 text-sm font-semibold text-gray-700 rounded-xl hover:bg-teal-50">
                        <div class="p-2 bg-gray-100 rounded-lg mr-3">
                            <i data-lucide="info" class="w-4 h-4"></i>
                        </div>
                        About Us
                    </a>

                    <a href="{{ route('contact') }}" class="flex items-center px-4 py-3 text-sm font-semibold text-gray-700 rounded-xl hover:bg-teal-50">
                        <div class="p-2 bg-gray-100 rounded-lg mr-3">
                            <i data-lucide="phone" class="w-4 h-4"></i>
                        </div>
                        Contact
                    </a>

                    <a href="{{ route('articles.index') }}" class="flex items-center px-4 py-3 text-sm font-semibold text-gray-700 rounded-xl hover:bg-teal-50">
                        <div class="p-2 bg-gray-100 rounded-lg mr-3">
                            <i data-lucide="newspaper" class="w-4 h-4"></i>
                        </div>
                        Articles
                    </a>

                    <a href="{{ route('testimonials.index') }}" class="flex items-center px-4 py-3 text-sm font-semibold text-gray-700 rounded-xl hover:bg-teal-50">
                        <div class="p-2 bg-gray-100 rounded-lg mr-3">
                            <i data-lucide="star" class="w-4 h-4"></i>
                        </div>
                        Testimonials
                    </a>
                @endauth

                <!-- Auth Section for Mobile -->
                @auth
                    <div class="pt-4 mt-4 border-t border-teal-200/50">
                        <div class="flex items-center px-4 py-4 mb-4 bg-gradient-to-r from-teal-50 to-teal-100 rounded-xl">
                            <div class="w-12 h-12 mr-4 overflow-hidden rounded-xl bg-gradient-to-br from-teal-400 to-teal-600 shadow-lg">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0d9488&color=fff&bold=true"
                                      alt="{{ Auth::user()->name }}" class="object-cover w-full h-full">
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-sm text-teal-600">{{ Auth::user()->email }}</p>
                                <div class="flex items-center mt-1">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                    <span class="text-xs text-gray-500">Online</span>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('profile') }}" class="flex items-center px-4 py-3 text-sm font-semibold text-gray-700 rounded-xl hover:bg-teal-50">
                            <div class="p-2 bg-teal-100 rounded-lg mr-3">
                                <i data-lucide="user" class="w-4 h-4 text-teal-600"></i>
                            </div>
                            My Profile
                        </a>

                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                            class="flex items-center w-full px-4 py-3 text-sm font-semibold text-red-600 rounded-xl hover:bg-red-50">
                            <div class="p-2 bg-red-100 rounded-lg mr-3">
                                <i data-lucide="log-out" class="w-4 h-4"></i>
                            </div>
                            Logout
                        </a>
                    </div>
                @else
                    <div class="pt-4 mt-4 border-t border-teal-200/50 space-y-3">
                        <a href="{{ route('login') }}" class="flex items-center px-4 py-3 text-sm font-bold text-teal-600 rounded-xl hover:bg-teal-50 border-2 border-teal-200">
                            <div class="p-2 bg-teal-100 rounded-lg mr-3">
                                <i data-lucide="log-in" class="w-4 h-4"></i>
                            </div>
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="flex items-center px-4 py-3 text-sm font-bold text-white rounded-xl bg-gradient-to-r from-teal-500 to-teal-600">
                            <div class="p-2 bg-white/20 rounded-lg mr-3">
                                <i data-lucide="user-plus" class="w-4 h-4"></i>
                            </div>
                            Register
                        </a>
                    </div>
                @endauth

                <!-- Emergency Button for Mobile -->
                <a href="{{ route('hospital.emergency') }}" class="flex items-center px-4 py-3 text-sm font-bold text-white rounded-xl bg-gradient-to-r from-red-500 to-red-600 shadow-lg">
                    <div class="p-2 bg-white/20 rounded-lg mr-3">
                        <i data-lucide="siren" class="w-4 h-4 animate-pulse"></i>
                    </div>
                    Emergency
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
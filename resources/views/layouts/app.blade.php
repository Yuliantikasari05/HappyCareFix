<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="HappyCare - Your trusted healthcare and wellness platform combining medical services with healing tours in Yogyakarta.">
    <meta name="keywords" content="healthcare, medical services, wellness tours, Yogyakarta, hospital, clinic, emergency">
    <meta name="author" content="HappyCare Team">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title', 'HappyCare - Healthcare & Wellness Platform')">
    <meta property="og:description" content="Experience world-class healthcare services with compassionate care and cutting-edge technology.">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'HappyCare - Healthcare & Wellness Platform')">
    <meta name="twitter:description" content="Experience world-class healthcare services with compassionate care and cutting-edge technology.">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">

    <title>@yield('title', 'HappyCare - Healthcare & Wellness Platform')</title>

    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://unpkg.com">
    
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    
    <!-- Custom Styles -->
    @stack('styles')
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <!-- chatbot -->
    <link rel="stylesheet" href="{{ asset('css/chatbot.css') }}">

    
    <!-- Global Alpine Store -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('route', {
                isHome: {{ request()->routeIs('home') ? 'true' : 'false' }},
                current: '{{ Route::currentRouteName() }}'
            });
            
            Alpine.store('theme', {
                dark: false,
                toggle() {
                    this.dark = !this.dark;
                    localStorage.setItem('theme', this.dark ? 'dark' : 'light');
                    document.documentElement.classList.toggle('dark', this.dark);
                },
                init() {
                    this.dark = localStorage.getItem('theme') === 'dark' || 
                              (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches);
                    document.documentElement.classList.toggle('dark', this.dark);
                }
            });
        });
    </script>
</head>


<body class="font-inter antialiased bg-white text-gray-900 selection:bg-cyan-100 selection:text-cyan-900" 
      x-data="{ loading: true }" 
      x-init="
        $store.theme.init();
        setTimeout(() => loading = false, 500);
      ">
    
    <!-- Loading Screen -->
    <div x-show="loading" 
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center bg-white">
        <div class="text-center">
            <div class="relative">
                <div class="w-16 h-16 border-4 border-cyan-200 rounded-full animate-spin border-t-cyan-600"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <i data-lucide="heart-pulse" class="w-6 h-6 text-cyan-600 animate-pulse"></i>
                </div>
            </div>
            <p class="mt-4 text-sm font-medium text-gray-600">Loading HappyCare...</p>
        </div>
    </div>
    
    <!-- Skip to Content -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 z-50 px-4 py-2 bg-cyan-600 text-white rounded-lg">
        Skip to main content
    </a>
    
    <!-- Header -->
    @include('partials.header')
    
    <!-- Main Content -->
    <main id="main-content" class="min-h-screen">
        <!-- Page Heading -->
        @hasSection('page-header')
            <section class="py-16 bg-gradient-to-r from-cyan-50 to-emerald-50">
                <div class="container px-4 mx-auto">
                    @yield('page-header')
                </div>
            </section>
        @endif
        
        <!-- Flash Messages -->
        @if(session('success'))
            <div x-data="{ show: true }" 
                 x-show="show" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform translate-y-2"
                 x-init="setTimeout(() => show = false, 5000)"
                 class="fixed top-20 right-4 z-40 max-w-sm">
                <div class="p-4 bg-green-50 border border-green-200 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <i data-lucide="check-circle" class="w-5 h-5 text-green-600 mr-3"></i>
                        <p class="text-green-800 font-medium">{{ session('success') }}</p>
                        <button @click="show = false" class="ml-auto text-green-600 hover:text-green-800">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        
        @if(session('error'))
            <div x-data="{ show: true }" 
                 x-show="show" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform translate-y-2"
                 x-init="setTimeout(() => show = false, 5000)"
                 class="fixed top-20 right-4 z-40 max-w-sm">
                <div class="p-4 bg-red-50 border border-red-200 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-red-600 mr-3"></i>
                        <p class="text-red-800 font-medium">{{ session('error') }}</p>
                        <button @click="show = false" class="ml-auto text-red-600 hover:text-red-800">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        
        <!-- Page Content -->
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('partials.footer')
    
    <!-- Scroll to Top Button -->
    <button x-data="{ show: false }" 
            @scroll.window="show = (window.pageYOffset > 300)"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90"
            @click="window.scrollTo({top: 0, behavior: 'smooth'})"
            class="fixed bottom-6 right-6 z-40 flex items-center justify-center w-12 h-12 bg-cyan-600 hover:bg-cyan-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 group"
            aria-label="Scroll to top">
        <i data-lucide="arrow-up" class="w-5 h-5 group-hover:animate-bounce"></i>
    </button>
    
    <!-- Cookie Consent -->
    <div x-data="{ show: !localStorage.getItem('cookieConsent') }" 
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-full"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-full"
         class="fixed bottom-0 left-0 right-0 z-50 p-4 bg-white border-t border-gray-200 shadow-lg">
        <div class="container mx-auto">
            <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
                <div class="flex-1">
                    <p class="text-sm text-gray-600">
                        We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.
                        <a href="#" class="text-cyan-600 hover:text-cyan-700 underline">Learn more</a>
                    </p>
                </div>
                <div class="flex space-x-3">
                    <button @click="show = false; localStorage.setItem('cookieConsent', 'declined')" 
                            class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors">
                        Decline
                    </button>
                    <button @click="show = false; localStorage.setItem('cookieConsent', 'accepted')" 
                            class="px-4 py-2 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 rounded-lg transition-colors">
                        Accept
                    </button>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Scripts -->
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    
    <!-- GSAP (Optional for advanced animations) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    
    <!-- Initialize Libraries -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 800,
                easing: 'ease-out',
                once: true,
                offset: 100
            });
            
            // Initialize Lucide Icons
            lucide.createIcons();
            
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            // Lazy loading for images
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            imageObserver.unobserve(img);
                        }
                    });
                });
                
                document.querySelectorAll('img[data-src]').forEach(img => {
                    imageObserver.observe(img);
                });
            }
        });
        
        // Performance monitoring
        window.addEventListener('load', function() {
            if ('performance' in window) {
                const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
                console.log('Page load time:', loadTime + 'ms');
            }
        });
    </script>
    
    <!-- Custom Scripts -->
    @stack('scripts')
    
    <!-- Google Analytics (Replace with your tracking ID) -->
    @if(config('app.env') === 'production')
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_TRACKING_ID');
    </script>
    @endif

    @include('components.chatbot')

</body>
</html>

<footer class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/20 to-emerald-500/20"></div>
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%2300bcd4&quot; fill-opacity=&quot;0.1&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    </div>
    
    <!-- Main Footer -->
    <div class="relative py-16">
        <div class="container px-4 mx-auto">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                <!-- Company Info -->
                <div class="lg:col-span-1" data-aos="fade-up" data-aos-delay="100">
                    <div class="mb-6">
                        <img src="{{ asset('images/logo.png') }}" alt="HappyCare" class="h-12 mb-4">
                        <h4 class="text-xl font-bold text-white mb-4">HappyCare</h4>
                    </div>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Providing quality healthcare services for all your needs. Our mission is to enhance the health and wellbeing of the communities we serve.
                    </p>
                    
                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        <a href="#" class="group flex items-center justify-center w-10 h-10 rounded-full bg-white/10 hover:bg-cyan-500 transition-all duration-300 hover:scale-110">
                            <i data-lucide="facebook" class="w-5 h-5 text-white group-hover:text-white"></i>
                        </a>
                        <a href="#" class="group flex items-center justify-center w-10 h-10 rounded-full bg-white/10 hover:bg-cyan-500 transition-all duration-300 hover:scale-110">
                            <i data-lucide="twitter" class="w-5 h-5 text-white group-hover:text-white"></i>
                        </a>
                        <a href="#" class="group flex items-center justify-center w-10 h-10 rounded-full bg-white/10 hover:bg-cyan-500 transition-all duration-300 hover:scale-110">
                            <i data-lucide="instagram" class="w-5 h-5 text-white group-hover:text-white"></i>
                        </a>
                        <a href="#" class="group flex items-center justify-center w-10 h-10 rounded-full bg-white/10 hover:bg-cyan-500 transition-all duration-300 hover:scale-110">
                            <i data-lucide="linkedin" class="w-5 h-5 text-white group-hover:text-white"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <h4 class="text-lg font-bold text-white mb-6 relative">
                        Quick Links
                        <span class="absolute bottom-0 left-0 w-12 h-0.5 bg-gradient-to-r from-cyan-500 to-emerald-500 transform -translate-y-2"></span>
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('home') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                                <i data-lucide="chevron-right" class="w-4 h-4 mr-2 text-cyan-500 group-hover:translate-x-1 transition-transform"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                                <i data-lucide="chevron-right" class="w-4 h-4 mr-2 text-cyan-500 group-hover:translate-x-1 transition-transform"></i>
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('hospital.general') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                                <i data-lucide="chevron-right" class="w-4 h-4 mr-2 text-cyan-500 group-hover:translate-x-1 transition-transform"></i>
                                General Hospital
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('hospital.specialist') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                                <i data-lucide="chevron-right" class="w-4 h-4 mr-2 text-cyan-500 group-hover:translate-x-1 transition-transform"></i>
                                Specialist Clinic
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('hospital.emergency') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                                <i data-lucide="chevron-right" class="w-4 h-4 mr-2 text-cyan-500 group-hover:translate-x-1 transition-transform"></i>
                                Emergency
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                                <i data-lucide="chevron-right" class="w-4 h-4 mr-2 text-cyan-500 group-hover:translate-x-1 transition-transform"></i>
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Our Tours -->
                <div data-aos="fade-up" data-aos-delay="300">
                    <h4 class="text-lg font-bold text-white mb-6 relative">
                        Our Tours
                        <span class="absolute bottom-0 left-0 w-12 h-0.5 bg-gradient-to-r from-emerald-500 to-cyan-500 transform -translate-y-2"></span>
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('tour.nature') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                                <i data-lucide="trees" class="w-4 h-4 mr-2 text-emerald-500 group-hover:scale-110 transition-transform"></i>
                                Nature Tour
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tour.culinary') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                                <i data-lucide="utensils" class="w-4 h-4 mr-2 text-emerald-500 group-hover:scale-110 transition-transform"></i>
                                Culinary Tour
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tour.family') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300">
                                <i data-lucide="users" class="w-4 h-4 mr-2 text-emerald-500 group-hover:scale-110 transition-transform"></i>
                                Family Tour
                            </a>
                        </li>
                    </ul>
                    
                    <!-- Newsletter Signup -->
                    <div class="mt-8 p-4 bg-white/5 rounded-lg backdrop-blur-sm border border-white/10">
                        <h5 class="text-white font-semibold mb-3">Newsletter</h5>
                        <p class="text-gray-300 text-sm mb-3">Subscribe to get updates</p>
                        <form class="flex" x-data="{ email: '' }">
                            <input type="email" x-model="email" placeholder="Your email" class="flex-1 px-3 py-2 bg-white/10 border border-white/20 rounded-l-lg text-white placeholder-gray-400 focus:outline-none focus:border-cyan-500">
                            <button type="submit" class="px-4 py-2 bg-cyan-500 hover:bg-cyan-600 rounded-r-lg transition-colors">
                                <i data-lucide="send" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Contact Info -->
                <div data-aos="fade-up" data-aos-delay="400">
                    <h4 class="text-lg font-bold text-white mb-6 relative">
                        Contact Info
                        <span class="absolute bottom-0 left-0 w-12 h-0.5 bg-gradient-to-r from-cyan-500 to-emerald-500 transform -translate-y-2"></span>
                    </h4>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3 group">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-cyan-500/20 group-hover:bg-cyan-500 transition-colors">
                                <i data-lucide="map-pin" class="w-4 h-4 text-cyan-500 group-hover:text-white"></i>
                            </div>
                            <div>
                                <p class="text-gray-300 leading-relaxed">
                                    123 Healthcare Street<br>
                                    Medical District, HC 12345
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 group">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-cyan-500/20 group-hover:bg-cyan-500 transition-colors">
                                <i data-lucide="phone" class="w-4 h-4 text-cyan-500 group-hover:text-white"></i>
                            </div>
                            <div>
                                <p class="text-gray-300 leading-relaxed">
                                    +1 (123) 456-7890<br>
                                    +1 (123) 456-7891
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 group">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-cyan-500/20 group-hover:bg-cyan-500 transition-colors">
                                <i data-lucide="mail" class="w-4 h-4 text-cyan-500 group-hover:text-white"></i>
                            </div>
                            <div>
                                <p class="text-gray-300 leading-relaxed">
                                    info@happycare.com<br>
                                    support@happycare.com
                                </p>
                            </div>
                        </div>
                        
                        <!-- Emergency Contact -->
                        <div class="mt-6 p-3 bg-red-500/10 border border-red-500/20 rounded-lg">
                            <div class="flex items-center space-x-2 mb-2">
                                <i data-lucide="siren" class="w-5 h-5 text-red-400"></i>
                                <span class="text-red-400 font-semibold">Emergency 24/7</span>
                            </div>
                            <p class="text-red-300 text-sm">Call: +1 (123) 911-HELP</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Bottom -->
    <div class="relative border-t border-white/10 py-6">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
                <div class="text-center md:text-left">
                    <p class="text-gray-400">
                        &copy; {{ date('Y') }} HappyCare. All rights reserved.
                    </p>
                </div>
                
                <div class="flex flex-wrap items-center justify-center space-x-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">Sitemap</a>
                </div>
                
                <!-- Back to Top Button -->
                <button @click="window.scrollTo({top: 0, behavior: 'smooth'})" 
                        class="flex items-center justify-center w-10 h-10 rounded-full bg-cyan-500 hover:bg-cyan-600 transition-all duration-300 hover:scale-110 group">
                    <i data-lucide="arrow-up" class="w-5 h-5 text-white group-hover:animate-bounce"></i>
                </button>
            </div>
        </div>
    </div>
</footer>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide Icons
        lucide.createIcons();
        
        // Newsletter form handling
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your newsletter subscription logic here
            alert('Thank you for subscribing to our newsletter!');
        });
    });
</script>
@endpush
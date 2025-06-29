@extends('layouts.app')

@section('title', 'Hubungi Kami - HappyCare')

@section('content')
<!-- Hero Section -->
<section class="relative py-24 bg-gradient-to-r from-cyan-600 to-emerald-600 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.3&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    </div>
    
    <div class="container px-4 mx-auto relative">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="mb-6 text-4xl font-bold text-white md:text-5xl" data-aos="fade-up">
                Hubungi Kami
            </h1>
            <p class="mb-8 text-xl text-white/90" data-aos="fade-up" data-aos-delay="200">
                Kami siap membantu Anda 24/7. Jangan ragu untuk menghubungi tim kami.
            </p>
            
            <!-- Breadcrumb -->
            <nav class="flex justify-center" aria-label="Breadcrumb" data-aos="fade-up" data-aos-delay="400">
                <ol class="flex items-center space-x-2 text-white/80">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-white transition-colors">
                            <i data-lucide="home" class="w-4 h-4"></i>
                        </a>
                    </li>
                    <li>
                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </li>
                    <li class="text-white font-medium">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Contact Info Cards -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50">
    <div class="container px-4 mx-auto">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Address -->
            <div class="group text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="relative p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-gradient-to-br from-cyan-500 to-cyan-600 group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="map-pin" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Alamat Kami</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Jl. Malioboro No. 123<br>
                        Yogyakarta, Indonesia 55213
                    </p>
                </div>
            </div>
            
            <!-- Phone -->
            <div class="group text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="relative p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="phone" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Telepon</h3>
                    <p class="text-gray-600 leading-relaxed">
                        +62 274 123456<br>
                        +62 812 3456 7890
                    </p>
                </div>
            </div>
            
            <!-- Email -->
            <div class="group text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="relative p-8 bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 rounded-full bg-gradient-to-br from-purple-500 to-purple-600 group-hover:scale-110 transition-transform duration-300">
                        <i data-lucide="mail" class="w-8 h-8 text-white"></i>
                    </div>
                    <h3 class="mb-4 text-xl font-bold text-gray-900">Email</h3>
                    <p class="text-gray-600 leading-relaxed">
                        info@happycare.com<br>
                        support@happycare.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Map -->
<section class="py-24 bg-gradient-to-b from-gray-50 to-white">
    <div class="container px-4 mx-auto">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
            <!-- Contact Form -->
            <div data-aos="fade-right">
                <div class="p-8 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="mb-6 text-2xl font-bold text-gray-900">Kirim Pesan</h2>
                    <p class="mb-8 text-gray-600">
                        Kami siap membantu Anda. Silakan isi formulir di bawah ini dan tim kami akan segera menghubungi Anda.
                    </p>
                    
                    <form action="{{ route('contact.store') }}" method="POST" 
                          x-data="contactForm()" 
                          @submit.prevent="submitForm()"
                          class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
                                    Nama Lengkap *
                                </label>
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       x-model="form.name"
                                       required
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-colors">
                            </div>
                            
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">
                                    Email *
                                </label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       x-model="form.email"
                                       required
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-colors">
                            </div>
                        </div>
                        
                        <div>
                            <label for="subject" class="block mb-2 text-sm font-medium text-gray-700">
                                Subjek *
                            </label>
                            <input type="text" 
                                   id="subject" 
                                   name="subject" 
                                   x-model="form.subject"
                                   required
                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-colors">
                        </div>
                        
                        <div>
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-700">
                                Pesan *
                            </label>
                            <textarea id="message" 
                                      name="message" 
                                      rows="5" 
                                      x-model="form.message"
                                      required
                                      class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-colors resize-none"></textarea>
                        </div>
                        
                        <button type="submit" 
                                :disabled="loading"
                                class="w-full px-8 py-4 text-white font-semibold bg-gradient-to-r from-cyan-600 to-emerald-600 rounded-lg hover:from-cyan-700 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed">
                            <span x-show="!loading" class="flex items-center justify-center">
                                <i data-lucide="send" class="w-5 h-5 mr-2"></i>
                                Kirim Pesan
                            </span>
                            <span x-show="loading" class="flex items-center justify-center">
                                <div class="w-5 h-5 mr-2 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                                Mengirim...
                            </span>
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Map -->
            <div data-aos="fade-left">
                <div class="p-8 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="mb-6 text-2xl font-bold text-gray-900">Lokasi Kami</h2>
                    <p class="mb-8 text-gray-600">
                        Kunjungi kami di pusat kota Yogyakarta, dekat dengan berbagai tempat wisata populer.
                    </p>
                    
                    <div class="overflow-hidden rounded-lg">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15812.562090651424!2d110.36053323955077!3d-7.797091499999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5796db768461%3A0xb9f11f4d7bf7dba8!2sMalioboro%2C%20Sosromenduran%2C%20Gedong%20Tengen%2C%20Kota%20Yogyakarta%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1651234567890!5m2!1sid!2sid" 
                                width="100%" 
                                height="400" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                                class="w-full h-96">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Working Hours -->
<section class="py-24 bg-gradient-to-br from-cyan-50 via-white to-emerald-50">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Jam <span class="text-cyan-600">Operasional</span>
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-cyan-500 to-emerald-500 rounded-full"></div>
            <p class="text-lg text-gray-600">
                Kami siap melayani Anda setiap hari
            </p>
        </div>
        
        <div class="max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            <div class="overflow-hidden bg-white rounded-2xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between p-6 border-b border-gray-100">
                    <div class="flex items-center">
                        <i data-lucide="calendar" class="w-5 h-5 mr-3 text-gray-500"></i>
                        <span class="font-semibold text-gray-900">Senin - Jumat</span>
                    </div>
                    <span class="font-medium text-cyan-600">08:00 - 20:00</span>
                </div>
                
                <div class="flex items-center justify-between p-6 border-b border-gray-100">
                    <div class="flex items-center">
                        <i data-lucide="calendar" class="w-5 h-5 mr-3 text-gray-500"></i>
                        <span class="font-semibold text-gray-900">Sabtu</span>
                    </div>
                    <span class="font-medium text-cyan-600">09:00 - 18:00</span>
                </div>
                
                <div class="flex items-center justify-between p-6 border-b border-gray-100">
                    <div class="flex items-center">
                        <i data-lucide="calendar" class="w-5 h-5 mr-3 text-gray-500"></i>
                        <span class="font-semibold text-gray-900">Minggu</span>
                    </div>
                    <span class="font-medium text-cyan-600">10:00 - 16:00</span>
                </div>
                
                <div class="flex items-center justify-between p-6 bg-gradient-to-r from-red-50 to-red-100">
                    <div class="flex items-center">
                        <i data-lucide="siren" class="w-5 h-5 mr-3 text-red-600"></i>
                        <span class="font-semibold text-red-900">Layanan Darurat</span>
                    </div>
                    <span class="font-bold text-red-600">24 Jam</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-24 bg-gradient-to-b from-white to-gray-50">
    <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-16 text-center" data-aos="fade-up">
            <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                Pertanyaan <span class="text-cyan-600">Umum</span>
            </h2>
            <div class="w-20 h-1 mx-auto mb-8 bg-gradient-to-r from-cyan-500 to-emerald-500 rounded-full"></div>
            <p class="text-lg text-gray-600">
                Beberapa pertanyaan yang sering ditanyakan oleh pengunjung kami
            </p>
        </div>
        
        <div class="max-w-3xl mx-auto">
            <div x-data="{ activeAccordion: 0 }" class="space-y-4">
                <!-- FAQ 1 -->
                <div class="overflow-hidden bg-white rounded-lg shadow-sm border border-gray-100" data-aos="fade-up" data-aos-delay="100">
                    <button @click="activeAccordion = activeAccordion === 0 ? null : 0"
                            class="flex items-center justify-between w-full p-6 text-left hover:bg-gray-50 transition-colors">
                        <span class="font-semibold text-gray-900">Bagaimana cara membuat janji dengan dokter?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500 transition-transform" 
                           :class="{ 'rotate-180': activeAccordion === 0 }"></i>
                    </button>
                    <div x-show="activeAccordion === 0" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="px-6 pb-6">
                        <p class="text-gray-600 leading-relaxed">
                            Anda dapat membuat janji dengan dokter melalui website kami, aplikasi mobile, atau menghubungi nomor telepon kami. Kami akan membantu Anda menemukan jadwal yang sesuai dengan kebutuhan Anda.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ 2 -->
                <div class="overflow-hidden bg-white rounded-lg shadow-sm border border-gray-100" data-aos="fade-up" data-aos-delay="200">
                    <button @click="activeAccordion = activeAccordion === 1 ? null : 1"
                            class="flex items-center justify-between w-full p-6 text-left hover:bg-gray-50 transition-colors">
                        <span class="font-semibold text-gray-900">Apakah HappyCare menerima asuransi kesehatan?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500 transition-transform" 
                           :class="{ 'rotate-180': activeAccordion === 1 }"></i>
                    </button>
                    <div x-show="activeAccordion === 1" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="px-6 pb-6">
                        <p class="text-gray-600 leading-relaxed">
                            Ya, HappyCare bekerja sama dengan berbagai penyedia asuransi kesehatan. Silakan hubungi kami untuk informasi lebih lanjut tentang asuransi yang kami terima.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ 3 -->
                <div class="overflow-hidden bg-white rounded-lg shadow-sm border border-gray-100" data-aos="fade-up" data-aos-delay="300">
                    <button @click="activeAccordion = activeAccordion === 2 ? null : 2"
                            class="flex items-center justify-between w-full p-6 text-left hover:bg-gray-50 transition-colors">
                        <span class="font-semibold text-gray-900">Bagaimana cara memesan paket wisata kesehatan?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 text-gray-500 transition-transform" 
                           :class="{ 'rotate-180': activeAccordion === 2 }"></i>
                    </button>
                    <div x-show="activeAccordion === 2" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="px-6 pb-6">
                        <p class="text-gray-600 leading-relaxed">
                            Anda dapat memesan paket wisata kesehatan melalui website kami di bagian Tour. Pilih paket yang sesuai dengan kebutuhan Anda, isi formulir pemesanan, dan tim kami akan menghubungi Anda untuk konfirmasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    function contactForm() {
        return {
            form: {
                name: '',
                email: '',
                subject: '',
                message: ''
            },
            loading: false,
            
            async submitForm() {
                this.loading = true;
                
                try {
                    const response = await fetch('{{ route("contact.store") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(this.form)
                    });
                    
                    if (response.ok) {
                        // Show success message
                        this.showNotification('Pesan berhasil dikirim! Kami akan segera menghubungi Anda.', 'success');
                        
                        // Reset form
                        this.form = {
                            name: '',
                            email: '',
                            subject: '',
                            message: ''
                        };
                    } else {
                        throw new Error('Failed to send message');
                    }
                } catch (error) {
                    this.showNotification('Terjadi kesalahan. Silakan coba lagi.', 'error');
                } finally {
                    this.loading = false;
                }
            },
            
            showNotification(message, type) {
                // Create notification element
                const notification = document.createElement('div');
                notification.className = `fixed top-20 right-4 z-50 max-w-sm p-4 rounded-lg shadow-lg transition-all duration-300 ${
                    type === 'success' ? 'bg-green-50 border border-green-200 text-green-800' : 'bg-red-50 border border-red-200 text-red-800'
                }`;
                
                notification.innerHTML = `
                    <div class="flex items-center">
                        <i data-lucide="${type === 'success' ? 'check-circle' : 'alert-circle'}" class="w-5 h-5 mr-3 ${type === 'success' ? 'text-green-600' : 'text-red-600'}"></i>
                        <p class="font-medium">${message}</p>
                        <button onclick="this.parentElement.parentElement.remove()" class="ml-auto ${type === 'success' ? 'text-green-600 hover:text-green-800' : 'text-red-600 hover:text-red-800'}">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                `;
                
                document.body.appendChild(notification);
                lucide.createIcons();
                
                // Auto remove after 5 seconds
                setTimeout(() => {
                    notification.remove();
                }, 5000);
            }
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Lucide Icons
        lucide.createIcons();
    });
</script>
@endpush
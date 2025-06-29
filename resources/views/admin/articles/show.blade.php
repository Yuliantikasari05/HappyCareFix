@extends('layouts.app')

@section('title', $article->title . ' - HappyCare')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Article Header -->
    <section class="relative py-16 bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="relative container px-4 mx-auto">
            <div class="max-w-4xl mx-auto">
                <!-- Breadcrumb -->
                <nav class="mb-6">
                    <ol class="flex items-center space-x-2 text-primary-100">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                        <li><i data-lucide="chevron-right" class="w-4 h-4"></i></li>
                        <li><a href="{{ route('articles.index') }}" class="hover:text-white transition-colors">Articles</a></li>
                        <li><i data-lucide="chevron-right" class="w-4 h-4"></i></li>
                        <li class="text-white">{{ Str::limit($article->title, 50) }}</li>
                    </ol>
                </nav>

                <!-- Article Meta -->
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    @if($article->category)
                        <span class="px-3 py-1 text-sm font-medium text-primary-700 bg-white rounded-full">
                            {{ $article->category }}
                        </span>
                    @endif
                    <div class="flex items-center text-primary-100">
                        <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                        {{ $article->created_at->format('M d, Y') }}
                    </div>
                    <div class="flex items-center text-primary-100">
                        <i data-lucide="user" class="w-4 h-4 mr-2"></i>
                        HappyCare Team
                    </div>
                    <div class="flex items-center text-primary-100">
                        <i data-lucide="eye" class="w-4 h-4 mr-2"></i>
                        {{ rand(100, 1000) }} views
                    </div>
                </div>

                <!-- Article Title -->
                <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight">
                    {{ $article->title }}
                </h1>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="max-w-4xl mx-auto">
                <!-- Featured Image -->
                @if($article->image)
                <div class="mb-8 overflow-hidden rounded-2xl">
                    <img src="/placeholder.svg?height=400&width=800" alt="{{ $article->title }}" 
                         class="w-full h-96 object-cover">
                </div>
                @endif

                <!-- Article Body -->
                <div class="prose prose-lg max-w-none">
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <!-- Excerpt -->
                        @if($article->excerpt)
                        <div class="text-xl text-gray-600 font-medium mb-8 p-6 bg-primary-50 rounded-xl border-l-4 border-primary-500">
                            {{ $article->excerpt }}
                        </div>
                        @endif

                        <!-- Content -->
                        <div class="text-gray-700 leading-relaxed space-y-6">
                            <p>{{ $article->excerpt ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' }}</p>
                            
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            
                            <h3 class="text-2xl font-bold text-gray-900 mt-8 mb-4">Poin Penting</h3>
                            <ul class="space-y-2">
                                <li class="flex items-start">
                                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                    <span>Menjaga pola makan yang sehat dan seimbang</span>
                                </li>
                                <li class="flex items-start">
                                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                    <span>Rutin berolahraga minimal 30 menit setiap hari</span>
                                </li>
                                <li class="flex items-start">
                                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                    <span>Istirahat yang cukup 7-8 jam per hari</span>
                                </li>
                                <li class="flex items-start">
                                    <i data-lucide="check-circle" class="w-5 h-5 text-green-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                    <span>Mengelola stress dengan baik</span>
                                </li>
                            </ul>
                            
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                            
                            <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 my-8">
                                <div class="flex items-start">
                                    <i data-lucide="info" class="w-6 h-6 text-blue-500 mr-3 mt-0.5 flex-shrink-0"></i>
                                    <div>
                                        <h4 class="font-semibold text-blue-900 mb-2">Tips Tambahan</h4>
                                        <p class="text-blue-800">Konsultasikan dengan dokter atau ahli kesehatan sebelum memulai program kesehatan baru, terutama jika Anda memiliki kondisi medis tertentu.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Share Buttons -->
                        <div class="mt-12 pt-8 border-t border-gray-200">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Bagikan Artikel</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                    <i data-lucide="facebook" class="w-4 h-4 mr-2"></i>
                                    Facebook
                                </a>
                                <a href="#" class="inline-flex items-center px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition-colors">
                                    <i data-lucide="twitter" class="w-4 h-4 mr-2"></i>
                                    Twitter
                                </a>
                                <a href="#" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                    <i data-lucide="share-2" class="w-4 h-4 mr-2"></i>
                                    WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Articles -->
    <section class="py-16 bg-white">
        <div class="container px-4 mx-auto">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Artikel Terkait</h2>
                
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @for($i = 1; $i <= 3; $i++)
                    <article class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
                        <div class="relative overflow-hidden">
                            <img src="/placeholder.svg?height=200&width=400" alt="Related Article {{ $i }}" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 text-xs font-semibold text-white bg-primary-500 rounded-full">Kesehatan</span>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <div class="flex items-center mb-3 text-sm text-gray-500">
                                <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                                {{ now()->subDays($i)->format('M d, Y') }}
                            </div>
                            
                            <h3 class="mb-3 text-xl font-bold text-gray-900 group-hover:text-primary-600 transition-colors">
                                <a href="#">Tips Kesehatan Artikel {{ $i }}</a>
                            </h3>
                            
                            <p class="mb-4 text-gray-600 line-clamp-3">Deskripsi singkat artikel kesehatan yang memberikan informasi bermanfaat untuk pembaca.</p>
                            
                            <a href="#" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                                Baca Selengkapnya
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                            </a>
                        </div>
                    </article>
                    @endfor
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
@endsection

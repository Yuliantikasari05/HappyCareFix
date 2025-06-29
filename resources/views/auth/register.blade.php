@extends('layouts.app')

@section('title', 'Register - HappyCare')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden">
        <div class="flex flex-col lg:flex-row">
            <!-- Left Side - Branding -->
            <div class="lg:w-1/2 bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 p-12 flex flex-col justify-center relative overflow-hidden">
                <div class="absolute inset-0 bg-black opacity-10"></div>
                <div class="relative z-10">
                    <!-- Logo -->
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center mr-4">
                                <i data-lucide="heart" class="w-6 h-6 text-primary-600"></i>
                            </div>
                            <h1 class="text-3xl font-bold text-white">HappyCare</h1>
                        </div>
                        <div class="w-16 h-1 bg-white rounded-full"></div>
                    </div>
                    
                    <!-- Welcome Message -->
                    <div class="mb-8">
                        <h2 class="text-4xl font-bold text-white mb-4">Join Our Community</h2>
                        <p class="text-primary-100 text-lg leading-relaxed">
                            Create your account and start your journey to better health with our comprehensive healthcare platform.
                        </p>
                    </div>
                    
                    <!-- Benefits -->
                    <div class="space-y-4">
                        <div class="flex items-center text-primary-100">
                            <i data-lucide="check-circle" class="w-5 h-5 mr-3 text-green-400"></i>
                            <span>Free health consultations</span>
                        </div>
                        <div class="flex items-center text-primary-100">
                            <i data-lucide="check-circle" class="w-5 h-5 mr-3 text-green-400"></i>
                            <span>Personalized health tracking</span>
                        </div>
                        <div class="flex items-center text-primary-100">
                            <i data-lucide="check-circle" class="w-5 h-5 mr-3 text-green-400"></i>
                            <span>Access to specialist doctors</span>
                        </div>
                        <div class="flex items-center text-primary-100">
                            <i data-lucide="check-circle" class="w-5 h-5 mr-3 text-green-400"></i>
                            <span>Medical record management</span>
                        </div>
                    </div>
                </div>
                
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full -mr-16 -mt-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full -ml-12 -mb-12"></div>
            </div>
            
            <!-- Right Side - Register Form -->
            <div class="lg:w-1/2 p-12 flex flex-col justify-center max-h-screen overflow-y-auto">
                <div class="max-w-md mx-auto w-full">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h3>
                        <p class="text-gray-600">Fill in your details to get started</p>
                    </div>
                    
                    <!-- Register Form -->
                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf
                        
                        <!-- Full Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Full Name
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i data-lucide="user" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors @error('name') border-red-300 @enderror"
                                       placeholder="Enter your full name">
                            </div>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i data-lucide="mail" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors @error('email') border-red-300 @enderror"
                                       placeholder="Enter your email">
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                Phone Number
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i data-lucide="phone" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors @error('phone') border-red-300 @enderror"
                                       placeholder="Enter your phone number">
                            </div>
                            @error('phone')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Address -->
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                Address
                            </label>
                            <div class="relative">
                                <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                                    <i data-lucide="map-pin" class="w-5 h-5 text-gray-400"></i>
                                </div>
                                <textarea id="address" name="address" rows="3"
                                          class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors @error('address') border-red-300 @enderror"
                                          placeholder="Enter your complete address">{{ old('address') }}</textarea>
                            </div>
                            @error('address')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Password Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                    Password
                                </label>
                                <div class="relative" x-data="{ showPassword: false }">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i data-lucide="lock" class="w-5 h-5 text-gray-400"></i>
                                    </div>
                                    <input id="password" :type="showPassword ? 'text' : 'password'" name="password" required
                                           class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors @error('password') border-red-300 @enderror"
                                           placeholder="Create password">
                                    <button type="button" @click="showPassword = !showPassword" 
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <i :data-lucide="showPassword ? 'eye-off' : 'eye'" class="w-5 h-5 text-gray-400 hover:text-gray-600"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                    Confirm Password
                                </label>
                                <div class="relative" x-data="{ showConfirmPassword: false }">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i data-lucide="shield-check" class="w-5 h-5 text-gray-400"></i>
                                    </div>
                                    <input id="password_confirmation" :type="showConfirmPassword ? 'text' : 'password'" name="password_confirmation" required
                                           class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors"
                                           placeholder="Confirm password">
                                    <button type="button" @click="showConfirmPassword = !showConfirmPassword" 
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <i :data-lucide="showConfirmPassword ? 'eye-off' : 'eye'" class="w-5 h-5 text-gray-400 hover:text-gray-600"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Newsletter Subscription -->
                        <div class="flex items-center">
                            <input id="newsletter" name="newsletter" type="checkbox" 
                                   class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                   {{ old('newsletter') ? 'checked' : '' }}>
                            <label for="newsletter" class="ml-2 block text-sm text-gray-700">
                                Subscribe to our newsletter for health tips and updates
                            </label>
                        </div>
                        
                        <!-- Terms and Conditions -->
                        {{-- <div class="flex items-center">
                            <input id="terms" name="terms" type="checkbox" required
                                   class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                            <label for="terms" class="ml-2 block text-sm text-gray-700">
                                I agree to the 
                                <a href="{{ route('terms') }}" class="text-primary-600 hover:text-primary-500 font-medium">Terms of Service</a>
                                and 
                                <a href="{{ route('privacy') }}" class="text-primary-600 hover:text-primary-500 font-medium">Privacy Policy</a>
                            </label>
                        </div> --}}
                        
                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors">
                            <i data-lucide="user-plus" class="w-5 h-5 mr-2"></i>
                            Create Account
                        </button>
                        
                        <!-- Divider -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Or continue with</span>
                            </div>
                        </div>
                        
                        <!-- Google Register -->
                        <a href="{{ route('register.google') }}" 
                           class="w-full flex justify-center items-center py-3 px-4 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors">
                            <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            Continue with Google
                        </a>
                    </form>
                    
                    <!-- Login Link -->
                    <div class="mt-8 text-center">
                        <p class="text-gray-600">
                            Already have an account? 
                            <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:text-primary-500">
                                Sign in here
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
@endsection

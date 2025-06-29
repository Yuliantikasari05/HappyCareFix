@extends('layouts.app')

@section('title', 'My Profile - HappyCare')

@section('content')
<div x-data="{ activeTab: 'personal-info' }" class="min-h-screen bg-gray-50">
    <!-- Profile Header -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 text-white">
        <div class="container px-4 py-8 mx-auto">
            <div class="flex flex-col items-center md:flex-row md:items-center">
                <div class="mb-4 md:mb-0 md:mr-6">
                    <div class="w-24 h-24 overflow-hidden rounded-full bg-white/20 backdrop-blur-sm">
                        @if(Auth::user()->avatar ?? false)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="object-cover w-full h-full">
                        @else
                            <div class="flex items-center justify-center w-full h-full text-2xl font-bold text-primary-600 bg-white">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="text-center md:text-left">
                    <h1 class="text-3xl font-bold">{{ Auth::user()->name }}</h1>
                    <p class="flex items-center justify-center mt-2 text-primary-100 md:justify-start">
                        <i data-lucide="mail" class="w-4 h-4 mr-2"></i>
                        {{ Auth::user()->email }}
                    </p>
                    @if(Auth::user()->phone ?? false)
                        <p class="flex items-center justify-center mt-1 text-primary-100 md:justify-start">
                            <i data-lucide="phone" class="w-4 h-4 mr-2"></i>
                            {{ Auth::user()->phone }}
                        </p>
                    @endif
                    <div class="flex flex-wrap justify-center gap-2 mt-4 md:justify-start">
                        <span class="px-3 py-1 text-sm font-medium text-primary-700 bg-white rounded-full">
                            {{ ucfirst(Auth::user()->role ?? 'User') }}
                        </span>
                        @if(Auth::user()->hasVerifiedEmail())
                            <span class="px-3 py-1 text-sm font-medium text-emerald-700 bg-emerald-100 rounded-full">
                                <i data-lucide="check-circle" class="w-3 h-3 mr-1"></i>
                                Email Verified
                            </span>
                        @else
                            <span class="px-3 py-1 text-sm font-medium text-amber-700 bg-amber-100 rounded-full">
                                <i data-lucide="alert-circle" class="w-3 h-3 mr-1"></i>
                                Email Not Verified
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-4 py-8 mx-auto">
        <div class="flex flex-col lg:flex-row lg:space-x-8">
            <!-- Sidebar Navigation -->
            <div class="w-full mb-8 lg:w-1/4 lg:mb-0">
                <div class="bg-white rounded-lg shadow-sm">
                    <nav class="p-2">
                        <button @click="activeTab = 'personal-info'" 
                                :class="activeTab === 'personal-info' ? 'bg-primary-50 text-primary-700 border-primary-200' : 'text-gray-600 hover:bg-gray-50'"
                                class="flex items-center w-full px-4 py-3 text-sm font-medium text-left transition-colors border border-transparent rounded-lg">
                            <i data-lucide="user" class="w-4 h-4 mr-3"></i>
                            Personal Information
                        </button>
                        <button @click="activeTab = 'appointments'" 
                                :class="activeTab === 'appointments' ? 'bg-primary-50 text-primary-700 border-primary-200' : 'text-gray-600 hover:bg-gray-50'"
                                class="flex items-center w-full px-4 py-3 text-sm font-medium text-left transition-colors border border-transparent rounded-lg">
                            <i data-lucide="calendar-check" class="w-4 h-4 mr-3"></i>
                            My Appointments
                        </button>
                        <button @click="activeTab = 'tour-bookings'" 
                                :class="activeTab === 'tour-bookings' ? 'bg-primary-50 text-primary-700 border-primary-200' : 'text-gray-600 hover:bg-gray-50'"
                                class="flex items-center w-full px-4 py-3 text-sm font-medium text-left transition-colors border border-transparent rounded-lg">
                            <i data-lucide="map" class="w-4 h-4 mr-3"></i>
                            Tour Bookings
                        </button>
                        <button @click="activeTab = 'medical-records'" 
                                :class="activeTab === 'medical-records' ? 'bg-primary-50 text-primary-700 border-primary-200' : 'text-gray-600 hover:bg-gray-50'"
                                class="flex items-center w-full px-4 py-3 text-sm font-medium text-left transition-colors border border-transparent rounded-lg">
                            <i data-lucide="file-text" class="w-4 h-4 mr-3"></i>
                            Medical Records
                        </button>
                        <button @click="activeTab = 'security'" 
                                :class="activeTab === 'security' ? 'bg-primary-50 text-primary-700 border-primary-200' : 'text-gray-600 hover:bg-gray-50'"
                                class="flex items-center w-full px-4 py-3 text-sm font-medium text-left transition-colors border border-transparent rounded-lg">
                            <i data-lucide="shield" class="w-4 h-4 mr-3"></i>
                            Security
                        </button>
                        <button @click="activeTab = 'notifications'" 
                                :class="activeTab === 'notifications' ? 'bg-primary-50 text-primary-700 border-primary-200' : 'text-gray-600 hover:bg-gray-50'"
                                class="flex items-center w-full px-4 py-3 text-sm font-medium text-left transition-colors border border-transparent rounded-lg">
                            <i data-lucide="bell" class="w-4 h-4 mr-3"></i>
                            Notifications
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="w-full lg:w-3/4">
                <!-- Personal Information Tab -->
                <div x-show="activeTab === 'personal-info'" class="bg-white rounded-lg shadow-sm">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Personal Information</h2>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" value="{{ Auth::user()->phone ?? '' }}" 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label for="avatar" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                                    <input type="file" id="avatar" name="avatar" 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                                </div>
                            </div>
                            <div class="mt-6">
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <textarea id="address" name="address" rows="3" 
                                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">{{ Auth::user()->address ?? '' }}</textarea>
                            </div>
                            <div class="mt-6">
                                <div class="flex items-center">
                                    <input type="checkbox" id="newsletter" name="newsletter" {{ (Auth::user()->newsletter ?? false) ? 'checked' : '' }}
                                           class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                                    <label for="newsletter" class="ml-2 text-sm text-gray-700">Subscribe to our newsletter</label>
                                </div>
                            </div>
                            <div class="mt-6">
                                <button type="submit" class="px-6 py-2 text-white transition-colors rounded-lg bg-primary-600 hover:bg-primary-700">
                                    Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Appointments Tab -->
                <div x-show="activeTab === 'appointments'" class="bg-white rounded-lg shadow-sm">
                    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">My Appointments</h2>
                        <button class="px-4 py-2 text-sm font-medium text-white transition-colors rounded-lg bg-primary-600 hover:bg-primary-700">
                            Book New Appointment
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="px-4 py-3 text-left font-medium text-gray-900">Department</th>
                                        <th class="px-4 py-3 text-left font-medium text-gray-900">Doctor</th>
                                        <th class="px-4 py-3 text-left font-medium text-gray-900">Date</th>
                                        <th class="px-4 py-3 text-left font-medium text-gray-900">Time</th>
                                        <th class="px-4 py-3 text-left font-medium text-gray-900">Status</th>
                                        <th class="px-4 py-3 text-left font-medium text-gray-900">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3">Cardiology</td>
                                        <td class="px-4 py-3">Dr. John Smith</td>
                                        <td class="px-4 py-3">May 15, 2023</td>
                                        <td class="px-4 py-3">10:30 AM</td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs font-medium text-emerald-700 bg-emerald-100 rounded-full">Confirmed</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex space-x-2">
                                                <button class="px-3 py-1 text-xs font-medium text-primary-700 border border-primary-300 rounded hover:bg-primary-50">View</button>
                                                <button class="px-3 py-1 text-xs font-medium text-red-700 border border-red-300 rounded hover:bg-red-50">Cancel</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3">Neurology</td>
                                        <td class="px-4 py-3">Dr. Sarah Johnson</td>
                                        <td class="px-4 py-3">June 5, 2023</td>
                                        <td class="px-4 py-3">2:00 PM</td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs font-medium text-amber-700 bg-amber-100 rounded-full">Pending</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex space-x-2">
                                                <button class="px-3 py-1 text-xs font-medium text-primary-700 border border-primary-300 rounded hover:bg-primary-50">View</button>
                                                <button class="px-3 py-1 text-xs font-medium text-red-700 border border-red-300 rounded hover:bg-red-50">Cancel</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tour Bookings Tab -->
                <div x-show="activeTab === 'tour-bookings'" class="bg-white rounded-lg shadow-sm">
                    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Tour Bookings</h2>
                        <button class="px-4 py-2 text-sm font-medium text-white transition-colors rounded-lg bg-primary-600 hover:bg-primary-700">
                            Book New Tour
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="px-4 py-3 text-left font-medium text-gray-900">Tour</th>
                                        <th class="px-4 py-3 text-left font-medium text-gray-900">Date</th>
                                        <th class="px-4 py-3 text-left font-medium text-gray-900">Participants</th>
                                        <th class="px-4 py-3 text-left font-medium text-gray-900">Status</th>
                                        <th class="px-4 py-3 text-left font-medium text-gray-900">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3">Nature Tour</td>
                                        <td class="px-4 py-3">May 20, 2023</td>
                                        <td class="px-4 py-3">2</td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs font-medium text-emerald-700 bg-emerald-100 rounded-full">Confirmed</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex space-x-2">
                                                <button class="px-3 py-1 text-xs font-medium text-primary-700 border border-primary-300 rounded hover:bg-primary-50">View</button>
                                                <button class="px-3 py-1 text-xs font-medium text-red-700 border border-red-300 rounded hover:bg-red-50">Cancel</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3">Culinary Tour</td>
                                        <td class="px-4 py-3">June 10, 2023</td>
                                        <td class="px-4 py-3">3</td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs font-medium text-amber-700 bg-amber-100 rounded-full">Pending</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex space-x-2">
                                                <button class="px-3 py-1 text-xs font-medium text-primary-700 border border-primary-300 rounded hover:bg-primary-50">View</button>
                                                <button class="px-3 py-1 text-xs font-medium text-red-700 border border-red-300 rounded hover:bg-red-50">Cancel</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Medical Records Tab -->
                <div x-show="activeTab === 'medical-records'" class="bg-white rounded-lg shadow-sm">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Medical Records</h2>
                    </div>
                    <div class="p-6">
                        <div class="p-4 mb-6 border border-blue-200 rounded-lg bg-blue-50">
                            <div class="flex items-center">
                                <i data-lucide="info" class="w-5 h-5 mr-2 text-blue-600"></i>
                                <p class="text-sm text-blue-800">Your medical records are private and secure. Only you and your authorized healthcare providers can access them.</p>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <div>
                                    <h3 class="font-medium text-gray-900">General Check-up Report</h3>
                                    <p class="text-sm text-gray-500">April 15, 2023 - Dr. John Smith</p>
                                </div>
                                <button class="px-3 py-1 text-sm font-medium text-primary-700 bg-primary-100 rounded-full">View</button>
                            </div>
                            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <div>
                                    <h3 class="font-medium text-gray-900">Blood Test Results</h3>
                                    <p class="text-sm text-gray-500">March 10, 2023 - Lab Department</p>
                                </div>
                                <button class="px-3 py-1 text-sm font-medium text-primary-700 bg-primary-100 rounded-full">View</button>
                            </div>
                            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                                <div>
                                    <h3 class="font-medium text-gray-900">X-Ray Report</h3>
                                    <p class="text-sm text-gray-500">February 5, 2023 - Radiology Department</p>
                                </div>
                                <button class="px-3 py-1 text-sm font-medium text-primary-700 bg-primary-100 rounded-full">View</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Security Tab -->
                <div x-show="activeTab === 'security'" class="bg-white rounded-lg shadow-sm">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Security Settings</h2>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('password.update') }}" method="POST" class="mb-8">
                            @csrf
                            <h3 class="mb-4 text-base font-medium text-gray-900">Change Password</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                                    <input type="password" id="current_password" name="current_password" 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                                    <input type="password" id="password" name="password" 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent" required>
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" 
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent" required>
                                </div>
                                <button type="submit" class="px-6 py-2 text-white transition-colors rounded-lg bg-primary-600 hover:bg-primary-700">
                                    Change Password
                                </button>
                            </div>
                        </form>

                        <div class="pt-8 border-t border-gray-200">
                            <h3 class="mb-4 text-base font-medium text-gray-900">Two-Factor Authentication</h3>
                            <p class="mb-4 text-sm text-gray-600">Add an extra layer of security to your account by enabling two-factor authentication.</p>
                            <button class="px-6 py-2 text-primary-700 transition-colors border border-primary-300 rounded-lg hover:bg-primary-50">
                                Enable Two-Factor Authentication
                            </button>
                        </div>

                        <div class="pt-8 border-t border-gray-200">
                            <h3 class="mb-4 text-base font-medium text-gray-900">Login Activity</h3>
                            <p class="mb-4 text-sm text-gray-600">Review your recent login activity to ensure it was you.</p>
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm">
                                    <thead>
                                        <tr class="border-b border-gray-200">
                                            <th class="px-4 py-3 text-left font-medium text-gray-900">Date & Time</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-900">IP Address</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-900">Device</th>
                                            <th class="px-4 py-3 text-left font-medium text-gray-900">Location</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-4 py-3">May 10, 2023, 10:30 AM</td>
                                            <td class="px-4 py-3">192.168.1.1</td>
                                            <td class="px-4 py-3">Chrome on Windows</td>
                                            <td class="px-4 py-3">Jakarta, Indonesia</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3">May 8, 2023, 3:15 PM</td>
                                            <td class="px-4 py-3">192.168.1.1</td>
                                            <td class="px-4 py-3">Safari on iPhone</td>
                                            <td class="px-4 py-3">Jakarta, Indonesia</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notifications Tab -->
                <div x-show="activeTab === 'notifications'" class="bg-white rounded-lg shadow-sm">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Notification Settings</h2>
                    </div>
                    <div class="p-6">
                        <form method="POST">
                            @csrf
                            <h3 class="mb-4 text-base font-medium text-gray-900">Email Notifications</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <label for="appointment_reminder" class="text-sm font-medium text-gray-900">Appointment Reminders</label>
                                        <p class="text-sm text-gray-500">Get reminded about upcoming appointments</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="appointment_reminder" name="appointment_reminder" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <label for="appointment_confirmation" class="text-sm font-medium text-gray-900">Appointment Confirmations</label>
                                        <p class="text-sm text-gray-500">Get notified when appointments are confirmed</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="appointment_confirmation" name="appointment_confirmation" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <label for="medical_updates" class="text-sm font-medium text-gray-900">Medical Updates</label>
                                        <p class="text-sm text-gray-500">Receive updates about your medical records</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="medical_updates" name="medical_updates" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <label for="newsletter_notifications" class="text-sm font-medium text-gray-900">Newsletter</label>
                                        <p class="text-sm text-gray-500">Stay updated with our latest news and tips</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="newsletter_notifications" name="newsletter_notifications" class="sr-only peer" checked>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                                    </label>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <label for="promotional_emails" class="text-sm font-medium text-gray-900">Promotional Emails</label>
                                        <p class="text-sm text-gray-500">Receive special offers and promotions</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" id="promotional_emails" name="promotional_emails" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600"></div>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-6">
                                <button type="submit" class="px-6 py-2 text-white transition-colors rounded-lg bg-primary-600 hover:bg-primary-700">
                                    Save Preferences
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
</script>
@endpush

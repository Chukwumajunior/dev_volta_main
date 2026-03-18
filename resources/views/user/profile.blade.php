@extends('layouts.app')

@section('title', 'System Identity | Profile')

@section('body-content')
    <div x-data="{
    name: '{{ old('name', $user->name) }}',
    phone: '{{ old('phone_number', $user->phone) }}',
    password: '',
    passwordConfirmation: '',
    showPasswords: false,
    activeSection: 'profile'
}" class="bg-[#fcfdfe] text-[#0a2540] min-h-screen overflow-x-hidden">

        <!-- Mobile-Optimized Hero Section -->
        <section class="relative pt-24 sm:pt-28 pb-8 sm:pb-12 text-white" style="background: linear-gradient(135deg, rgba(10, 37, 64, 0.9) 0%, rgba(0, 112, 243, 0.8) 100%), url('{{ asset('assets/img/about-page-title-bg.jpg') }}') center/cover no-repeat;">
            <div class="container mx-auto px-4 sm:px-6 max-w-7xl">
                <h1 class="text-2xl sm:text-3xl md:text-5xl font-extrabold mb-1 sm:mb-2 text-white leading-tight">Account Settings</h1>
                <p class="text-sm sm:text-base text-gray-200 max-w-2xl">Manage your system credentials and contact synchronization.</p>
                <nav class="flex mt-3 sm:mt-4">
                    <ol class="flex items-center space-x-2 text-xs sm:text-sm">
                        <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition">Systems</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-white font-medium truncate">Identity Portal</li>
                    </ol>
                </nav>
            </div>
        </section>

        <div class="container mx-auto px-4 sm:px-6 py-4 sm:py-8 max-w-7xl">
            @if(auth()->user()->role === 'student')
                <!-- Mobile-Optimized Alert -->
                <div class="bg-amber-50 border-l-4 border-amber-500 rounded-xl sm:rounded-2xl p-4 sm:p-5 mb-6 sm:mb-8 shadow-sm">
                    <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
                        <div class="w-full sm:w-auto">
                            <h6 class="font-extrabold uppercase text-xs sm:text-sm mb-2 flex items-center">
                                <i class="bi bi-bank mr-2 text-amber-600 text-sm sm:text-base"></i>Primary Payment Protocol
                            </h6>
                            <div class="text-xs sm:text-sm text-gray-700 space-y-1 sm:space-y-0">
                                <span class="block sm:inline"><span class="font-bold">Bank:</span> Moniepoint</span>
                                <span class="hidden sm:inline"> | </span>
                                <span class="block sm:inline"><span class="font-bold">Account:</span> VOLTAFRIK TECHNOLOGIES</span>
                                <span class="hidden sm:inline"> | </span>
                                <span class="block sm:inline"><span class="font-bold">Number:</span> 6210666905</span>
                            </div>
                        </div>
                        <div class="w-full sm:w-auto">
                            <a href="https://wa.me/2349046282789" target="_blank" class="inline-flex items-center justify-center sm:justify-start bg-green-600 hover:bg-green-700 text-white font-bold px-5 py-2.5 rounded-full text-sm transition-all hover:-translate-y-1 shadow-md w-full sm:w-auto">
                                <i class="bi bi-whatsapp mr-2"></i>Submit Receipt
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Mobile-First Grid: Stack on mobile, side by side on desktop -->
            <div class="flex flex-col lg:grid lg:grid-cols-12 gap-6">
                <!-- Sidebar - Full width on mobile -->
                <div class="lg:col-span-4 w-full">
                    <div class="bg-[#0070f3] text-white rounded-xl sm:rounded-2xl p-6 sm:p-8 shadow-xl">
                        <div class="mb-4 flex justify-center">
                            <img src="{{ asset('assets/img/logo/dark_logo_full2.png') }}" class="w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 rounded-full border-4 border-white/50 bg-white object-contain" alt="Profile">
                        </div>
                        <h4 class="text-xl sm:text-2xl font-extrabold mb-2 text-center break-words" x-text="name"></h4>
                        <div class="inline-block bg-white text-[#0070f3] rounded-full px-3 sm:px-4 py-1.5 sm:py-2 text-xs font-extrabold uppercase mb-4 w-full text-center">
                            {{ auth()->user()->role }} Access Level
                        </div>

                        <div class="bg-white/10 rounded-lg sm:rounded-xl p-3 sm:p-4 text-xs sm:text-sm mb-4 sm:mb-5">
                            <i class="bi bi-info-circle-fill mr-2"></i>
                            <strong>Note:</strong> Your email address serves as your primary login identifier.
                        </div>

                        <div class="space-y-2">
                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('dashboard') }}" class="block w-full bg-white hover:bg-gray-100 text-[#0070f3] font-bold py-2.5 sm:py-3 rounded-full transition-all hover:-translate-y-1 shadow-md text-center text-sm sm:text-base">
                                    Open Admin Console
                                </a>
                            @else
                                <a href="{{ route('student.dashboard') }}" class="block w-full bg-white hover:bg-gray-100 text-[#0070f3] font-bold py-2.5 sm:py-3 rounded-full transition-all hover:-translate-y-1 shadow-md text-center text-sm sm:text-base">
                                    Open Student Portal
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Main Form - Full width on mobile -->
                <div class="lg:col-span-8 w-full">
                    <div class="bg-white rounded-xl sm:rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                        <div class="px-4 sm:px-6 py-3 sm:py-4 border-b border-gray-100 bg-gray-50">
                            <h6 class="font-extrabold uppercase text-xs sm:text-sm">Modify Identity Details</h6>
                        </div>
                        <div class="p-4 sm:p-6">
                            @if(session('success'))
                                <div class="bg-green-50 border border-green-200 rounded-lg sm:rounded-xl p-3 sm:p-4 mb-4 sm:mb-5 flex items-center" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                                    <i class="bi bi-check-circle-fill text-green-600 mr-3 text-sm sm:text-base"></i>
                                    <span class="text-green-700 text-xs sm:text-sm">{{ session('success') }}</span>
                                </div>
                            @endif

                            <form method="post" action="{{ route('profile.update') }}" @submit.prevent="$el.submit()" class="space-y-4 sm:space-y-5">
                                @csrf
                                @method('patch')

                                <!-- Full Name - Full width on mobile -->
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-1 sm:mb-2">Full Name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        x-model="name"
                                        class="w-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition text-sm sm:text-base"
                                        required
                                    >
                                    @error('name')
                                    <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Email and Phone - Stack on mobile, grid on larger screens -->
                                <div class="flex flex-col sm:grid sm:grid-cols-2 gap-4 sm:gap-5">
                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-1 sm:mb-2">Email (Read Only)</label>
                                        <div class="w-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl border border-gray-200 bg-gray-50 text-gray-600 text-sm sm:text-base truncate">
                                            {{ $user->email }}
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-1 sm:mb-2">Primary Phone</label>
                                        <input
                                            type="text"
                                            name="phone_number"
                                            x-model="phone"
                                            class="w-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition text-sm sm:text-base"
                                            required
                                        >
                                        @error('phone_number')
                                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h6 class="font-extrabold uppercase text-xs text-[#0070f3] mb-3 sm:mb-4">Security Update</h6>
                                </div>

                                <!-- Password Fields - Stack on mobile -->
                                <div class="flex flex-col sm:grid sm:grid-cols-2 gap-4 sm:gap-5">
                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-1 sm:mb-2">New Password</label>
                                        <div class="relative">
                                            <input
                                                :type="showPasswords ? 'text' : 'password'"
                                                name="password"
                                                x-model="password"
                                                class="w-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition pr-10 sm:pr-12 text-sm sm:text-base"
                                                placeholder="Leave blank to keep current"
                                            >
                                            <button
                                                type="button"
                                                @click="showPasswords = !showPasswords"
                                                class="absolute right-2 sm:right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-[#0070f3] transition p-1"
                                            >
                                                <i class="bi text-lg sm:text-base" :class="showPasswords ? 'bi-eye-slash' : 'bi-eye'"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-1 sm:mb-2">Confirm Password</label>
                                        <div class="relative">
                                            <input
                                                :type="showPasswords ? 'text' : 'password'"
                                                name="password_confirmation"
                                                x-model="passwordConfirmation"
                                                class="w-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition pr-10 sm:pr-12 text-sm sm:text-base"
                                                placeholder="Re-enter new password"
                                            >
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button - Full width on mobile -->
                                <div class="pt-4 sm:pt-6 mt-3 sm:mt-4 border-t border-gray-200">
                                    <button type="submit" class="w-full sm:w-auto bg-[#0070f3] hover:bg-blue-700 text-white font-bold px-6 sm:px-8 py-3 sm:py-3.5 rounded-full transition-all hover:-translate-y-1 shadow-lg inline-flex items-center justify-center text-sm sm:text-base">
                                        <i class="bi bi-check-circle mr-2"></i>Commit Changes
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

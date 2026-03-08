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
}" class="bg-[#fcfdfe] text-[#0a2540] min-h-screen overflow-hidden">

        <section class="relative pt-28 pb-12 text-white" style="background: linear-gradient(135deg, rgba(10, 37, 64, 0.9) 0%, rgba(0, 112, 243, 0.8) 100%), url('{{ asset('assets/img/about-page-title-bg.jpg') }}') center/cover no-repeat;">
            <div class="container max-w-7xl mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-2 text-white">Account Settings</h1>
                <p class="text-gray-200">Manage your system credentials and contact synchronization.</p>
                <nav class="flex mt-4">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition">Systems</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-white">Identity Portal</li>
                    </ol>
                </nav>
            </div>
        </section>

        <div class="container max-w-7xl mx-auto px-4 py-8">
            @if(auth()->user()->role === 'student')
                <div class="bg-amber-50 border-l-4 border-amber-500 rounded-2xl p-5 mb-8 shadow-sm">
                    <div class="grid md:grid-cols-2 gap-4 items-center">
                        <div>
                            <h6 class="font-extrabold uppercase text-sm mb-2 flex items-center">
                                <i class="bi bi-bank mr-2 text-amber-600"></i>Primary Payment Protocol
                            </h6>
                            <div class="text-sm text-gray-700">
                                <span class="font-bold">Bank:</span> Moniepoint |
                                <span class="font-bold">Account:</span> VOLTAFRIK TECHNOLOGIES ENTERPRISES |
                                <span class="font-bold">Number:</span> 6210666905
                            </div>
                        </div>
                        <div class="text-left md:text-right">
                            <a href="https://wa.me/2349046282789" target="_blank" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-bold px-5 py-2.5 rounded-full text-sm transition-all hover:-translate-y-1 shadow-md">
                                <i class="bi bi-whatsapp mr-2"></i>Submit Receipt
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid lg:grid-cols-12 gap-6">
                <!-- Sidebar -->
                <div class="lg:col-span-4">
                    <div class="bg-[#0070f3] text-white rounded-2xl p-8 shadow-xl text-center">
                        <div class="mb-4 flex justify-center">
                            <img src="{{ asset('assets/img/logo4.png') }}" class="w-32 h-32 rounded-full border-4 border-white/50 bg-white object-contain" alt="Profile">
                        </div>
                        <h4 class="text-2xl font-extrabold mb-2" x-text="name"></h4>
                        <div class="inline-block bg-white text-[#0070f3] rounded-full px-4 py-2 text-xs font-extrabold uppercase mb-4">
                            {{ auth()->user()->role }} Access Level
                        </div>

                        <div class="bg-white/10 rounded-xl p-4 text-left text-sm mb-5">
                            <i class="bi bi-info-circle-fill mr-2"></i>
                            <strong>Note:</strong> Your email address serves as your primary login identifier.
                        </div>

                        <div class="space-y-2">
                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('dashboard') }}" class="block w-full bg-white hover:bg-gray-100 text-[#0070f3] font-bold py-3 rounded-full transition-all hover:-translate-y-1 shadow-md">
                                    Open Admin Console
                                </a>
                            @else
                                <a href="{{ route('student.dashboard') }}" class="block w-full bg-white hover:bg-gray-100 text-[#0070f3] font-bold py-3 rounded-full transition-all hover:-translate-y-1 shadow-md">
                                    Open Student Portal
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Main Form -->
                <div class="lg:col-span-8">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                            <h6 class="font-extrabold uppercase text-sm">Modify Identity Details</h6>
                        </div>
                        <div class="p-6">
                            @if(session('success'))
                                <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-5 flex items-center" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                                    <i class="bi bi-check-circle-fill text-green-600 mr-3"></i>
                                    <span class="text-green-700">{{ session('success') }}</span>
                                </div>
                            @endif

                            <form method="post" action="{{ route('profile.update') }}" @submit.prevent="$el.submit()">
                                @csrf
                                @method('patch')

                                <div class="space-y-5">
                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Full Name</label>
                                        <input
                                            type="text"
                                            name="name"
                                            x-model="name"
                                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition"
                                            required
                                        >
                                        @error('name')
                                        <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="grid md:grid-cols-2 gap-5">
                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Email Access (Read Only)</label>
                                            <div class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-gray-600">
                                                {{ $user->email }}
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Primary Phone</label>
                                            <input
                                                type="text"
                                                name="phone_number"
                                                x-model="phone"
                                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition"
                                                required
                                            >
                                            @error('phone_number')
                                            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="pt-5">
                                        <h6 class="font-extrabold uppercase text-xs text-[#0070f3] mb-4">Security Update</h6>
                                    </div>

                                    <div class="grid md:grid-cols-2 gap-5">
                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">New Password</label>
                                            <div class="relative">
                                                <input
                                                    :type="showPasswords ? 'text' : 'password'"
                                                    name="password"
                                                    x-model="password"
                                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition pr-12"
                                                    placeholder="Leave blank to keep current"
                                                >
                                                <button
                                                    type="button"
                                                    @click="showPasswords = !showPasswords"
                                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-[#0070f3] transition"
                                                >
                                                    <i class="bi" :class="showPasswords ? 'bi-eye-slash' : 'bi-eye'"></i>
                                                </button>
                                            </div>
                                            @error('password')
                                            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Confirm New Password</label>
                                            <div class="relative">
                                                <input
                                                    :type="showPasswords ? 'text' : 'password'"
                                                    name="password_confirmation"
                                                    x-model="passwordConfirmation"
                                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition pr-12"
                                                    placeholder="Re-enter new password"
                                                >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-6 mt-4 border-t border-gray-200">
                                        <button type="submit" class="bg-[#0070f3] hover:bg-blue-700 text-white font-bold px-8 py-3.5 rounded-full transition-all hover:-translate-y-1 shadow-lg inline-flex items-center">
                                            <i class="bi bi-check-circle mr-2"></i>Commit Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

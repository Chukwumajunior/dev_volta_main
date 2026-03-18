@extends('layouts.app')

@section('body-content')
    <div x-data="{ email: '{{ old('email') }}', password: '', showPassword: false }" class="bg-[#fcfdfe] text-[#0a2540] min-h-screen overflow-hidden">
        <!-- Page Title -->
        <div class="relative py-24 md:py-32 bg-cover bg-center text-white" style="background-image: linear-gradient(rgba(10, 37, 64, 0.85), rgba(10, 37, 64, 0.85)), url('{{ asset('assets/img/login.jpg') }}');" data-aos="fade">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="max-w-3xl">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-4 text-white">Authentication</h1>
                    <nav class="flex">
                        <ol class="flex items-center space-x-2 text-sm">
                            <li><a href="/" class="text-gray-300 hover:text-white transition">Home</a></li>
                            <li class="text-gray-400">/</li>
                            <li class="text-white">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container max-w-7xl mx-auto px-4 py-16">
            <div class="flex justify-center">
                <div class="w-full max-w-md">
                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 rounded-2xl p-4 mb-6" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                            <ul class="text-sm font-semibold text-red-600 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
                        <h3 class="text-2xl font-extrabold text-center mb-6 text-[#0a2540]">Welcome Back</h3>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label for="email" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        x-model="email"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-orange-100 outline-none transition"
                                        required
                                        placeholder="your@email.com"
                                    >
                                </div>

                                <div>
                                    <label for="password" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Password</label>
                                    <div class="relative">
                                        <input
                                            :type="showPassword ? 'text' : 'password'"
                                            name="password"
                                            x-model="password"
                                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-orange-100 outline-none transition pr-12"
                                            required
                                            placeholder="••••••••"
                                        >
                                        <button
                                            type="button"
                                            @click="showPassword = !showPassword"
                                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-[#0070f3] transition"
                                        >
                                            <i class="bi" :class="showPassword ? 'bi-eye-slash' : 'bi-eye'"></i>
                                        </button>
                                    </div>
                                </div>

                                <button type="submit" class="w-full bg-[#0070f3] hover:bg-[#e06b0c] text-white font-bold py-4 rounded-full text-lg transition-all hover:-translate-y-1 shadow-lg hover:shadow-xl mt-6">
                                    Sign In
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

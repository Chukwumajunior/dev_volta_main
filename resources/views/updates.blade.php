@extends('layouts.app')

@section('title', 'Latest Updates - Voltafrik')

@section('nav-content')
@endsection

@section('body-content')
    <div x-data="{ category: '{{ request('category') }}' }" class="bg-[#fcfdfe] text-[#0a2540] overflow-hidden">
        <div class="relative py-24 md:py-32 bg-cover bg-center text-white" style="background-image: linear-gradient(rgba(10, 37, 64, 0.85), rgba(10, 37, 64, 0.85)), url('{{ asset('assets/img/about-page-title-bg.jpg') }}');" data-aos="fade">
            <div class="container max-w-7xl mx-auto px-4 text-center">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-4 text-white">Stay Updated with Our Latest News & Services</h1>
                <nav class="flex justify-center">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-white">Updates</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="py-16 bg-gray-50">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-3">Voltafrik Insights</h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto">Discover the latest trends, innovations, and project highlights in renewable energy, smart tech, and sustainable living.</p>
                </div>

                <div class="flex justify-center mb-12">
                    <form method="GET" action="{{ route('updates') }}" class="w-full max-w-2xl">
                        <div class="flex flex-col md:flex-row gap-3 bg-white p-3 rounded-2xl shadow-sm border border-gray-200">
                            <div class="flex-grow flex items-center gap-3 px-3">
                                <label class="text-sm font-semibold text-gray-700 whitespace-nowrap">Filter by Category:</label>
                                <select name="category" x-model="category" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#0070f3] focus:border-transparent">
                                    <option value="">All Categories</option>
                                    <option value="Updates">Updates</option>
                                    <option value="Renewable Energy">Renewable Energy</option>
                                    <option value="Smart Gadgets">Smart Gadgets</option>
                                    <option value="Projects">Projects</option>
                                </select>
                            </div>
                            <button type="submit" class="bg-[#0070f3] hover:bg-[#e06b0c] text-white font-semibold px-6 py-2 rounded-xl transition whitespace-nowrap">Apply Filter</button>
                        </div>
                    </form>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($updates as $update)
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden group" data-aos="fade-up">
                            <div class="overflow-hidden h-56">
                                <img src="{{ asset('storage/' . $update->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $update->title }}">
                            </div>
                            <div class="p-5 flex flex-col h-[calc(100%-14rem)]">
                                <h5 class="font-bold text-xl mb-2 group-hover:text-[#0070f3] transition">{{ $update->title }}</h5>
                                <p class="text-sm text-gray-600 mb-4 flex-grow">{{ Str::limit($update->excerpt, 100) }}</p>
                                <a href="{{ route('blog.show', $update->slug) }}" class="inline-flex items-center text-[#0070f3] font-semibold hover:gap-2 transition-all">
                                    Read More <i class="bi bi-arrow-right ml-1"></i>
                                </a>
                            </div>
                            <div class="px-5 py-3 bg-gray-50 text-xs text-gray-500 border-t border-gray-100">
                                {{ $update->created_at->format('M d, Y') }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12 flex justify-center">
                    {{ $updates->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </section>
    </div>
@endsection

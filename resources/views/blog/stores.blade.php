@extends('layouts.app')

@section('title', 'Hardware Solutions | Voltafrik Store')

@section('nav-content')
@endsection

@section('body-content')
    <div x-data="{
    searchQuery: '{{ request()->search }}',
    showFilters: false,
    sortBy: 'newest'
}" class="bg-[#fcfdfe] text-[#0a2540] overflow-hidden">

        <section class="relative pt-32 pb-16 text-white text-center" style="background: linear-gradient(135deg, rgba(10, 37, 64, 0.9) 0%, rgba(0, 112, 243, 0.8) 100%), url('{{ asset('assets/img/bg05.jpg') }}') center/cover no-repeat;">
            <div class="container max-w-7xl mx-auto px-4">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 text-white">Hardware Inventory</h1>
                <p class="text-lg md:text-xl text-gray-200 mb-6">Industrial-grade solar components and sustainable mobility hardware.</p>
                <nav class="flex justify-center">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-white">Inventory</li>
                    </ol>
                </nav>
            </div>
        </section>

        <div class="container max-w-7xl mx-auto px-4 -mt-8 relative z-20">
            <div class="flex justify-center">
                <div class="w-full max-w-2xl">
                    <form method="GET" action="{{ route('filter.store') }}" class="relative">
                        <input
                            type="text"
                            name="search"
                            x-model="searchQuery"
                            class="w-full px-6 py-4 rounded-full border border-gray-200 shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-[#0070f3] pr-36 text-lg"
                            placeholder="Search catalog for SKUs or product names..."
                        >
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 bg-[#0070f3] hover:bg-blue-700 text-white font-bold px-6 py-2.5 rounded-full transition flex items-center gap-2">
                            <i class="bi bi-search"></i> SEARCH
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <section class="py-16">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-end mb-8">
                    <div>
                        <span class="text-[#0070f3] font-extrabold text-xs uppercase tracking-wider block mb-2">Active Listing</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold">Available Deployment Hardware</h2>
                    </div>
                    <div class="mt-3 md:mt-0">
                        <p class="text-sm text-gray-500">Total active items detected: {{ $products->total() }}</p>
                    </div>
                </div>

                <!-- Quick Filters (optional) -->
                <div class="flex flex-wrap gap-3 mb-8">
                    <button @click="sortBy = 'newest'" class="px-4 py-2 rounded-full text-sm font-semibold transition" :class="sortBy === 'newest' ? 'bg-[#0070f3] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'">Newest First</button>
                    <button @click="sortBy = 'price-low'" class="px-4 py-2 rounded-full text-sm font-semibold transition" :class="sortBy === 'price-low' ? 'bg-[#0070f3] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'">Price: Low to High</button>
                    <button @click="sortBy = 'price-high'" class="px-4 py-2 rounded-full text-sm font-semibold transition" :class="sortBy === 'price-high' ? 'bg-[#0070f3] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'">Price: High to Low</button>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:-translate-y-2 hover:shadow-xl transition-all duration-300 group overflow-hidden" data-aos="fade-up">
                            <div class="relative h-64 overflow-hidden bg-gray-50">
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="{{ $product->title }}">
                                <div class="absolute top-3 right-3">
                                    <span class="bg-white/90 backdrop-blur-sm text-gray-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">STOCK-READY</span>
                                </div>
                            </div>
                            <div class="p-5 flex flex-col">
                                <h5 class="font-extrabold text-lg mb-2 truncate" :title="'{{ $product->title }}'">{{ $product->title }}</h5>
                                <div class="text-xl font-black text-[#0070f3] mb-4">₦{{ number_format($product->price, 2) }}</div>
                                <a href="{{ route('blog.show', $product->slug) }}" class="border-2 border-[#0070f3] text-[#0070f3] hover:bg-[#0070f3] hover:text-white font-bold py-2.5 rounded-full text-center transition w-full">
                                    Product Specifications <i class="bi bi-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-center mt-12">
                    {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </section>

        <section class="py-12 border-t border-gray-200 bg-gray-50">
            <div class="container max-w-7xl mx-auto px-4">
                <h5 class="font-extrabold text-center text-gray-500 mb-6">Procurement Assistance</h5>
                <div class="flex flex-wrap justify-center gap-4">
                    <div class="bg-white px-5 py-3 rounded-xl shadow-sm flex items-center gap-3">
                        <i class="bi bi-truck text-[#0070f3] text-xl"></i>
                        <div>
                            <div class="text-xs font-bold uppercase text-gray-400">Logistics</div>
                            <div class="text-sm font-bold">Nationwide Delivery</div>
                        </div>
                    </div>
                    <div class="bg-white px-5 py-3 rounded-xl shadow-sm flex items-center gap-3">
                        <i class="bi bi-shield-check text-green-600 text-xl"></i>
                        <div>
                            <div class="text-xs font-bold uppercase text-gray-400">Protection</div>
                            <div class="text-sm font-bold">Hardware Warranty</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

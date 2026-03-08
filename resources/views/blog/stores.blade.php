@extends('layouts.app')

@section('title', 'Voltafrik Store | Gadgets & Solar Equipment')

@section('nav-content')
@endsection

@section('body-content')
    <div x-data="{
    searchQuery: '{{ request()->search }}',
    sortBy: 'newest'
}" class="bg-[#fcfdfe] text-[#0a2540] overflow-hidden">

        <section class="relative pt-32 pb-16 text-white text-center" style="background: linear-gradient(135deg, rgba(10, 37, 64, 0.9) 0%, rgba(0, 112, 243, 0.8) 100%), url('{{ asset('assets/img/bg05.jpg') }}') center/cover no-repeat;">
            <div class="container max-w-7xl mx-auto px-4">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 text-white">Voltafrik Store</h1>
                <p class="text-lg md:text-xl text-gray-200 mb-6">Shop solar panels, CCTV cameras, smart gadgets and more.</p>
                <nav class="flex justify-center">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-white">Store</li>
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
                            placeholder="Search for solar panels, CCTV, gadgets..."
                        >
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 bg-[#0070f3] hover:bg-blue-700 text-white font-bold px-6 py-2.5 rounded-full transition flex items-center gap-2">
                            <i class="bi bi-search"></i> Search
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <section class="py-16">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold">All Products</h2>
                        <p class="text-gray-500 mt-1">{{ $products->total() }} items available</p>
                    </div>
                    <div class="flex gap-2 mt-4 md:mt-0">
                        <button @click="sortBy = 'newest'" class="px-4 py-2 rounded-full text-sm font-semibold transition" :class="sortBy === 'newest' ? 'bg-[#0070f3] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'">Newest</button>
                        <button @click="sortBy = 'price-low'" class="px-4 py-2 rounded-full text-sm font-semibold transition" :class="sortBy === 'price-low' ? 'bg-[#0070f3] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'">Price: Low to High</button>
                        <button @click="sortBy = 'price-high'" class="px-4 py-2 rounded-full text-sm font-semibold transition" :class="sortBy === 'price-high' ? 'bg-[#0070f3] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'">Price: High to Low</button>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                            <div class="relative h-56 overflow-hidden bg-gray-100">
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $product->title }}">
                                <span class="absolute top-3 right-3 bg-white px-3 py-1 rounded-full text-xs font-semibold shadow-sm">In Stock</span>
                            </div>
                            <div class="p-5">
                                <h5 class="font-bold text-lg mb-2">{{ $product->title }}</h5>
                                <p class="text-gray-600 text-sm mb-3">{{ Str::limit(strip_tags($product->body), 80) }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-[#0070f3]">{{ to_amount($product->price) }}</span>
                                    <a href="{{ route('blog.show', $product->slug) }}" class="bg-[#0070f3] hover:bg-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold transition">
                                        View Details
                                    </a>
                                </div>
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
                <div class="flex flex-wrap justify-center gap-6">
                    <div class="bg-white px-6 py-4 rounded-xl shadow-sm flex items-center gap-3">
                        <i class="bi bi-truck text-[#0070f3] text-xl"></i>
                        <div>
                            <div class="text-xs font-bold uppercase text-gray-400">Delivery</div>
                            <div class="font-semibold">Nationwide Shipping</div>
                        </div>
                    </div>
                    <div class="bg-white px-6 py-4 rounded-xl shadow-sm flex items-center gap-3">
                        <i class="bi bi-shield-check text-green-600 text-xl"></i>
                        <div>
                            <div class="text-xs font-bold uppercase text-gray-400">Warranty</div>
                            <div class="font-semibold">1 Year Guarantee</div>
                        </div>
                    </div>
                    <div class="bg-white px-6 py-4 rounded-xl shadow-sm flex items-center gap-3">
                        <i class="bi bi-headset text-purple-600 text-xl"></i>
                        <div>
                            <div class="text-xs font-bold uppercase text-gray-400">Support</div>
                            <div class="font-semibold">24/7 Customer Care</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

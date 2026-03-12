@extends('layouts.app')

@section('title', $post->title . ' - Voltafrik')

@section('nav-content')
@endsection

@section('body-content')
    <div x-data="{ activeImage: 0, showContact: false }" class="bg-[#fcfdfe] text-[#0a2540] font-['Inter',sans-serif] overflow-hidden">

        <section class="relative pt-32 pb-16" style="background: linear-gradient(135deg, #fff 0%, #eef6ff 100%); border-bottom: 1px solid rgba(0, 112, 243, 0.1);">
            <div class="container max-w-7xl mx-auto px-4">
                <nav class="mb-4">
                    <ol class="flex items-center space-x-2 text-sm">
                        @if(isset($post) && $post->type === 'store')
                            <li><a href="{{ route('blog.stores') }}" class="text-gray-600 hover:text-[#0070f3] transition">Stores</a></li>
                            <li class="text-gray-400">/</li>
                        @else
                            <li><a href="/" class="text-gray-600 hover:text-[#0070f3] transition">Home</a></li>
                            <li class="text-gray-400">/</li>
                        @endif
                        <li class="text-[#0a2540] font-semibold truncate">{{ $post->title ?? 'Post' }}</li>
                        @if(auth()->check() && (auth()->user()->isAdmin() || auth()->user()->isWriter()))
                            <li class="text-gray-400">/</li>
                            <li><a href="{{ route('blog.create') }}" class="text-gray-600 hover:text-[#0070f3] transition">Create New Post</a></li>
                        @endif
                    </ol>
                </nav>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-black">{{ $post->title }}</h1>
            </div>
        </section>

        <div class="container max-w-7xl mx-auto px-4 py-12">
            <div class="lg:flex lg:gap-8">

                <div class="lg:w-1/2 flex-shrink-0 mb-8 lg:mb-0">
                    <img src="{{ asset('storage/' . $post->image) }}" class="w-full object-cover rounded-2xl" alt="{{ $post->title }}">
                </div>

                <div class="lg:w-1/2 prose prose-lg text-gray-600 leading-relaxed">

                    @if($post->type === 'store')
                        <span class="text-[#0070f3] font-extrabold text-xs uppercase tracking-wider mb-2 inline-block">Featured Store Item</span>
                        <h2 class="text-3xl md:text-4xl font-black mb-4">{{ $post->title }}</h2>

                        <div class="flex flex-wrap gap-2 mb-5">
                        <span class="bg-white border border-gray-200 px-4 py-2 rounded-full text-sm font-semibold text-gray-600 inline-flex items-center">
                            <i class="bi bi-tag text-[#0070f3] mr-2"></i> Available Now
                        </span>
                            <span class="bg-white border border-gray-200 px-4 py-2 rounded-full text-sm font-semibold text-gray-600 inline-flex items-center">
                            <i class="bi bi-box text-[#0070f3] mr-2"></i> In Stock
                        </span>
                            <span class="bg-white border border-gray-200 px-4 py-2 rounded-full text-sm font-semibold text-gray-600 inline-flex items-center">
                            <i class="bi bi-shield-check text-[#0070f3] mr-2"></i> Quality Assured
                        </span>
                        </div>

                        <h3 class="text-2xl text-[#0070f3] font-bold mb-5">{{ to_amount($post->price) }}</h3>

                        <div class="bg-gray-50 rounded-xl p-5 border border-gray-200 mb-6">
                            <div class="grid grid-cols-3 text-center">
                                <div class="border-r border-gray-300">
                                    <span class="block text-xs text-gray-500 mb-1">Category</span>
                                    <span class="font-bold">{{ $post->category ?? 'General' }}</span>
                                </div>
                                <div class="border-r border-gray-300">
                                    <span class="block text-xs text-gray-500 mb-1">Availability</span>
                                    <span class="font-bold">In Stock</span>
                                </div>
                                <div>
                                    <span class="block text-xs text-gray-500 mb-1">SKU</span>
                                    <span class="font-bold">{{ $post->sku ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>

                        <a href="tel:09034152070" class="bg-[#0070f3] hover:bg-blue-700 text-white font-bold px-8 py-4 rounded-full text-lg transition-all hover:-translate-y-1 shadow-xl inline-flex items-center justify-center max-w-xs">
                            <i class="bi bi-telephone mr-2"></i> Inquire Now
                        </a>
                    @endif

                    <div class="mt-6">
                        {!! $post->body !!}
                    </div>

                    @if(auth()->user() && (auth()->user()->role === 'admin' || auth()->user()->role === 'writer'))
                        <div class="mt-8 pt-6 border-t border-gray-200 flex items-center gap-4">
                            <a href="{{ route('blog.edit', $post->id) }}" class="border border-gray-300 hover:border-[#0070f3] text-gray-700 hover:text-[#0070f3] font-semibold px-5 py-2 rounded-full transition">
                                Edit Details
                            </a>
                            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="inline" @submit.prevent="if(confirm('Archive this record?')) $el.submit()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if($relatedPosts->count() > 0)
            <section class="py-16 bg-white border-t border-gray-200">
                <div class="container max-w-7xl mx-auto px-4">
                    <h3 class="text-2xl md:text-3xl font-black mb-8">Related Items</h3>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                        @foreach($relatedPosts as $related)
                            <div class="border border-gray-200 rounded-xl overflow-hidden hover:-translate-y-1 hover:border-[#0070f3] hover:shadow-lg transition-all duration-300 group">
                                <img src="{{ asset('storage/' . $related->image) }}" class="w-full h-44 object-cover" alt="{{ $related->title }}">
                                <div class="p-4">
                                    <h6 class="font-bold mb-3 truncate">{{ $related->title }}</h6>
                                    <a href="{{ route('blog.show', $related->slug) }}" class="block border border-[#0070f3] text-[#0070f3] hover:bg-[#0070f3] hover:text-white text-center font-semibold py-2 rounded-full text-sm transition">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Create Post')

@section('nav-content')
@endsection

@section('body-content')
    <div x-data="{
    selectedType: '{{ old('type', 'info') }}',
    title: '{{ old('title') }}',
    body: '{{ old('body') }}',
    category: '{{ old('category') }}',
    price: '{{ old('price') }}',
    showPreview: false
}" class="bg-[#fcfdfe] text-[#0a2540] min-h-screen overflow-hidden">

        <!-- Page Title -->
        <div class="relative py-24 md:py-32 bg-cover bg-center text-white mb-8" style="background-image: linear-gradient(rgba(10, 37, 64, 0.85), rgba(10, 37, 64, 0.85)), url('{{ asset('assets/img/projects-page-title-bg.jpg') }}');" data-aos="fade">
            <div class="container max-w-7xl mx-auto px-4">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-4 text-white">Website Post Maker</h1>
                <nav class="flex">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li><a href="/" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-white">Create Post</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container max-w-3xl mx-auto px-4 py-8">
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-2xl p-5 mb-6" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                    <ul class="text-sm font-semibold text-red-600 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 md:p-8">
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" @submit="$el.submit()">
                    @csrf

                    <div class="space-y-5">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Title</label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                x-model="title"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#f57813] focus:ring-4 focus:ring-orange-100 outline-none transition"
                                value="{{ old('title') }}"
                                required
                            >
                            @error('title')
                            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Body -->
                        <div>
                            <label for="body" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Body</label>
                            <textarea
                                name="body"
                                id="body"
                                x-model="body"
                                rows="6"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#f57813] focus:ring-4 focus:ring-orange-100 outline-none transition"
                                required
                            >{{ old('body') }}</textarea>
                            @error('body')
                            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div>
                            <label for="image" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Image</label>
                            <input
                                type="file"
                                name="image"
                                id="image"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#f57813] focus:ring-4 focus:ring-orange-100 outline-none transition file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-[#f57813] hover:file:bg-orange-100"
                            >
                            @error('image')
                            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Category</label>
                            <select
                                name="category"
                                id="category"
                                x-model="category"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#f57813] focus:ring-4 focus:ring-orange-100 outline-none transition bg-white"
                                required
                            >
                                <option value="">Select Category</option>
                                <option value="Updates">Updates</option>
                                <option value="renewable energy">Renewable Energy</option>
                                <option value="smart gadgets">Smart Gadgets</option>
                                <option value="reviews">Reviews</option>
                                <option value="projects">Projects</option>
                                <option value="team">Team</option>
                                <option value="track">Track</option>
                                <option value="section">New Section</option>
                                <option value="partnerships">Partnerships</option>
                            </select>
                            @error('category')
                            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Post Section -->
                        <div>
                            <label for="type" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Post Type</label>
                            <select
                                name="section"
                                id="section"
                                x-model="selectedSection"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#f57813] focus:ring-4 focus:ring-orange-100 outline-none transition bg-white"
                                required
                            >
                                <option value="development">Development</option>
                                <option value="solar">Solar</option>
                            </select>
                            @error('type')
                            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Post Type -->
                        <div>
                            <label for="type" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Post Type</label>
                            <select
                                name="type"
                                id="type"
                                x-model="selectedType"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#f57813] focus:ring-4 focus:ring-orange-100 outline-none transition bg-white"
                                required
                            >
                                <option value="info">Info</option>
                                <option value="store">Store</option>
                            </select>
                            @error('type')
                            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price (conditional) -->
                        <div x-show="selectedType === 'store'" x-cloak x-transition>
                            <label for="price" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Price ($)</label>
                            <input
                                type="number"
                                name="price"
                                id="price"
                                x-model="price"
                                step="0.01"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#f57813] focus:ring-4 focus:ring-orange-100 outline-none transition"
                                placeholder="Enter price"
                            >
                            @error('price')
                            <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" class="w-full bg-[#f57813] hover:bg-[#e06b0c] text-white font-bold py-4 rounded-full text-lg transition-all hover:-translate-y-1 shadow-lg hover:shadow-xl">
                                <i class="bi bi-plus-circle mr-2"></i> Create Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Live Preview (optional enhancement) -->
            <div class="mt-8" x-show="title || body" x-cloak>
                <button @click="showPreview = !showPreview" class="text-[#f57813] font-semibold flex items-center gap-2 mx-auto">
                    <i class="bi" :class="showPreview ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                    <span x-text="showPreview ? 'Hide Preview' : 'Show Preview'"></span>
                </button>

                <div x-show="showPreview" x-transition class="mt-4 p-6 bg-gray-50 rounded-2xl border border-gray-200">
                    <h3 class="text-xl font-bold mb-2" x-text="title || 'Untitled'"></h3>
                    <p class="text-sm text-gray-600 mb-3" x-text="category ? `Category: ${category}` : ''"></p>
                    <p class="text-gray-700" x-text="body ? body.substring(0, 200) + '...' : ''"></p>
                    <p x-show="selectedType === 'store' && price" class="mt-3 text-[#f57813] font-bold" x-text="`$${price}`"></p>
                </div>
            </div>
        </div>
    </div>
@endsection

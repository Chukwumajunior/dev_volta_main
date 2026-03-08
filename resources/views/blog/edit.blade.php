@extends('layouts.app')

@section('title', 'Edit Post')

@section('nav-content')
@endsection

@section('body-content')
    <div x-data="{
    selectedType: '{{ old('type', $post->type) }}',
    title: '{{ old('title', $post->title) }}',
    body: '{{ old('body', $post->body) }}',
    category: '{{ old('category', $post->category) }}',
    price: '{{ old('price', $post->price) }}',
    showPreview: false,
    showDeleteModal: false
}" class="bg-[#fcfdfe] text-[#0a2540] min-h-screen overflow-hidden">

        <!-- Page Title -->
        <div class="relative py-24 md:py-32 bg-cover bg-center text-white mb-8" style="background-image: linear-gradient(rgba(10, 37, 64, 0.85), rgba(10, 37, 64, 0.85)), url('{{ asset('assets/img/projects-page-title-bg.jpg') }}');" data-aos="fade">
            <div class="container max-w-7xl mx-auto px-4">
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-4 text-white">Edit Post</h1>
                <nav class="flex">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li><a href="/" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-white">Edit Post</li>
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
                <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data" @submit="$el.submit()">
                    @csrf
                    @method('PUT')

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
                            ></textarea>
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
                            @if ($post->image)
                                <div class="mt-3">
                                    <p class="text-xs text-gray-500 mb-2">Current Image:</p>
                                    <img src="{{ asset('storage/' . $post->image) }}" class="rounded-xl border border-gray-200" width="200" alt="Current Image">
                                </div>
                            @endif
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
                            <label for="price" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Price ({{ get_currency() }})</label>
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

                        <!-- Action Buttons -->
                        <div class="pt-4 flex flex-col sm:flex-row gap-3">
                            <button type="submit" class="flex-1 bg-[#f57813] hover:bg-[#e06b0c] text-white font-bold py-4 rounded-full text-lg transition-all hover:-translate-y-1 shadow-lg hover:shadow-xl">
                                <i class="bi bi-check-circle mr-2"></i> Update Post
                            </button>

                            <button type="button" @click="showDeleteModal = true" class="flex-1 border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-bold py-4 rounded-full text-lg transition-all hover:-translate-y-1">
                                <i class="bi bi-trash mr-2"></i> Delete Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Live Preview -->
            <div class="mt-8" x-show="title || body" x-cloak>
                <button @click="showPreview = !showPreview" class="text-[#f57813] font-semibold flex items-center gap-2 mx-auto">
                    <i class="bi" :class="showPreview ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                    <span x-text="showPreview ? 'Hide Preview' : 'Show Preview'"></span>
                </button>

                <div x-show="showPreview" x-transition class="mt-4 p-6 bg-gray-50 rounded-2xl border border-gray-200">
                    <h3 class="text-xl font-bold mb-2" x-text="title || 'Untitled'"></h3>
                    <p class="text-sm text-gray-600 mb-3" x-text="category ? `Category: ${category}` : ''"></p>
                    <p class="text-gray-700" x-text="body ? body.substring(0, 200) + (body.length > 200 ? '...' : '') : ''"></p>
                    <p x-show="selectedType === 'store' && price" class="mt-3 text-[#f57813] font-bold" x-text="`$${parseFloat(price).toFixed(2)}`"></p>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.away="showDeleteModal = false">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="bg-white rounded-2xl max-w-md w-full p-6 relative z-10 shadow-2xl" @click.stop>
                <div class="text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="bi bi-exclamation-triangle text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-extrabold mb-2">Delete Post</h3>
                    <p class="text-gray-600 mb-6">Are you sure you want to delete this post? This action cannot be undone.</p>
                    <div class="flex gap-3">
                        <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-full transition">
                                Yes, Delete
                            </button>
                        </form>
                        <button @click="showDeleteModal = false" class="flex-1 border border-gray-300 hover:bg-gray-50 font-bold py-3 rounded-full transition">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

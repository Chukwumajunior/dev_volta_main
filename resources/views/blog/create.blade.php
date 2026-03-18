@extends('layouts.app')

@section('title', 'Create Post')

@section('nav-content')
@endsection

@section('body-content')
    <div x-data="postForm()" class="bg-[#fcfdfe] text-[#0a2540] min-h-screen overflow-hidden">

        <div class="relative py-24 md:py-32 bg-cover bg-center text-white mb-8"
             style="background-image: linear-gradient(rgba(10,37,64,0.85), rgba(10,37,64,0.85)), url('{{ asset('assets/img/projects-page-title-bg.jpg') }}');">
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
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-5">

                        <div>
                            <label for="title" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Title</label>
                            <input type="text" name="title" id="title" x-model="title" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-orange-100 outline-none transition" required>
                            @error('title') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="body" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Body</label>
                            <textarea name="body" id="body" x-model="body" rows="6" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-orange-100 outline-none transition" required></textarea>
                            @error('body') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="image" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Image</label>
                            <input type="file" name="image" id="image" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-orange-100 outline-none transition file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-[#0070f3] hover:file:bg-orange-100">
                            @error('image') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="category" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Category</label>
                            <select name="category" id="category" x-model="category" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-orange-100 outline-none transition bg-white" required>
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
                            @error('category') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="type" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Post Type</label>
                            <select name="type" id="type" x-model="type" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-orange-100 outline-none transition bg-white" required>
                                <option value="info">Info</option>
                                <option value="store">Store</option>
                            </select>
                            @error('type') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <div x-show="type==='store'" x-cloak x-transition>
                            <label for="price" class="block text-xs font-bold uppercase tracking-wide text-gray-600 mb-2">Price ({{ get_currency() }})</label>
                            <input type="number" name="price" id="price" x-model="price" step="0.01" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-orange-100 outline-none transition" placeholder="Enter price">
                            @error('price') <p class="text-red-500 text-xs mt-1 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full bg-[#0070f3] hover:bg-[#e06b0c] text-white font-bold py-4 rounded-full text-lg transition-all hover:-translate-y-1 shadow-lg hover:shadow-xl">
                                <i class="bi bi-plus-circle mr-2"></i> Create Post
                            </button>
                        </div>

                    </div>
                </form>
            </div>

            <div class="mt-8" x-show="title || body" x-cloak>
                <button @click="showPreview = !showPreview" class="text-[#0070f3] font-semibold flex items-center gap-2 mx-auto">
                    <i class="bi" :class="showPreview ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                    <span x-text="showPreview ? 'Hide Preview' : 'Show Preview'"></span>
                </button>
                <div x-show="showPreview" x-transition class="mt-4 p-6 bg-gray-50 rounded-2xl border border-gray-200">
                    <h3 class="text-xl font-bold mb-2" x-text="title || 'Untitled'"></h3>
                    <p class="text-sm text-gray-600 mb-3" x-text="category ? `Category: ${category}` : ''"></p>
                    <p class="text-gray-700" x-text="body ? body.substring(0, 200) + (body.length>200?'...':'') : ''"></p>
                    <p x-show="type==='store' && price" class="mt-3 text-[#0070f3] font-bold" x-text="`$${parseFloat(price).toFixed(2)}`"></p>
                </div>
            </div>

        </div>

        <script>
            function postForm() {
                return {
                    title: '{{ old('title') }}',
                    body: '{{ old('body') }}',
                    category: '{{ old('category') }}',
                    type: '{{ old('type', 'info') }}',
                    price: '{{ old('price') }}',
                    showPreview: false
                }
            }
        </script>
@endsection

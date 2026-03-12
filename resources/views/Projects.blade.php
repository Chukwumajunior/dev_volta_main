@extends('layouts.app')

@section('title', 'Ecosystem Impact & Projects | Voltafrik')

@section('body-content')
    <div x-data="{ selectedProject: null }" class="bg-[#fcfdfe] text-[#0a2540] overflow-hidden">
        <section class="relative pt-44 pb-24 text-white" style="background: linear-gradient(rgba(10, 37, 64, 0.9), rgba(10, 37, 64, 0.9)), url('https://images.unsplash.com/photo-1497435334941-8c899ee9e8e2?q=80&w=1974&auto=format&fit=crop') center/cover no-repeat; clip-path: polygon(0 0, 100% 0, 100% 85%, 0% 100%);">
            <div class="container max-w-7xl mx-auto px-4" data-aos="fade-up">
                <div class="max-w-2xl">
                    <span class="inline-block bg-[#f57813] text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">Proven Innovation</span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 text-white">Deploying the <br><span class="text-[#38bdf8]">Future Ecosystem</span></h1>
                    <p class="text-lg md:text-xl text-gray-200">From solar-integrated mobility hubs to decentralized energy grids, we are scaling solutions that work for Africa's unique infrastructure.</p>
                </div>
            </div>
        </section>

        <section class="py-16 -mt-16 relative z-10">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($projects as $project)
                        <div class="bg-white rounded-3xl border border-gray-100 shadow-sm hover:-translate-y-4 hover:shadow-2xl transition-all duration-500 group overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}" @mouseenter="selectedProject = {{ $project->id }}" @mouseleave="selectedProject = null">
                            <div class="relative h-64 overflow-hidden">
                                <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $project->title }}">
                                <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-xs font-bold text-[#f57813] uppercase">Strategic Deployment</span>
                            </div>
                            <div class="p-5">
                                <h4 class="font-extrabold text-xl mb-3">{{ $project->title }}</h4>
                                <p class="text-sm text-gray-600 mb-4">
                                    {{ Str::limit($project->body, 120) }}
                                </p>
                                <div class="flex gap-3 pt-4 border-t border-dashed border-gray-200">
                                    <span class="text-xs font-semibold text-gray-600 bg-gray-100 px-3 py-1.5 rounded"><i class="bi bi-cpu mr-1"></i> IoT Ready</span>
                                    <span class="text-xs font-semibold text-gray-600 bg-gray-100 px-3 py-1.5 rounded"><i class="bi bi-lightning-charge mr-1"></i> Solar Sync</span>
                                </div>
                            </div>
                            <a href="{{ route('blog.show', $project->slug) }}" class="block w-full py-4 bg-gray-50 hover:bg-[#0a2540] group-hover:text-white text-center font-bold transition-all duration-300 border-t border-gray-100">
                                ANALYZE IMPACT <i class="bi bi-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-16">
                            <div class="bg-gray-50 rounded-3xl p-12 border border-dashed border-gray-300 max-w-2xl mx-auto">
                                <i class="bi bi-stack text-6xl text-gray-300 mb-4"></i>
                                <h3 class="text-2xl font-extrabold mb-2">Ecosystem Initializing</h3>
                                <p class="text-gray-600">New sustainable mobility projects are currently being mapped.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="py-16 bg-white">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="bg-gray-50 rounded-3xl p-8 md:p-12 text-center max-w-4xl mx-auto border border-gray-200" data-aos="zoom-in">
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Have a Strategic Location?</h2>
                    <p class="text-gray-600 text-lg mb-8 max-w-xl mx-auto">We are actively seeking residential estates and corporate hubs for our next E-VOLT solar-integrated bus stop deployments.</p>
                    <a href="/contact" class="inline-block bg-[#0a2540] hover:bg-[#f57813] text-white font-bold px-8 py-4 rounded-full text-lg transition-all hover:-translate-y-1 shadow-lg">Propose a Site</a>
                </div>
            </div>
        </section>
    </div>
@endsection

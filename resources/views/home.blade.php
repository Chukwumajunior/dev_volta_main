@extends('layouts.app')

@section('body-content')
    <div x-data="voltafrikHome()">
        <!-- Hero Section - Single Column -->
        <section class="pt-36 pb-24 bg-gradient-to-b from-[#0a2540] to-[#1a3650] text-white relative overflow-hidden">
            <!-- Tech Background Elements -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-20 left-10 text-8xl font-mono text-white/20">{ }</div>
                <div class="absolute bottom-20 right-10 text-8xl font-mono text-white/20">< /></div>
                <div class="absolute top-1/2 left-1/4 w-72 h-72 bg-[#0070f3]/20 rounded-full blur-3xl"></div>
            </div>

            <div class="container max-w-4xl mx-auto px-4 text-center relative z-10">
                <span class="inline-block px-4 py-2 mb-6 text-sm font-semibold text-[#0070f3] bg-white/10 rounded-full border border-white/20">VOLTAFRIK TECHNOLOGIES</span>
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                    We Build <span class="text-[#0070f3]">Web Solutions</span><br>That Work
                </h1>
                <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
                    Custom websites and web applications for businesses in Nigeria.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="/contact" class="bg-[#0070f3] hover:bg-white hover:text-[#0a2540] text-white px-8 py-4 rounded-full font-semibold transition-all hover:-translate-y-1 shadow-lg">Start Your Project</a>
                    <a href="/projects" class="border-2 border-white text-white hover:bg-white hover:text-[#0a2540] px-8 py-4 rounded-full font-semibold transition-all hover:-translate-y-1">View Our Work</a>
                </div>
            </div>
        </section>

        <!-- What We Do -->
        <section class="py-20 bg-white">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="text-center mb-16">
                    <span class="text-[#0070f3] font-mono text-sm mb-2 block">&lt;services&gt;</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-[#0a2540]">What We <span class="text-[#0070f3]">Do</span></h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:border-[#0070f3] transition-all group">
                        <div class="w-14 h-14 bg-[#0070f3]/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-[#0070f3] group-hover:text-white transition-all">
                            <i class="bi bi-window text-2xl text-[#0070f3] group-hover:text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-3">Website Development</h3>
                        <p class="text-gray-600">Business websites, landing pages, and corporate portals that make an impact.</p>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:border-[#0070f3] transition-all group">
                        <div class="w-14 h-14 bg-[#0070f3]/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-[#0070f3] group-hover:text-white transition-all">
                            <i class="bi bi-cart text-2xl text-[#0070f3] group-hover:text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-3">E-commerce</h3>
                        <p class="text-gray-600">Online stores with payment integration and inventory management.</p>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 hover:border-[#0070f3] transition-all group">
                        <div class="w-14 h-14 bg-[#0070f3]/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-[#0070f3] group-hover:text-white transition-all">
                            <i class="bi bi-code-slash text-2xl text-[#0070f3] group-hover:text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-3">Web Applications</h3>
                        <p class="text-gray-600">Custom software, portals, and business management systems.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Types of Websites -->
        <section class="py-20 bg-gray-50">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="text-center mb-16">
                    <span class="text-[#0070f3] font-mono text-sm mb-2 block">&lt;solutions&gt;</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-[#0a2540]">Website <span class="text-[#0070f3]">Solutions</span></h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white p-6 rounded-xl text-center border border-gray-200 hover:border-[#0070f3] transition-all">
                        <i class="bi bi-briefcase text-3xl text-[#0070f3] mb-3"></i>
                        <h4 class="font-bold">Corporate</h4>
                    </div>
                    <div class="bg-white p-6 rounded-xl text-center border border-gray-200 hover:border-[#0070f3] transition-all">
                        <i class="bi bi-shop text-3xl text-[#0070f3] mb-3"></i>
                        <h4 class="font-bold">E-commerce</h4>
                    </div>
                    <div class="bg-white p-6 rounded-xl text-center border border-gray-200 hover:border-[#0070f3] transition-all">
                        <i class="bi bi-journal text-3xl text-[#0070f3] mb-3"></i>
                        <h4 class="font-bold">Blog/News</h4>
                    </div>
                    <div class="bg-white p-6 rounded-xl text-center border border-gray-200 hover:border-[#0070f3] transition-all">
                        <i class="bi bi-phone text-3xl text-[#0070f3] mb-3"></i>
                        <h4 class="font-bold">Web App</h4>
                    </div>
                    <div class="bg-white p-6 rounded-xl text-center border border-gray-200 hover:border-[#0070f3] transition-all">
                        <i class="bi bi-building text-3xl text-[#0070f3] mb-3"></i>
                        <h4 class="font-bold">Enterprise</h4>
                    </div>
                    <div class="bg-white p-6 rounded-xl text-center border border-gray-200 hover:border-[#0070f3] transition-all">
                        <i class="bi bi-mortarboard text-3xl text-[#0070f3] mb-3"></i>
                        <h4 class="font-bold">Education</h4>
                    </div>
                    <div class="bg-white p-6 rounded-xl text-center border border-gray-200 hover:border-[#0070f3] transition-all">
                        <i class="bi bi-calendar-check text-3xl text-[#0070f3] mb-3"></i>
                        <h4 class="font-bold">Booking</h4>
                    </div>
                    <div class="bg-white p-6 rounded-xl text-center border border-gray-200 hover:border-[#0070f3] transition-all">
                        <i class="bi bi-people text-3xl text-[#0070f3] mb-3"></i>
                        <h4 class="font-bold">Portal</h4>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing -->
        <section class="py-20 bg-white">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="text-center mb-16">
                    <span class="text-[#0070f3] font-mono text-sm mb-2 block">&lt;pricing&gt;</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-[#0a2540]">Simple <span class="text-[#0070f3]">Pricing</span></h2>
                </div>

                <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <div class="bg-white rounded-2xl border border-gray-200 p-8 hover:shadow-xl transition-all">
                        <h3 class="text-2xl font-bold mb-2">Basic</h3>
                        <div class="text-3xl font-bold text-[#0070f3] mb-4">₦300k - ₦800k<span class="text-base text-gray-500 font-normal">+</span></div>
                        <ul class="space-y-3 mb-8 text-gray-600">
                            <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-green-500"></i> Mobile responsive</li>
                            <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-green-500"></i> Contact form</li>
                            <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-green-500"></i> Basic SEO</li>
                            <li class="flex items-center gap-2"><i class="bi bi-x-circle-fill text-grey-500"></i> Admin dashboard</li>
                        </ul>
                        <a href="/contact" class="block w-full text-center border-2 border-[#0a2540] text-[#0a2540] hover:bg-[#0a2540] hover:text-white font-semibold py-3 rounded-full transition-all">Get Quote</a>
                    </div>
                    <div class="bg-white rounded-2xl border-2 border-[#0070f3] p-8 shadow-xl relative">
                        <div class="absolute -top-3 right-4 bg-[#0070f3] text-white text-xs px-3 py-1 rounded-full">POPULAR</div>
                        <h3 class="text-2xl font-bold mb-2">Business</h3>
                        <div class="text-3xl font-bold text-[#0070f3] mb-4">₦1.2M - ₦1.7M<span class="text-base text-gray-500 font-normal">+</span></div>
                        <ul class="space-y-3 mb-8 text-gray-600">
                            <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-green-500"></i> CMS integration</li>
                            <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-green-500"></i> Blog/News section</li>
                            <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-green-500"></i> Advanced SEO</li>
                            <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-green-500"></i> Admin dashboard</li>
                        </ul>
                        <a href="/contact" class="block w-full text-center bg-[#0070f3] hover:bg-[#0a2540] text-white font-semibold py-3 rounded-full transition-all">Get Quote</a>
                    </div>
                    <div class="bg-white rounded-2xl border border-gray-200 p-8 hover:shadow-xl transition-all">
                        <h3 class="text-2xl font-bold mb-2">E-commerce</h3>
                        <div class="text-3xl font-bold text-[#0070f3] mb-4">₦2.2M<span class="text-base text-gray-500 font-normal">+</span></div>
                        <ul class="space-y-3 mb-8 text-gray-600">
                            <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-green-500"></i> Online store</li>
                            <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-green-500"></i> Payment integration</li>
                            <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-green-500"></i> Inventory management</li>
                            <li class="flex items-center gap-2"><i class="bi bi-check-circle-fill text-green-500"></i> Admin dashboard</li>
                        </ul>
                        <a href="/contact" class="block w-full text-center border-2 border-[#0a2540] text-[#0a2540] hover:bg-[#0a2540] hover:text-white font-semibold py-3 rounded-full transition-all">Get Quote</a>
                    </div>
                </div>
                <p class="text-center text-sm text-gray-500 mt-6">*Custom projects quoted separately</p>
            </div>
        </section>

        @php
            $sectionPosts = $allPosts->where('category', 'section')->take(2);
        @endphp

        @if($sectionPosts->count() > 0)
            <section class="py-24 bg-gradient-to-b from-white to-gray-50">
                <div class="container max-w-7xl mx-auto px-4">
                    <div class="text-center mb-16">
                        <span class="inline-block px-4 py-2 mb-4 text-sm font-semibold text-[#0070f3] bg-[#0070f3]/10 rounded-full">HIGHLIGHTED</span>
                        <h2 class="text-4xl md:text-5xl font-bold text-[#0a2540]">Featured <span class="text-[#0070f3]">Content</span></h2>
                        <div class="w-24 h-1 bg-[#0070f3] mx-auto mt-6 rounded-full"></div>
                    </div>

                    <div class="space-y-16">
                        @foreach($sectionPosts as $index => $post)
                            <div class="group">
                                <div class="grid md:grid-cols-2 gap-8 lg:gap-12 items-center">
                                    <div class="relative {{ $index === 0 ? '' : 'md:order-2' }}">
                                        <div class="rounded-2xl overflow-hidden shadow-xl relative z-10">
                                            <img
                                                src="{{ asset('storage/' . $post->image) }}"
                                                class="w-full h-[450px] object-cover transition-transform duration-700 group-hover:scale-105"
                                                alt="{{ $post->title }}"
                                            >
                                        </div>
                                        <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-[#0070f3]/10 rounded-full blur-2xl"></div>
                                        <div class="absolute -top-4 -left-4 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl"></div>
                                    </div>

                                    <div class="{{ $index === 0 ? '' : 'md:order-1' }}">
                                        <div class="flex items-center gap-4 mb-4">
                                    <span class="text-sm font-medium text-[#0070f3] bg-[#0070f3]/10 px-4 py-1.5 rounded-full">
                                        {{ $post->created_at->format('M d, Y') }}
                                    </span>
                                            @if($post->price)
                                                <span class="text-sm font-medium text-gray-600">
                                            {{ to_amount($post->price) }}
                                        </span>
                                            @endif
                                        </div>

                                        <h3 class="text-3xl lg:text-4xl font-bold text-[#0a2540] mb-6 leading-tight">
                                            {{ $post->title }}
                                        </h3>

                                        <div class="text-gray-600 text-lg leading-relaxed mb-8">
                                            {!! Str::limit(strip_tags($post->body), 250) !!}
                                        </div>

                                        <a
                                            href="{{ route('blog.show', $post->slug) }}"
                                            class="inline-flex items-center gap-3 text-[#0070f3] font-semibold text-lg group/link hover:text-[#0a2540] transition-all"
                                        >
                                            <span>Learn More</span>
                                            <span class="w-10 h-10 rounded-full bg-[#0070f3]/10 flex items-center justify-center group-hover/link:bg-[#0070f3] group-hover/link:text-white transition-all">
                                        <i class="bi bi-arrow-right"></i>
                                    </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Tech Academy Section - Just Link -->
        <section class="py-16 bg-[#0070f3]">
            <div class="container max-w-4xl mx-auto px-4 text-center">
                <span class="text-white/80 font-mono text-sm mb-2 block">&lt;tech_academy&gt;</span>
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">Learn Software Development</h2>
                <p class="text-white/90 text-xl mb-8">Join our Tech Academy and launch your coding career</p>
                <a href="{{ route('careers') }}" class="inline-block bg-white text-[#0070f3] hover:bg-[#0a2540] hover:text-white px-10 py-5 rounded-full font-bold text-lg transition-all hover:-translate-y-1 shadow-xl">
                    Explore Courses →
                </a>
            </div>
        </section>

        <!-- News Updates -->
        <section class="py-20 bg-white">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="flex justify-between items-center mb-12">
                    <div>
                        <span class="text-[#0070f3] font-mono text-sm mb-2 block">&lt;latest&gt;</span>
                        <h2 class="text-4xl md:text-5xl font-bold text-[#0a2540]">News & <span class="text-[#0070f3]">Updates</span></h2>
                    </div>
                    <a href="{{ route('updates') }}" class="text-[#0070f3] font-semibold hover:underline">View all →</a>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($latestUpdates->take(3) as $post)
                        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl transition-all">
                            <div class="h-48 bg-gray-100">
                                <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover" alt="{{ $post->title }}">
                            </div>
                            <div class="p-6">
                                <p class="text-sm text-gray-500 mb-2">{{ $post->created_at->format('M d, Y') }}</p>
                                <h3 class="font-bold text-xl mb-3">{{ $post->title }}</h3>
                                <p class="text-gray-600 text-sm mb-4">{{ Str::limit(strip_tags($post->body), 100) }}</p>
                                <a href="{{ route('blog.show', $post->slug) }}" class="text-[#0070f3] font-semibold hover:underline">Read more →</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-20 bg-gray-50">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="text-center mb-16">
                    <span class="text-[#0070f3] font-mono text-sm mb-2 block">&lt;testimonials&gt;</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-[#0a2540]">What Our <span class="text-[#0070f3]">Clients Say</span></h2>
                    <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Real feedback from the schools and administrators using our platform every day.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($reviews as $post)
                        <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all flex flex-col h-full">

                            <div class="flex text-[#0070f3] mb-4">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                @endfor
                            </div>

                            <blockquote class="flex-grow">
                                <p class="text-gray-700 italic leading-relaxed mb-6">
                                    "{{ Str::limit(strip_tags($post->body), 150) }}"
                                </p>
                            </blockquote>

                            <div class="flex items-center mt-6 pt-6 border-t border-gray-50">
                                <img src="{{ asset('storage/' . $post->image) }}"
                                     class="w-12 h-12 rounded-full object-cover border-2 border-[#0070f3]/20"
                                     alt="{{ $post->title }}">
                                <div class="ml-4">
                                    <h4 class="text-sm font-bold text-[#0a2540]">{{ $post->title }}</h4>
                                    <p class="text-xs text-gray-500">Verified Client</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20 bg-gray-50">
            <div class="container max-w-4xl mx-auto px-4">
                <div class="text-center mb-16">
                    <span class="text-[#0070f3] font-mono text-sm mb-2 block">&lt;faq&gt;</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-[#0a2540]">Frequently Asked <span class="text-[#0070f3]">Questions</span></h2>
                </div>

                <div x-data="{ activeFaq: null }" class="space-y-4">
                    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                        <button @click="activeFaq = activeFaq === 1 ? null : 1" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="font-bold text-lg">How long does it take to build a website?</span>
                            <i class="bi text-xl text-[#0070f3]" :class="activeFaq === 1 ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                        </button>
                        <div x-show="activeFaq === 1" x-collapse class="px-6 pb-6 text-gray-600">
                            <p>Simple websites take 2-4 weeks. Complex web applications can take 2-3 months depending on requirements.</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                        <button @click="activeFaq = activeFaq === 2 ? null : 2" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="font-bold text-lg">Do you offer maintenance after launch?</span>
                            <i class="bi text-xl text-[#0070f3]" :class="activeFaq === 2 ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                        </button>
                        <div x-show="activeFaq === 2" x-collapse class="px-6 pb-6 text-gray-600">
                            <p>Yes, we offer monthly maintenance plans including updates, backups, security patches, and support.</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                        <button @click="activeFaq = activeFaq === 3 ? null : 3" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="font-bold text-lg">What technologies do you use?</span>
                            <i class="bi text-xl text-[#0070f3]" :class="activeFaq === 3 ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                        </button>
                        <div x-show="activeFaq === 3" x-collapse class="px-6 pb-6 text-gray-600">
                            <p>We use modern tech stack: Laravel, PHP, JavaScript, Vue.js, React, MySQL, and Tailwind CSS.</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                        <button @click="activeFaq = activeFaq === 4 ? null : 4" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50">
                            <span class="font-bold text-lg">Can I upgrade my website later?</span>
                            <i class="bi text-xl text-[#0070f3]" :class="activeFaq === 4 ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                        </button>
                        <div x-show="activeFaq === 4" x-collapse class="px-6 pb-6 text-gray-600">
                            <p>Absolutely. We build scalable solutions that can grow with your business. Additional features can be added anytime.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-20 bg-[#0a2540] text-white">
            <div class="container max-w-3xl mx-auto px-4 text-center">
                <span class="text-[#0070f3] font-mono text-sm mb-2 block">&lt;contact&gt;</span>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Start Your Project?</h2>
                <p class="text-xl text-gray-300 mb-10">Let's build something great together.</p>
                <a href="/contact" class="inline-block bg-[#0070f3] hover:bg-white hover:text-[#0a2540] text-white px-10 py-5 rounded-full font-bold text-lg transition-all hover:-translate-y-1 shadow-xl">
                    Get In Touch
                </a>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('voltafrikHome', () => ({
                // Add any interactivity here if needed
            }))
        })
    </script>
@endsection

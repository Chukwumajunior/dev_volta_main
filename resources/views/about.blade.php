@extends('layouts.app')

@section('title', 'About Voltafrik | Web Development & Tech Training')

@section('body-content')
    <div x-data="{ activeFaq: 1 }">
        <section class="relative pt-36 pb-24 bg-gradient-to-br from-white to-blue-50 overflow-hidden">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div data-aos="fade-right">
                        <span class="inline-block px-4 py-2 mb-6 text-sm font-semibold text-[#f57813] bg-[#f57813]/10 rounded-full">OUR STORY</span>
                        <h1 class="text-5xl md:text-6xl font-bold mb-6 text-[#0a2540] leading-tight">
                            Building <span class="text-[#f57813]">Digital Solutions</span><br>That Drive <span class="text-[#f57813]">Growth</span>
                        </h1>
                        <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                            Voltafrik is a Nigerian technology company delivering custom web development, software solutions, and tech training through our Tech Academy. We're building the infrastructure for Nigeria's digital future.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#mission" class="bg-[#f57813] hover:bg-[#0a2540] text-white px-8 py-4 rounded-full font-semibold transition-all hover:-translate-y-1 shadow-lg">Our Mission</a>
                            <a href="/contact" class="border-2 border-[#0a2540] text-[#0a2540] hover:bg-[#0a2540] hover:text-white px-8 py-4 rounded-full font-semibold transition-all">Partner With Us</a>
                        </div>
                    </div>
                    <div data-aos="fade-left" class="relative">
                        <img src="{{ asset('assets/img/tech/development-team.jpg') }}" class="rounded-3xl shadow-2xl w-full h-[450px] object-cover" alt="Voltafrik Development Team">
                        <div class="absolute -bottom-6 -left-6 bg-white p-5 rounded-2xl shadow-xl">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-[#f57813]/10 rounded-full flex items-center justify-center">
                                    <i class="bi bi-building text-2xl text-[#f57813]"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Trusted by</p>
                                    <p class="font-bold text-xl">50+ Businesses</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <span class="inline-block px-4 py-2 mb-4 text-sm font-semibold text-[#f57813] bg-[#f57813]/10 rounded-full">WHO WE ARE</span>
                        <h2 class="text-4xl md:text-5xl font-bold mb-6 text-[#0a2540]">More Than Just A <span class="text-[#f57813]">Tech Company</span></h2>
                        <p class="text-lg text-gray-600 mb-6">Founded in Lagos, Voltafrik exists to solve one problem: access to quality technology. We combine world-class development with deep understanding of Nigerian business needs to deliver solutions that actually work.</p>
                        <p class="text-lg text-gray-600 mb-8">Our team of experienced developers has built over 50 web solutions across Nigeria, from small business websites to large enterprise applications. Every project comes with proper documentation, testing, and ongoing support.</p>

                        <div class="grid grid-cols-2 gap-6 mt-8">
                            <div>
                                <div class="text-4xl font-bold text-[#f57813]">50+</div>
                                <p class="text-gray-600">Projects Completed</p>
                            </div>
                            <div>
                                <div class="text-4xl font-bold text-[#f57813]">98%</div>
                                <p class="text-gray-600">Client Satisfaction</p>
                            </div>
                            <div>
                                <div class="text-4xl font-bold text-[#f57813]">5+</div>
                                <p class="text-gray-600">Years Experience</p>
                            </div>
                            <div>
                                <div class="text-4xl font-bold text-[#f57813]">24/7</div>
                                <p class="text-gray-600">Support Available</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <img src="{{ asset('assets/img/tech/developer-1.jpg') }}" class="rounded-2xl w-full h-48 object-cover" alt="Coding">
                        <img src="{{ asset('assets/img/tech/developer-2.jpg') }}" class="rounded-2xl w-full h-48 object-cover mt-8" alt="Team Meeting">
                        <img src="{{ asset('assets/img/tech/developer-3.jpg') }}" class="rounded-2xl w-full h-48 object-cover" alt="Development">
                        <img src="{{ asset('assets/img/tech/developer-4.jpg') }}" class="rounded-2xl w-full h-48 object-cover mt-8" alt="Tech Academy">
                    </div>
                </div>
            </div>
        </section>

        <section id="mission" class="py-20 bg-gray-50">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-3xl p-10 shadow-lg" data-aos="fade-right">
                        <div class="w-16 h-16 bg-[#f57813]/10 rounded-2xl flex items-center justify-center mb-6">
                            <i class="bi bi-bullseye text-3xl text-[#f57813]"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-4 text-[#0a2540]">Our Mission</h3>
                        <p class="text-lg text-gray-600 mb-6">To provide reliable, high-quality web development solutions that help Nigerian businesses establish strong digital presence and streamline operations.</p>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <i class="bi bi-check-circle-fill text-[#f57813] mt-1"></i>
                                <span class="text-gray-600">Deliver custom websites and web applications</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="bi bi-check-circle-fill text-[#f57813] mt-1"></i>
                                <span class="text-gray-600">Provide professional development by experienced engineers</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="bi bi-check-circle-fill text-[#f57813] mt-1"></i>
                                <span class="text-gray-600">Offer ongoing maintenance and support</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-[#0a2540] rounded-3xl p-10 shadow-lg text-white" data-aos="fade-left">
                        <div class="w-16 h-16 bg-[#f57813]/20 rounded-2xl flex items-center justify-center mb-6">
                            <i class="bi bi-eye text-3xl text-[#f57813]"></i>
                        </div>
                        <h3 class="text-3xl font-bold mb-4">Our Vision</h3>
                        <p class="text-lg text-gray-200 mb-6">To become Nigeria's most trusted provider of web development and tech training, empowering 500 businesses and 5,000 developers by 2028.</p>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <i class="bi bi-check-circle-fill text-[#f57813] mt-1"></i>
                                <span class="text-gray-200">Expand to 5 major cities across Nigeria</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="bi bi-check-circle-fill text-[#f57813] mt-1"></i>
                                <span class="text-gray-200">Train 1,000+ developers through Tech Academy</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="bi bi-check-circle-fill text-[#f57813] mt-1"></i>
                                <span class="text-gray-200">Build innovative software solutions for African businesses</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="text-center mb-16">
                    <span class="inline-block px-4 py-2 mb-4 text-sm font-semibold text-[#f57813] bg-[#f57813]/10 rounded-full">WHY US</span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-4 text-[#0a2540]">The <span class="text-[#f57813]">Voltafrik</span> Difference</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">We don't just write code. We build long-term partnerships.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-[#f57813]/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="bi bi-shield-check text-3xl text-[#f57813]"></i>
                        </div>
                        <h4 class="font-bold mb-2">Quality Assured</h4>
                        <p class="text-sm text-gray-600">Thorough testing and code reviews</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-[#f57813]/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="bi bi-code-slash text-3xl text-[#f57813]"></i>
                        </div>
                        <h4 class="font-bold mb-2">Modern Stack</h4>
                        <p class="text-sm text-gray-600">Laravel, Vue, React, Tailwind</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-[#f57813]/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="bi bi-clock-history text-3xl text-[#f57813]"></i>
                        </div>
                        <h4 class="font-bold mb-2">Ongoing Support</h4>
                        <p class="text-sm text-gray-600">Maintenance and updates</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-[#f57813]/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="bi bi-people text-3xl text-[#f57813]"></i>
                        </div>
                        <h4 class="font-bold mb-2">Expert Team</h4>
                        <p class="text-sm text-gray-600">5+ years experience</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-gray-50">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="text-center mb-16">
                    <span class="inline-block px-4 py-2 mb-4 text-sm font-semibold text-[#f57813] bg-[#f57813]/10 rounded-full">THE TEAM</span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-4 text-[#0a2540]">Meet The <span class="text-[#f57813]">Experts</span></h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">Developers, designers, and instructors dedicated to your success</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($teamMembers as $member)
                        <div class="bg-white rounded-2xl p-6 text-center shadow-sm hover:shadow-xl transition-all">
                            <div class="w-32 h-32 mx-auto mb-4">
                                <img src="{{ asset('storage/' . $member->image) }}" class="w-full h-full rounded-full object-cover border-4 border-[#f57813]/20" alt="{{ $member->title }}">
                            </div>
                            <h4 class="font-bold text-lg">{{ $member->title }}</h4>
                            <p class="text-[#f57813] font-semibold text-sm mb-2">{{ $member->position ?? 'Technical Expert' }}</p>
                            <p class="text-sm text-gray-600">{{ $member->expertise ?? 'Full Stack Developer' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @if($partnerships->count() > 0)
            <section class="py-16 bg-white">
                <div class="container max-w-7xl mx-auto px-4">
                    <div class="text-center mb-10">
                        <h3 class="text-2xl font-bold text-[#0a2540]">Trusted By Industry Leaders</h3>
                    </div>
                    <div class="flex flex-wrap justify-center items-center gap-12 opacity-70">
                        @foreach($partnerships as $partnership)
                            <img src="{{ asset('storage/' . $partnership->image) }}" class="h-12 w-auto grayscale hover:grayscale-0 transition-all" alt="{{ $partnership->title }}">
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <section class="py-20 bg-gray-50">
            <div class="container max-w-4xl mx-auto px-4">
                <div class="text-center mb-12">
                    <span class="inline-block px-4 py-2 mb-4 text-sm font-semibold text-[#f57813] bg-[#f57813]/10 rounded-full">FAQ</span>
                    <h2 class="text-4xl md:text-5xl font-bold mb-4 text-[#0a2540]">Common <span class="text-[#f57813]">Questions</span></h2>
                </div>

                <div class="space-y-4">
                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
                        <button @click="activeFaq = activeFaq === 1 ? null : 1" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 transition">
                            <span class="font-bold text-[#0a2540]">What makes Voltafrik different from other tech companies?</span>
                            <i class="bi text-xl text-[#f57813]" :class="activeFaq === 1 ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                        </button>
                        <div x-show="activeFaq === 1" x-collapse class="px-6 pb-6 text-gray-600">
                            We combine custom development with ongoing support and our Tech Academy. Every project is built with modern technologies and best practices, and we provide training to help businesses manage their own digital presence.
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
                        <button @click="activeFaq = activeFaq === 2 ? null : 2" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 transition">
                            <span class="font-bold text-[#0a2540]">Do you offer maintenance after launch?</span>
                            <i class="bi text-xl text-[#f57813]" :class="activeFaq === 2 ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                        </button>
                        <div x-show="activeFaq === 2" x-collapse class="px-6 pb-6 text-gray-600">
                            Yes. We offer monthly maintenance plans including updates, security patches, backups, and priority support. We also provide training for your team to manage content independently.
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
                        <button @click="activeFaq = activeFaq === 3 ? null : 3" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 transition">
                            <span class="font-bold text-[#0a2540]">What technologies do you use?</span>
                            <i class="bi text-xl text-[#f57813]" :class="activeFaq === 3 ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                        </button>
                        <div x-show="activeFaq === 3" x-collapse class="px-6 pb-6 text-gray-600">
                            We work with modern tech stack: Laravel, PHP, JavaScript, Vue.js, React, MySQL, and Tailwind CSS. We choose the right tools based on your project requirements.
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden">
                        <button @click="activeFaq = activeFaq === 4 ? null : 4" class="w-full px-6 py-5 text-left flex justify-between items-center hover:bg-gray-50 transition">
                            <span class="font-bold text-[#0a2540]">What is Tech Academy?</span>
                            <i class="bi text-xl text-[#f57813]" :class="activeFaq === 4 ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                        </button>
                        <div x-show="activeFaq === 4" x-collapse class="px-6 pb-6 text-gray-600">
                            Tech Academy is our training arm offering coding bootcamps in web development. From beginner to job-ready, we help Nigerians launch careers in tech. Courses include frontend, backend, full stack, and mobile development.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-gradient-to-r from-[#0a2540] to-[#1a3650] text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-5">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>

            <div class="container max-w-7xl mx-auto px-4 text-center relative z-10">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                    Ready to Build Your <span class="text-[#f57813]">Digital Future</span>?
                </h2>
                <p class="text-xl text-gray-300 mb-10 max-w-3xl mx-auto">
                    Join 50+ businesses that have transformed their operations with Voltafrik web solutions.
                </p>

                <div class="flex flex-wrap justify-center gap-4">
                    <a href="/contact" class="bg-[#f57813] hover:bg-white hover:text-[#0a2540] text-white px-10 py-5 rounded-full font-bold text-lg transition-all hover:-translate-y-1 shadow-xl">Start Your Project</a>
                    <a href="{{ route('careers') }}" class="border-2 border-white text-white hover:bg-white hover:text-[#0a2540] px-10 py-5 rounded-full font-bold text-lg transition-all hover:-translate-y-1">Explore Tech Academy</a>
                </div>
            </div>
        </section>

        <div class="fixed bottom-6 left-1/2 transform -translate-x-1/2 z-50 md:hidden">
            <a href="/contact" class="bg-[#f57813] text-white px-8 py-4 rounded-full font-bold shadow-2xl flex items-center gap-3 whitespace-nowrap">
                <i class="bi bi-chat-dots text-xl"></i>
                <span>Get Free Quote</span>
            </a>
        </div>
    </div>
@endsection

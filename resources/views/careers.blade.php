@extends('layouts.app')

@section('title', 'Voltademy | Engineering the Future')

@section('nav-content')
@endsection

@section('body-content')
    <div x-data="{ activeTab: 1 }" class="bg-[#fcfdfe] text-[#0a2540]">
        <section class="pt-32 pb-16 text-white" style="background: linear-gradient(135deg, rgba(10, 37, 64, 0.95) 0%, rgba(0, 112, 243, 0.9) 100%), url('{{ asset('assets/img/contact-page-title-bg.jpg') }}') center/cover no-repeat;">
            <div class="container max-w-7xl mx-auto px-4 text-center">
                <span class="inline-block bg-[#0070f3] text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">VOLTAFRIK TECHNICAL TRAINING</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 text-white">Voltademy</h1>
                <p class="text-lg md:text-xl text-gray-200 mb-6">Empowering the next generation of African innovators through high-impact technical skill acquisition.</p>
                <nav class="flex justify-center">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li><a href="/" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-white">Academy</li>
                    </ol>
                </nav>
            </div>
        </section>

        <section class="py-16 bg-gray-50">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-8 items-center mb-12">
                    <div>
                        <span class="text-[#0070f3] font-extrabold text-xs uppercase tracking-wider">Curriculum</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold mt-2">Specialized Skill Tracks</h2>
                    </div>
                    <div>
                        <p class="text-gray-600">Our tracks are designed by industry professionals to bridge the gap between theoretical knowledge and the operational needs of the modern digital economy.</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($trackPosts as $track)
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:-translate-y-2 hover:shadow-xl transition-all duration-300 overflow-hidden group" data-aos="fade-up">
                            <div class="overflow-hidden">
                                <img src="{{ asset('storage/' . $track->image) }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300 grayscale-[20%] group-hover:grayscale-0" alt="{{ $track->title }}">
                            </div>
                            <div class="p-5 flex flex-col h-[calc(100%-12rem)]">
                                <h4 class="text-xl font-extrabold mb-3">{{ $track->title }}</h4>
                                <div class="text-sm text-gray-600 mb-4 flex-grow">
                                    {!! $track->body !!}
                                </div>
                                <a href="{{ route('career.form') }}" class="bg-[#0070f3] hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-full text-center transition w-full">Enrol Now</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-16 bg-white">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <span class="text-[#0070f3] font-extrabold text-xs uppercase tracking-wider">The Roadmap</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold mt-2">How Voltademy Works</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white border border-gray-200 rounded-2xl p-8 relative hover:shadow-lg transition" data-aos="fade-up">
                        <span class="text-7xl font-black text-[#eef6ff] absolute top-2 left-4 -z-0">01</span>
                        <div class="relative z-10">
                            <div class="w-14 h-14 bg-[#eef6ff] text-[#0070f3] rounded-xl flex items-center justify-center text-2xl mb-5"><i class="bi bi-shield-check"></i></div>
                            <h5 class="font-extrabold text-lg mb-2">Registration</h5>
                            <p class="text-sm text-gray-600">Initialize your journey by selecting a track that aligns with your career objectives. No technical background required for foundation tiers.</p>
                        </div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-2xl p-8 relative hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="100">
                        <span class="text-7xl font-black text-[#eef6ff] absolute top-2 left-4 -z-0">02</span>
                        <div class="relative z-10">
                            <div class="w-14 h-14 bg-[#eef6ff] text-[#0070f3] rounded-xl flex items-center justify-center text-2xl mb-5"><i class="bi bi-cpu"></i></div>
                            <h5 class="font-extrabold text-lg mb-2">Deployment</h5>
                            <p class="text-sm text-gray-600">Engage in intensive hybrid sessions, combining live mentorship with proprietary practical assignments and case studies.</p>
                        </div>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-2xl p-8 relative hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="200">
                        <span class="text-7xl font-black text-[#eef6ff] absolute top-2 left-4 -z-0">03</span>
                        <div class="relative z-10">
                            <div class="w-14 h-14 bg-[#eef6ff] text-[#0070f3] rounded-xl flex items-center justify-center text-2xl mb-5"><i class="bi bi-award"></i></div>
                            <h5 class="font-extrabold text-lg mb-2">Validation</h5>
                            <p class="text-sm text-gray-600">Complete the capstone project to receive your industry-standard certification, validating your expertise within the Voltafrik network.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-50">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <span class="text-[#0070f3] font-extrabold text-xs uppercase tracking-wider">Why Us</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold mt-2 mb-4">A Legacy of Sustainable Innovation</h2>
                        <p class="text-gray-600 mb-6">Voltademy isn't just an educational platform; it's an extension of Voltafrik's mission to power Africa's future. We provide the tools for self-sufficiency and high-growth mobility.</p>
                        <div class="space-y-4">
                            <div class="flex gap-3">
                                <i class="bi bi-check-circle-fill text-[#0070f3] mt-1"></i>
                                <div>
                                    <h6 class="font-extrabold">Localized Solutions</h6>
                                    <p class="text-sm text-gray-600">Training optimized for local African environmental and infrastructure realities.</p>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <i class="bi bi-check-circle-fill text-[#0070f3] mt-1"></i>
                                <div>
                                    <h6 class="font-extrabold">Corporate Pipeline</h6>
                                    <p class="text-sm text-gray-600">Top graduates gain priority access to internships and roles within the Voltafrik ecosystem.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                                <i class="bi bi-lightning-charge text-3xl text-[#0070f3] mb-3 block"></i>
                                <h6 class="font-extrabold mb-1">Practical DNA</h6>
                                <p class="text-xs text-gray-600">100% project-based learning. You build actual assets and documentation.</p>
                            </div>
                            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                                <i class="bi bi-people text-3xl text-green-500 mb-3 block"></i>
                                <h6 class="font-extrabold mb-1">Expert Network</h6>
                                <p class="text-xs text-gray-600">Access to a community of technical leads across the continent.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-[#0a2540] text-white text-center relative overflow-hidden">
            <div class="container max-w-7xl mx-auto px-4 relative z-10">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-4 text-white">Initialize Your Tech Career</h2>
                <p class="text-lg text-gray-300 mb-8 max-w-2xl mx-auto">Join the definitive platform for sustainable energy and mobility education in Africa.</p>
                <a href="{{ route('career.form') }}" class="inline-block bg-white hover:bg-gray-100 text-[#0a2540] font-bold px-8 py-4 rounded-full text-lg transition-all hover:-translate-y-1">Apply for Enrollment</a>
            </div>
            <div class="absolute inset-0 opacity-25" style="background: url('{{ asset('assets/img/cta-bg.jpg') }}') center/cover;"></div>
        </section>

        <section class="py-12 bg-white border-t border-gray-200">
            <div class="container max-w-7xl mx-auto px-4 text-center">
                <h5 class="font-extrabold mb-6 text-gray-500">Technical Support & Inquiries</h5>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="tel:+2349034152070" class="text-[#0a2540] font-bold hover:text-[#0070f3] transition flex items-center gap-2">
                        <i class="bi bi-telephone text-[#0070f3]"></i>+2349034152070
                    </a>
                    <a href="https://wa.me/2349046282789" target="_blank" class="text-[#0a2540] font-bold hover:text-[#0070f3] transition flex items-center gap-2">
                        <i class="bi bi-whatsapp text-green-500"></i>WhatsApp Support
                    </a>
                    <a href="mailto:info@voltafrik.com.ng" class="text-[#0a2540] font-bold hover:text-[#0070f3] transition flex items-center gap-2">
                        <i class="bi bi-envelope text-red-500"></i>info@voltafrik.com.ng
                    </a>
                </div>
            </div>
        </section>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
@endsection

@extends('layouts.app')

@section('title', 'Partner with Voltafrik | Sustainable Mobility & Energy')

@section('body-content')
    <div x-data="contactForm()" x-init="loadCalculatorResults" class="overflow-hidden">
        <section class="relative pt-40 pb-24 text-white" style="background: linear-gradient(rgba(10, 37, 64, 0.85), rgba(10, 37, 64, 0.85)), url('https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop') center/cover no-repeat; clip-path: polygon(0 0, 100% 0, 100% 90%, 0% 100%);">
            <div class="container max-w-7xl mx-auto px-4 text-center" data-aos="fade-up">
                <span class="inline-block bg-[#f57813] text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">Initiate Growth</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 text-white">Let's Build the Future</h1>
                <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto">Connect with Voltafrik to explore investment opportunities, corporate mobility partnerships, or clean energy infrastructure projects.</p>
            </div>
        </section>

        <section class="py-16 -mt-12 relative z-10">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-envelope-paper text-4xl text-[#f57813] mb-5 block"></i>
                        <h5 class="font-bold text-xl mb-3">Strategic Inquiries</h5>
                        <p class="text-gray-600 text-sm mb-3">For partnerships and investment decks:</p>
                        <a href="mailto:info@voltafrik.com.ng" class="text-[#0a2540] font-bold hover:text-[#f57813] transition">info@voltafrik.com.ng</a>
                    </div>
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-chat-left-dots text-4xl text-[#f57813] mb-5 block"></i>
                        <h5 class="font-bold text-xl mb-3">Instant Access</h5>
                        <p class="text-gray-600 text-sm mb-3">Chat with our operations team via WhatsApp:</p>
                        <a href="https://wa.me/2349046282789" target="_blank" class="text-[#0a2540] font-bold hover:text-[#f57813] transition">+234 904 628 2789</a>
                    </div>
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 lg:col-span-1 md:col-span-2 md:max-w-md md:mx-auto lg:max-w-none" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-geo-alt text-4xl text-[#f57813] mb-5 block"></i>
                        <h5 class="font-bold text-xl mb-3">Operational HQ</h5>
                        <p class="text-gray-600 text-sm mb-1">24 Thomas Drive, Akoka,</p>
                        <p class="text-[#0a2540] font-bold">Lagos, Nigeria</p>
                    </div>
                </div>

                <div class="grid lg:grid-cols-12 gap-8 items-start">
                    <div class="lg:col-span-5" data-aos="fade-right">
                        <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Ecosystem Hub</h2>
                        <p class="text-gray-600 text-lg mb-8">Stay updated with our latest deployments in decentralized energy and E-VOLT platform updates across Africa.</p>
                        <div class="space-y-3">
                            <a href="https://x.com/VoltafrikTech" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 px-5 py-3 bg-gray-50 hover:bg-[#0a2540] group rounded-full transition-all duration-300">
                                <i class="bi bi-twitter-x text-xl group-hover:text-white"></i>
                                <span class="font-semibold group-hover:text-white">@VoltafrikTech</span>
                            </a>
                            <a href="https://www.linkedin.com/in/chukwuma-innocent-91aaaa284/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 px-5 py-3 bg-gray-50 hover:bg-[#0a2540] group rounded-full transition-all duration-300">
                                <i class="bi bi-linkedin text-xl group-hover:text-white"></i>
                                <span class="font-semibold group-hover:text-white">LinkedIn Official</span>
                            </a>
                            <a href="https://www.instagram.com/voltafrik/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 px-5 py-3 bg-gray-50 hover:bg-[#0a2540] group rounded-full transition-all duration-300">
                                <i class="bi bi-instagram text-xl group-hover:text-white"></i>
                                <span class="font-semibold group-hover:text-white">@voltafrik</span>
                            </a>
                            <a href="https://web.facebook.com/people/Voltafrik/61557974579735/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 px-5 py-3 bg-gray-50 hover:bg-[#0a2540] group rounded-full transition-all duration-300">
                                <i class="bi bi-facebook text-xl group-hover:text-white"></i>
                                <span class="font-semibold group-hover:text-white">@voltafrik</span>
                            </a>
                        </div>

                        <div x-show="hasCalculatorResults" x-cloak class="mt-8 p-5 bg-[#f57813]/10 rounded-2xl border border-[#f57813]/20">
                            <div class="flex items-center gap-2 mb-3">
                                <i class="bi bi-calculator text-[#f57813]"></i>
                                <span class="font-bold text-[#0a2540]">Your Calculator Results Ready</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">We've pre-filled your calculator results in the message form.</p>
                            <button @click="clearCalculatorResults" class="text-xs text-[#f57813] hover:underline">Clear results</button>
                        </div>
                    </div>

                    <div class="lg:col-span-7" data-aos="fade-left">
                        <div class="bg-white rounded-3xl p-8 md:p-10 shadow-2xl border border-gray-100">
                            <h3 class="text-2xl font-bold mb-6">Send a Brief</h3>
                            <form action="{{ route('message') }}" method="post">
                                @csrf
                                <div class="space-y-5">
                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Full Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-orange-100 focus:border-[#f57813] transition" placeholder="John Doe">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Email Address</label>
                                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-orange-100 focus:border-[#f57813] transition" placeholder="john@company.com">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Phone Number</label>
                                        <input type="tel" name="number" value="{{ old('number') }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-orange-100 focus:border-[#f57813] transition" placeholder="+234...">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">Inquiry Details</label>
                                        <textarea name="message" rows="5" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-orange-100 focus:border-[#f57813] transition" placeholder="Tell us how we can partner..." x-model="messageText">{{ old('message') }}</textarea>
                                    </div>

                                    <input type="hidden" name="from_calculator" x-model="fromCalculator" value="0">

                                    <div>
                                        <button type="submit" class="w-full bg-[#0a2540] hover:bg-[#f57813] text-white font-bold py-4 rounded-full text-lg transition-all hover:-translate-y-1 shadow-lg hover:shadow-xl">Transmit Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-8" data-aos="fade-up">
            <div class="container-fluid px-0">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.123456789!2d3.3854!3d6.5244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8cf286b5151f%3A0x6735a963428d011d!2sAkoka%2C%20Lagos!5e0!3m2!1sen!2sng!4v1234567890"
                    width="100%"
                    height="450"
                    style="border:0; filter: grayscale(100%) invert(90%) contrast(90%);"
                    allowfullscreen=""
                    loading="lazy"
                    class="w-full">
                </iframe>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('contactForm', () => ({
                messageText: '{{ old('message') }}',
                fromCalculator: '0',
                hasCalculatorResults: false,

                loadCalculatorResults() {
                    const savedResults = localStorage.getItem('voltafrik_calculator_results');

                    if (savedResults) {
                        this.messageText = savedResults;
                        this.fromCalculator = '1';
                        this.hasCalculatorResults = true;
                        console.log('Calculator results loaded:', savedResults);
                    }
                },

                clearCalculatorResults() {
                    localStorage.removeItem('voltafrik_calculator_results');
                    localStorage.removeItem('voltafrik_calculator_data');
                    this.messageText = '';
                    this.hasCalculatorResults = false;
                    this.fromCalculator = '0';
                }
            }));
        });
    </script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
@endsection

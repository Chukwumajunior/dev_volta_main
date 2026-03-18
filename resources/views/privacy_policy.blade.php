@extends('layouts.app')

@section('title', 'Privacy Policy - Voltafrik')

@section('nav-content')
@endsection

@section('body-content')
    <div x-data="{ activeSection: null }" class="bg-[#fcfdfe] text-[#0a2540] overflow-hidden">
        <div class="relative py-24 md:py-32 bg-cover bg-center text-white" style="background-image: linear-gradient(rgba(10, 37, 64, 0.85), rgba(10, 37, 64, 0.85)), url('{{ asset('assets/img/data_.jpg') }}');" data-aos="fade">
            <div class="container max-w-7xl mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 text-white">Your Privacy Matters to Us</h1>
                <nav class="flex justify-center">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition">Home</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-white">Privacy Policy</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="py-16 bg-white">
            <div class="container max-w-4xl mx-auto px-4">
                <div class="prose prose-lg max-w-none">
                    <h2 class="text-3xl font-extrabold text-[#0a2540] mb-6">Privacy Policy</h2>
                    <p class="text-gray-600 mb-8">At Voltafrik, your privacy is extremely important to us. This policy outlines how we collect, use, and safeguard your personal information.</p>

                    <div class="space-y-8">
                        <div class="border-b border-gray-200 pb-6" @mouseenter="activeSection = 1" @mouseleave="activeSection = null">
                            <h4 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#0070f3] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">1</span>
                                Information We Collect
                            </h4>
                            <p class="text-gray-600 ml-11">We collect personal details like your name, email address, and other contact information when you register, enroll in a course, or contact us.</p>
                        </div>

                        <div class="border-b border-gray-200 pb-6" @mouseenter="activeSection = 2" @mouseleave="activeSection = null">
                            <h4 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#0070f3] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">2</span>
                                How We Use Your Data
                            </h4>
                            <ul class="list-disc ml-11 text-gray-600 space-y-2">
                                <li>To process your registrations and manage your student account</li>
                                <li>To monitor your course progress and performance</li>
                                <li>To provide personalized learning and customer support</li>
                                <li>To send updates, notifications, or marketing (you can opt out anytime)</li>
                            </ul>
                        </div>

                        <div class="border-b border-gray-200 pb-6" @mouseenter="activeSection = 3" @mouseleave="activeSection = null">
                            <h4 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#0070f3] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">3</span>
                                Student Accounts
                            </h4>
                            <p class="text-gray-600 ml-11">Once you register for any of our courses, a student account is automatically created for you. This helps us track your learning journey and ensures we can reach out when necessary.</p>
                        </div>

                        <div class="border-b border-gray-200 pb-6" @mouseenter="activeSection = 4" @mouseleave="activeSection = null">
                            <h4 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#0070f3] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">4</span>
                                Data Security
                            </h4>
                            <p class="text-gray-600 ml-11">We employ industry-standard practices to keep your data safe and secure. However, no method of transmission over the internet is 100% secure, and we cannot guarantee absolute protection.</p>
                        </div>

                        <div class="border-b border-gray-200 pb-6" @mouseenter="activeSection = 5" @mouseleave="activeSection = null">
                            <h4 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#0070f3] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">5</span>
                                Sharing Information
                            </h4>
                            <p class="text-gray-600 ml-11">We do not sell or share your personal data with third parties, except as required by law or to provide core services like payments or email communications.</p>
                        </div>

                        <div class="border-b border-gray-200 pb-6" @mouseenter="activeSection = 6" @mouseleave="activeSection = null">
                            <h4 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#0070f3] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">6</span>
                                Your Rights
                            </h4>
                            <p class="text-gray-600 ml-11">You have the right to access, correct, or delete your personal data. You may also opt out of communications at any time.</p>
                        </div>

                        <div class="border-b border-gray-200 pb-6" @mouseenter="activeSection = 7" @mouseleave="activeSection = null">
                            <h4 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#0070f3] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">7</span>
                                Policy Updates
                            </h4>
                            <p class="text-gray-600 ml-11">This policy may be updated occasionally. We encourage you to review it from time to time.</p>
                        </div>

                        <div @mouseenter="activeSection = 8" @mouseleave="activeSection = null">
                            <h4 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#0070f3] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">8</span>
                                Contact Us
                            </h4>
                            <p class="text-gray-600 ml-11">If you have any questions regarding our Privacy Policy, feel free to reach out to us at <a href="mailto:info@voltafrik.com.ng" class="text-[#0070f3] font-bold hover:underline">info@voltafrik.com.ng</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-12 bg-gray-50 border-t border-gray-200">
            <div class="container max-w-7xl mx-auto px-4 text-center">
                <p class="text-sm text-gray-600">Last updated: March 2026</p>
                <p class="text-sm text-gray-600 mt-2">© Voltafrik Technologies. All rights reserved.</p>
            </div>
        </section>
    </div>
@endsection

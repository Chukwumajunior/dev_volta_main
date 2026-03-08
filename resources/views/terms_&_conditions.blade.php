@extends('layouts.app')

@section('title', 'T & C - Voltafrik')

@section('nav-content')
@endsection

@section('body-content')
    <div x-data="{ expandedSection: null }" class="bg-[#fcfdfe] text-[#0a2540] overflow-hidden">
        <div class="relative py-24 md:py-32 bg-cover bg-center text-white" style="background-image: linear-gradient(rgba(10, 37, 64, 0.85), rgba(10, 37, 64, 0.85)), url('{{ asset('assets/img/data_.jpg') }}');" data-aos="fade">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="max-w-3xl">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-4 text-white leading-tight">We Uncover Insights from your organisation's Data to Increase your Productivity</h1>
                    <nav class="flex">
                        <ol class="flex items-center space-x-2 text-sm">
                            <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white transition">Home</a></li>
                            <li class="text-gray-400">/</li>
                            <li class="text-white">Terms and Conditions</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="py-16 bg-white">
            <div class="container max-w-4xl mx-auto px-4">
                <div class="bg-gray-50 rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-[#0a2540] mb-6">Terms and Conditions</h2>
                    <p class="text-gray-600 mb-8 text-lg">By using our platform, enrolling in our courses, or accessing any of our services, you agree to the following terms and conditions:</p>

                    <div class="space-y-6">
                        <div class="border-b border-gray-200 pb-6 last:border-0" @mouseenter="expandedSection = 1" @mouseleave="expandedSection = null">
                            <h5 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#f57813] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">1</span>
                                Course Registration & Student Account
                            </h5>
                            <p class="text-gray-600 ml-11">Once you register for any course on Voltafrik, a student account is automatically created for you. This allows us to track your learning progress, provide personalized feedback, and reach out to you with important updates or support.</p>
                        </div>

                        <div class="border-b border-gray-200 pb-6 last:border-0" @mouseenter="expandedSection = 2" @mouseleave="expandedSection = null">
                            <h5 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#f57813] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">2</span>
                                User Conduct
                            </h5>
                            <p class="text-gray-600 ml-11">Users are expected to maintain respectful and professional behavior while using our platform. Misuse or abuse of our services will result in account suspension or termination.</p>
                        </div>

                        <div class="border-b border-gray-200 pb-6 last:border-0" @mouseenter="expandedSection = 3" @mouseleave="expandedSection = null">
                            <h5 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#f57813] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">3</span>
                                Intellectual Property
                            </h5>
                            <p class="text-gray-600 ml-11">All content provided on this platform, including videos, images, texts, and downloadable resources, are the property of Voltafrik and must not be reproduced or redistributed without permission.</p>
                        </div>

                        <div class="border-b border-gray-200 pb-6 last:border-0" @mouseenter="expandedSection = 4" @mouseleave="expandedSection = null">
                            <h5 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#f57813] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">4</span>
                                Communication
                            </h5>
                            <p class="text-gray-600 ml-11">By creating an account or enrolling in a course, you consent to receiving communication from us via email or phone for academic or support-related matters.</p>
                        </div>

                        <div class="border-b border-gray-200 pb-6 last:border-0" @mouseenter="expandedSection = 5" @mouseleave="expandedSection = null">
                            <h5 class="text-xl font-bold text-[#0a2540] mb-3 flex items-center">
                                <span class="w-8 h-8 bg-[#f57813] text-white rounded-full inline-flex items-center justify-center text-sm mr-3">5</span>
                                Changes to Terms
                            </h5>
                            <p class="text-gray-600 ml-11">We reserve the right to update these terms at any time. Continued use of our services after changes implies acceptance of the revised terms.</p>
                        </div>
                    </div>

                    <div class="mt-8 p-6 bg-white rounded-2xl border border-gray-200">
                        <p class="text-gray-700 mb-0">If you have any questions regarding our terms, feel free to <a href="{{ url('/contact') }}" class="text-[#f57813] font-bold hover:underline">contact us</a>.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-8 bg-gray-50 border-t border-gray-200">
            <div class="container max-w-7xl mx-auto px-4 text-center">
                <p class="text-sm text-gray-600">Last updated: March 2026</p>
                <p class="text-sm text-gray-600 mt-2">© Voltafrik Technologies. All rights reserved.</p>
            </div>
        </section>
    </div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Voltafrik | Web Development & Tech Training')</title>
    <meta name="description" content="@yield('meta_description', 'Voltafrik - Web development company and tech training provider in Nigeria.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/dark_logo_image.png') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="google-site-verification" content="TMjY9SBbb8mbeW8MKfZC1L5IEF6yyNdhPHTOwdHmG3k" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="text-[#0a2540] overflow-x-hidden" x-data="{ scrolled: false, mobileMenuOpen: false }" x-init="window.addEventListener('scroll', () => scrolled = window.pageYOffset > 300)" :class="{ 'pt-20': scrolled }">

<nav class="fixed top-0 w-full z-50 py-4 transition-all duration-300" :class="{ 'backdrop-blur-md bg-white/80 border-b border-black/5': true }">
    <div class="container max-w-7xl mx-auto px-4 flex items-center justify-between">
        <a href="/" class="flex items-center gap-2">
            <img src="{{ asset('assets/img/logo/dark_logo_image.png') }}" alt="Voltafrik" class="h-10 w-auto" style="border-radius: 10px">
            <span class="font-extrabold text-2xl tracking-tighter" style="color: #0070f3">VOLTAFRIK</span>
        </a>
        <button class="lg:hidden text-2xl" @click="mobileMenuOpen = !mobileMenuOpen">
            <i class="bi bi-list"></i>
        </button>
        <div class="hidden lg:flex items-center gap-1">
            <div class="flex items-center">
                <a href="/" class="nav-link px-4 py-2 font-semibold hover:text-[#0070f3] transition">Home</a>
                <a href="{{ route('about') }}" class="nav-link px-4 py-2 font-semibold hover:text-[#0070f3] transition">About</a>
                <a href="{{ route('careers') }}" class="nav-link px-4 py-2 font-semibold hover:text-[#0070f3] transition">Tech Academy</a>
                <a href="{{ route('projects') }}" class="nav-link px-4 py-2 font-semibold hover:text-[#0070f3] transition">Projects</a>
                <a href="{{ route('blog.stores') }}" class="nav-link px-4 py-2 font-semibold hover:text-[#0070f3] transition">Sales</a>
                <a href="{{ route('contact') }}" class="nav-link px-4 py-2 font-semibold hover:text-[#0070f3] transition">Contact</a>
            </div>
            @auth
                <div class="relative ml-3" x-data="{ accountDropdown: false }">
                    <button
                        @mouseenter="accountDropdown = true"
                        @mouseleave="accountDropdown = false"
                        class="bg-[#0a2540] hover:bg-[#0070f3] text-white font-bold py-3 px-7 rounded-full transition-all hover:-translate-y-1 flex items-center gap-2"
                    >
                        Account <i class="bi bi-chevron-down" :class="{ 'rotate-180': accountDropdown }"></i>
                    </button>
                    <div
                        x-show="accountDropdown"
                        x-cloak
                        @mouseenter="accountDropdown = true"
                        @mouseleave="accountDropdown = false"
                        class="absolute right-0 top-full mt-0 pt-2 w-64"
                    >
                        <div class="bg-white shadow-xl rounded-lg p-3 border-0">
                            <a href="{{ auth()->user()->role === 'admin' ? route('dashboard') : route('student.dashboard') }}" class="block py-2 px-3 hover:bg-gray-50 rounded transition"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                            <a href="{{ route('profile.edit') }}" class="block py-2 px-3 hover:bg-gray-50 rounded transition"><i class="bi bi-person me-2"></i> Profile</a>
                            <hr class="my-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left py-2 px-3 hover:bg-gray-50 rounded transition text-red-600"><i class="bi bi-box-arrow-right me-2"></i> Sign Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <a href="/login" class="bg-[#0a2540] hover:bg-[#0070f3] text-white font-bold py-3 px-7 rounded-full transition-all hover:-translate-y-1 ml-3">Get Started</a>
            @endauth
        </div>
    </div>

    <div x-show="mobileMenuOpen" x-cloak @click.away="mobileMenuOpen = false" class="lg:hidden absolute top-full left-0 w-full bg-white/95 backdrop-blur-md shadow-lg border-t border-black/5 p-5">
        <div class="flex flex-col gap-3">
            <a href="/" class="py-2 font-semibold hover:text-[#0070f3] transition">Home</a>
            <a href="{{ route('about') }}" class="py-2 font-semibold hover:text-[#0070f3] transition">About</a>
            <a href="{{ route('careers') }}" class="py-2 font-semibold hover:text-[#0070f3] transition">Tech Academy</a>
            <a href="{{ route('projects') }}" class="py-2 font-semibold hover:text-[#0070f3] transition">Projects</a>
            <a href="{{ route('blog.stores') }}" class="py-2 font-semibold hover:text-[#0070f3] transition">Sales</a>
            <a href="{{ route('contact') }}" class="py-2 font-semibold hover:text-[#0070f3] transition">Contact</a>
            <hr class="my-2">
            @auth
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left py-2 font-semibold hover:text-[#0070f3] transition flex items-center justify-between">
                        Account <i class="bi" :class="open ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                    </button>
                    <div x-show="open" x-cloak class="pl-4 flex flex-col gap-2 mt-1">
                        <a href="{{ auth()->user()->role === 'admin' ? route('dashboard') : route('student.dashboard') }}" class="py-1 hover:text-[#0070f3] transition"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                        <a href="{{ route('profile.edit') }}" class="py-1 hover:text-[#0070f3] transition"><i class="bi bi-person me-2"></i> Profile</a>
                        <hr>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left py-1 text-red-600 hover:text-[#0070f3] transition"><i class="bi bi-box-arrow-right me-2"></i> Sign Out</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="/login" class="bg-[#0a2540] text-white font-bold py-3 px-7 rounded-full text-center hover:bg-[#0070f3] transition-all">Get Started</a>
            @endauth
        </div>
    </div>
</nav>

<main>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
        @if(session('success'))
            <div class="fixed top-24 right-4 z-50 max-w-sm bg-green-50 border-l-4 border-green-500 rounded-lg shadow-lg p-4">
                <div class="flex items-center">
                    <i class="bi bi-check-circle-fill text-green-500 text-xl mr-3"></i>
                    <p class="text-green-700 font-medium">{{ session('success') }}</p>
                    <button @click="show = false" class="ml-auto text-green-500 hover:text-green-700">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="fixed top-24 right-4 z-50 max-w-sm bg-red-50 border-l-4 border-red-500 rounded-lg shadow-lg p-4">
                <div class="flex items-center">
                    <i class="bi bi-exclamation-circle-fill text-red-500 text-xl mr-3"></i>
                    <p class="text-red-700 font-medium">{{ session('error') }}</p>
                    <button @click="show = false" class="ml-auto text-red-500 hover:text-red-700">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
        @endif

        @if(session('warning'))
            <div class="fixed top-24 right-4 z-50 max-w-sm bg-yellow-50 border-l-4 border-yellow-500 rounded-lg shadow-lg p-4">
                <div class="flex items-center">
                    <i class="bi bi-exclamation-triangle-fill text-yellow-500 text-xl mr-3"></i>
                    <p class="text-yellow-700 font-medium">{{ session('warning') }}</p>
                    <button @click="show = false" class="ml-auto text-yellow-500 hover:text-yellow-700">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
        @endif

        @if(session('info'))
            <div class="fixed top-24 right-4 z-50 max-w-sm bg-blue-50 border-l-4 border-blue-500 rounded-lg shadow-lg p-4">
                <div class="flex items-center">
                    <i class="bi bi-info-circle-fill text-blue-500 text-xl mr-3"></i>
                    <p class="text-blue-700 font-medium">{{ session('info') }}</p>
                    <button @click="show = false" class="ml-auto text-blue-500 hover:text-blue-700">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            </div>
        @endif
    </div>
    @yield('body-content')
</main>

<footer class="bg-[#020b14] text-white pt-20 pb-8">
    <div class="container max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-12 gap-8 border-b border-gray-700 pb-12">
            <div class="md:col-span-4">
                <h3 class="font-extrabold text-2xl mb-4">VOLTAFRIK</h3>
                <p class="text-gray-400">Web development company and tech training provider in Nigeria.</p>
            </div>
            <div class="md:col-span-2 md:col-start-6">
                <h6 class="font-bold text-lg mb-4">Quick Links</h6>
                <ul class="text-gray-400 space-y-2">
                    <li><a href="/" class="hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">About</a></li>
                    <li><a href="{{ route('careers') }}" class="hover:text-white transition">Tech Academy</a></li>
                    <li><a href="{{ route('projects') }}" class="hover:text-white transition">Projects</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a></li>
                </ul>
            </div>
            <div class="md:col-span-5 md:text-right">
                <h6 class="font-bold text-lg mb-4">Connect With Us</h6>
                <div class="text-gray-400">
                    <p class="mb-3">24 Thomas Drive, Akoka, Lagos, Nigeria</p>
                    <div class="flex flex-wrap md:justify-end gap-3 mb-2">
                        <a href="tel:+2349034152070" class="hover:text-white transition"><i class="bi bi-telephone me-2"></i> +2349034152070</a>
                        <a href="tel:+2349046282789" class="hover:text-white transition"><i class="bi bi-whatsapp me-2"></i> +2349046282789</a>
                    </div>
                    <a href="mailto:info@voltafrik.com.ng" class="hover:text-white transition block"><i class="bi bi-envelope me-2"></i> info@voltafrik.com.ng</a>
                </div>
                <div class="flex md:justify-end gap-4 mt-6">
                    <a href="https://x.com/VoltafrikTech" class="text-white text-2xl hover:text-[#0070f3] transition"><i class="bi bi-twitter-x"></i></a>
                    <a href="https://www.linkedin.com/in/chukwuma-innocent-91aaaa284/" class="text-white text-2xl hover:text-[#0070f3] transition"><i class="bi bi-linkedin"></i></a>
                    <a href="https://www.instagram.com/voltafrik/" class="text-white text-2xl hover:text-[#0070f3] transition"><i class="bi bi-instagram"></i></a>
                    <a href="https://web.facebook.com/people/Voltafrik/61557974579735/" class="text-white text-2xl hover:text-[#0070f3] transition"><i class="bi bi-facebook"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center pt-6 text-gray-500 text-sm">
            © {{ date('Y') }} Voltafrik Technologies. All Rights Reserved.
        </div>
    </div>
</footer>

<a href="#" x-show="scrolled" x-cloak @click.prevent="window.scrollTo({ top: 0, behavior: 'smooth' })" class="fixed right-5 bottom-5 w-12 h-12 bg-[#0070f3] hover:bg-[#0a2540] text-white rounded-full flex items-center justify-center text-3xl transition-all hover:-translate-y-1 shadow-lg z-50">
    <i class="bi bi-arrow-up-short"></i>
</a>

<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script>
    AOS.init({ duration: 1000, once: true });
</script>
@stack('scripts')
</body>
</html>

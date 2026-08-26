<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" /><meta name="google-site-verification" content="FD65BSjnYReLXXkJJMCLW2nu87LPIbj4NpCg_B7dqgo" />
    <title>S6WeightCalculator — Your University Admission Partner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap");
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        .navbar .nav-link:hover, .navbar .dropdown-item:hover { color: #3E80FF !important; background: transparent !important; }
    </style>
    <script>
        if (localStorage.getItem('dark') === 'true' || (!localStorage.getItem('dark') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('dark', 'true');
        }
    </script>
</head>
<body x-data="{ dark: false, sticky: false, scrollTop: false, mOpen: false }"
      @scroll.window="sticky = (window.pageYOffset > 80) ? true : false; scrollTop = (window.pageYOffset > 300) ? true : false"
      class="font-['DM_Sans'] text-[#727272] text-sm antialiased overflow-x-hidden">

<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>

{{-- ===== HEADER ===== --}}
<header class="absolute top-0 left-0 w-full z-50 transition-all duration-300"
        :class="{'!fixed !bg-white shadow-[0_20px_50px_rgba(0,0,0,0.05)]': sticky}">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-4 lg:py-0">
            <a href="/" class="text-xl lg:text-2xl font-extrabold tracking-tight font-['Spartan']"
               :class="sticky ? 'text-[#24126A]' : 'text-white'">
                S6<span class="text-[#3E80FF]">Weight</span>Calculator
            </a>

            <div class="flex items-center gap-2 lg:hidden">
                <button onclick="document.documentElement.classList.toggle('dark');localStorage.setItem('dark',document.documentElement.classList.contains('dark'))"
                        class="p-2 rounded-full transition-all duration-300"
                        :class="sticky ? 'text-[#24126A]' : 'text-white'">
                    <svg class="w-5 h-5 block dark:hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
                    <svg class="w-5 h-5 hidden dark:block" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/></svg>
                </button>
                <button class="p-2" @click="mOpen = !mOpen">
                    <span class="flex flex-col gap-1.5 w-6">
                        <span class="block h-0.5 rounded transition-all duration-300"
                              :class="sticky ? '!bg-[#24126A]' : 'bg-white'"
                              :class="{'rotate-45 translate-y-[7px]': mOpen}"></span>
                        <span class="block h-0.5 rounded transition-all duration-300"
                              :class="sticky ? '!bg-[#24126A]' : 'bg-white'"
                              x-show="!mOpen"></span>
                        <span class="block h-0.5 rounded transition-all duration-300"
                              :class="sticky ? '!bg-[#24126A]' : 'bg-white'"
                              :class="{'-rotate-45 -translate-y-[7px]': mOpen}"></span>
                    </span>
                </button>
            </div>

            <div class="hidden lg:flex items-center" id="navbar">
                <ul class="flex items-center gap-10 mx-auto">
                    <li><a href="/" class="text-sm font-medium capitalize transition-all duration-300 py-[35px] inline-flex items-center"
                           :class="sticky ? 'text-[#24126A] hover:text-[#3E80FF]' : 'text-white/90 hover:text-white'">Home</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-sm font-medium capitalize transition-all duration-300 py-[35px] inline-flex items-center gap-1"
                           :class="sticky ? 'text-[#24126A] hover:text-[#3E80FF]' : 'text-white/90 hover:text-white'"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pages
                        </a>
                        <ul class="dropdown-menu border-0 shadow rounded-3 py-3 px-3 min-w-[220px]"
                            style="margin-top: 0;">
                            <li><a href="{{ route('about-us') }}" class="dropdown-item rounded-2 py-2 text-sm fw-medium text-[#727272] hover:text-[#3E80FF]">About Us</a></li>
                            <li><a href="{{ route('login') }}" class="dropdown-item rounded-2 py-2 text-sm fw-medium text-[#727272] hover:text-[#3E80FF]">Sign In</a></li>
                            <li><a href="{{ route('register') }}" class="dropdown-item rounded-2 py-2 text-sm fw-medium text-[#727272] hover:text-[#3E80FF]">Sign Up</a></li>
                            <li><a href="{{ route('contact') }}" class="dropdown-item rounded-2 py-2 text-sm fw-medium text-[#727272] hover:text-[#3E80FF]">Contact</a></li>
                        </ul>
                    </li>
                </ul>
                <button onclick="document.documentElement.classList.toggle('dark');localStorage.setItem('dark',document.documentElement.classList.contains('dark'))"
                        class="p-2 rounded-full transition-all duration-300 mr-1"
                        :class="sticky ? 'text-[#24126A] hover:text-[#3E80FF]' : 'text-white/90 hover:text-white'">
                    <svg class="w-5 h-5 block dark:hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
                    <svg class="w-5 h-5 hidden dark:block" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/></svg>
                </button>
                <div class="button ml-8">
                    <a href="{{ route('register') }}" class="inline-block text-sm font-medium capitalize px-[30px] py-[14px] bg-[#3E80FF] text-white rounded-[30px] transition-all duration-300 hover:bg-[#24126A]">Get started</a>
                </div>
            </div>
        </div>

        {{-- Mobile Nav --}}
        <div x-show="mOpen" x-cloak @click.outside="mOpen = false" class="lg:hidden bg-white shadow-[0_15px_20px_rgba(0,0,0,0.1)] rounded-lg p-5 max-h-[350px] overflow-y-auto border-t border-gray-100">
            <ul class="space-y-1">
                <li><a href="/" @click="mOpen = false" class="block py-3 px-4 text-sm font-medium text-[#051441] hover:text-[#3E80FF]">Home</a></li>
                <li x-data="{ mp: false }">
                    <button @click="mp = !mp" class="flex items-center justify-between w-full py-3 px-4 text-sm font-medium text-[#051441] hover:text-[#3E80FF]">
                        Pages
                        <svg class="w-3 h-3 fill-current transition-transform" :class="{ 'rotate-180': mp }" viewBox="0 0 512 512"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                    </button>
                    <div x-show="mp" x-cloak class="ml-4 space-y-1">
                        <a href="{{ route('about-us') }}" @click="mOpen = false" class="block py-2 px-4 text-sm text-[#888] hover:text-[#3E80FF]">About Us</a>
                        <a href="{{ route('login') }}" @click="mOpen = false" class="block py-2 px-4 text-sm text-[#888] hover:text-[#3E80FF]">Sign In</a>
                        <a href="{{ route('register') }}" @click="mOpen = false" class="block py-2 px-4 text-sm text-[#888] hover:text-[#3E80FF]">Sign Up</a>
                        <a href="{{ route('contact') }}" @click="mOpen = false" class="block py-2 px-4 text-sm text-[#888] hover:text-[#3E80FF]">Contact</a>
                    </div>
                </li>
            </ul>
            <div class="mt-3 pt-3 border-t border-gray-100">
                <a href="{{ route('register') }}" @click="mOpen = false" class="block text-center text-sm font-medium px-[30px] py-[14px] bg-[#3E80FF] text-white rounded-[30px] hover:bg-[#24126A] transition-all">Get started</a>
            </div>
        </div>
    </div>
</header>

{{-- ===== HERO ===== --}}
<section class="hero-area relative bg-[#24126A] overflow-hidden pt-[104px] pb-[38px] lg:pt-[140px] lg:pb-[64px]">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center -mx-4">
            <div class="w-full lg:w-5/12 px-4">
                <div class="hero-content text-center">
                    <h4 class="text-white font-semibold text-sm mb-3 wow fadeInUp" data-wow-delay=".2s">Start Your University Journey</h4>
                    <h1 class="font-['Spartan'] font-bold text-white text-4xl leading-tight capitalize mb-0 wow fadeInUp relative z-[1]" data-wow-delay=".4s">
                        Say goodbye to <br>admission
                        <span class="relative z-[1]">
                            <span class="relative z-[2] text-[#3E80FF]">uncertainty.</span>
                            <svg class="text-shape absolute left-0 bottom-[5px] w-full z-[-1]" viewBox="0 0 293 20" fill="none">
                                <path d="M0 10.4v46.3h293.2V36.2c0 9.7-8.4 17.3-18.1 16.4L14.8 26.8C6.4 25.9 0 18.8 0 10.4z" fill="#3E80FF" opacity="0.3"/>
                            </svg>
                        </span>
                    </h1>
                    <p class="text-white text-base leading-7 mt-3 wow fadeInUp" data-wow-delay=".6s">Calculate your O-Level and A-Level admission weight. Discover which Ugandan university you qualify for in seconds.</p>
                    <div class="button mt-6 wow fadeInUp" data-wow-delay=".8s">
                        <a href="{{ route('register') }}" class="inline-block text-sm font-medium capitalize px-[30px] py-[14px] bg-[#3E80FF] text-white rounded-[30px] transition-all duration-300 hover:bg-[#24126A]">Discover More</a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-7/12 px-4">
                <div class="hero-image relative z-0 text-center">
                    <img src="{{ asset('images/Realman.png') }}" alt="Student"
                         class="block mx-auto w-64 h-64 md:w-[400px] md:h-[400px] object-cover shadow-[0_20px_60px_rgba(0,0,0,0.35)]">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== FEATURES ===== --}}
<div class="feature section pt-[48px] pb-[44px] lg:pt-[64px] lg:pb-[68px] bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-9 px-6 md:px-12 lg:px-[100px] xl:px-[200px]">
            <h3 class="text-sm font-semibold text-[#3E80FF] uppercase mb-5 wow zoomIn" data-wow-delay=".2s">Why choose us</h3>
            <h2 class="font-['Spartan'] text-4xl font-bold text-[#24126A] mb-5 capitalize leading-tight wow fadeInUp" data-wow-delay=".4s">Our features</h2>
            <p class="text-base leading-7 wow fadeInUp" data-wow-delay=".6s">Everything you need to calculate your university admission weight quickly and accurately.</p>
        </div>

        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 wow fadeInUp" data-wow-delay=".2s">
                <div class="feature-box lg:min-h-[190px] mt-4 rounded-[20px] bg-white shadow-[0_0_30px_rgba(81,94,125,0.082)] p-[22px_16px] lg:p-[30px_26px] text-center transition-all duration-300 border-t-[3px] border-b-[3px] border-[#F4F7FA] hover:scale-105 hover:border-t-[#3E80FF] hover:border-b-[#3E80FF]">
                    <div class="tumb">
                        <svg class="h-[44px] md:h-[52px] lg:h-[60px] mx-auto text-[#3E80FF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h4 class="text-title text-[#3b368c] font-['Spartan'] text-base font-bold leading-6 mt-4 mb-1.5">Instant Exchange</h4>
                    <p class="text-sm leading-relaxed">Enter your UNEB O-Level and A-Level grades. Get your weighted admission score instantly with no delays.</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 wow fadeInUp" data-wow-delay=".4s">
                <div class="feature-box lg:min-h-[190px] mt-4 rounded-[20px] bg-white shadow-[0_0_30px_rgba(81,94,125,0.082)] p-[22px_16px] lg:p-[30px_26px] text-center transition-all duration-300 border-t-[3px] border-b-[3px] border-[#F4F7FA] hover:scale-105 hover:border-t-[#3E80FF] hover:border-b-[#3E80FF]">
                    <div class="tumb">
                        <svg class="h-[44px] md:h-[52px] lg:h-[60px] mx-auto text-[#3E80FF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <h4 class="text-title text-[#3b368c] font-['Spartan'] text-base font-bold leading-6 mt-4 mb-1.5">Safe & Secure</h4>
                    <p class="text-sm leading-relaxed">Your data is private and secure. Calculate your admission weight with full confidentiality.</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 wow fadeInUp" data-wow-delay=".6s">
                <div class="feature-box lg:min-h-[190px] mt-4 rounded-[20px] bg-white shadow-[0_0_30px_rgba(81,94,125,0.082)] p-[22px_16px] lg:p-[30px_26px] text-center transition-all duration-300 border-t-[3px] border-b-[3px] border-[#F4F7FA] hover:scale-105 hover:border-t-[#3E80FF] hover:border-b-[#3E80FF]">
                    <div class="tumb">
                        <svg class="h-[44px] md:h-[52px] lg:h-[60px] mx-auto text-[#3E80FF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <h4 class="text-title text-[#3b368c] font-['Spartan'] text-base font-bold leading-6 mt-4 mb-1.5">Instant Trading</h4>
                    <p class="text-sm leading-relaxed">Select essentials and desirable subjects. Compare your total weight against all Ugandan university cutoffs.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===== CALL TO ACTION ===== --}}
<section class="call-action bg-[#F4F7FA]">
    <div class="container mx-auto px-4">
        <div class="inner-content relative py-10 lg:py-14 rounded-[10px] z-0 overflow-hidden">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full lg:w-1/2 px-4">
                    <div class="text text-center">
                        <h2 class="font-['Spartan'] text-3xl font-bold text-[#081828] leading-tight">
                            You are using free<br>
                            <span class="block text-[#3E80FF]">S6WeightCalculator.</span>
                        </h2>
                        <p class="text-base leading-7 mt-2.5">Create your free account and discover your university admission weight in minutes.</p>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 px-4 mt-8 lg:mt-0">
                    <div class="button text-center">
                        <a href="{{ route('register') }}" class="inline-block text-sm font-medium capitalize px-[30px] py-[14px] bg-[#3E80FF] text-white rounded-[30px] transition-all duration-300 hover:bg-[#24126A]">Get Started Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== FOOTER ===== --}}
<footer class="footer bg-[#24126A] pt-[36px] pb-0 lg:pt-[80px] relative">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-4/12 px-4 mb-7 lg:mb-0">
                <div class="single-footer f-about pr-[30px] max-lg:pr-0 max-lg:text-center">
                    <div class="logo mb-3 lg:mb-5">
                        <a href="/" class="text-2xl font-extrabold tracking-tight font-['Spartan'] text-white">
                            S6<span class="text-[#3E80FF]">Weight</span>Calculator
                        </a>
                    </div>
                    <p class="text-white/70 text-base leading-7 max-w-xs max-lg:mx-auto">Making university admission simple for every S6 student in Uganda.</p>
                    <h4 class="social-title text-white font-semibold text-xs inline-block align-middle mr-3">Follow Us On:</h4>
                    <ul class="social inline-flex items-center gap-[15px] align-middle">
<li><a href="https://www.tiktok.com/@abonga" target="_blank" class="text-white hover:text-[#3E80FF] transition-all duration-300">
    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
</a></li>
<li><a href="https://wa.me/256774120185" target="_blank" class="text-white hover:text-[#3E80FF] transition-all duration-300">
    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-1.102-1.016-1.847-2.27-2.063-2.654-.216-.384-.023-.592.163-.784.168-.172.374-.45.562-.674.187-.225.25-.386.374-.644.125-.258.062-.484-.032-.678-.093-.194-.67-1.618-.92-2.216-.242-.579-.487-.5-.67-.508-.173-.008-.372-.01-.57-.01-.199 0-.523.074-.797.372-.274.298-1.043 1.02-1.043 2.488s1.07 2.887 1.22 3.088c.149.2 2.108 3.22 5.108 4.517.714.31 1.27.496 1.704.635.714.227 1.364.195 1.877.118.574-.088 1.767-.721 2.016-1.418.248-.697.248-1.295.174-1.42-.074-.125-.273-.198-.57-.347m-5.472 6.868V21.25a9.25 9.25 0 110-18.5 9.25 9.25 0 110 18.5m0-20.25a11 11 0 100 22 11 11 0 000-22z"/></svg>
</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-2/5 md:w-1/2 lg:w-2/12 px-4 mb-7 lg:mb-0">
                <div class="single-footer f-link text-center">
                    <h3 class="text-white font-['Spartan'] text-lg font-semibold mb-4 lg:mb-[35px]">Solutions</h3>
                    <ul class="space-y-2.5 lg:space-y-[15px]">
                        <li><a href="{{ route('login') }}" class="text-white text-sm font-medium hover:text-[#3E80FF] transition-all duration-300">Sign In</a></li>
                        <li><a href="{{ route('register') }}" class="text-white text-sm font-medium hover:text-[#3E80FF] transition-all duration-300">Sign Up</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-3/5 md:w-1/2 lg:w-2/12 px-4 mb-7 lg:mb-0">
                <div class="single-footer f-link text-center">
                    <h3 class="text-white font-['Spartan'] text-lg font-semibold mb-4 lg:mb-[35px]">Support</h3>
                    <ul class="space-y-2.5 lg:space-y-[15px]">
                        <li><a href="{{ route('contact') }}" class="text-white text-sm font-medium hover:text-[#3E80FF] transition-all duration-300">Contact</a></li>
                        <li><a href="mailto:abonga029@gmail.com" class="text-white text-sm font-medium hover:text-[#3E80FF] transition-all duration-300">abonga029@gmail.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-full md:w-full lg:w-4/12 px-4 mb-7 lg:mb-0">
                <div class="single-footer newsletter text-center">
                    <h3 class="text-white font-['Spartan'] text-lg font-semibold mb-4 lg:mb-[35px]">Subscribe</h3>
                    <p class="text-white/70 text-base mb-5">Subscribe to our newsletter for the latest updates</p>
                    @if(session('newsletter_success'))
                        <p class="text-green-400 text-sm mb-3">{{ session('newsletter_success') }}</p>
                    @endif
                    @if(session('newsletter_error'))
                        <p class="text-red-400 text-sm mb-3">{{ session('newsletter_error') }}</p>
                    @endif
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form relative mt-4 lg:mt-[30px]">
                        @csrf
                        <input type="email" name="email" placeholder="Email address" required
                               class="w-full h-[52px] bg-white/10 border border-white/20 rounded-[30px] px-5 pr-[70px] text-white text-sm placeholder-white/40 outline-none focus:border-[#3E80FF] transition-all" />
                        <div class="button absolute right-0 top-0">
                            <button type="submit" class="sub-btn h-[52px] w-[52px] flex items-center justify-center bg-white/20 rounded-[30px] text-white hover:bg-[#3E80FF] transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container mx-auto px-4">
            <div class="inner-content border-t border-white/10 pt-[30px] pb-[30px] max-lg:mt-9 lg:mt-12">
                <div class="flex flex-col items-center gap-1.5">
                    <p class="text-white text-sm">&copy; {{ date('Y') }} S6WeightCalculator. All rights reserved</p>
                    <p class="text-white text-sm mt-2 lg:mt-0 lg:text-right">Designed and Developed by Abonga</p>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- ===== SCROLL TO TOP ===== --}}
<a href="#" x-show="scrollTop" x-cloak @click.prevent="window.scrollTo({top: 0, behavior: 'smooth'})"
   class="scroll-top fixed bottom-8 right-8 w-[45px] h-[45px] flex items-center justify-center bg-[#3E80FF] text-white rounded-[5px] z-50 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
    <svg class="w-4 h-4 fill-current" viewBox="0 0 512 512"><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>
</a>
</body>
</html>

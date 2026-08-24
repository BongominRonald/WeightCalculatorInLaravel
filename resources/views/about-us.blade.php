<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>About Us | {{ config('app.name', 'S6WeightCalculator') }}</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap");
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script>if(localStorage.getItem('dark')==='true'||(!localStorage.getItem('dark')&&window.matchMedia('(prefers-color-scheme:dark)').matches)){document.documentElement.classList.add('dark');localStorage.setItem('dark','true')}</script>
    <style>[x-cloak]{display:none!important}</style>
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
            <a href="/" class="text-xl lg:text-2xl font-extrabold tracking-tight font-['Spartan'] text-white"
               :class="sticky ? '!text-[#24126A]' : ''">
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
                        <span class="block h-0.5 rounded bg-white transition-all duration-300" :class="sticky ? '!bg-[#24126A]' : ''" :class="{'rotate-45 translate-y-[7px]': mOpen}"></span>
                        <span class="block h-0.5 rounded bg-white transition-all duration-300" :class="sticky ? '!bg-[#24126A]' : ''" x-show="!mOpen"></span>
                        <span class="block h-0.5 rounded bg-white transition-all duration-300" :class="sticky ? '!bg-[#24126A]' : ''" :class="{'-rotate-45 -translate-y-[7px]': mOpen}"></span>
                    </span>
                </button>
            </div>
            <div class="hidden lg:flex items-center">
                <ul class="flex items-center gap-10 mx-auto">
                    <li><a href="/" class="text-sm font-medium capitalize transition-all duration-300 py-[35px] inline-flex items-center text-white/90 hover:text-white"
                           :class="sticky ? '!text-[#24126A] hover:!text-[#3E80FF]' : ''">Home</a></li>
                    <li class="relative" x-data="{ pages: false }" @mouseenter="pages = true" @mouseleave="pages = false">
                        <a href="#" class="text-sm font-medium capitalize transition-all duration-300 py-[35px] inline-flex items-center gap-1 text-white/90 hover:text-white"
                           :class="sticky ? '!text-[#24126A] hover:!text-[#3E80FF]' : ''"
                           @click.prevent="pages = !pages">
                            Pages
                            <svg class="w-3 h-3 fill-current transition-transform" :class="{ 'rotate-180': pages }" viewBox="0 0 512 512"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                        </a>
                        <ul x-show="pages" x-cloak @click.outside="pages = false"
                            class="absolute left-0 top-full mt-0 min-w-[240px] bg-white shadow-[0_5px_20px_#0000001a] rounded-md py-[30px] px-[30px] space-y-[15px] z-50">
                            <li><a href="{{ route('about-us') }}" class="text-sm font-medium text-[#888] hover:text-[#3E80FF] transition-all duration-300 block">About Us</a></li>
                            <li><a href="{{ route('login') }}" class="text-sm font-medium text-[#888] hover:text-[#3E80FF] transition-all duration-300 block">Sign In</a></li>
                            <li><a href="{{ route('register') }}" class="text-sm font-medium text-[#888] hover:text-[#3E80FF] transition-all duration-300 block">Sign Up</a></li>
                            <li><a href="{{ route('contact') }}" class="text-sm font-medium text-[#888] hover:text-[#3E80FF] transition-all duration-300 block">Contact</a></li>
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
        <div x-show="mOpen" x-cloak @click.outside="mOpen = false" class="lg:hidden bg-white shadow-[0_15px_20px_rgba(0,0,0,0.1)] rounded-lg p-5 max-h-[350px] overflow-y-auto border-t border-gray-100">
            <ul class="space-y-1">
                <li><a href="/" @click="mOpen = false" class="block py-3 px-4 text-sm font-medium text-[#051441] hover:text-[#3E80FF]">Home</a></li>
                <li x-data="{ mp: false }">
                    <button @click="mp = !mp" class="flex items-center justify-between w-full py-3 px-4 text-sm font-medium text-[#051441] hover:text-[#3E80FF]">
                        Pages <svg class="w-3 h-3 fill-current transition-transform" :class="{ 'rotate-180': mp }" viewBox="0 0 512 512"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
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

<main>
    {{-- ===== BREADCRUMBS ===== --}}
    <section class="bg-[#24126A] pt-[108px] pb-[55px] lg:pt-[140px] lg:pb-[85px] relative bg-cover bg-right text-center" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Ccircle cx=%2290%22 cy=%2210%22 r=%2240%22 fill=%22white%22 opacity=%220.03%22/%3E%3Ccircle cx=%2210%22 cy=%2290%22 r=%2230%22 fill=%22white%22 opacity=%220.02%22/%3E%3C/svg%3E');">
        <div class="container mx-auto px-4 text-center relative z-[2]">
            <h2 class="font-['Spartan'] text-2xl font-bold text-white capitalize leading-7 wow fadeInUp" data-wow-delay=".3s">About Us</h2>
            <ul class="inline-flex items-center gap-2 mt-2.5 wow fadeInUp" data-wow-delay=".5s">
                <li class="text-white/70 text-sm font-medium after:content-['>'] after:ml-2 after:text-white/50"><a href="/" class="text-white hover:text-white/80">Home</a></li>
                <li class="text-white text-sm font-medium">About Us</li>
            </ul>
        </div>
    </section>

    {{-- ===== ABOUT SECTION ===== --}}
    <section class="py-[50px] lg:py-[80px]">
        <div class="container mx-auto px-4">
            <div class="max-w-[800px] mx-auto text-center">
                <h3 class="text-sm font-semibold text-[#3E80FF] uppercase mb-5 wow zoomIn">Our Story</h3>
                <h2 class="font-['Spartan'] text-4xl leading-tight wow fadeInUp">Empowering Ugandan Students</h2>
                <p class="text-base leading-7 wow fadeInUp">S6WeightCalculator helps students across Uganda calculate their university admission weight based on UNEB O-Level and A-Level results. Our mission is to make the university application process transparent and straightforward.</p>
                <div class="mt-10 wow fadeInUp">
                    <a href="{{ route('register') }}" class="inline-block text-sm font-medium capitalize px-[30px] py-[14px] bg-[#3E80FF] text-white rounded-[30px] transition-all duration-300 hover:bg-[#24126A]">Get Started</a>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- ===== FOOTER ===== --}}
<footer class="bg-[#24126A] pt-[36px] pb-0 lg:pt-[85px]">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-4/12 px-4 mb-7 lg:mb-0">
                <div class="single-footer f-about pr-0 text-center">
                    <div class="logo mb-3 lg:mb-5">
                        <a href="/" class="text-2xl font-extrabold tracking-tight font-['Spartan'] text-white">S6<span class="text-[#3E80FF]">Weight</span>Calculator</a>
                    </div>
                    <p class="text-white/70 text-base leading-7 max-w-xs max-lg:mx-auto">Making university admission simple for every S6 student in Uganda.</p>
                    <h4 class="social-title text-white font-semibold text-xs inline-block align-middle mr-3">Follow Us On:</h4>
                    <ul class="social inline-flex items-center gap-[15px] align-middle">
                        <li><a href="https://www.tiktok.com/@abonga" target="_blank" class="text-white hover:text-[#3E80FF] transition-all duration-300"><svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg></a></li>
                        <li><a href="https://wa.me/256774120185" target="_blank" class="text-white hover:text-[#3E80FF] transition-all duration-300"><svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-1.102-1.016-1.847-2.27-2.063-2.654-.216-.384-.023-.592.163-.784.168-.172.374-.45.562-.674.187-.225.25-.386.374-.644.125-.258.062-.484-.032-.678-.093-.194-.67-1.618-.92-2.216-.242-.579-.487-.5-.67-.508-.173-.008-.372-.01-.57-.01-.199 0-.523.074-.797.372-.274.298-1.043 1.02-1.043 2.488s1.07 2.887 1.22 3.088c.149.2 2.108 3.22 5.108 4.517.714.31 1.27.496 1.704.635.714.227 1.364.195 1.877.118.574-.088 1.767-.721 2.016-1.418.248-.697.248-1.295.174-1.42-.074-.125-.273-.198-.57-.347m-5.472 6.868V21.25a9.25 9.25 0 110-18.5 9.25 9.25 0 110 18.5m0-20.25a11 11 0 100 22 11 11 0 000-22z"/></svg></a></li>
                    </ul>
                </div>
            </div>
            <div class="w-1/2 md:w-1/2 lg:w-2/12 px-4 mb-7 lg:mb-0">
                <div class="single-footer f-link text-center">
                    <h3 class="text-white font-['Spartan'] text-lg font-semibold mb-4 lg:mb-[35px]">Solutions</h3>
                    <ul class="space-y-2.5 lg:space-y-[15px]">
                        <li><a href="{{ route('login') }}" class="text-white text-sm font-medium hover:text-[#3E80FF] transition-all duration-300">Sign In</a></li>
                        <li><a href="{{ route('register') }}" class="text-white text-sm font-medium hover:text-[#3E80FF] transition-all duration-300">Sign Up</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-1/2 md:w-1/2 lg:w-2/12 px-4 mb-7 lg:mb-0">
                <div class="single-footer f-link text-center">
                    <h3 class="text-white font-['Spartan'] text-lg font-semibold mb-4 lg:mb-[35px]">Support</h3>
                    <ul class="space-y-2.5 lg:space-y-[15px]">
                        <li><a href="{{ route('contact') }}" class="text-white text-sm font-medium hover:text-[#3E80FF] transition-all duration-300">Contact</a></li>
                        <li><a href="mailto:abonga029@gmail.com" class="text-white text-sm font-medium hover:text-[#3E80FF] transition-all duration-300 break-all">abonga029@gmail.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-full md:w-full lg:w-4/12 px-4 mb-7 lg:mb-0">
                <div class="single-footer newsletter lg:pl-[80px]">
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
                        <input type="email" name="email" placeholder="Email address" required class="w-full h-[52px] bg-white/10 border border-white/20 rounded-[30px] px-5 pr-[70px] text-white text-sm placeholder-white/40 outline-none focus:border-[#3E80FF] transition-all" />
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
    <div class="border-t border-white/10 mt-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center gap-1.5 py-8">
                <p class="text-white/60 text-sm">&copy; {{ date('Y') }} {{ config('app.name', 'S6WeightCalculator') }}. All rights reserved</p>
                <p class="text-white/60 text-sm mt-2 lg:mt-0">Designed and Developed by Abonga</p>
            </div>
        </div>
    </div>
</footer>

<a href="#" x-show="scrollTop" x-cloak @click.prevent="window.scrollTo({top: 0, behavior: 'smooth'})" class="fixed bottom-8 right-8 w-[45px] h-[45px] flex items-center justify-center bg-[#3E80FF] text-white rounded-[5px] z-50 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
    <svg class="w-4 h-4 fill-current" viewBox="0 0 512 512"><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5-12.5-32.8-12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>
</a>
</body>
</html>

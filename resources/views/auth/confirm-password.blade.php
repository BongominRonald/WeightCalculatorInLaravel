<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Confirm Password | {{ config('app.name', 'S6WeightCalculator') }}</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap");
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>if(localStorage.getItem('dark')==='true'||(!localStorage.getItem('dark')&&window.matchMedia('(prefers-color-scheme:dark)').matches)){document.documentElement.classList.add('dark');localStorage.setItem('dark','true')}</script>
    <style>[x-cloak]{display:none!important}</style>
</head>
<body x-data="{ dark: false, sticky: false, scrollTop: false, mOpen: false }"
      @scroll.window="sticky = (window.pageYOffset > 80) ? true : false; scrollTop = (window.pageYOffset > 300) ? true : false"
      class="font-['DM_Sans'] text-[#727272] text-sm antialiased overflow-x-hidden bg-[#F4F7FA]">

<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>

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
                </ul>
                <button onclick="document.documentElement.classList.toggle('dark');localStorage.setItem('dark',document.documentElement.classList.contains('dark'))"
                        class="p-2 rounded-full transition-all duration-300"
                        :class="sticky ? 'text-[#24126A] hover:text-[#3E80FF]' : 'text-white/90 hover:text-white'">
                    <svg class="w-5 h-5 block dark:hidden" fill="currentColor" viewBox="0 0 24 24"><path d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/></svg>
                    <svg class="w-5 h-5 hidden dark:block" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/></svg>
                </button>
            </div>
        </div>
        <div x-show="mOpen" x-cloak @click.outside="mOpen = false" class="lg:hidden bg-white shadow-[0_15px_20px_rgba(0,0,0,0.1)] rounded-lg p-5 max-h-[350px] overflow-y-auto border-t border-gray-100">
            <ul class="space-y-1">
                <li><a href="/" @click="mOpen = false" class="block py-3 px-4 text-sm font-medium text-[#051441] hover:text-[#3E80FF]">Home</a></li>
            </ul>
        </div>
    </div>
</header>

<main>
    <section class="bg-[#24126A] pt-[160px] pb-[120px] relative bg-cover bg-right" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Ccircle cx=%2290%22 cy=%2210%22 r=%2240%22 fill=%22white%22 opacity=%220.03%22/%3E%3Ccircle cx=%2210%22 cy=%2290%22 r=%2230%22 fill=%22white%22 opacity=%220.02%22/%3E%3C/svg%3E');">
        <div class="container mx-auto px-4 text-center relative z-[2]">
            <h2 class="font-['Spartan'] text-2xl font-bold text-white capitalize leading-7 wow fadeInUp" data-wow-delay=".3s">Confirm Password</h2>
            <ul class="inline-flex items-center gap-2 mt-2.5 wow fadeInUp" data-wow-delay=".5s">
                <li class="text-white/70 text-sm font-medium after:content-['>'] after:ml-2 after:text-white/50"><a href="/" class="text-white hover:text-white/80">Home</a></li>
                <li class="text-white text-sm font-medium">Confirm Password</li>
            </ul>
        </div>
    </section>

    <section class="py-[110px]">
        <div class="container mx-auto px-4">
            <div class="max-w-[550px] mx-auto bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)] p-[30px] md:p-[50px]">
                <div class="text-center mb-8">
                    <h3 class="font-['Spartan'] text-sm font-semibold text-[#3E80FF] uppercase mb-3">Security</h3>
                    <h2 class="font-['Spartan'] text-2xl font-bold text-[#24126A]">Confirm your password</h2>
                    <p class="text-base mt-2">This is a secure area. Please confirm your password before continuing.</p>
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="mb-5">
                        <label class="block text-[#24126A] font-medium text-sm mb-2" for="password">Password</label>
                        <div class="relative" x-data="{ show: false }">
                            <input :type="show ? 'text' : 'password'" type="password" name="password" id="password" placeholder="**************" required autocomplete="current-password"
                                   class="w-full h-[52px] bg-[#F4F7FA] border border-[#eee] rounded-[30px] px-5 pr-12 text-sm text-[#727272] placeholder:text-[#727272]/50 outline-none focus:border-[#3E80FF] transition-all" />
                            <button type="button" @click="show = !show" tabindex="-1" aria-label="Toggle password visibility"
                                    class="absolute inset-y-0 right-0 pr-5 flex items-center text-[#727272] hover:text-[#3E80FF] transition-all">
                                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg x-show="show" style="display:none" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                            </button>
                        </div>
                        @error('password')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                    </div>

                    <button class="w-full text-sm font-medium capitalize px-[30px] py-[14px] bg-[#3E80FF] text-white rounded-[30px] transition-all duration-300 hover:bg-[#24126A]">Confirm</button>
                </form>
            </div>
        </div>
    </section>
</main>

<footer class="bg-[#24126A] pt-[110px] pb-0">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full lg:w-4/12 px-4 mb-10 lg:mb-0">
                <div class="single-footer f-about pr-[30px] max-lg:pr-0 max-lg:text-center">
                    <div class="logo mb-5">
                        <a href="/" class="text-2xl font-extrabold tracking-tight font-['Spartan'] text-white">S6<span class="text-[#3E80FF]">Weight</span>Calculator</a>
                    </div>
                    <p class="text-white/70 text-base leading-7 max-w-xs max-lg:mx-auto">Making university admission simple for every S6 student in Uganda.</p>
                    <h4 class="social-title text-white font-semibold text-xs block mb-5 mt-8">Follow Us On:</h4>
                    <ul class="social flex items-center gap-[15px] max-lg:justify-center">
                        <li><a href="javascript:void(0)" class="text-white hover:text-[#3E80FF] transition-all duration-300"><svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M14 13.5H16.5L17.5 9.5H14V7.5C14 6.47 14 5.5 16 5.5H17.5V2.14C17.174 2.097 15.943 2 14.643 2C11.928 2 10 3.657 10 6.7V9.5H7V13.5H10V22H14V13.5Z"/></svg></a></li>
                        <li><a href="javascript:void(0)" class="text-white hover:text-[#3E80FF] transition-all duration-300"><svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M22.162 5.656C21.398 5.994 20.589 6.215 19.76 6.314C20.634 5.791 21.288 4.969 21.6 4C20.78 4.488 19.881 4.83 18.944 5.015C18.315 4.342 17.48 3.895 16.571 3.745C15.661 3.594 14.728 3.748 13.915 4.183C13.103 4.618 12.456 5.31 12.077 6.15C11.698 6.99 11.607 7.932 11.818 8.829C10.155 8.746 8.528 8.313 7.043 7.561C5.558 6.808 4.248 5.751 3.198 4.459C2.826 5.097 2.631 5.823 2.632 6.562C2.632 8.012 3.37 9.293 4.492 10.043C3.828 10.022 3.179 9.843 2.598 9.52V9.572C2.598 10.538 2.932 11.474 3.544 12.221C4.155 12.969 5.006 13.481 5.953 13.673C5.337 13.84 4.69 13.865 4.063 13.745C4.33 14.576 4.85 15.303 5.551 15.824C6.251 16.345 7.097 16.634 7.97 16.65C7.102 17.331 6.109 17.835 5.047 18.132C3.985 18.429 2.874 18.514 1.779 18.382C3.691 19.611 5.916 20.264 8.189 20.262C15.882 20.262 20.089 13.889 20.089 8.362C20.089 8.182 20.084 8 20.076 7.822C20.895 7.23 21.602 6.497 22.163 5.657L22.162 5.656Z"/></svg></a></li>
                        <li><a href="javascript:void(0)" class="text-white hover:text-[#3E80FF] transition-all duration-300"><svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M6.94 5C6.94 5.53 6.729 6.04 6.354 6.414C5.978 6.789 5.469 7 4.939 7C4.409 7 3.9 6.789 3.525 6.414C3.15 6.039 2.94 5.53 2.94 5C2.94 4.47 3.15 3.96 3.525 3.586C3.9 3.211 4.409 3 4.939 3C5.469 3 5.978 3.211 6.354 3.586C6.729 3.96 6.94 4.47 6.94 5ZM7 8.48H3V21H7V8.48ZM13.32 8.48H9.34V21H13.28V14.43C13.28 10.77 18.05 10.43 18.05 14.43V21H22V13.07C22 6.9 14.94 7.13 13.28 10.16L13.32 8.48Z"/></svg></a></li>
                        <li><a href="javascript:void(0)" class="text-white hover:text-[#3E80FF] transition-all duration-300"><svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a></li>
                    </ul>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-2/12 px-4 mb-10 lg:mb-0">
                <div class="single-footer f-link">
                    <h3 class="text-white font-['Spartan'] text-lg font-semibold mb-[35px]">Solutions</h3>
                    <ul class="space-y-[15px]">
                        <li><a href="{{ route('login') }}" class="text-white text-sm font-medium hover:text-[#3E80FF] transition-all duration-300">Sign In</a></li>
                        <li><a href="{{ route('register') }}" class="text-white text-sm font-medium hover:text-[#3E80FF] transition-all duration-300">Sign Up</a></li>
                    </ul>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-2/12 px-4 mb-10 lg:mb-0">
                <div class="single-footer f-link">
                    <h3 class="text-white font-['Spartan'] text-lg font-semibold mb-[35px]">Support</h3>
                    <ul class="space-y-[15px]">
                        <li><a href="{{ route('contact') }}" class="text-white text-sm font-medium hover:text-[#3E80FF] transition-all duration-300">Contact</a></li>

                    </ul>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-4/12 px-4 mb-10 lg:mb-0">
                <div class="single-footer newsletter lg:pl-[80px]">
                    <h3 class="text-white font-['Spartan'] text-lg font-semibold mb-[35px]">Subscribe</h3>
                    <p class="text-white/70 text-base mb-5">Subscribe to our newsletter for the latest updates</p>
                    @if(session('newsletter_success'))
                        <p class="text-green-400 text-sm mb-3">{{ session('newsletter_success') }}</p>
                    @endif
                    @if(session('newsletter_error'))
                        <p class="text-red-400 text-sm mb-3">{{ session('newsletter_error') }}</p>
                    @endif
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form relative mt-[30px]">
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
                <p class="text-white/60 text-sm mt-2 lg:mt-0">Designed and Developed by <span class="text-white">Abonga</span></p>
            </div>
        </div>
    </div>
</footer>

<a href="#" x-show="scrollTop" x-cloak @click.prevent="window.scrollTo({top: 0, behavior: 'smooth'})" class="fixed bottom-8 right-8 w-[45px] h-[45px] flex items-center justify-center bg-[#3E80FF] text-white rounded-[5px] z-50 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
    <svg class="w-4 h-4 fill-current" viewBox="0 0 512 512"><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5-12.5-32.8-12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>
</a>
</body>
</html>

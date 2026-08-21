<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign In | {{ config('app.name', 'S6WeightCalculator') }}</title>
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

        {{-- Mobile Nav --}}
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
    <section class="bg-[#24126A] pt-[160px] pb-[120px] relative bg-cover bg-right" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22%3E%3Ccircle cx=%2290%22 cy=%2210%22 r=%2240%22 fill=%22white%22 opacity=%220.03%22/%3E%3Ccircle cx=%2210%22 cy=%2290%22 r=%2230%22 fill=%22white%22 opacity=%220.02%22/%3E%3C/svg%3E');">
        <div class="container mx-auto px-4 text-center relative z-[2]">
            <h2 class="font-['Spartan'] text-2xl font-bold text-white capitalize leading-7 wow fadeInUp" data-wow-delay=".3s">Sign In</h2>
            <ul class="inline-flex items-center gap-2 mt-2.5 wow fadeInUp" data-wow-delay=".5s">
                <li class="text-white/70 text-sm font-medium after:content-['>'] after:ml-2 after:text-white/50"><a href="/" class="text-white hover:text-white/80">Home</a></li>
                <li class="text-white text-sm font-medium">Sign In</li>
            </ul>
        </div>
    </section>

    {{-- ===== SIGN IN FORM ===== --}}
    <section class="py-[110px]">
        <div class="container mx-auto px-4">
            <div class="max-w-[550px] mx-auto bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)] p-[30px] md:p-[50px]">
                <div class="text-center mb-8">
                    <h3 class="font-['Spartan'] text-sm font-semibold text-[#3E80FF] uppercase mb-3">Welcome Back</h3>
                    <h2 class="font-['Spartan'] text-2xl font-bold text-[#24126A]">Sign in to your Account</h2>
                    <p class="text-base mt-2">Sign in to access your S6 Weight Calculator.</p>
                </div>

                <div class="text-center mb-6">
                    <h4 class="text-lg font-medium text-[#727272] mb-4">Sign in with Social Media</h4>
                    <div class="flex items-center justify-center gap-3">
                        <a href="{{ route('google.login') }}" class="flex items-center justify-center w-[50px] h-[50px] rounded-full border border-[#eee] text-[#727272] hover:bg-[#3E80FF] hover:text-white hover:border-[#3E80FF] transition-all duration-300">
                            <svg width="20" height="20" viewBox="0 0 22 22" fill="none"><path d="M22.0001 11.2439C22.0134 10.4877 21.9338 9.73268 21.7629 8.99512H11.2246V13.0773H17.4105C17.2933 13.793 17.0296 14.4782 16.6352 15.0915C16.2409 15.7048 15.724 16.2336 15.1158 16.6461L15.0942 16.7828L18.4264 19.3125L18.6571 19.3351C20.7772 17.4162 21.9997 14.5928 21.9997 11.2439" fill="#4285F4"/><path d="M11.2245 22C14.255 22 16.7992 21.0222 18.6577 19.3355L15.1156 16.6465C14.1679 17.2945 12.8958 17.7467 11.2245 17.7467C9.80508 17.7386 8.42433 17.2926 7.27814 16.4721C6.13195 15.6516 5.27851 14.4982 4.83892 13.1755L4.70737 13.1865L1.24255 15.8143L1.19727 15.9377C2.13043 17.7603 3.56252 19.2925 5.33341 20.3631C7.10429 21.4338 9.14416 22.0005 11.2249 22" fill="#34A853"/><path d="M4.83889 13.1756C4.59338 12.4754 4.46669 11.7405 4.46388 11.0001C4.4684 10.2609 4.59041 9.52697 4.82552 8.82462L4.81927 8.6788L1.31196 6.00879L1.19724 6.06226C0.410039 7.59392 0 9.28503 0 11C0 12.715 0.410039 14.4061 1.19724 15.9377L4.83889 13.1756" fill="#FBBC05"/><path d="M11.2249 4.25337C12.8333 4.22889 14.3888 4.8159 15.565 5.89121L18.7329 2.86003C16.7011 0.992106 14.0106 -0.0328008 11.2249 3.27798e-05C9.14418 -0.000452376 7.10433 0.566279 5.33345 1.63686C3.56256 2.70743 2.13046 4.23965 1.19727 6.06218L4.82684 8.82455C5.27077 7.50213 6.12703 6.34962 7.27491 5.5295C8.4228 4.70938 9.80439 4.26302 11.2249 4.25337" fill="#EB4335"/></svg>
                        </a>
                    </div>
                    <div class="relative my-8 text-center">
                        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-px bg-[#eee]"></span>
                        <span class="relative inline-block bg-white px-5 text-[#727272] text-sm font-medium">Or, sign in with your email</span>
                    </div>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    @if (session('status'))
                        <div class="bg-green-50 text-green-700 text-sm rounded-[30px] p-4 mb-4">{{ session('status') }}</div>
                    @endif

                    <div class="mb-5">
                        <label class="block text-[#24126A] font-medium text-sm mb-2" for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="example@gmail.com" value="{{ old('email') }}" required autofocus autocomplete="username"
                               class="w-full h-[52px] bg-[#F4F7FA] border border-[#eee] rounded-[30px] px-5 text-sm text-[#727272] placeholder:text-[#727272]/50 outline-none focus:border-[#3E80FF] transition-all" />
                        @error('email')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-5">
                        <label class="block text-[#24126A] font-medium text-sm mb-2" for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="**************" required autocomplete="current-password"
                               class="w-full h-[52px] bg-[#F4F7FA] border border-[#eee] rounded-[30px] px-5 text-sm text-[#727272] placeholder:text-[#727272]/50 outline-none focus:border-[#3E80FF] transition-all" />
                        @error('password')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center gap-2 text-sm text-[#727272] cursor-pointer">
                            <input type="checkbox" name="remember" id="remember" class="w-4 h-4 accent-[#3E80FF]" />
                            <span>Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="text-sm text-[#3E80FF] hover:text-[#24126A] transition-all" href="{{ route('password.request') }}">Forgot password?</a>
                        @endif
                    </div>

                    <button class="w-full text-sm font-medium capitalize px-[30px] py-[14px] bg-[#3E80FF] text-white rounded-[30px] transition-all duration-300 hover:bg-[#24126A]">Sign In</button>

                    <p class="text-center text-[#727272] text-sm mt-6">Don't have an account? <a href="{{ route('register') }}" class="text-[#3E80FF] hover:text-[#24126A] transition-all font-medium">Sign Up</a></p>
                </form>
            </div>
        </div>
    </section>
</main>

{{-- ===== FOOTER ===== --}}
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
            <div class="flex flex-col lg:flex-row items-center justify-between py-8">
                <p class="text-white/60 text-sm">&copy; {{ date('Y') }} {{ config('app.name', 'S6WeightCalculator') }}. All rights reserved</p>
                <p class="text-white/60 text-sm mt-2 lg:mt-0">Designed and Developed by <span class="text-white">Abonga</span></p>
            </div>
        </div>
    </div>
</footer>

<a href="#" x-show="scrollTop" x-cloak @click.prevent="window.scrollTo({top: 0, behavior: 'smooth'})" class="fixed bottom-8 right-8 w-[45px] h-[45px] flex items-center justify-center bg-[#3E80FF] text-white rounded-[5px] z-50 transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
    <svg class="w-4 h-4 fill-current" viewBox="0 0 512 512"><path d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/></svg>
</a>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'S6WeightCalculator') }}</title>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2252067205687343"
             crossorigin="anonymous"></script>

        <style>
            @import url("https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap");
            @import url("https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap");
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    </head>
    <body class="font-['DM_Sans'] text-[#727272] antialiased">
        <div class="preloader">
            <div class="preloader-inner">
                <div class="preloader-icon">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="min-h-screen flex flex-col items-center bg-[#F4F7FA]">
            <div class="w-full py-6 text-center">
                <a href="/" class="font-['Spartan'] text-2xl font-extrabold tracking-tight text-[#24126A]">
                    S6<span class="text-[#3E80FF]">Weight</span>Calculator
                </a>
            </div>

            <div class="w-full max-w-[550px] mx-auto mt-6 px-6 py-8 bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)]">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

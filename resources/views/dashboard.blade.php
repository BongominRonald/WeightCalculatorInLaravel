<x-app-layout>
    <div class="py-8 lg:py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#3E80FF] rounded-[10px] p-4 lg:p-5 mb-5 text-white relative overflow-hidden wow fadeInUp" data-wow-delay=".2s">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2"></div>
                <div class="relative">
                    <h2 class="font-['Spartan'] text-lg lg:text-xl font-bold text-center">Welcome, {{ Auth::user()->name }}!</h2>
                    <p class="mt-1.5 text-white/70 text-sm text-center">Follow the 6 steps to calculate your university admission weight.</p>
                    <div class="mt-3 flex items-center justify-center gap-2 text-xs text-white/50">
                        <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span>
                        <span>{{ Auth::user()->email }}</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
                <a href="{{ route('olevel.subjects') }}" class="group bg-white rounded-[10px] p-6 shadow-[0_0_30px_rgba(0,0,0,0.05)] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <span class="step-number w-10 h-10 rounded-lg text-white font-bold flex items-center justify-center text-xs shadow-lg shrink-0">1</span>
                        <div>
                            <h4 class="font-['Spartan'] font-bold text-[#24126A] group-hover:text-[#3E80FF] transition text-sm">O-Level Subjects</h4>
                            <p class="text-xs text-[#727272] mt-1">Register your subjects</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-[#3E80FF] font-medium opacity-0 group-hover:opacity-100 transition">
                        Get started <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </a>

                <a href="{{ route('olevel.scores') }}" class="group bg-white rounded-[10px] p-6 shadow-[0_0_30px_rgba(0,0,0,0.05)] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <span class="step-number w-10 h-10 rounded-lg text-white font-bold flex items-center justify-center text-xs shadow-lg shrink-0">2</span>
                        <div>
                            <h4 class="font-['Spartan'] font-bold text-[#24126A] group-hover:text-[#3E80FF] transition text-sm">O-Level Scores</h4>
                            <p class="text-xs text-[#727272] mt-1">Enter your UNEB grades</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-[#3E80FF] font-medium opacity-0 group-hover:opacity-100 transition">
                        Get started <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </a>

                <a href="{{ route('alevel.subjects') }}" class="group bg-white rounded-[10px] p-6 shadow-[0_0_30px_rgba(0,0,0,0.05)] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <span class="step-number w-10 h-10 rounded-lg text-white font-bold flex items-center justify-center text-xs shadow-lg shrink-0">3</span>
                        <div>
                            <h4 class="font-['Spartan'] font-bold text-[#24126A] group-hover:text-[#3E80FF] transition text-sm">A-Level Subjects</h4>
                            <p class="text-xs text-[#727272] mt-1">Register your subjects</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-[#3E80FF] font-medium opacity-0 group-hover:opacity-100 transition">
                        Get started <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </a>

                <a href="{{ route('alevel.scores') }}" class="group bg-white rounded-[10px] p-6 shadow-[0_0_30px_rgba(0,0,0,0.05)] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <span class="step-number w-10 h-10 rounded-lg text-white font-bold flex items-center justify-center text-xs shadow-lg shrink-0">4</span>
                        <div>
                            <h4 class="font-['Spartan'] font-bold text-[#24126A] group-hover:text-[#3E80FF] transition text-sm">A-Level Scores</h4>
                            <p class="text-xs text-[#727272] mt-1">Enter your grades</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-[#3E80FF] font-medium opacity-0 group-hover:opacity-100 transition">
                        Get started <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </a>

                <a href="{{ route('weight') }}" class="group bg-white rounded-[10px] p-6 shadow-[0_0_30px_rgba(0,0,0,0.05)] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <span class="step-number w-10 h-10 rounded-lg text-white font-bold flex items-center justify-center text-xs shadow-lg shrink-0">5</span>
                        <div>
                            <h4 class="font-['Spartan'] font-bold text-[#24126A] group-hover:text-[#3E80FF] transition text-sm">Calculate Weight</h4>
                            <p class="text-xs text-[#727272] mt-1">Compute your score</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-[#3E80FF] font-medium opacity-0 group-hover:opacity-100 transition">
                        Get started <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </a>

                <a href="{{ route('view') }}" class="group bg-white rounded-[10px] p-6 shadow-[0_0_30px_rgba(0,0,0,0.05)] hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-center gap-4">
                        <span class="step-number w-10 h-10 rounded-lg text-white font-bold flex items-center justify-center text-xs shadow-lg shrink-0">6</span>
                        <div>
                            <h4 class="font-['Spartan'] font-bold text-[#24126A] group-hover:text-[#3E80FF] transition text-sm">View Results</h4>
                            <p class="text-xs text-[#727272] mt-1">See your eligibility</p>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-[#3E80FF] font-medium opacity-0 group-hover:opacity-100 transition">
                        Get started <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

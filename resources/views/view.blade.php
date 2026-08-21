<x-app-layout>
    <x-slot name="header">
        <h2 class="font-['Spartan'] font-semibold text-xl text-[#24126A] leading-tight text-center">
            {{ __('My Results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">

                <div class="bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)] p-6">
                    <h3 class="font-['Spartan'] text-lg font-semibold text-[#24126A] mb-4">Profile</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div><span class="text-[#727272]">Name:</span> <span class="text-[#24126A] font-medium">{{ $user->name }}</span></div>
                        <div><span class="text-[#727272]">Email:</span> <span class="text-[#24126A] font-medium">{{ $user->email }}</span></div>
                        <div><span class="text-[#727272]">Gender:</span> <span class="text-[#24126A] font-medium">{{ ucfirst($user->gender) }}</span></div>
                    </div>
                </div>

                <div class="bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)] p-6" x-data="{ open: true }">
                    <button @click="open = !open" class="w-full flex items-center justify-between mb-4">
                        <h3 class="font-['Spartan'] text-lg font-semibold text-[#24126A]">O-Level Subjects</h3>
                        <svg class="w-4 h-4 text-[#727272] transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    @if($olevelSubjects->isNotEmpty())
                    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-[#eee]">
                                <th class="text-left py-2 text-[#727272]">Subject</th>
                                <th class="text-left py-2 text-[#727272]">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($olevelSubjects as $s)
                            <tr class="border-b border-[#eee]">
                                <td class="py-2 text-[#24126A]">{{ $s->name }}</td>
                                <td class="py-2 text-[#727272]">{{ $s->is_compulsory ? 'Compulsory' : 'Optional' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    </div>
                    @else
                    <p class="text-[#727272] text-sm">No O-Level subjects registered.</p>
                    @endif
                </div>

                <div class="bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)] p-6" x-data="{ open: true }">
                    <button @click="open = !open" class="w-full flex items-center justify-between mb-4">
                        <h3 class="font-['Spartan'] text-lg font-semibold text-[#24126A]">O-Level Scores</h3>
                        <svg class="w-4 h-4 text-[#727272] transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    @if($olevelScores->isNotEmpty())
                    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-[#eee]">
                                <th class="text-left py-2 text-[#727272]">Subject</th>
                                <th class="text-left py-2 text-[#727272]">Grade</th>
                                <th class="text-left py-2 text-[#727272]">Bucket</th>
                                <th class="text-left py-2 text-[#727272]">Weight</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($olevelScores as $s)
                            <tr class="border-b border-[#eee]">
                                <td class="py-2 text-[#24126A]">{{ $s->subject_name }}</td>
                                <td class="py-2 text-[#727272]">{{ $s->grade }}</td>
                                <td class="py-2 text-[#727272]">{{ ucfirst($s->bucket) }}</td>
                                <td class="py-2 text-[#727272]">{{ $s->weight_value }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    </div>
                    @else
                    <p class="text-[#727272] text-sm">No O-Level scores entered.</p>
                    @endif
                </div>

                <div class="bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)] p-6" x-data="{ open: true }">
                    <button @click="open = !open" class="w-full flex items-center justify-between mb-4">
                        <h3 class="font-['Spartan'] text-lg font-semibold text-[#24126A]">A-Level Subjects</h3>
                        <svg class="w-4 h-4 text-[#727272] transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    @if($alevelSubjects->isNotEmpty())
                    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-[#eee]">
                                <th class="text-left py-2 text-[#727272]">Subject</th>
                                <th class="text-left py-2 text-[#727272]">Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alevelSubjects as $s)
                            <tr class="border-b border-[#eee]">
                                <td class="py-2 text-[#24126A]">{{ $s->subject_name }}</td>
                                <td class="py-2 text-[#727272]">{{ ucfirst($s->category) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    </div>
                    @else
                    <p class="text-[#727272] text-sm">No A-Level subjects registered.</p>
                    @endif
                </div>

                <div class="bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)] p-6" x-data="{ open: true }">
                    <button @click="open = !open" class="w-full flex items-center justify-between mb-4">
                        <h3 class="font-['Spartan'] text-lg font-semibold text-[#24126A]">A-Level Scores</h3>
                        <svg class="w-4 h-4 text-[#727272] transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    @if($alevelScores->isNotEmpty())
                    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                    <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-[#eee]">
                                <th class="text-left py-2 text-[#727272]">Subject</th>
                                <th class="text-left py-2 text-[#727272]">Grade</th>
                                <th class="text-left py-2 text-[#727272]">Points</th>
                                <th class="text-left py-2 text-[#727272]">Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alevelScores as $s)
                            <tr class="border-b border-[#eee]">
                                <td class="py-2 text-[#24126A]">{{ $s->subject_name }}</td>
                                <td class="py-2 text-[#727272]">{{ $s->grade }}</td>
                                <td class="py-2 text-[#727272]">{{ $s->points }}</td>
                                <td class="py-2 text-[#727272]">{{ ucfirst($s->category) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    </div>
                    @else
                    <p class="text-[#727272] text-sm">No A-Level scores entered.</p>
                    @endif
                </div>

                <div class="bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)] p-6">
                    <h3 class="font-['Spartan'] text-lg font-semibold text-[#24126A] mb-4">Weight Summary</h3>
                    @if($result)
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div class="bg-[#F4F7FA] rounded p-3">
                            <span class="text-sm text-[#727272]">O-Level Weight</span>
                            <p class="text-xl font-bold text-[#24126A]">{{ number_format($result->olevel_weight, 2) }}</p>
                        </div>
                        <div class="bg-[#F4F7FA] rounded p-3">
                            <span class="text-sm text-[#727272]">A-Level Weight</span>
                            <p class="text-xl font-bold text-[#24126A]">{{ number_format($result->alevel_weight, 2) }}</p>
                        </div>
                        <div class="bg-[#F4F7FA] rounded p-3">
                            <span class="text-sm text-[#727272]">Gender Bonus</span>
                            <p class="text-xl font-bold text-[#24126A]">{{ number_format($result->gender_bonus, 2) }}</p>
                        </div>
                        <div class="bg-[#EEF2FF] rounded p-3 col-span-2 md:col-span-3">
                            <span class="text-sm text-[#3E80FF] font-semibold">Total Weight</span>
                            <p class="text-2xl font-bold text-[#24126A]">{{ number_format($result->total_weight, 2) }}</p>
                        </div>
                    </div>
                    @if($result->eligibility)
                    <div class="mt-4 p-3 rounded {{ $result->eligibility === 'Eligible' ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
                        <strong>{{ $result->eligibility }}</strong>
                        @if($result->cutoff) (cutoff: {{ number_format($result->cutoff, 2) }}) @endif
                    </div>
                    @endif
                    @else
                    <p class="text-[#727272] text-sm">No weight calculated yet.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

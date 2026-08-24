<x-app-layout>
    <x-slot name="header">
        <h2 class="font-['Spartan'] font-semibold text-xl text-[#24126A] leading-tight text-center">
            {{ __('Weight Calculator') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-50 text-green-700 text-sm rounded-[30px] p-4 mb-4">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-50 text-red-700 text-sm rounded-[30px] p-4 mb-4">{{ session('error') }}</div>
            @endif

            @if($result && $result->total_weight > 0)
            <div class="bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)] p-6 mb-6">
                <h3 class="font-['Spartan'] text-lg font-semibold text-[#24126A] mb-4">Your Results</h3>
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
                    @if($result->cutoff)
                        (cutoff: {{ number_format($result->cutoff, 2) }})
                    @endif
                </div>
                @endif
            </div>
            @endif

            <div class="bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)] p-6">
                <h3 class="font-['Spartan'] text-lg font-semibold text-[#24126A] mb-4">Calculate Weight</h3>

                @if($principles->isEmpty())
                    <p class="text-[#727272]">Please <a href="{{ route('alevel.scores') }}" class="text-[#3E80FF] hover:text-[#24126A] underline transition-all">enter your A-Level scores</a> first.</p>
                @else
                <form method="POST" action="{{ route('weight') }}">
                    @csrf

                    <p class="text-sm text-[#727272] mb-4">Select 2 essentials (weight x3) and 1 desirable (weight x2) from your principal subjects.</p>

                    <div class="space-y-4">
                        <div>
                            <x-input-label for="essential1" :value="__('Essential Subject 1')" />
                            <select id="essential1" name="essential1" required
                                class="w-full h-[52px] bg-[#F4F7FA] border border-[#eee] rounded-[30px] px-5 text-sm text-[#727272] outline-none focus:border-[#3E80FF] transition-all">
                                <option value="">-- Select --</option>
                                @foreach($principles as $s)
                                    <option value="{{ $s->subject_name }}" {{ old('essential1') === $s->subject_name ? 'selected' : '' }}>{{ $s->subject_name }} ({{ $s->grade }} - {{ $s->points }} pts)</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('essential1')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="essential2" :value="__('Essential Subject 2')" />
                            <select id="essential2" name="essential2" required
                                class="w-full h-[52px] bg-[#F4F7FA] border border-[#eee] rounded-[30px] px-5 text-sm text-[#727272] outline-none focus:border-[#3E80FF] transition-all">
                                <option value="">-- Select --</option>
                                @foreach($principles as $s)
                                    <option value="{{ $s->subject_name }}" {{ old('essential2') === $s->subject_name ? 'selected' : '' }}>{{ $s->subject_name }} ({{ $s->grade }} - {{ $s->points }} pts)</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('essential2')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="desirable" :value="__('Desirable Subject')" />
                            <select id="desirable" name="desirable" required
                                class="w-full h-[52px] bg-[#F4F7FA] border border-[#eee] rounded-[30px] px-5 text-sm text-[#727272] outline-none focus:border-[#3E80FF] transition-all">
                                <option value="">-- Select --</option>
                                @foreach($principles as $s)
                                    <option value="{{ $s->subject_name }}" {{ old('desirable') === $s->subject_name ? 'selected' : '' }}>{{ $s->subject_name }} ({{ $s->grade }} - {{ $s->points }} pts)</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('desirable')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="cutoff" :value="__('University Cutoff (optional)')" />
                            <x-text-input id="cutoff" name="cutoff" type="number" step="0.01" class="mt-1 block w-full" :value="old('cutoff', $result->cutoff ?? '')" placeholder="e.g. 12.50" />
                            <p class="text-xs text-[#727272] mt-1">Enter a cutoff to check eligibility.</p>
                            <x-input-error :messages="$errors->get('cutoff')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-3 mt-6">
                        <a href="{{ route('alevel.scores') }}" class="text-[#3E80FF] hover:text-[#24126A] underline text-sm transition-all">Back to A-Level scores</a>
                        <x-primary-button>{{ __('Calculate Weight') }}</x-primary-button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-['Spartan'] font-semibold text-xl text-[#24126A] leading-tight text-center">
            {{ __('A-Level Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-50 text-green-700 text-sm rounded-[30px] p-4 mb-4">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-50 text-red-700 text-sm rounded-[30px] p-4 mb-4">{{ session('error') }}</div>
            @endif

            <div class="bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)] p-6">
                <form method="POST" action="{{ route('alevel.subjects') }}">
                    @csrf

                    <h4 class="font-['Spartan'] font-semibold text-[#24126A] mb-3">General Paper</h4>
                    <div class="bg-[#F4F7FA] rounded p-3 mb-6">
                        <p class="text-[#727272]">General Paper (GP) — auto-added</p>
                    </div>

                    <h4 class="font-['Spartan'] font-semibold text-[#24126A] mb-3">Principal Subjects</h4>
                    <p class="text-sm text-[#727272] mb-4">Enter your 3 principal subjects.</p>

                    <div class="space-y-4">
                        <div>
                            <x-input-label for="principle1" :value="__('Principal Subject 1')" />
                            <x-text-input id="principle1" name="principle1" type="text" class="mt-1 block w-full" :value="old('principle1')" required />
                            <x-input-error :messages="$errors->get('principle1')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="principle2" :value="__('Principal Subject 2')" />
                            <x-text-input id="principle2" name="principle2" type="text" class="mt-1 block w-full" :value="old('principle2')" required />
                            <x-input-error :messages="$errors->get('principle2')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="principle3" :value="__('Principal Subject 3')" />
                            <x-text-input id="principle3" name="principle3" type="text" class="mt-1 block w-full" :value="old('principle3')" required />
                            <x-input-error :messages="$errors->get('principle3')" class="mt-2" />
                        </div>
                    </div>

                    <h4 class="font-['Spartan'] font-semibold text-[#24126A] mb-3 mt-6">Subsidiary Subject</h4>
                    <div>
                        <x-input-label for="subsidiary" :value="__('Choose Subsidiary')" />
                        <select id="subsidiary" name="subsidiary" required
                            class="w-full h-[52px] bg-[#F4F7FA] border border-[#eee] rounded-[30px] px-5 text-sm text-[#727272] outline-none focus:border-[#3E80FF] transition-all">
                            <option value="">-- Select --</option>
                            <option value="ICT" {{ old('subsidiary') === 'ICT' ? 'selected' : '' }}>ICT</option>
                            <option value="Subsidiary Mathematics" {{ old('subsidiary') === 'Subsidiary Mathematics' ? 'selected' : '' }}>Subsidiary Mathematics</option>
                        </select>
                        <x-input-error :messages="$errors->get('subsidiary')" class="mt-2" />
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-3 mt-6">
                        <a href="{{ route('olevel.scores') }}" class="text-[#3E80FF] hover:text-[#24126A] underline text-sm transition-all">Back to O-Level scores</a>
                        <x-primary-button>{{ __('Save & Continue') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

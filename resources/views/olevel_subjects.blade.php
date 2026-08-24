<x-app-layout>
    <x-slot name="header">
        <h2 class="font-['Spartan'] font-semibold text-xl text-[#24126A] leading-tight text-center">
            {{ __('O-Level Subjects') }}
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
                <form method="POST" action="{{ route('olevel.subjects') }}">
                    @csrf

                    <h4 class="font-['Spartan'] font-semibold text-[#24126A] mb-3">Compulsory Subjects</h4>
                    <div class="bg-[#F4F7FA] rounded p-3 mb-6">
                        <p class="text-[#727272]">{{ implode(', ', $compulsory) }}</p>
                    </div>

                    <h4 class="font-['Spartan'] font-semibold text-[#24126A] mb-3">Optional Subjects</h4>
                    <p class="text-sm text-[#727272] mb-4">Enter 2 or 3 optional subjects.</p>

                    <div class="space-y-4">
                        <div>
                            <x-input-label for="optional1" :value="__('Optional Subject 1')" />
                            <x-text-input id="optional1" name="optional1" type="text" class="mt-1 block w-full" :value="old('optional1')" required />
                            <x-input-error :messages="$errors->get('optional1')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="optional2" :value="__('Optional Subject 2')" />
                            <x-text-input id="optional2" name="optional2" type="text" class="mt-1 block w-full" :value="old('optional2')" required />
                            <x-input-error :messages="$errors->get('optional2')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="optional3" :value="__('Optional Subject 3 (optional)')" />
                            <x-text-input id="optional3" name="optional3" type="text" class="mt-1 block w-full" :value="old('optional3')" />
                            <x-input-error :messages="$errors->get('optional3')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-center mt-6">
                        <x-primary-button>{{ __('Save & Continue') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

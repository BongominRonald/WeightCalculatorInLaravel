<x-app-layout>
    <x-slot name="header">
        <h2 class="font-['Spartan'] font-semibold text-xl text-[#24126A] leading-tight text-center">
            {{ __('O-Level Scores') }}
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

            <div class="bg-white rounded-[10px] shadow-[0_0_30px_rgba(0,0,0,0.05)] p-6">
                @if($subjects->isEmpty())
                    <p class="text-[#727272]">Please <a href="{{ route('olevel.subjects') }}" class="text-[#3E80FF] hover:text-[#24126A] underline transition-all">register your O-Level subjects</a> first.</p>
                @else
                <form method="POST" action="{{ route('olevel.scores') }}">
                    @csrf

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-[#eee]">
                                    <th class="text-left py-2 px-3 text-[#727272]">Subject</th>
                                    <th class="text-left py-2 px-3 text-[#727272]">Grade</th>
                                    <th class="text-left py-2 px-3 text-[#727272]">Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subjects as $subject)
                                <tr class="border-b border-[#eee]">
                                    <td class="py-2 px-3 text-[#24126A]">{{ $subject->name }}</td>
                                    <td class="py-2 px-3">
                                        <select name="grade_{{ $subject->id }}" required
                                            class="h-[40px] bg-[#F4F7FA] border border-[#eee] rounded-[30px] px-4 text-sm text-[#727272] outline-none focus:border-[#3E80FF] transition-all">
                                            <option value="">-- Select Grade --</option>
                                            @foreach($grades as $grade)
                                                <option value="{{ $grade }}" {{ ($scores->get($subject->name)?->grade ?? '') === $grade ? 'selected' : '' }}>
                                                    {{ $grade }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="py-2 px-3">
                                        @if($subject->is_compulsory)
                                            <span class="text-xs bg-[#3E80FF]/10 text-[#3E80FF] px-2 py-1 rounded-[30px]">Compulsory</span>
                                        @else
                                            <span class="text-xs bg-[#F4F7FA] text-[#727272] px-2 py-1 rounded-[30px]">Optional</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex items-center justify-center gap-3 mt-6">
                        <a href="{{ route('olevel.subjects') }}" class="text-[#3E80FF] hover:text-[#24126A] underline text-sm transition-all">Back to subjects</a>
                        <x-primary-button>{{ __('Save & Continue') }}</x-primary-button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

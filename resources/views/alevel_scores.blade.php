<x-app-layout>
    <x-slot name="header">
        <h2 class="font-['Spartan'] font-semibold text-xl text-[#24126A] leading-tight text-center">
            {{ __('A-Level Scores') }}
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
                @if($principles->isEmpty())
                    <p class="text-[#727272]">Please <a href="{{ route('alevel.subjects') }}" class="text-[#3E80FF] hover:text-[#24126A] underline transition-all">register your A-Level subjects</a> first.</p>
                @else
                <form method="POST" action="{{ route('alevel.scores') }}">
                    @csrf

                    <h4 class="font-['Spartan'] font-semibold text-[#24126A] mb-3">Principal Subjects</h4>
                    <div class="overflow-x-auto">
                    <table class="w-full text-sm mb-6">
                        <thead>
                            <tr class="border-b border-[#eee]">
                                <th class="text-left py-2 px-3 text-[#727272]">Subject</th>
                                <th class="text-left py-2 px-3 text-[#727272]">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($principles as $subject)
                            <tr class="border-b border-[#eee]">
                                <td class="py-2 px-3 text-[#24126A]">{{ $subject->subject_name }}</td>
                                <td class="py-2 px-3">
                                    <select name="grade_{{ $subject->id }}" required
                                        class="h-[40px] bg-[#F4F7FA] border border-[#eee] rounded-[30px] px-4 text-sm text-[#727272] outline-none focus:border-[#3E80FF] transition-all">
                                        <option value="">-- Select Grade --</option>
                                        @foreach(['A'=>6, 'B'=>5, 'C'=>4, 'D'=>3, 'E'=>2, 'O'=>1, 'F'=>0] as $grade => $pts)
                                            <option value="{{ $grade }}" {{ ($scores->get($subject->subject_name)?->grade ?? '') === $grade ? 'selected' : '' }}>
                                                {{ $grade }} ({{ $pts }} pts)
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>

                    <h4 class="font-['Spartan'] font-semibold text-[#24126A] mb-3">Subsidiary Subjects</h4>
                    <div class="overflow-x-auto">
                    <table class="w-full text-sm mb-6">
                        <thead>
                            <tr class="border-b border-[#eee]">
                                <th class="text-left py-2 px-3 text-[#727272]">Subject</th>
                                <th class="text-left py-2 px-3 text-[#727272]">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subsidiaries as $subject)
                            <tr class="border-b border-[#eee]">
                                <td class="py-2 px-3 text-[#24126A]">{{ $subject->subject_name }}</td>
                                <td class="py-2 px-3">
                                    <select name="grade_{{ $subject->id }}" required
                                        class="h-[40px] bg-[#F4F7FA] border border-[#eee] rounded-[30px] px-4 text-sm text-[#727272] outline-none focus:border-[#3E80FF] transition-all">
                                        <option value="">-- Select Grade --</option>
                                        @foreach(['D1','D2','C3','C4','C5','C6','P7','P8','F9'] as $grade)
                                            <option value="{{ $grade }}" {{ ($scores->get($subject->subject_name)?->grade ?? '') === $grade ? 'selected' : '' }}>
                                                {{ $grade }} {{ in_array($grade, ['D1','D2','C3','C4','C5','C6']) ? '(1 pt)' : '(0 pts)' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>

                    <div class="flex items-center justify-center gap-3 mt-6">
                        <a href="{{ route('alevel.subjects') }}" class="text-[#3E80FF] hover:text-[#24126A] underline text-sm transition-all">Back to A-Level subjects</a>
                        <x-primary-button>{{ __('Save & Continue') }}</x-primary-button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

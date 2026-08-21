@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full h-[52px] bg-[#F4F7FA] border border-[#eee] rounded-[30px] px-5 text-sm text-[#727272] placeholder:text-[#727272]/50 outline-none focus:border-[#3E80FF] transition-all']) }}>

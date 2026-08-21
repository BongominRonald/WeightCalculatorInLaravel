<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-[30px] py-[14px] bg-white border border-[#eee] rounded-[30px] font-medium text-sm text-[#727272] capitalize hover:bg-[#F4F7FA] focus:outline-none focus:ring-2 focus:ring-[#3E80FF] focus:ring-offset-2 transition-all duration-300']) }}>
    {{ $slot }}
</button>

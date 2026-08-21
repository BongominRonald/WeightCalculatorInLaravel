<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-[30px] py-[14px] bg-[#3E80FF] border border-transparent rounded-[30px] font-medium text-sm text-white capitalize hover:bg-[#24126A] focus:outline-none focus:ring-2 focus:ring-[#3E80FF] focus:ring-offset-2 transition-all duration-300']) }}>
    {{ $slot }}
</button>

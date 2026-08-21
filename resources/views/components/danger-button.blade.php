<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-[30px] py-[14px] bg-red-600 border border-transparent rounded-[30px] font-medium text-sm text-white capitalize hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-300']) }}>
    {{ $slot }}
</button>

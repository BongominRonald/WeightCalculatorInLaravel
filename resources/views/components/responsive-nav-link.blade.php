@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#3E80FF] text-start text-base font-medium text-[#3E80FF] bg-[#F4F7FA] focus:outline-none focus:text-[#24126A] focus:bg-[#F4F7FA] focus:border-[#3E80FF] transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-[#727272] hover:text-[#24126A] hover:bg-[#F4F7FA] hover:border-[#3E80FF] focus:outline-none focus:text-[#24126A] focus:bg-[#F4F7FA] focus:border-[#3E80FF] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

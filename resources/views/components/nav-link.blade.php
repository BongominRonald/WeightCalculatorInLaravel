@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#3E80FF] text-sm font-medium leading-5 text-[#24126A] focus:outline-none focus:border-[#3E80FF] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#727272] hover:text-[#24126A] hover:border-[#3E80FF] focus:outline-none focus:text-[#24126A] focus:border-[#3E80FF] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

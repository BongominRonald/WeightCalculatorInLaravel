@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-[#24126A] font-medium text-sm mb-2']) }}>
    {{ $value ?? $slot }}
</label>

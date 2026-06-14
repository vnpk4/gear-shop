@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-jetbrains text-[10px] uppercase tracking-widest text-on-surface-variant/80 mb-1.5']) }}>
    {{ $value ?? $slot }}
</label>

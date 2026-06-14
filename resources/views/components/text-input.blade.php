@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'glass-input w-full h-12 px-4 rounded-xl text-on-surface font-inter text-sm placeholder:text-on-surface-variant/30 focus:ring-0 disabled:opacity-50 disabled:cursor-not-allowed']) }}>

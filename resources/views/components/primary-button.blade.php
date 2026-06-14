<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-primary inline-flex items-center justify-center px-6 py-3 rounded-xl font-sora font-bold text-xs uppercase tracking-widest transition duration-150 ease-in-out cursor-pointer']) }}>
    {{ $slot }}
</button>

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-error/10 border border-error/20 rounded-xl font-sora font-bold text-xs text-error uppercase tracking-widest hover:bg-error/20 active:bg-error/30 focus:outline-none transition ease-in-out duration-150 cursor-pointer']) }}>
    {{ $slot }}
</button>

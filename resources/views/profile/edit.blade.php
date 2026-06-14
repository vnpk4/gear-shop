<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-sora font-bold text-xl text-on-surface leading-tight">
                {{ __('Hồ sơ Cá nhân') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-background min-h-screen text-on-surface">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 md:p-8 bg-surface-container/60 border border-white/10 shadow-2xl sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 md:p-8 bg-surface-container/60 border border-white/10 shadow-2xl sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 md:p-8 bg-surface-container/60 border border-white/10 shadow-2xl sm:rounded-2xl">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

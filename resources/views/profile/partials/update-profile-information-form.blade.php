<section>
    <header>
        <h2 class="font-sora text-lg font-bold text-primary">
            {{ __('Thông tin cá nhân') }}
        </h2>

        <p class="mt-1 text-sm text-on-surface-variant/80 font-inter">
            {{ __("Cập nhật thông tin tài khoản và địa chỉ email của bạn.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Tên tài khoản (đăng nhập)')" />
            <x-text-input disabled id="name" name="name" type="text" class="mt-1 block w-full opacity-60 cursor-not-allowed" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="realname" :value="__('Họ và tên thật')" />
            <x-text-input id="realname" name="realname" type="text" class="mt-1 block w-full" :value="old('realname', $user->realname)" required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('realname')" />
        </div>

        <div>
            <x-input-label for="birthday" :value="__('Ngày sinh')" />
            <x-text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full" :value="old('birthday', $user->birthday?->format('Y-m-d') ?? $user->birthday)" />
            <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-on-surface-variant">
                    {{ __('Địa chỉ email của bạn chưa được xác minh.') }}

                    <button form="send-verification" class="underline text-sm text-on-surface-variant hover:text-primary rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        {{ __('Nhấn vào đây để gửi lại email xác minh.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-tertiary">
                    {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Lưu thay đổi') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-on-surface-variant/70 font-jetbrains">{{ __('Đã lưu.') }}</p>
            @endif
        </div>
    </form>
</section>
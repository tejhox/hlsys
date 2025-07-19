<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>
        <hr />
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4 space-y-2">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Password Sekarang')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                class="mt-1 block w-full text-slate-800" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Password Baru')" />
            <x-text-input id="update_password_password" name="password" type="password"
                class="mt-1 block w-full text-slate-800" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full text-slate-800" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div
            class="flex items-center {{ session('status') === 'password-updated' ? 'justify-between' : 'justify-end' }} gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data class="text-sm text-green-600" x-transition>
                    {{ __('Password berhasil diperbarui!') }}
                </p>
            @endif
        </div>
    </form>
</section>

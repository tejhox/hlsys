<x-app-layout>
    <x-guest-layout>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Verifikasi NIK anda!') }}
            <hr class="mt-1" />
        </div>


        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.request.nik') }}">
            @csrf

            <div>
                <x-input-label for="nik" :value="__('NIK')" />
                <x-text-input id="nik" class="block mt-1 w-full" type="number" name="nik" :value="old('nik')"
                    required autofocus />
                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Verifikasi NIK') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</x-app-layout>

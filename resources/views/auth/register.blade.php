<x-app-layout>
    <x-guest-layout>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Daftar Akun') }}
            </h2>
        </header>
        <hr />
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-2">
                <x-input-label for="nik" :value="__('NIK')" />
                <x-text-input id="nik" class="block mt-1 w-full" type="number" name="nik" :value="old('nik')"
                    required autofocus autocomplete="nik" />
                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="name" :value="__('Nama')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="departement" :value="__('Departemen')" />
                <x-text-input id="departement" class="block mt-1 w-full" type="text" name="departement"
                    :value="old('departement')" required autofocus autocomplete="departement" />
                <x-input-error :messages="$errors->get('departemenet')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="section" :value="__('Section')" />
                <x-text-input id="section" class="block mt-1 w-full" type="text" name="section" :value="old('section')"
                    required autofocus autocomplete="section" />
                <x-input-error :messages="$errors->get('section')" class="mt-2" />
            </div>

            <div class="mt-2">
                <x-input-label for="position" :value="__('Jabatan')" />
                <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')"
                    required autofocus autocomplete="position" />
                <x-input-error :messages="$errors->get('position')" class="mt-2" />
            </div>

            <!-- Email Address -->
            {{-- <div class="mt-2">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}

            <!-- Password -->
            <div class="mt-2">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full text-slate-800" type="password" name="password"
                    required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-2">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full text-slate-800" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Sudah punya akun?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Daftar') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>
</x-app-layout>

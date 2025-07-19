<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Profile') }}
        </h2>
        <hr />
    </header>

    {{-- 
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form> --}}

    <form method="post" action="{{ route('profile.update') }}" class="mt-4 space-y-2">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nik" :value="__('NIK')" />
            <x-text-input id="nik" name="nik" type="number" class="mt-1 block w-full text-black"
                :value="old('nik', $user->nik)" disabled autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('nik')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full text-black"
                :value="old('name', $user->name)" disabled autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="departement" :value="__('Departement')" />
            <x-text-input id="departement" name="departement" type="text" class="mt-1 block w-full text-black"
                :value="old('departement', $user->departement)" autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('departement')" />
        </div>

        <div>
            <x-input-label for="section" :value="__('Section')" />
            <x-text-input id="section" name="section" type="text" class="mt-1 block w-full text-black"
                :value="old('section', $user->section)" autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('section')" />
        </div>

        <div>
            <x-input-label for="position" :value="__('Jabatan')" />
            <x-text-input id="position" name="position" type="text" class="mt-1 block w-full text-black"
                :value="old('position', $user->position)" autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('position')" />
        </div>

        {{-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full text-black"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div> --}}

        <div
            class="flex items-center {{ session('status') === 'profile-updated' ? 'justify-between' : 'justify-end' }} gap-4">
            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition class="text-sm text-green-600">
                    {{ __('Profile berhasil diperbarui!') }}</p>
            @endif
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
        </div>
    </form>
</section>

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        @if ($errors->any())
            <div style="border:1px solid red; padding:10px; margin-bottom:10px;">
                <strong>Erreurs :</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login -->
        <div>
            <x-input-label for="login" :value="__('Login')" />
            <x-text-input
                id="login"
                class="block mt-1 w-full"
                type="text"
                name="login"
                :value="old('login')"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Firstname -->
        <div class="mt-4">
            <x-input-label for="firstname" :value="__('Firstname')" />
            <x-text-input
                id="firstname"
                class="block mt-1 w-full"
                type="text"
                name="firstname"
                :value="old('firstname')"
                required
                autocomplete="given-name"
            />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <!-- Lastname -->
        <div class="mt-4">
            <x-input-label for="lastname" :value="__('Lastname')" />
            <x-text-input
                id="lastname"
                class="block mt-1 w-full"
                type="text"
                name="lastname"
                :value="old('lastname')"
                required
                autocomplete="family-name"
            />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Langue -->
        <div class="mt-4">
            <x-input-label for="langue" :value="__('Langue')" />
            <select
                id="langue"
                name="langue"
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                required
            >
                <option value="">--</option>
                <option value="fr" @selected(old('langue') === 'fr')>fr</option>
                <option value="nl" @selected(old('langue') === 'nl')>nl</option>
                <option value="en" @selected(old('langue') === 'en')>en</option>
            </select>
            <x-input-error :messages="$errors->get('langue')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="email"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}"
            >
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

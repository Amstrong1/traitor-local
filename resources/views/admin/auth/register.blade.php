<x-guest-layout>
    <h2 class="font-bold m-8 md:text-center">
        Compte Administrateur
    </h2>
    <h2 class="font-semibold m-8 md:text-center">
        S'inscrire
    </h2>
    <form method="POST" action="{{ route('register.admin') }}" class="m-4" x-data="validateAdminRegisterForm()"
        x-init="$watch('name', value => { validate('name') })
        $watch('email', value => { validate('email') })
        $watch('password', value => { validate('password') })">
        @csrf

        <!-- Name -->
        <div class="">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input x-model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                max="50" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <span class="text-sm italic text-red-500 mt-2">
                <div x-text="validation.name.message"></div>
            </span>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input x-model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <span class="text-sm italic text-red-500 mt-2">
                <div x-text="validation.email.message"></div>
            </span>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input x-model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <span class="text-sm italic text-red-500 mt-2">
                <div x-text="validation.password.message"></div>
            </span>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end md:justify-between mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login.admin') }}">
                {{ __('Déjà inscrit ?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>

        <div class="mt-4">
            <div class="flex justify-start">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ url()->previous() }}">
                    {{ __('Retour') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>

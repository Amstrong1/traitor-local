<x-guest-layout>
    <form method="POST" action="{{ route('register.traitor') }}">
        @csrf

         <!-- Name -->
         <div>
            <x-input-label for="name" :value="__('Nom du propriétaire/gérant')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Company Name -->
        <div class="mt-4">
            <x-input-label for="company" :value="__('Dénomination Sociale')" />
            <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('company')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- contact Address -->
        <div class="mt-4">
            <x-input-label for="contact" :value="__('Contact')" />
            <x-text-input id="contact" class="block mt-1 w-full" type="tel" name="contact" :value="old('contact')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
        </div>

        <!-- contact Address -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('Ville')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- contact Address -->
        <div class="mt-4">
            <x-input-label for="postal" :value="__('Code Postal')" />
            <x-text-input id="postal" class="block mt-1 w-full" type="text" name="postal" :value="old('postal')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('postal')" class="mt-2" />
        </div>

        <!-- contact Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Adresse')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

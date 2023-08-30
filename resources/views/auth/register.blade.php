<x-user-app>
    <h1 class="font-bold m-8">
        S'inscrire
    </h1>
    <form method="POST" action="{{ route('register') }}" class="m-4">
        @csrf

        <!-- Name -->
        <div class="">
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4 ">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4 ">
            <x-input-label for="city" :value="__('Ville')" />
            <x-text-input id="city" type="text" name="city" :value="old('city')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4 ">
            <x-input-label for="square" :value="__('Quartier')" />
            <x-text-input id="square" type="text" name="square" :value="old('square')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('square')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4 ">
            <x-input-label for="address" :value="__('Adresse')" />
            <x-text-input id="address" type="text" name="address" :value="old('square')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 ">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4  mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirmation du mot de passe')" />

            <x-text-input id="password_confirmation"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4 ">
            <x-primary-button class="ml-3 bg-black">
                {{ __('Valider') }}
            </x-primary-button>
        </div>
        
        <a class="mt-4  block underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
            {{ __('Déja inscrit ?') }}
        </a>
    </form>
</x-user-app>

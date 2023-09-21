<x-guest-layout>
    <h1 class="font-bold m-4 md:text-center">
        Compte Traiteur
    </h1>
    <h2 class="font-semibold m-4 md:text-center">
        Se connecter
    </h2>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login.traitor') }}" class="m-4" x-data="validateLoginForm()"
        x-init="$watch('email', value => { validate('email') })
        $watch('password', value => { validate('password') })">
        @csrf

        <div class="mt-4">
            <x-input-error :messages="$errors->get('notAllowed')" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input x-model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <span class="text-sm italic text-red-500 mt-2">
                <div x-text="validation.email.message"></div>
            </span>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input x-model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <span class="text-sm italic text-red-500 mt-2">
                <div x-text="validation.password.message"></div>
            </span>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Se souvenir de moi') }}</span>
            </label>
        </div>

        <!-- Google Recaptcha -->
        <div class="g-recaptcha mt-4" data-sitekey={{ config('services.recaptcha.key') }}></div>

        <div class="flex items-center justify-end md:justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request.traitor') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Se connecter') }}
            </x-primary-button>
        </div>

        <div class="mt-4">
            <div class="flex justify-start">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="/">
                    {{ __('Retour') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>

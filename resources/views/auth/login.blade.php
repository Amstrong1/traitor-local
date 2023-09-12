<x-user-app>
    <h1 class="font-black m-8 mb-16">
        Se connecter
    </h1>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="m-4 mt-8">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Google Recaptcha -->
        <div class="g-recaptcha mt-4" data-sitekey={{ config('services.recaptcha.key') }}></div>

        <div class="flex items-center justify-center mt-16 mb-4">
            <x-primary-button>
                {{ __('Valider') }}
            </x-primary-button>
        </div>

        @if (Route::has('password.request'))
            <a class="mt-4 ml-6 my-4 text-left underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}">
                {{ __('Mot de passe oublié?') }}
            </a>
        @endif

        @if (Route::has('register'))
            <a class="block ml-6 my-4 text-left underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('register') }}">
                {{ __('Créer un compte') }}
            </a>
        @endif
    </form>
</x-user-app>

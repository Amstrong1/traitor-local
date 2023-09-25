<x-guest-layout>
    <h1 class="font-bold m-4 md:text-center">
        Compte Traiteur
    </h1>
    <h2 class="font-semibold m-4 md:text-center">
        S'inscrire
    </h2>
    <form method="POST" action="{{ route('register.traitor') }}" class="m-4" x-data="validateTraitorRegisterForm()"
        x-init="$watch('name', value => { validate('name') })
            $watch('email', value => { validate('email') })
        $watch('city', value => { validate('city') })
        $watch('contact', value => { validate('contact') })
        $watch('postal', value => { validate('postal') })
        $watch('password', value => { validate('password') })">
        @csrf

        {{-- lat and long hidden input --}}
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">

        <!-- Name -->
        <div class="">
            <x-input-label for="name" :value="__('Nom du propriétaire/gérant')" />
            <x-text-input x-model="name" id="name" class="block mt-1 w-full" type="text" name="name"
                max="50" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <span class="text-sm italic text-red-500 mt-2">
                <div x-text="validation.name.message"></div>
            </span>
        </div>

        <!-- Company Name -->
        <div class="mt-4">
            <x-input-label for="company" :value="__('Dénomination Sociale')" />
            <x-text-input x-model="company" id="company" class="block mt-1 w-full" type="text" name="company"
                :value="old('company')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('company')" class="mt-2" />
            <span class="text-sm italic text-red-500 mt-2">
                <div x-text="validation.company.message"></div>
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

        <!-- contact Address -->
        <div class="mt-4">
            <x-input-label for="contact" :value="__('Contact')" />
            <x-text-input x-model="contact" id="contact" class="block mt-1 w-full" type="tel" name="contact"
                :value="old('contact')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
            <span class="text-sm italic text-red-500 mt-2">
                <div x-text="validation.contact.message"></div>
            </span>
        </div>

        <!-- contact Address -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('Ville')" />
            <x-text-input x-model="city" id="city" class="block mt-1 w-full" type="text" name="city"
                :value="old('city')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
            <span class="text-sm italic text-red-500 mt-2">
                <div x-text="validation.city.message"></div>
            </span>
        </div>

        <!-- contact Address -->
        {{-- <div class="mt-4">
            <x-input-label for="square" :value="__('Rue')" />
            <x-text-input id="square" class="block mt-1 w-full" type="text" name="square" :value="old('square')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('square')" class="mt-2" />
        </div> --}}

        <!-- postal code -->
        <div class="mt-4">
            <x-input-label for="postal" :value="__('Code Postal')" />
            <x-text-input x-model="postal" id="postal" class="block mt-1 w-full" type="text" name="postal"
                max="5" :value="old('postal')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('postal')" class="mt-2" />
            <span class="text-sm italic text-red-500 mt-2">
                <div x-text="validation.postal.message"></div>
            </span>
        </div>

        <!-- contact Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Adresse')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Google Recaptcha -->
        <div class="g-recaptcha mt-4" data-sitekey={{ config('services.recaptcha.key') }}></div>

        <div class="flex items-center justify-end md:justify-between mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login.traitor') }}">
                {{ __('Déjà inscrit ?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('S\'inscrire') }}
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

<x-user-app>

    <h1 class="m-4 font-bold">Mon profil</h1>

    @php
        if (Auth::user() !== null) {
            $order = Auth::user()->orders->count();
        } else {
            $order = 0;
        }
    @endphp

    <!-- Hero section with background image, heading, subheading and button -->
    <div class="m-4 p-4 shadow-lg grid grid-cols-5 gap-4">
        @for ($i = 0; $i < 9; $i++)
            <div class="w-12 h-12 rounded-full bg-black p-2 text-center text-xl">
                @if ($order !== 0)
                    €
                    @php
                        $order--;
                    @endphp
                @endif
            </div>
        @endfor
        <div class="basis-1/5 p-2 w-10 h-10">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>
        </div>
    </div>

    <div class="flex flex-col m-4">
        <x-input-label for="name" :value="__('Nom')" />

        <x-text-input id="name" type="text" name="name" value="{{ Auth::user()->name }}" readonly />

        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="flex flex-col m-4">
        <x-input-label for="email" :value="__('Email')" />

        <x-text-input id="email" type="email" name="email" value="{{ Auth::user()->email }}" readonly />

        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="flex flex-col m-4">
        <x-input-label for="city" :value="__('Ville')" />

        <x-text-input id="city" type="text" name="city" value="{{ Auth::user()->city }}" readonly />

        <x-input-error :messages="$errors->get('city')" class="mt-2" />
    </div>

    <div class="flex flex-col m-4">
        <x-input-label for="square" :value="__('Rue')" />

        <x-text-input id="square" type="text" name="square" value="{{ Auth::user()->square }}" readonly />

        <x-input-error :messages="$errors->get('square')" class="mt-2" />
    </div>

    <div class="flex flex-col m-4">
        <x-input-label for="address" :value="__('Adresse')" />

        <x-text-input id="address" type="text" name="address" value="{{ Auth::user()->address }}" readonly />

        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>

    {{-- <div class="flex flex-col m-4">
        <label class="font-medium" for="">Numéro de Téléphone</label>
        <input readonly type="text"
            class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
            value="" />
    </div> --}}

    <div class="flex justify-end m-4 mt-16">
        <x-danger-button x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Supprimer le compte') }}</x-danger-button>

        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                        placeholder="{{ __('Password') }}" />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3">
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </div>

</x-user-app>

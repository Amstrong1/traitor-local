<x-user-app>

    <h1 class="my-2 text-center">Trouver des traiteurs proches de chez vous</h1>

    <form class="text-center" action="{{ route('home.products') }}" method="post">
        @csrf
        <div
            class="flex flex-nowrap rounded-full border-2 justify-around w-3/4 mx-auto p-2">
            <input name='city' class="placeholder:text-center placeholder:text-sm border-0 outline-0 focus:outline-0 active:outline-0" type="text"
                placeholder="Entrez votre ville">
            <button type="submit"
                class="flex items-center whitespace-nowrap px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </div>
        <x-input-error :messages="$errors->get('city')" class="mt-2" />

        <div>
            <span>ou</span>
        </div>
        <div>
            <button type="button" class="text-center text-sm rounded-full border-2 p-4 w-3/4">Activez la
                géolocalisation</button>
        </div>
    </form>

    <div class="flex flex-col my-6">
        <div class="flex flex-row my-4">
            <div class="flex flex-wrap w-1/2 justify-center">
                <div class="w-12">
                    <img src="{{ asset('img/entree.jpg') }}" alt="..."
                        class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                </div>
            </div>
            <div class="flex items-center w-1/2 justify-center">Entrée</div>
        </div>

        <div class="flex flex-row my-4">
            <div class="flex flex-wrap w-1/2 justify-center">
                <div class="w-12">
                    <img src="{{ asset('img/entree.jpg') }}" alt="..."
                        class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                </div>
            </div>
            <div class="flex items-center w-1/2 justify-center">Plat</div>
        </div>

        <div class="flex flex-row my-4">
            <div class="flex flex-wrap w-1/2 justify-center">
                <div class="w-12">
                    <img src="{{ asset('img/entree.jpg') }}" alt="..."
                        class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                </div>
            </div>
            <div class="flex items-center w-1/2 justify-center">Dessert</div>
        </div>

        <div class="flex flex-row my-4">
            <div class="flex flex-wrap w-1/2 justify-center">
                <div class="w-12">
                    <img src="{{ asset('img/entree.jpg') }}" alt="..."
                        class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                </div>
            </div>
            <div class="flex items-center w-1/2 justify-center">Boissons</div>
        </div>
    </div>
</x-user-app>

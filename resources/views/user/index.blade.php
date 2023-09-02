<x-user-app>

    <h1 class="my-4 p-4 text-center">Trouver des traiteurs proches de chez vous</h1>

    <form class="text-center" action="{{ route('home.products', [($type = null)]) }}" method="post">
        @csrf
        <div class="flex flex-nowrap rounded-full font-bold justify-around w-3/4 mx-auto items-center p-1"
            style="background-color: #bbaf7b;  -webkit-box-shadow: none; box-shadow: none;">
            <input name='city' style="background-color: #bbaf7b"
                class="placeholder:text-center placeholder:text-sm border-0 outline-0 focus:outline-0 active:outline-0 rounded-full"
                type="text" placeholder="Entrez votre ville">
            <button type="submit"
                class="flex items-center whitespace-nowrap px-3 py-2 text-center text-base font-normal leading-[1.6] text-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </div>
        <x-input-error :messages="$errors->get('city')" class="mt-2" />

        <div class="my-4">
            <span>ou</span>
        </div>
        <div>
            <button type="button" class="text-center text-sm rounded-full font-bold p-4 py-3 w-3/4"
                style="background-color: #bbaf7b">Activez la
                géolocalisation</button>
        </div>
    </form>

    <div class="flex flex-col my-6">
        {{-- <a href="{{ route('home.products', [($type = 'Entrée')]) }}"
            onclick="event.preventDefault();
                            this.closest('form').submit();"> --}}
            <div class="flex flex-row my-4 bg-white">
                <div class="flex flex-wrap w-1/2 justify-center">
                    <div class="w-14 h-14">
                        <img src="{{ asset('img/entree.jpg') }}" alt="entree_image"
                            class="shadow rounded-full w-full h-full align-middle border-none" />
                    </div>
                </div>
                <div class="flex items-center w-1/2 justify-center">Entrée</div>
            </div>
        {{-- </a> --}}

        {{-- <a href="{{ route('home.products', [($type = 'Plat')]) }}"
            onclick="event.preventDefault();
            this.closest('form').submit();"> --}}
            <div class="flex flex-row my-4 bg-white">
                <div class="flex flex-wrap w-1/2 justify-center">
                    <div class="w-14 h-14">
                        <img src="{{ asset('img/plat.jpg') }}" alt="plat_image"
                            class="shadow rounded-full w-full h-full align-middle border-none" />
                    </div>
                </div>
                <div class="flex items-center w-1/2 justify-center">Plat</div>
            </div>
        {{-- </a> --}}

        {{-- <a href="{{ route('home.products', [($type = 'Dessert')]) }}"
            onclick="event.preventDefault();
            this.closest('form').submit();"> --}}
            <div class="flex flex-row my-4 bg-white">
                <div class="flex flex-wrap w-1/2 justify-center">
                    <div class="w-14 h-14 ">
                        <img src="{{ asset('img/dessert.jpg') }}" alt="dessert_image"
                            class="shadow rounded-full w-full h-full align-middle border-none" />
                    </div>
                </div>
                <div class="flex items-center w-1/2 justify-center">Dessert</div>
            </div>
        {{-- </a> --}}

        {{-- <a href="{{ route('home.products', [($type = 'Boisson')]) }}"
            onclick="event.preventDefault();
            this.closest('form').submit();"> --}}
            <div class="flex flex-row my-4 bg-white">
                <div class="flex flex-wrap w-1/2 justify-center">
                    <div class="w-14 h-14">
                        <img src="{{ asset('img/boisson.jpg') }}" alt="boisson_image"
                            class="shadow rounded-full w-full h-full align-middle border-none" />
                    </div>
                </div>
                <div class="flex items-center w-1/2 justify-center">Boissons</div>
            </div>
        {{-- </a> --}}
    </div>
</x-user-app>

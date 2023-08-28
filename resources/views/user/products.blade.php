<x-user-app>

    <form class="text-center mt-2" action="" method="post">
        @csrf
        <div class="flex flex-nowrap rounded-full border-2 justify-around w-3/4 mx-auto outline-0 focus:outline-0 active:outline-0 p-2">
            <input name='city' class="placeholder:text-center placeholder:text-sm border-0" type="text"
                placeholder="Choix de la ville" value="{{ request()->city }}">
            <button type="submit"
                class="flex items-center whitespace-nowrap px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </div>
    </form>
    
    @livewire('products')

</x-user-app>

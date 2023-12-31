<x-user-app>

    <form class="flex flex-nowrap text-center mt-16 ml-4" action="" method="post">
        @csrf
        <div class="flex flex-nowrap rounded-full justify-around mr-0 my-2 w-72 outline-0 focus:outline-0 active:outline-0 px-6"
            style="background-color: #bbaf7b;  -webkit-box-shadow: none; box-shadow: none;">
            <input name='city'
                class="placeholder:text-center placeholder:text-sm border-0 outline-0 focus:outline-0 active:outline-0 rounded-full"
                type="text" style="background-color: #bbaf7b;  -webkit-box-shadow: none; box-shadow: none;"
                placeholder="Choix de la ville" value="{{ request()->city }}">
            <button type="submit" 
                class="flex items-center whitespace-nowrap   pr-2 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </div>
        <div class=" my-2 w-10 h-10 mx-2 flex justify-center items-center shadow-[0_4px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(128,128,128,1)]" style="border: #bbaf7b 1px solid; border-radius: 50%;">
            <a href="{{ route('home.searchproducts') }}" class="p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0
                         01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                </svg>
    
            </a>
        </div>
    </form>

    @livewire('products')

</x-user-app>

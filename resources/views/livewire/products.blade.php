<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    <div class="text-center mt-2 py-1 mx-auto rounded-full w-3/4"
        style="background-color: #bbaf7b;  -webkit-box-shadow: none; box-shadow: none;">
        <select id="type_id" name="type" wire:model="type_id" wire:change="updateType($event.target.value)"
            class="placeholder:text-center placeholder:text-sm rounded-full w-3/4 bg-transparent border-0"
            style="background-color: #bbaf7b;  -webkit-box-shadow: none; box-shadow: none;">
            @foreach ($types as $type_id => $type)
                <option value="{{ $type_id }}">{{ $type }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex justify-center w-full">
        <div wire:loading>
            Recherche en cours...
        </div>
    </div>
    @if ($products->count() !== 0)
        @foreach ($products as $product)
            <div class="flex flex-col my-6 relative" data-te-dropdown-ref>
                <a href="{{ route('home.show.product', [$product->id]) }}">
                    <div class="flex flex-row my-4">
                        <div class="flex flex-wrap items-center w-1/4 justify-center">
                            <div class="w-12 h-12">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="..."
                                    class="shadow rounded-full w-full h-full align-middle border-none" />
                            </div>
                        </div>
                        <div class="flex flex-col w-1/2 justify-start font-bold">
                            <div class="flex justify-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg> &nbsp;
                                {{ $product->traitor->square }}
                            </div>
                            <div class="flex justify-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg> &nbsp;
                                {{ $product->name }}
                            </div>
                            <div class="flex justify-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.25 7.756a4.5 4.5 0 100 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg> &nbsp;
                                {{ $product->price }}
                            </div>
                        </div>
                        <div class="flex w-1/4 justify-start italic"> {{ $product->type }} </div>
                    </div>
                </a>

                <button class="flex justify-end mr-4 -mt-2 outline-0" type="button" id="dropdownMenuButton1"
                    data-te-dropdown-toggle-ref aria-expanded="true" data-te-ripple-init data-te-ripple-color="light">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                    </svg>
                </button>

                <div class="px-6 bg-white z-[1000] w-full m-0 hidden bg-clip-padding [&[data-te-dropdown-show]]:block"
                    aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                    <div class="flex flex-col font-bold bg-white">
                        <div class="flex flex-col">
                            <div class="flex flex-row my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg> &nbsp;
                                <p>{{ $product->traitor->address }}, {{ $product->traitor->square }},
                                    {{ $product->traitor->city }}</p>
                            </div>

                            <div class="flex flex-row my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                </svg> &nbsp;
                                <p>{{ $product->traitor->name }}</p>
                            </div>
                        </div>
                        <div class="flex pl-6 pt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="none" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg> &nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="none" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg> &nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="none" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg> &nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="none" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg> &nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg> &nbsp;

                            <span class="font-bold">Avis</span>
                        </div>
                        <div class="flex pl-6 pt-2">
                            Réalisez à partir de {{ $product->min_order_qte }} commandes
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="flex flex-col items-center justify-center text-center m-4">
            Aucune données ne correspond à votre recherche
            <img src="{{ asset('img/nodata.svg') }}" alt="no_data" srcset="">
        </div>
    @endif
</div>

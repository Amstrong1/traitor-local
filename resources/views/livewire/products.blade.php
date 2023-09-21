<div>
    {{-- Care about people's approval and you will be their prisoner. --}}

    @php
        $ip = request()->ip();
        $currentUserInfo = Location::get($ip);
    @endphp

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
        @php
            $i = 0;
        @endphp
        @foreach ($products as $product)
            <div class="flex flex-col my-6 relative" data-te-dropdown-ref>
                <a href="{{ route('home.show.product', [$product->id]) }}">
                    <div class="flex flex-row my-4">
                        <div class="flex flex-wrap items-center w-1/4 justify-center">
                            <div class="w-12 h-12">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->image }}"
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
                                {{ $product->traitor->city }}
                                <span class="italic">
                                    @if ($currentUserInfo !== false)
                                        {{ ' ,' . number_format(distance($currentUserInfo->latitude, $currentUserInfo->longitude, $product->traitor->latitude, $product->traitor->longitude, 'k'), 0, '', '') . 'km' }}
                                    @endif
                                </span>
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

                <div id="accordionExample">

                    <div
                        class="">
                        <h2 class="accordion-header mb-0" id="{{ 'heading' . $i }}">
                            <button
                                class="group relative flex w-full items-center border-0 px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)] [&[data-te-collapse-collapsed]]:rounded-b-[15px] [&[data-te-collapse-collapsed]]:transition-none"
                                type="button" data-te-collapse-init data-te-collapse-collapsed
                                data-te-target="{{ '#collapse' . $i }}" aria-expanded="false"
                                aria-controls="{{ 'collapse' . $i }}">
                                <span
                                    class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div id="{{ 'collapse' . $i }}" class="!visible hidden" data-te-collapse-item
                            aria-labelledby="{{ 'heading' . $i }}" data-te-parent="#accordionExample">
                            <div class="flex flex-col font-bold border-b p-2">
                                <div class="flex flex-col">
                                    <div class="flex flex-row my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg> &nbsp;
                                        <p>{{ $product->traitor->address }}, {{ $product->traitor->city }}</p>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="orange" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="none" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg> &nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="orange" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="none" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg> &nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="orange" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="none" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg> &nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="orange" viewBox="0 0 24 24"
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
                                    Réalisé à partir de {{ $product->min_order_qte }} commandes
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $i++;
            @endphp
        @endforeach
    @else
        <div class="flex flex-col items-center justify-center text-center m-4">
            Aucune données ne correspond à votre recherche
            <img src="{{ asset('img/nodata.svg') }}" alt="no_data" srcset="">
        </div>
    @endif
</div>

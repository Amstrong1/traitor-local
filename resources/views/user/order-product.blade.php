<x-user-app>

    <!-- Hero section with background image, heading, subheading and button -->
    <div class="relative overflow-hidden bg-cover bg-no-repeat"
        style="
            background-position: 50%;
            background-image: url({{ '/storage/' . $order->product->image }});
            height: 350px;
          ">
    </div>

    <div class="flex items-center justify-between m-4 px-4">
        <div class="flex w-1/2 font-bold">
            {{ $order->product->name }} <span class="italic"> &nbsp; x {{ $order->quantity }}</span>
        </div>
        <div style="background-color: #bdd5f8"
            class="flex flex-nowrap rounded-full justify-around w-1/3 py-2 pl-4 outline-0 focus:outline-0 active:outline-0 items-center">
            <div> {{ $order->amount }} €</div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="mx-2">
        @if ($order->status == 'pending')
            <div class="mt-16 text-center font-bold">
                <p> Merci de bien vouloir patienter quelques instants. </p>
                <p> Le traiteur doit valider votre commande. </p>
                <div id="loading-basic-example" class="mt-16 h-[100px] w-full">
                    <div data-te-loading-management-init data-te-parent-selector="#loading-basic-example">
                        <div data-te-loading-icon-ref
                            class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent motion-reduce:animate-[spin_1.5s_linear_infinite]"
                            role="status"></div>
                    </div>
                </div>
            </div>
        @elseif($order->status === 'allowed')
            <div>
                <h3 class="mt-8 font-bold">
                    Le traiteur a validé votre commande &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#4bad41" class="w-6 h-6 inline-block font-black">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                </h3>
                <h4 class="mt-4 font-bold">Paiement</h4>
                <form action="">
                    <div class="relative grid grid-cols-3 my-4">
                        <span
                            class="flex items-center whitespace-nowrap border-0 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Carte
                            bancaire</span>

                        <span
                            class="flex items-center whitespace-nowrap border-0 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">
                            <img src="{{ asset('img/credit_card.svg') }}" class="w-8" alt="">
                        </span>

                        <div
                            class="flex items-center whitespace-nowrap border-0 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">
                            <input name="methodPay"
                                class="relative m-0 w-4 h-4 border border-solid bg-transparent bg-clip-padding text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                type="radio" value="" aria-label="Radio button for following text input" />
                        </div>
                    </div>


                    <div class="relative grid grid-cols-3 my-4">
                        <span
                            class="flex items-center whitespace-nowrap border-0 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200">Google
                            pay</span>

                        <span
                            class="flex items-center whitespace-nowrap border-0 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200">
                            <img src="{{ asset('img/google.svg') }}" class="w-8" alt="">
                        </span>

                        <div
                            class="flex items-center whitespace-nowrap border-0 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200">
                            <input name="methodPay"
                                class="relative m-0 w-4 h-4 border border-solid bg-transparent bg-clip-padding text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                type="radio" value="" aria-label="Radio button for following text input" />
                        </div>
                    </div>
                    <div class="text-center mt-16">
                        <x-primary-button>Valider</x-primary-button>
                    </div>
                </form>
            </div>
        @else
            <div>
                <h3 class="mt-8 font-bold">
                    Le traiteur a refusé votre commande &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#f00" class="w-6 h-6 inline-block font-black text-red-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </h3>
                <h4 class="mt-4 font-bold">Raison</h4>
                <div>
                    {{ $traitor_note ?? 'Bonjour, je ne peux malheureusement pas accepter votre commande car beaucoup de commande ont été faites à ce jour, merci de sélectionner une autre date' }}
                </div>
                <div class="text-center mt-16">
                    <a href="{{ url()->previous() }}">
                        <x-primary-button>Annuler</x-primary-button>
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-user-app>

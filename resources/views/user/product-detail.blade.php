<x-user-app>

    <!-- Hero section with background image, heading, subheading and button -->
    <div class="relative overflow-hidden bg-cover bg-no-repeat"
        style="
            background-position: 50%;
            background-image: url({{ '/storage/' . $product->image }});
            height: 350px;
          ">
    </div>

    <div class="flex items-center justify-between m-4 px-4">
        <div class="flex w-2/3 font-bold">
            {{ $product->name }}
        </div>
        <div style="background-color: #bdd5f8"
            class="flex flex-nowrap rounded-full justify-around w-1/3 py-2 pl-4 outline-0 focus:outline-0 active:outline-0 items-center">
            <div> {{ $product->price }} €</div>
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

    <div class="m-4 px-4">
        <h6 class="font-bold">Description</h6>
        {{ $product->description }}
    </div>

    <form action="" method="post" class="mx-4">
        @csrf
        <input type="hidden" name="productId" value="{{ $product->id }}">
        <input type="hidden" name="productName" value="{{ $product->name }}">
        <input type="hidden" name="productPrice" value="{{ $product->price }}" id="productPrice">

        <div class="flex flex-col p-2">
            <label class="ml-4 font-bold" for="qty">Quantité</label>
            <input type="number" name="quantity" id="quantity" value="{{ $product->min_order_qte }}"
                style="background-color: #bdd5f8" min="{{ $product->min_order_qte }}" onchange="totalCalcul()"
                class="peer block min-h-[auto] w-full rounded-full bg-transparent border-0 px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">
        </div>

        <div class="flex flex-col p-2">
            <label class="ml-4 font-bold" for="floatingInput">Date de livraison</label>
            {{-- <div id="datepicker-disable-past" class="relative mb-3 rounded-full border-0" data-te-datepicker-init
                data-te-input-wrapper-init style="background-color: #bdd5f8">
                <input type="text" name="date"
                    class="peer block min-h-[auto] w-full rounded-full border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" />
            </div> --}}
            <input type="date" name="date" id="" style="background-color: #bdd5f8"
                class="peer block min-h-[auto] w-full rounded-full border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">
        </div>

        <div class="flex flex-col p-2">
            <label class="ml-4 font-bold" for="form5">Heure de livraison</label>
            {{-- <div class="relative rounded-full" data-te-format24="true" id="timepicker-format" data-te-input-wrapper-init
                style="background-color: #bdd5f8">
                <div class="relative border-0 outline-none" id="timepicker-with-icon" data-te-timepicker-init
                    data-te-input-wrapper-init>
                    <input type="text" name="hour"
                        class="peer block min-h-[auto] w-full rounded-full border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="form5" />
                    <span
                        class="absolute right-1.5 top-1/2 ml-auto h-4 w-4 -translate-x-1/2 -translate-y-1/2 cursor-pointer border-none bg-transparent text-neutral-700 outline-none transition-all duration-[300ms] ease-[cubic-bezier(0.25,0.1,0.25,1)] hover:text-[#3b71ca] focus:text-[#3b71ca] dark:text-white dark:hover:text-[#3b71ca] dark:focus:text-[#3b71ca]"
                        tabindex="0" type="button" role="button" data-te-toggle="timepicker-with-icon"
                        data-te-timepicker-toggle-button data-te-timepicker-icon>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                </div>
            </div> --}}
            <input type="time" id="" name="hour" style="background-color: #bdd5f8"
                class="peer block min-h-[auto] w-full rounded-full border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">
        </div>

        <div class="flex flex-col p-2">
            <label class="ml-4 font-bold" for="">Note au traiteur</label>
            <textarea name="note" style="background-color: #bdd5f8"
                class="peer block min-h-[auto] w-full rounded-lg border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0">
            </textarea>
        </div>

        <div class="flex flex-row items-center justify-between p-2 mt-4">
            <div class="flex flex-row rounded-full border-0 text-center px-2 items-center"
                style="background-color: #bab9b4">
                <input type="text" class="border-0 w-20 h-8 rounded-full" name='total' id="total"
                    style="background-color: #bab9b4"
                    value="{{ number_format($product->price * $product->min_order_qte, 2, '.', ' ') }}" readonly>€
            </div>

            <button type="submit">
                <div
                    class="bg-black py-1 text-white flex flex-nowrap rounded-full border-0 justify-around mx-auto outline-0 focus:outline-0 active:outline-0">
                    <div class="flex items-center pl-4"> Ajouter </div>
                    <span
                        class="flex items-center whitespace-nowrap px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-neutral-700 dark:text-neutral-200 dark:placeholder:text-neutral-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#fff" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                    </span>
                </div>
            </button>
        </div>
    </form>

    <script>
        function totalCalcul() {
            document.getElementById('total').value = document.getElementById('quantity').value * document.getElementById(
                'productPrice').value;
        }
    </script>

</x-user-app>

<x-user-app>

    <h1 class="m-4">Mon profil</h1>

    <!-- Hero section with background image, heading, subheading and button -->
    <div class="m-4 p-4 shadow-lg flex flex-row flex-wrap gap-2">
        <div class="basis-1/5 w-10 h-10 rounded-full bg-black p-2 m-1 text-center">€</div>
        <div class="basis-1/5 w-10 h-10 rounded-full bg-black p-2 m-1 text-center">€</div>
        <div class="basis-1/5 w-10 h-10 rounded-full bg-black p-2 m-1 text-center">€</div>
        <div class="basis-1/5 w-10 h-10 rounded-full bg-black p-2 m-1 text-center">€</div>
        <div class="basis-1/5 w-10 h-10 rounded-full bg-black p-2 m-1 text-center">€</div>
        <div class="basis-1/5 w-10 h-10 rounded-full bg-black p-2 m-1 text-center">€</div>
        <div class="basis-1/5 w-10 h-10 rounded-full bg-black p-2 m-1 text-center">€</div>
        <div class="basis-1/5 w-10 h-10 rounded-full bg-black p-2 m-1 text-center">€</div>
        <div class="basis-1/5 w-10 h-10 rounded-full bg-black p-2 m-1 text-center">€</div>
        <div class="basis-1/5 p-2 w-10 h-10">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>
        </div>
    </div>

    <div class="flex flex-col m-4">
        <label class="font-medium" for="">Nom</label>
        <input readonly type="text"
            class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
            value="" />
    </div>

    <div class="flex flex-col m-4">
        <label class="font-medium" for="">Prénom</label>
        <input readonly type="text"
            class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
            value="" />
    </div>

    <div class="flex flex-col m-4">
        <label class="font-medium" for="">Adresse Postale</label>
        <input readonly type="text"
            class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
            value="" />
    </div>

    <div class="flex flex-col m-4">
        <label class="font-medium" for="">Email</label>
        <input readonly type="text"
            class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
            value="" />
    </div>

    <div class="flex flex-col m-4">
        <label class="font-medium" for="">Numéro de Téléphone</label>
        <input readonly type="text"
            class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
            value="" />
    </div>

    <div class="flex justify-end m-4">
        <button class="text-red-600">Supprimer le compte</button>
    </div>

</x-user-app>

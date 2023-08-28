<x-user-app>
    <h1 class="m-4 font-bold">Mes commandes</h1>
    <div class="flex flex-col my-6">
        <h5 class="mx-4">Le 23 Aout 2022</h5>
        <div class="flex flex-row my-4">
            <div class="flex flex-wrap items-center w-1/3 justify-center">
                <div class="w-12">
                    <img src="{{ asset('img/entree.jpg') }}" alt="..."
                        class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                </div>
            </div>
            <div class="flex flex-col w-1/3 items-center">
                <div class="flex text-center">
                    Nom du produit
                </div>
                <div class="flex text-center">
                    Prix total
                </div>
            </div>
        </div>
    </div>
</x-user-app>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg my-2">Liste des produits</h1>
                        <x-primary-button>
                            <a href="{{ route('traitor.products.create') }}">Nouveau</a>
                        </x-primary-button>
                    </div>

                    {{-- <form action="{{ route('product.filter') }}" method="post">
                        @csrf
                        <p class="text-sm mx-2">
                            <span>Filtrer du </span>
                            <input
                                class="p-2 border-gray-300 border-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-lg"
                                type="date" name="start" value="{{ request()->start }}">
                            <span> au </span>
                            <input
                                class="p-2 border-gray-300 border-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-lg"
                                type="date" name="end" value="{{ request()->end }}">
                            <x-secondary-button class="py-3 border-gray-300 border-2 shadow-lg" type="submit">
                                Appliquer
                            </x-secondary-button>
                        </p>
                    </form> --}}
                    <div class="mt-4">
                        <x-table :resources="$products" :mattributes="$my_attributes" type="traitor.product" :mactions="$my_actions" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

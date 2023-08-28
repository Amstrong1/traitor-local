<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg my-2">
                            Liste des commandes
                            @if (request()->routeIs('traitor.orders.allowed'))
                                autorisés
                            @elseif (request()->routeIs('traitor.orders.denied'))
                                refusées
                            @elseif (request()->routeIs('traitor.orders.index'))
                                en attentes
                            @elseif (request()->routeIs('traitor.orders.delivered'))
                                livrées
                            @endif
                        </h1>
                    </div>

                    {{-- <form method="POST"
                        @if (request()->routeIs('traitor.allowed')) action="{{ route('traitor.allowed.filter') }}"
                        @elseif (request()->routeIs('traitor.denied')) action="{{ route('traitor.denied.filter') }}"
                        @elseif (request()->routeIs('traitor.index')) action="{{ route('traitor.filter') }}" @endif>
                        @csrf
                        <div class="md:flex text-sm mx-2">
                            <div class="p-2">Filtrer du </div>
                            <div>
                                <input
                                    class="p-2 border-gray-300 border-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-lg"
                                    type="date" name="start" value="{{ request()->start }}">
                            </div>
                            <div class="p-2"> au </div>
                            <div>
                                <input
                                    class="p-2 border-gray-300 border-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-lg"
                                    type="date" name="end" value="{{ request()->end }}">
                            </div>
                            <x-secondary-button class="py-3 border-gray-300 border-2 shadow-lg" type="submit">
                                Appliquer
                            </x-secondary-button>
                        </div>
                    </form> --}}

                    <div class="mt-4">
                        <x-table :resources="$traitors" :mattributes="$my_attributes" type="traitor.order" :mactions="$my_actions" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

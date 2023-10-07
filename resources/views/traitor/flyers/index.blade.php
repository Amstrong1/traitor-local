<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg my-2">Liste des flyers</h1>

                    </div>

                    <div class="mt-4 md:grid md:grid-cols-3 gap-4">

                        @foreach ($flyers as $flyer)
                            <div
                                class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                <a href="#!">
                                    <img class="w-auto h-64 rounded-lg block mx-auto mt-4"
                                        src="{{ url('storage/' . $flyer->image) }}" alt="{{ $flyer->name }}" />
                                </a>
                                <div class="p-6">
                                    <h5
                                        class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                                        {{ $flyer->name }}
                                    </h5>
                                    <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                        € {{ $flyer->price }}
                                    </p>
                                    <x-primary-button>
                                        Ajouter au panier
                                    </x-primary-button>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

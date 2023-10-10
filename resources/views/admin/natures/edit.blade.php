<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg my-2">Créer une nature</h1>
                    </div>

                    
                    <form action="{{ route('admin.natures.update', $nature->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div>
                            <label for="name">Nom De la Nature</label>
                            <input type="text" class="w-full" id="name" name="name" value="{{ $nature->name }}">
                        </div>
                        <div>
                            <button
                            type="submit"
                            class="inline-block rounded border-2 border-primary mt-10 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-primary transition duration-150 ease-in-out hover:border-primary-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-primary-600 focus:border-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:border-primary-700 active:text-primary-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                            data-te-ripple-init>
                            Valider
                          </button>
                        </div>
                    </form>

                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Modifier les informations</h1>
                    <x-forms.edit :item="$product" :fields="$my_fields" type="traitor.product" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

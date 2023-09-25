<x-user-app>
    <h1 class="mt-16 mb-4 mx-4 font-bold">Mes commandes</h1>
    @if ($orders->count() !== 0)
        @foreach ($orders as $order)
            <div class="flex flex-col my-6">
                <h5 class="mx-4">Le {{ getFormattedDate($order->updated_at) }}</h5>
                <a href="{{ route('order.product', [$order->id]) }}">
                    <div class="flex flex-row my-4">
                        <div class="flex items-center w-1/4 justify-center">
                            <div class="w-14 h-14">
                                <img src="{{ asset('storage/' . $order->product->image) }}" alt="{{ $order->product->image }}"
                                    class="shadow rounded-full w-full h-full align-middle border-none" />
                            </div>
                        </div>
                        <div class="flex flex-col w-1/2 justify-start">
                            <div class="flex text-center font-bold">
                                {{ $order->product->name }}
                            </div>
                            <div class="flex text-center">
                                {{ $order->amount }} €
                            </div>
                        </div>
                        <div class="w-1/2 justify-start italic">
                            {{ $order->formatted_status }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <div class="flex flex-col items-center justify-center text-center m-4">
            Aucune commandes
            <img src="{{ asset('img/nodata.svg') }}" alt="no_data" srcset="">
        </div>
    @endif
</x-user-app>

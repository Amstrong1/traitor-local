<x-user-app>
    <h1 class="m-4 font-bold">Mes commandes</h1>
    @foreach ($orders as $order)
        <div class="flex flex-col my-6">
            <h5 class="mx-4">Le {{ getFormattedDate($order->updated_at) }}</h5>
            <a href="{{ route('order.product', [$order->id]) }}">
                <div class="flex flex-row my-4">
                    <div class="flex items-center w-1/4 justify-start">
                        <div class="w-14 h-14">
                            <img src="{{ asset('storage/' . $order->product->image) }}" alt="..."
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
</x-user-app>

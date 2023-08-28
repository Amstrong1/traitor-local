<x-app-layout>
    <!-- ====== Form Layout Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Form Layout
            </h2>

            <nav>
                <ol class="flex items-center gap-2 dark:text-white">
                    <li><a class="font-medium" href="index.html">Dashboard /</a></li>
                    <li class="font-medium text-primary">Form Layout</li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <!-- ====== Form Layout Section Start -->
        <div class="grid grid-cols-1 gap-9 sm:grid-cols-2">
            <div class="flex flex-col gap-9">
                <!-- Contact Form -->
                <div
                    class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke py-4 px-6 dark:border-strokedark">
                        <h3 class="font-semibold text-black">
                            Données de la commande
                        </h3>
                    </div>
                    <div class="p-6">
                        @php
                            $item = $order;
                            $fields = $my_fields;
                        @endphp

                        @foreach ($fields as $attr => $value)
                            @php
                                $fill = $item->{$attr};
                            @endphp
                            <div class="mb-4">
                                <label class="mb-3 block text-black">
                                    {!! $value['title'] !!}
                                </label>
                                <input readonly type="" value="{{ old($attr) ?? $fill }}"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-9">
                <div
                    class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    @if ($order->status === 'allowed')
                    @elseif ($order->status === 'denied')
                        <div class="p-6 border-b border-stroke dark:border-strokedark">
                            <div class="mb-6">
                                <label class="mb-3 block text-black">
                                    Motif du refus
                                </label>
                                <textarea readonly rows="6" placeholder="Message (optionel)" name="message"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                {{ $order->message }}
                            </textarea>
                            </div>
                        </div>
                    @else
                        <div class="p-6 border-b border-stroke dark:border-strokedark">
                            <div class="mb-6">
                                <h3 class="font-semibold text-black">
                                    En attente de validation
                                </h3>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- ====== Form Layout Section End -->
    </div>
    <!-- ====== Form Layout Section End -->
</x-app-layout>
<x-app-layout>
    <!-- ====== Form Layout Section Start -->
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black">
                Message a l'utilisateur
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li><a class="font-medium" href="">Tableau de bord /</a></li>
                    <li class="font-medium text-primary">Message à l'utilisateur</li>
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
                            Données du traiteur
                        </h3>
                    </div>
                    <div class="p-6">
                        @php
                            $item = $user;
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
                <!-- Sign In Form -->
                <div
                    class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <div class="border-b border-stroke py-4 px-6 dark:border-strokedark">
                        <h3 class="font-semibold text-black">
                            Message
                        </h3>
                    </div>
                    <div class="p-6 border-b border-stroke dark:border-strokedark">
                        <form action="{{ route('admin.users.mail.send', [$user->id]) }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label class="mb-3 block text-black">
                                    Objet
                                </label>
                                <input placeholder="" name="object"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                <x-input-error :messages="$errors->get('object')" class="mt-2" />
                            </div>
                            <div class="mb-6">
                                <label class="mb-3 block text-black">
                                    Message
                                </label>
                                <textarea rows="6" placeholder="" name="message"
                                    class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"></textarea>
                                <x-input-error :messages="$errors->get('message')" class="mt-2" />
                            </div>
                            <button type="submit"
                                class="flex w-52 justify-center rounded bg-green-600 p-3 font-medium text-white">
                                Envoyer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ====== Form Layout Section End -->
    </div>
    <!-- ====== Form Layout Section End -->
</x-app-layout>

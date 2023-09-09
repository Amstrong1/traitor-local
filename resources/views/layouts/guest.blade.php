<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        {{-- <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div> --}}

        <section class="gradient-form h-full bg-neutral-200 dark:bg-neutral-700">
            <div class="container h-full p-10">
                <div
                    class="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
                    <div class="w-full">
                        <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                            <div class="g-0 lg:flex lg:flex-wrap">
                                <!-- Left column container-->
                                <div class="p-4 md:px-0 lg:w-6/12">
                                    <div class="md:m-4 md:px-12 md:py-6">
                                        <!--Logo-->
                                        <div class="text-center">
                                            <a href="/">
                                                <img class="mx-auto w-40" src="{{ asset('img/logo.png') }}"
                                                    alt="logo" />
                                            </a>
                                            <h4 class="mb-12 mt-1 pb-1 text-xl font-semibold">
                                                Traiteur Local
                                            </h4>
                                        </div>

                                        {{ $slot }}
                                    </div>
                                </div>

                                <!-- Right column container with background and description-->
                                <div class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none"
                                    style="background: linear-gradient(to right, #bbaf7b, #bbaf7b, #bbaf7b, #bbaf7b);">
                                    <div class="px-4 py-6 text-white md:mx-6 md:p-12">
                                        <h4 class="mb-6 text-xl font-semibold">
                                            Traiteur Local
                                        </h4>
                                        <p class="text-sm">
                                            Offrez un festin de saveurs à portée de main avec notre application.
                                            Partagez votre passion et savoir faire de délices culinaires sur mesure,
                                            directement à la table de vos clients. Simplifiez la planification de vos
                                            événements et donnez une symphonie de goûts grâce à notre plateforme.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div> --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</body>

</html>

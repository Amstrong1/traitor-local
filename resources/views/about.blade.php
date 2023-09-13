<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <style>
        .test {
            animation-name: rotate;
            animation-duration: 15s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes rotate {
            from {
                transform: rotate(-360deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>

</head>


<body class="font-sans text-gray-900 antialiased">
    <header>
        <div class="-skew-y-6 mb-16 h-full w-full" style="background-color: #bbaf7b">
            <div class="skew-y-6">
                <!-- Navigation bar -->
                <nav style="background-color: #4f4949"
                    class="relative flex w-full items-center justify-between bg-white py-2 text-neutral-600 hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 dark:text-neutral-200 md:flex-wrap md:justify-start"
                    data-te-navbar-ref>
                    <div class="flex w-full flex-wrap items-center justify-between px-3">
                        <div class="flex items-center">
                            <!-- Hamburger menu button -->
                            <button
                                class="border-0 bg-transparent px-2 text-xl leading-none transition-shadow duration-150 ease-in-out hover:text-neutral-700 focus:text-neutral-700 dark:hover:text-white dark:focus:text-white lg:hidden"
                                type="button" data-te-collapse-init data-te-target="#navbarSupportedContentY"
                                aria-controls="navbarSupportedContentY" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <!-- Hamburger menu icon -->
                                <span class="[&>svg]:w-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-7 w-7">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </span>
                            </button>
                        </div>

                        <!-- Navigation links -->
                        <div class="!visible hidden grow basis-[100%] items-center lg:!flex lg:basis-auto"
                            id="navbarSupportedContentY" data-te-collapse-item>

                            <div class="w-full container mx-auto px-6 py-4">

                                <div class="w-full flex items-center justify-between">
                                    <div>
                                        <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                                            href="/">
                                            <img class="w-20" src="{{ asset('img/logo.png') }}" alt=""
                                                srcset="">
                                        </a>
                                    </div>

                                    <div class="flex justify-end content-center">
                                        <a class="flex text-white no-underline hover:text-indigo-200 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 "
                                            href="{{ route('about') }}" data-te-nav-link-ref data-te-ripple-init
                                            data-te-ripple-color="light">
                                            A Propos &nbsp;
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                            </svg>
                                        </a>

                                        <a class="flex text-white no-underline hover:text-indigo-200 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 "
                                            href="{{ route('welcome') . '#contact' }}" data-te-nav-link-ref
                                            data-te-ripple-init data-te-ripple-color="light">
                                            Rejoignez nous &nbsp;
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                            </svg>
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </nav>

                <div class="px-8 md:px-14 mx-auto flex flex-wrap flex-col md:flex-row items-center h-fit py-6 my-8">
                    <!--Left Col-->
                    <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
                        <h1
                            class="my-4 text-3xl md:text-4xl text-white font-bold leading-tight text-center md:text-left slide-in-bottom-h1">
                            A propos de nous</h1>
                        <p class="leading-normal text-base mb-8 text-center md:text-left slide-in-bottom-subtitle">
                            Explorez l'excellence de la cuisine locale en passant commande de vos plats préférés,
                            confectionnés avec passion par des traiteurs de confiance, situés à proximité de votre
                            domicile. Traiteurlocal se distingue en tant que plateforme culinaire d'exception, vous
                            proposant une vaste sélection d'entrées, de plats principaux et de desserts, minutieusement
                            élaborés pour répondre à tous les palais de notre clientèle exigeante. Laissez-vous tenter
                            par des saveurs authentiques, préparées avec soin à partir d'ingrédients locaux de première
                            qualité.
                        </p>

                        <p class="text-white font-bold pb-8 lg:pb-6 text-center md:text-left fade-in">Télécharger l'app
                            ou voir
                            <a href="{{ route('home.index') }}">le site</a>
                        </p>
                        <div class="flex w-full justify-center md:justify-start pb-24 lg:pb-0 fade-in">
                            <img src="{{ asset('img/App Store.svg') }}" class="h-12 pr-4 bounce-top-icons">
                            <img src="{{ asset('img/Play Store.svg') }}" class="h-12 bounce-top-icons">
                        </div>

                    </div>

                    <!--Right Col-->
                    <div class="hidden md:block w-full xl:w-3/5 overflow-y-hidden py-6">
                        {{-- <img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom" src="{{ asset('img/banner.png') }}"> --}}
                        <div id="carouselDarkVariant" class="relative" data-te-carousel-init data-te-ride="carousel">

                            <!-- Carousel items -->
                            <div
                                class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
                                <!-- First item -->
                                <div class="relative float-left -mr-[100%] w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                                    data-te-carousel-fade data-te-carousel-item data-te-carousel-active>
                                    <img src="{{ asset('img/slide-entree.png') }}" class="test block w-1/2 mx-auto"
                                        alt="slide-entree" />
                                </div>
                                <!-- Second item -->
                                <div class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                                    data-te-carousel-fade data-te-carousel-item>
                                    <img src="{{ asset('img/slide-plat.png') }}" class="test block w-1/2 mx-auto"
                                        alt="slide-plat" />
                                </div>
                                <!-- Third item -->
                                <div class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                                    data-te-carousel-fade data-te-carousel-item>
                                    <img src="{{ asset('img/slide-dessert.png') }}" class="test block w-1/2 mx-auto"
                                        alt="slide-dessert" />
                                </div>
                                <!-- Third item -->
                                <div class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                                    data-te-carousel-fade data-te-carousel-item>
                                    <img src="{{ asset('img/slide-boisson.jpg') }}"
                                        class="test block w-1/2 mx-auto rounded-full" alt="slide-boisson" />
                                </div>
                            </div>

                            <!-- Carousel controls - prev item-->
                            <button
                                class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-black hover:no-underline hover:opacity-90 hover:outline-none focus:text-black focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                                type="button" data-te-target="#carouselDarkVariant" data-te-slide="prev">
                                <span class="inline-block h-8 w-8 dark:grayscale">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 19.5L8.25 12l7.5-7.5" />
                                    </svg>
                                </span>
                                <span
                                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
                            </button>
                            <!-- Carousel controls - next item-->
                            <button
                                class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-black opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-black hover:no-underline hover:opacity-90 hover:outline-none focus:text-black focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                                type="button" data-te-target="#carouselDarkVariant" data-te-slide="next">
                                <span class="inline-block h-8 w-8 dark:grayscale">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                </span>
                                <span
                                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <h2 class="font-bold text-center text-2xl my-2">Ce que nous offrons</h2>
            <!--Tabs navigation-->
            <ul class="mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0" role="tablist" data-te-nav-ref>
                <li role="presentation" class="flex-grow basis-0 text-center">
                    <a href="#tabs-all"
                        class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                        data-te-toggle="pill" data-te-target="#tabs-all" data-te-nav-active role="tab"
                        aria-controls="tabs-all" aria-selected="true">Tout</a>
                </li>
                <li role="presentation" class="flex-grow basis-0 text-center">
                    <a href="#tabs-entry"
                        class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                        data-te-toggle="pill" data-te-target="#tabs-entry" role="tab" aria-controls="tabs-entry"
                        aria-selected="false">Entrées</a>
                </li>
                <li role="presentation" class="flex-grow basis-0 text-center">
                    <a href="#tabs-plat"
                        class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                        data-te-toggle="pill" data-te-target="#tabs-plat" role="tab" aria-controls="tabs-plat"
                        aria-selected="false">Plats</a>
                </li>
                <li role="presentation" class="flex-grow basis-0 text-center">
                    <a href="#tabs-dessert"
                        class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                        data-te-toggle="pill" data-te-target="#tabs-dessert" role="tab"
                        aria-controls="tabs-dessert" aria-selected="false">Desserts</a>
                </li>
                <li role="presentation" class="flex-grow basis-0 text-center">
                    <a href="#tabs-drink"
                        class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-primary-400"
                        data-te-toggle="pill" data-te-target="#tabs-drink" role="tab" aria-controls="tabs-drink"
                        aria-selected="false">Boissons</a>
                </li>
            </ul>

            <!--Tabs content-->
            <div class="mb-6">
                <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                    id="tabs-all" role="tabpanel" aria-labelledby="tabs-home-tab02" data-te-tab-active>
                    <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                    id="tabs-entry" role="tabpanel" aria-labelledby="tabs-profile-tab02">
                    <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                    id="tabs-plat" role="tabpanel" aria-labelledby="tabs-profile-tab02">
                    <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                    id="tabs-dessert" role="tabpanel" aria-labelledby="tabs-contact-tab02">
                    <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                    id="tabs-drink" role="tabpanel" aria-labelledby="tabs-contact-tab02">
                    <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                            <div class="border p-4 rounded-md">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block h-full w-full rounded-lg object-cover object-center"
                                        src="{{ asset('img/slide-plat.png') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div>
        <h2 class="font-bold text-2xl text-center my-2">Notre garantie</h2>
        <section class="flex items-center justify-center h-full md:h-96 bg-fixed bg-center bg-cover"
            style="background-image:url('img/parallax.jpg');">
            <div class="w-full h-full md:h-96" style="background: rgba(17, 22, 24, .8)">
                <div class="w-full h-full text-lg text-white rounded-xl md:flex items-center font-semibold">
                    <div class="md:w-1/2 py-4 md:px-12 px-4">
                        Notre application conviviale vous offre la possibilité de passer votre commande en un clin
                        d'œil,
                        vous
                        tenant également informé des dernières créations culinaires à ne pas manquer. Planifiez vos
                        repas à
                        l'avance, pour une organisation impeccable de vos festins à venir. Les avis et les évaluations
                        impartiaux laissés par nos clients avertis attestent de la qualité inégalée de nos produits,
                        vous
                        offrant une confiance absolue dans votre choix gastronomique. Soyez assuré que votre commande
                        demeure
                        sécurisée, et elle ne sera validée qu'après que le traiteur aura pris en main votre demande avec
                        le
                        plus
                        grand soin.
                    </div>

                    <div class="md:w-1/2 py-4 md:px-12 px-4">
                        Pour ce qui est du règlement, vous avez la flexibilité de choisir entre le paiement par carte de
                        crédit,
                        pour une transaction classique, ou l'option de régler via Google Pay. Nous vous invitons à vivre
                        une
                        expérience gastronomique véritablement unique, tout en soutenant les talents culinaires locaux
                        de
                        votre
                        région. Avec Traiteurlocal, la cuisine devient un art à savourer et à partager, tout en
                        célébrant
                        les
                        richesses de notre terroir. Plongez dans une aventure culinaire mémorable dès aujourd'hui!
                    </div>
                </div>
            </div>

        </section>
    </div>

    <footer class="px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center" style="background-color: #bbaf7b">
        <!--Footer-->

        <div class="w-full pt-16 pb-6 text-md text-center fade-in flex justify-between">
            <div class="">
                <a class="text-white no-underline hover:no-underline" href="#">Mentions Légales</a> <span
                    class="text-white"> | </span>
                <a class="text-white no-underline hover:no-underline" href="#">Condition Générales
                    d'utilisation</a> <span class="text-white"> | </span>
                <a class="text-white no-underline hover:no-underline" href="#">Conditions Générales de vente</a>
            </div>

            <div>
                <a class="text-white no-underline hover:no-underline" href="#">&copy; Traiteur Local
                    2023</a>
                @if (Route::has('login.admin'))
                    <a class="text-white no-underline hover:no-underline" href="{{ route('login.admin') }}">&copy;
                        Administration</a>
                @endif
            </div>
        </div>
    </footer>

    <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

</body>

</html>

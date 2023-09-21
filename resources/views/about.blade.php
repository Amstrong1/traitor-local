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
</head>

<body class="font-sans text-gray-900 antialiased">
    <nav style="background-color: #4f4949"
        class="fixed z-50 flex w-full items-center justify-between py-2 text-neutral-600 hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 dark:text-neutral-200 md:flex-wrap md:justify-start"
        data-te-navbar-ref>
        <div class="flex w-full flex-wrap items-center justify-between px-3">

            <!-- Navigation links -->
            <div class="grow basis-[100%] items-center !flex lg:basis-auto">

                <div class="w-full container mx-auto px-6 py-2">

                    <div class="w-full flex items-center justify-between">
                        <div>
                            <a class="flex items-center no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                                href="/">
                                <img class="w-20" src="{{ asset('img/logo.png') }}" alt="" srcset="">
                            </a>
                        </div>

                        <div class="hidden md:flex md:flex-row justify-end content-center">
                            <a class="flex text-white no-underline hover:text-indigo-200 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4"
                                href="/" data-te-nav-link-ref data-te-ripple-init data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg> &nbsp;
                                Accueil
                            </a>

                            <a class="flex text-white no-underline hover:text-indigo-200 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4"
                                href="{{ route('about') }}" data-te-nav-link-ref data-te-ripple-init
                                data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg> &nbsp;
                                A Propos
                            </a>

                            {{-- <a class="flex text-white no-underline hover:text-indigo-200 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4"
                                    href="#contact" data-te-nav-link-ref data-te-ripple-init
                                    data-te-ripple-color="light">
                                    Rejoignez nous &nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                    </svg>
                                </a> --}}
                        </div>

                        <!-- Sidenav -->
                        <nav id="sidenav-7"
                            class="fixed right-0 z-[1035] h-screen w-60 translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='false']:-translate-x-0 dark:bg-zinc-800"
                            style="top: 7rem" data-te-sidenav-init data-te-sidenav-hidden="true"
                            data-te-sidenav-right="true">
                            <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
                                <li class="relative">
                                    <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                        data-te-sidenav-link-ref>
                                        <span
                                            class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                            </svg>
                                        </span>
                                        <span>Accueil</span>
                                    </a>
                                </li>
                                <li class="relative">
                                    <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                        data-te-sidenav-link-ref>
                                        <span
                                            class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                            </svg>
                                        </span>
                                        <span>A Propos</span>
                                    </a>
                                </li>
                                {{-- <li class="relative">
                                        <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-gray-600 outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                            data-te-sidenav-link-ref>
                                            <span
                                                class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                                </svg>
                                            </span>
                                            <span>Rejoignez nous</span>
                                        </a>
                                    </li> --}}
                            </ul>
                        </nav>
                        <!-- Sidenav -->

                        <!-- Toggler -->
                        <button
                            class="border-0 bg-transparent px-2 text-xl leading-none transition-shadow duration-150 ease-in-out hover:text-white focus:text-white dark:hover:text-white dark:focus:text-white lg:hidden"
                            data-te-sidenav-toggle-ref data-te-target="#sidenav-7" aria-controls="#sidenav-7"
                            aria-haspopup="true">
                            <span class="block [&>svg]:h-5 [&>svg]:w-6 [&>svg]:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fff"
                                    class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <!-- Toggler -->
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <div class="relative" style="padding-top: 7rem">
        <h1 class="my-6 text-2xl md:text-4xl font-bold leading-tight text-center slide-in-bottom-h1">
            A propos de nous
        </h1>
        <div class="px-8 md:px-14 mx-auto flex flex-wrap flex-col md:flex-row-reverse items-center h-fit py-6 my-8">
    
            <div class="md:block w-full md:w-1/2 overflow-y-hidden py-6">
                <img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom" src="{{ asset('img/about_us.svg') }}">
            </div>
    
            <div class="flex flex-col w-full md:w-1/2 justify-center lg:items-start overflow-y-hidden">
                <p class="leading-normal text-lg mb-8 text-justify slide-in-bottom-subtitle">
                    Explorez l'excellence de la cuisine locale en passant commande de vos plats préférés,
                    confectionnés avec passion par des traiteurs de confiance, situés à proximité de votre
                    domicile. Traiteurlocal se distingue en tant que plateforme culinaire d'exception, vous
                    proposant une vaste sélection d'entrées, de plats principaux et de desserts, minutieusement
                    élaborés pour répondre à tous les palais de notre clientèle exigeante. Laissez-vous tenter
                    par des saveurs authentiques, préparées avec soin à partir d'ingrédients locaux de première
                    qualité.
                </p>
            </div>
        </div>
    </div>

    <div>
        <h2 class="my-6 text-2xl md:text-4xl font-bold leading-tight text-center slide-in-bottom-h1">Notre garantie
        </h2>
        <section class="flex items-center justify-center h-full">
            <div class="w-full h-full text-lg rounded-xl md:flex items-center">
                <div class="md:w-1/2 py-4 md:px-12 px-4">
                    <img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom" src="{{ asset('img/customer.svg') }}">
                </div>

                <div class="md:w-1/2 py-4 md:px-12 px-4 text-justify">
                    Notre application conviviale vous offre la possibilité de passer votre commande en un clin
                    d'œil, vous tenant également informé des dernières créations culinaires à ne pas manquer. Planifiez
                    vos repas à l'avance, pour une organisation impeccable de vos festins à venir. Les avis et les
                    évaluations impartiaux laissés par nos clients avertis attestent de la qualité inégalée de nos
                    produits, vous offrant une confiance absolue dans votre choix gastronomique. Soyez assuré que votre
                    commande demeure sécurisée, et elle ne sera validée qu'après que le traiteur aura pris en main votre
                    demande avec le plus grand soin.
                </div>
            </div>

        </section>
    </div>

    <div>
        <section class="flex items-center justify-center h-full">
            <div class="w-full h-full text-lg rounded-xl md:flex md:flex-row-reverse items-center">

                <div class="md:w-1/2 py-4 md:px-12 px-4">
                    <img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom" src="{{ asset('img/payment.svg') }}">
                </div>

                <div class="md:w-1/2 py-4 md:px-12 px-4 text-justify">
                    Pour ce qui est du règlement, vous avez la flexibilité de choisir entre le paiement par carte de
                    crédit, pour une transaction classique, ou l'option de régler via Google Pay. Nous vous invitons à
                    vivre une expérience gastronomique véritablement unique, tout en soutenant les talents culinaires
                    locaux de votre région. Avec Traiteurlocal, la cuisine devient un art à savourer et à partager, tout
                    en célébrant les richesses de notre terroir. Plongez dans une aventure culinaire mémorable dès
                    aujourd'hui!
                </div>
            </div>

        </section>
    </div>

    <footer class="px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center" style="background-color: #bbaf7b">
        <!--Footer-->

        <div class="w-full pt-16 pb-6 text-md text-center fade-in flex flex-col md:flex-row justify-between">
            <div class="my-2">
                <a class="text-white no-underline hover:no-underline" href="#">Mentions Légales</a> <span
                    class="text-white"> | </span>
                <a class="text-white no-underline hover:no-underline" href="#">Conditions Générales
                    d'utilisation</a> <span class="text-white"> | </span>
                <a class="text-white no-underline hover:no-underline" href="#">Conditions Générales de vente</a>
            </div>

            <div class="my-2">
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

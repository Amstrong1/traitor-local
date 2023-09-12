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
                                            href="#contact" data-te-nav-link-ref data-te-ripple-init
                                            data-te-ripple-color="light">
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
                            Trouver des traiteurs proches de chez vous</h1>
                        <p
                            class="leading-normal text-base md:text-xl mb-8 text-center md:text-left slide-in-bottom-subtitle">
                            Explorer de nouvelles saveurs et cuisines sans quitter votre maison en commandant en ligne
                            avec
                            Traiteur Local
                        </p>

                        <p class="text-white font-bold pb-8 lg:pb-6 text-center md:text-left fade-in">Télécharger
                            l'app
                            ou
                            voir <a href="{{ route('home.index') }}">le site</a></p>
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
                                    <img src="{{ asset('img/slide-entree.png') }}" class="block w-1/2 mx-auto"
                                        alt="slide-entree" />
                                </div>
                                <!-- Second item -->
                                <div class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                                    data-te-carousel-fade data-te-carousel-item>
                                    <img src="{{ asset('img/slide-plat.png') }}" class="block w-1/2 mx-auto"
                                        alt="slide-plat" />
                                </div>
                                <!-- Third item -->
                                <div class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                                    data-te-carousel-fade data-te-carousel-item>
                                    <img src="{{ asset('img/slide-dessert.png') }}" class="block w-1/2 mx-auto"
                                        alt="slide-dessert" />
                                </div>
                                <!-- Third item -->
                                <div class="relative float-left -mr-[100%] hidden w-full !transform-none opacity-0 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                                    data-te-carousel-fade data-te-carousel-item>
                                    <img src="{{ asset('img/slide-boisson.jpg') }}"
                                        class="block w-1/2 mx-auto rounded-full" alt="slide-boisson" />
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

    <div class="-skew-y-6 py-32">
        <div class="skew-y-6">
            <!--Main-->
            <div class="container px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">

                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-12 mx-auto">
                        <div class="flex flex-wrap -m-4">
                            <div class="p-4 md:w-1/2">
                                <div class="h-full rounded-lg overflow-hidden">
                                    <img class="h:full w-full object-cover object-center"
                                        src="{{ asset('img/chief.jpg') }}" alt="blog">
                                </div>
                            </div>
                            <div class="p-4 md:w-1/2">
                                <div
                                    class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                    <div class="p-6">
                                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
                                            Traiteur
                                        </h2>
                                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Par vous</h1>
                                        <p class="leading-relaxed mb-3">
                                            Offrez de nouvelles saveurs à travers notre application. Partager votre
                                            passion
                                            et savoir faire venant de votre expérience culinaire professionnelle à la
                                            table
                                            de vos clients. Organiser la planification de vos évènements grâce notre
                                            plateforme.
                                        </p>
                                        <div class="flex items-center flex-wrap">
                                            <a href="{{ route('register.traitor') }}"
                                                class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Créer
                                                un
                                                compte
                                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

        </div>
    </div>

    <div class="-skew-y-6 py-32" style="background-color: #bdd5f8">
        <div class="skew-y-6">
            <!--Main-->
            <div class="container px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-wrap -m-4">
                            <div class="p-4 md:w-1/2">
                                <div
                                    class="h-full border-2 border-gray-100 border-opacity-60 rounded-lg overflow-hidden">
                                    <div class="p-6">
                                        <h2 class="tracking-widest text-xs title-font font-medium text-white mb-1">
                                            Client
                                        </h2>
                                        <h1 class="title-font text-lg font-medium text-white mb-3">Pour vous</h1>
                                        <p class="leading-relaxed mb-3">
                                            Venez découvrir notre carte d'entrées, plats desserts, et/ou boissons et
                                            faites vous livrer par le traiteur.
                                        </p>
                                        <div class="flex items-center flex-wrap ">
                                            <a href="#"
                                                class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Télécharger
                                                l'application
                                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 md:w-1/2">
                                <div class="h-full rounded-lg overflow-hidden">
                                    <img class="h:full w-full object-cover object-center"
                                        src="{{ asset('img/food.jpg') }}" alt="blog">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div id="contact">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap items-center justify-center -m-4">
                    <div class="p-4">

                        <div
                            class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                            <h2 class="text-center font-bold mb-2">Contact</h2>
                            <form>
                                @csrf

                                <!--Name input-->
                                <div class="relative mb-6">
                                    <label for="exampleInput7" class="">Nom
                                    </label>
                                    <input type="text"
                                        class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="exampleInput7" />
                                </div>

                                <!--Email input-->
                                <div class="relative mb-6">
                                    <label for="exampleInput8" class="">Email
                                    </label>
                                    <input type="email"
                                        class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="exampleInput8" placeholder="Email" />
                                </div>

                                <!--Message textarea-->
                                <div class="relative mb-6">
                                    <label for="exampleFormControlTextarea13" class="">Message
                                    </label>
                                    <textarea
                                        class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="exampleFormControlTextarea13" rows="3" placeholder="Message"></textarea>
                                </div>

                                <!--Checkbox-->
                                <div class="mb-6 flex min-h-[1.5rem] items-center justify-center pl-[1.5rem]">
                                    <input
                                        class="relative float-left -ml-[1.5rem] mr-[6px] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                                        type="checkbox" value="" id="exampleCheck10" />
                                    <label class="inline-block pl-[0.15rem] hover:cursor-pointer"
                                        for="exampleCheck10">
                                        Envoyer moi un copie de ce message
                                    </label>
                                </div>

                                <!--Submit button-->
                                <button type="submit"
                                    class="dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]] inline-block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                    data-te-ripple-init data-te-ripple-color="light"
                                    style="background-color: #4bad41">
                                    Envoyer
                                </button>
                            </form>
                        </div>
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

<nav x-data="{ open: false }" class="w-full bg-black border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            {{-- hamburger icon --}}
            <div class="flex item-center">
                <button
                    class="sm:block border-0 bg-transparent px-2 text-white hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-white"
                    data-te-sidenav-toggle-ref data-te-target="#menu" aria-controls="#menu" aria-haspopup="true">
                    <!-- Hamburger icon -->
                    <span class="[&>svg]:w-7">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
                            <path fill-rule="evenodd"
                                d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
            </div>

            <!-- Navigation Links -->
            <div class="flex item-center">
                <x-nav-link :href="route('home.index')">
                    <img class="w-24" src="{{ asset('img/logo-old.jpg') }}" alt="">
                </x-nav-link>
            </div>


            {{-- cart icon --}}
            <div class="flex item-center">
                <button
                    class="sm:block border-0 bg-transparent px-2 text-white hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-white"
                    data-te-sidenav-toggle-ref data-te-target="#cart" aria-controls="#cart" aria-haspopup="true">
                    <!-- cart icon -->
                    <div>
                        <a class="hidden-arrow mr-4 flex items-center text-white transition duration-200 hover:text-white hover:ease-in-out focus:text-white disabled:text-black/30 motion-reduce:transition-none dark:text-white dark:hover:text-white dark:focus:text-white [&.active]:text-black/90 dark:[&.active]:text-white"
                            href="#" data-te-dropdown-toggle-ref aria-expanded="false">
                            <!-- Dropdown trigger icon -->
                            <span class="[&>svg]:w-7">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                            </span>
                            <!-- Notification counter -->
                            <span
                                class="absolute -mt-4 ml-6 rounded-full bg-danger px-[0.35em] py-[0.15em] text-[0.6rem] font-bold leading-none text-white">

                                @if (session('cart') !== null)
                                    {{ sizeof(session('cart')) }}
                                @else
                                    0
                                @endif
                            </span>
                        </a>
                    </div>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Sidenav right (nav menu)-->
<nav id="menu"
    class="bg-black opacity-80 text-white rounded-tr-xl fixed left-0 top-16 z-[1035] h-full w-60 -translate-x-full overflow-hidden shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='true']:translate-x-0 dark:bg-zinc-800"
    data-te-sidenav-init data-te-sidenav-hidden="false">
    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
        @auth
            <li class="relative mx-4 my-6 text-center">
                <a href="{{ route('user.profil') }}">Mon Profil</a>
            </li>
            <li class="relative mx-4 my-6 text-center">
                <a href="">Mes Commandes</a>
            </li>
            <li class="relative mx-4 my-6 text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            this.closest('form').submit();">Se
                        déconnecter</a>
                </form>
            </li>
        @endauth
        <li class="relative mx-4 my-6 text-center">
            <a href="">Mentions légales</a>
        </li>
        <li class="relative m-4 text-center">
            <a href="{{ url('/') }}">Site Internet</a>
        </li>
    </ul>
</nav>
<!-- Sidenav -->

<!-- Sidenav left (cart)-->
<nav id="cart"
    class="bg-black opacity-80 text-white rounded-tl-xl fixed right-0 top-16 z-[1035] h-full w-60 translate-x-full overflow-hidden shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='false']:-translate-x-0 dark:bg-zinc-800"
    data-te-sidenav-init data-te-sidenav-hidden="true" data-te-sidenav-right="true">
    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
        {{-- check if user add product in cart  --}}
        {{-- And display its  --}}
        @if (session('cart') !== null)
            @php
                $total = 0;
            @endphp

            <form action="{{ route('store.order') }}" method="post">
                @csrf
                @for ($i = 0; $i < sizeof(session('cart')); $i++)
                    @if (isset(session('cart')[$i]['productName']))
                        <li class="relative m-4 border-b-2">
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <p> {{ session('cart')[$i]['productName'] }} </p>
                                    <p>
                                        Quantité : {{ session('cart')[$i]['quantity'] }} </p>
                                    <p>
                                        Prix : {{ session('cart')[$i]['subTotal'] }}€
                                    </p>
                                </div>
                                <a href="{{ route('remove.product', [session('cart')[$i]['productId']]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </a>
                            </div>
                        </li>

                        {{-- form field --}}
                        <input type="hidden" name="productId{{ $i }}"
                            value="{{ session('cart')[$i]['productId'] }}">
                        <input type="hidden" name="productQte{{ $i }}"
                            value="{{ session('cart')[$i]['quantity'] }}">
                        <input type="hidden" name="productSubTotal{{ $i }}"
                            value="{{ session('cart')[$i]['subTotal'] }}">
                        <input type="hidden" name="deliveryDate{{ $i }}"
                            value="{{ session('cart')[$i]['deliveryDate'] }}">
                        <input type="hidden" name="deliveryHour{{ $i }}"
                            value="{{ session('cart')[$i]['deliveryHour'] }}">
                        <textarea class="hidden" name="note{{ $i }}" value="{{ session('cart')[$i]['note'] }}"></textarea>

                        @php
                            $total += session('cart')[$i]['subTotal'];
                        @endphp
                    @endif
                @endfor

                <li class="relative m-4 border-b-2">
                    <div class="text-center rounded-full border px-4 mb-4 w-32">
                        Total : {{ $total }}
                    </div>
                </li>

                <input type="hidden" name="total" value="{{ $total }}">

                <li class="relative m-4 border-b-2">
                    <button type="submit" class="text-center rounded-full border px-4 py-2 mb-4 w-32">
                        Commander
                    </button>
                </li>
            </form>
        @else
            <p class="text-center px-4 mb-4">
                Votre panier est vide
            </p>
        @endif
        {{-- check if user is autenticated and show login route if not --}}
        @if (Auth::user() === null)
            <li class="relative m-4 border-b-2">
                <p class="text-center px-4 mb-4">
                    Merci de bien vouloir vous connecter avant de commander pour donner votre avis et obtenir des
                    cadeaux
                </p>
            </li>
            <li class="relative m-4">
                <a href="{{ route('login') }}">
                    <button class="text-center rounded-full border px-4 py-4 mb-4 w-40">
                        Se connecter
                    </button>
                </a>
                <a href="{{ route('register') }}">
                    <div class="flex justify-end">
                        S'inscrire
                    </div>
                </a>
            </li>
        @endif
    </ul>
</nav>
<!-- Sidenav -->

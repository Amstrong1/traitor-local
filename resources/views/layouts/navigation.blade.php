<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                {{-- hamburger icon --}}
                <div class="flex items-center">
                    <button
                        class="lg:hidden sm:block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200"
                        data-te-sidenav-toggle-ref data-te-target="#sidenav-1" aria-controls="#sidenav-1"
                        aria-haspopup="true">
                        <!-- Hamburger icon -->
                        <span class="[&>svg]:w-7">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="h-7 w-7">
                                <path fill-rule="evenodd"
                                    d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                </div>
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="flex">
                <!-- Notifications Dropdown -->
                <div class="flex items-center ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>
                                    <a class="hidden-arrow mr-4 flex items-center text-neutral-600 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                                        href="#" id="dropdownMenuButton1" role="button"
                                        data-te-dropdown-toggle-ref aria-expanded="false">
                                        <!-- Dropdown trigger icon -->
                                        <span class="[&>svg]:w-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="h-5 w-5">
                                                <path fill-rule="evenodd"
                                                    d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <!-- Notification counter -->
                                        <span
                                            class="absolute -mt-4 ml-2.5 rounded-full bg-danger px-[0.35em] py-[0.15em] text-[0.6rem] font-bold leading-none text-white">
                                            @if (Auth::user() !== null)
                                                {{ Auth::user()->unreadNotifications->count() }}
                                            @elseif (Auth::guard('admin')->user() !== null)
                                                {{ Auth::guard('admin')->user()->unreadNotifications->count() }}
                                            @elseif (Auth::guard('traitor')->user() !== null)
                                                {{ Auth::guard('traitor')->user()->unreadNotifications->count() }}
                                            @endif
                                        </span>
                                    </a>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @if (Auth::user() !== null)
                                @foreach (Auth::user()->unreadNotifications as $notification)
                                    <x-dropdown-link>
                                        <p class="text-sm">
                                            {{ $notification->data['data'] }}
                                        </p>

                                        <p class="text-xs">{{ getFormattedDateTime($notification->created_at) }}</p>
                                    </x-dropdown-link>
                                @endforeach
                            @elseif (Auth::guard('admin')->user() !== null)
                                @foreach (Auth::guard('admin')->user()->unreadNotifications as $notification)
                                    <x-dropdown-link>
                                        <p class="text-sm">
                                            {{ $notification->data['data'] }}
                                        </p>

                                        <p class="text-xs">{{ getFormattedDateTime($notification->created_at) }}</p>
                                    </x-dropdown-link>
                                @endforeach
                            @elseif (Auth::guard('traitor')->user() !== null)
                                @foreach (Auth::guard('traitor')->user()->unreadNotifications as $notification)
                                    <x-dropdown-link>
                                        <p class="text-sm">
                                            {{ $notification->data['data'] }}
                                        </p>

                                        <p class="text-xs">{{ getFormattedDateTime($notification->created_at) }}</p>
                                    </x-dropdown-link>
                                @endforeach
                            @endif

                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Settings Dropdown -->
                <div class="flex items-center ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>
                                    {{ Auth::user()->name ?? (Auth::guard('admin')->user()->name ?? Auth::guard('traitor')->user()->name) }}
                                </div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST"
                                @if (Auth::guard('admin')->user() !== null) action="{{ route('logout.admin') }}"
                                @elseif (Auth::guard('traitor')->user() !== null) action="{{ route('logout.traitor') }}" @endif>
                                @csrf

                                @if (Auth::guard('admin')->user() !== null)
                                    <x-dropdown-link :href="route('logout.admin')"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </x-dropdown-link>
                                @elseif (Auth::guard('traitor')->user() !== null)
                                    <x-dropdown-link :href="route('logout.traitor')"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </x-dropdown-link>
                                @endif

                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </div>
</nav>

<nav
     class="fixed left-0 top-0 z-20 w-full border-b border-gray-200 bg-white/25 backdrop-blur-lg dark:border-gray-200/10 dark:bg-gray-900/25">
    <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4">
        <a wire:navigate
           href="/"
           class="flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none"
                 stroke="currentColor"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 stroke-width="2"
                 class="h-10 w-10 rounded-full bg-primary-500 p-2 text-white"
                 viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5">
                </path>
            </svg>

            <span class="self-center whitespace-nowrap text-2xl font-semibold text-gray-900 dark:text-white">
                Livewire Blog
            </span>
        </a>

        <div class="flex items-center md:order-2">
            <button id="theme-toggle"
                    x-data="{ toggle: () => window.toggleColorTheme() }"
                    @click="toggle"
                    type="button"
                    class="rounded-lg p-2.5 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                <svg id="theme-toggle-dark-icon"
                     class="hidden h-5 w-5"
                     fill="currentColor"
                     viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                    </path>
                </svg>
                <svg id="theme-toggle-light-icon"
                     class="hidden h-5 w-5"
                     fill="currentColor"
                     viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                          fill-rule="evenodd"
                          clip-rule="evenodd"></path>
                </svg>
            </button>

            <button data-collapse-toggle="navbar-sticky"
                    type="button"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
                    aria-controls="navbar-sticky"
                    aria-expanded="false">

                <span class="sr-only">
                    Open main menu
                </span>

                <svg class="h-5 w-5"
                     aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <div class="ml-auto mr-2 hidden w-full items-center justify-between md:order-1 md:flex md:w-auto"
             id="navbar-sticky">

            <ul class="mt-4 flex flex-col p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:p-0">
                @guest
                    @if (!Route::is('login') && !Route::is('register'))
                        <a wire:navigate
                           href="{{ route('login') }}"
                           class="rounded-lg bg-primary-500 px-5 py-2.5 text-center text-sm font-medium text-white transition-colors duration-300 ease-in-out hover:bg-primary-600 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-500 dark:hover:bg-primary-600 dark:focus:ring-primary-600">
                            {{ __('Login') }}
                        </a>
                    @endif
                @endguest

                @auth
                    <form method="POST"
                          action="{{ route('logout') }}">
                        @csrf

                        <x-button type="submit">
                            Logout
                        </x-button>
                    </form>
                @endauth
            </ul>
        </div>
    </div>
</nav>

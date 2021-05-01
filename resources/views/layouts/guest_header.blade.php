<header class="absolute top-0 left-0 right-0 z-20">
    <nav class="container mx-auto px-6 md:px-12 py-4" x-data="{ open: false }">
        <div class="md:flex justify-between items-center">
            <div class="flex justify-between items-center">
                <a href="{{ url('/') }}" class="text-white">
                    <svg class="w-6 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" data-name="Capa 1" viewBox="0 0 16.16 12.57"><defs/><path d="M14.02 4.77v7.8H9.33V8.8h-2.5v3.77H2.14v-7.8h11.88z"/><path d="M16.16 5.82H0L8.08 0l8.08 5.82z"/></svg>
                </a>

                <div class="md:hidden">
                    <button @click="open = !open" class="text-white focus:outline-none">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path x-show="open === false" d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path x-show="open === true" d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="hidden md:flex items-center">
                @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm uppercase mx-3 text-white cursor-pointer hover:text-indigo-600 underline">Dashboard</a>
                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center text-sm font-medium text-white hover:text-gray-100 hover:border-gray-300 focus:outline-none focus:text-gray-100 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                            {{ __('Log out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm uppercase mx-3 text-white cursor-pointer hover:text-indigo-600">Prihlásenie</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm uppercase mx-3 text-white cursor-pointer hover:text-indigo-600">Registrácia</a>
                            @endif
                            <a class="text-sm uppercase mx-3 text-white cursor-pointer hover:text-indigo-600">Kontakt</a>
                        @endauth
                @endif

            </div>
        </div>

        <div x-show="open === true" class="md:hidden flex flex-col w-full z-40 bg-indigo-600 rounded mt-4 py-2 overflow-hidden">
            @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm uppercase mx-3 text-white cursor-pointer hover:text-indigo-600 underline">Dashboard</a>
                    <!-- Responsive Settings Options -->
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="flex items-center px-4">
                                <div class="flex-shrink-0">
                                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>

                                <div class="ml-3">
                                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                </div>
                            </div>

                            <div class="mt-3 space-y-1">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-responsive-nav-link :href="route('logout')"
                                                           onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                        {{ __('Log out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm uppercase mx-3 text-white cursor-pointer hover:text-indigo-600">Prihlásenie</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm uppercase mx-3 text-white cursor-pointer hover:text-indigo-600">Registrácia</a>
                        @endif
                    @endauth
            @endif
            <a class="text-sm uppercase mx-3 text-white cursor-pointer hover:text-indigo-600">Kontakt</a>
        </div>
    </nav>
</header>

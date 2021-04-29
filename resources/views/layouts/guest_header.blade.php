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
                        @else
                            <a href="{{ route('login') }}" class="text-sm uppercase mx-3 text-white cursor-pointer hover:text-indigo-600">Prihlásenie</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm uppercase mx-3 text-white cursor-pointer hover:text-indigo-600">Registrácia</a>
                            @endif
                        @endauth
                @endif
                <a class="text-sm uppercase mx-3 text-white cursor-pointer hover:text-indigo-600">Kontakt</a>
            </div>
        </div>

        <div x-show="open === true" class="md:hidden flex flex-col w-full z-40 bg-indigo-600 rounded mt-4 py-2 overflow-hidden">
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm uppercase mx-3 text-white cursor-pointer hover:text-indigo-600 underline">Dashboard</a>
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